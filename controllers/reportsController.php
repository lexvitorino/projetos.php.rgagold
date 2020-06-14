<?php
class reportsController extends controller {
    
    public function __construct() {
        parent::__construct();

        $users = new Users();
        if ($users->isLogged() == false) {
        	header("Location: ".BASE_URL."/login");
        }
    }

    public function index() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();
        $data["has_clients_add"] = $users->hasPermission('clients_add');
        $data["has_clients_edit"] = $users->hasPermission('clients_edit');

        if ($users->hasPermission('reports')) {
            $this->loadTamplate('reports', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function propriedades() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('propriedades_rep')) {
            $bairros = new Bairros();
            $data["bairros_list"] = $bairros->getList($users->getSubscriber(), -1);
            $tipoImoveis = new TipoImoveis();
            $data["tipoImoveis_list"] = $tipoImoveis->getList($users->getSubscriber(), -1);

            $this->loadTamplate('reports/propriedades_rep', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function propriedades_pdf() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();

        if ($users->hasPermission('propriedades_rep')) {
            $propriedades = new Propriedades();
            
            $id = addslashes($_GET['id']);
            $id_bairro = addslashes($_GET['id_bairro']);
            $tipo = addslashes($_GET['tipo']);

            $destaque_dia = 'N';
            if (isset($_GET['destaque_dia'])) {
                $destaque_dia = addslashes($_GET['destaque_dia']);
            }

            $prop_indisponivel = 'N';
            if (isset($_GET['prop_indisponivel'])) {
                $prop_indisponivel = addslashes($_GET['prop_indisponivel']);
            }
            $vendidos = 'N';
            if (isset($_GET['vendidos'])) {
                $vendidos = addslashes($_GET['vendidos']);
            }
            $avenda = 'N';
            if (isset($_GET['avenda'])) {
                $avenda = addslashes($_GET['avenda']);
            }
            $locacao = 'N';
            if (isset($_GET['locacao'])) {
                $locacao = addslashes($_GET['locacao']);
            }

            $propriedades = new Propriedades();
            $data['propriedades_list'] = $propriedades->getPropriedadesForReport($users->getSubscriber(),$id,$id_bairro,$tipo,$destaque_dia,$prop_indisponivel,$vendidos,$avenda,$locacao);

            $this->loadLibary('mpdf60/mpdf');

            ob_start();
            $this->loadView('reports/propriedades_rep_pdf', $data);
            $html = ob_get_contents();
            ob_get_clean();

            $mpdf = new mPDF('c', 'A4-L');
            $mpdf->SetDisplayMode('fullpage');
            $css = file_get_contents("assets/specs/css/report.css");
            $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html);
            $mpdf->OutPut();
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

}
