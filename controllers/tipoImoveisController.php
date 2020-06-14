<?php
class tipoImoveisController extends controller {
    
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
        $data["has_tipoImoveis_add"] = $users->hasPermission('tipoImoveis_add');
        $data["has_tipoImoveis_edit"] = $users->hasPermission('tipoImoveis_edit');

        if ($users->hasPermission('tipo_imoveis')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $tipoImoveis = new TipoImoveis();
            $data["tipoImoveis_list"] = $tipoImoveis->getList($users->getSubscriber(), $offiset);

            $data["tipoImoveis_count"] = $tipoImoveis->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["tipoImoveis_count"] / 10 );

            $this->loadTamplate('tipoImoveis', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function add() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('tipo_imoveis') && $users->hasPermission('tipo_imoveis_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $tipoImoveis = new TipoImoveis();
                $id = $tipoImoveis->add($users->getSubscriber(), 0, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/tipoImoveis");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/tipoImoveis/tipoImoveis_add', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function edit($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('tipo_imoveis') && $users->hasPermission('tipo_imoveis_edit')) {
            $tipoImoveis = new TipoImoveis();
            $data['data'] = $tipoImoveis->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $id = $tipoImoveis->add($users->getSubscriber(), $id, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/tipoImoveis");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/tipoImoveis/tipoImoveis_edit', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function delete($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('tipo_imoveis') && $users->hasPermission('tipo_imoveis_delete')) {
            $tipoImoveis = new TipoImoveis();
            $tipoImoveis->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/tipoImoveis");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function sinc($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('tipo_imoveis') && $users->hasPermission('tipo_imoveis_sinc')) {
            
            $tipoImoveis = new TipoImoveis();
            $tipoImovel = $tipoImoveis->getData($users->getSubscriber(), $id);

            $sincWp = new SincWp();
            $chave = intval($sincWp->sincCaracteristicas($tipoImovel['chave']));

            if ($chave>0) {                

                $tipoImoveis->setChave($users->getSubscriber(), $id, $chave);
            }

            header("Location: ".BASE_URL."/tipoImoveis");
        } else {

            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
