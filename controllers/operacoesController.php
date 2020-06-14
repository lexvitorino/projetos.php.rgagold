<?php
class operacoesController extends controller {
    
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
        $data["has_operacoes_add"] = $users->hasPermission('operacoes_add');
        $data["has_operacoes_edit"] = $users->hasPermission('operacoes_edit');

        if ($users->hasPermission('operacoes')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $operacoes = new Operacoes();
            $data["operacoes_list"] = $operacoes->getList($users->getSubscriber(), $offiset);

            $data["operacoes_count"] = $operacoes->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["operacoes_count"] / 10 );

            $this->loadTamplate('operacoes', $data);
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

        if ($users->hasPermission('operacoes') && $users->hasPermission('operacoes_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $operacoes = new Operacoes();
                $id = $operacoes->add($users->getSubscriber(), 0, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/operacoes");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/operacoes/operacoes_add', $data);
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

        if ($users->hasPermission('operacoes') && $users->hasPermission('operacoes_edit')) {
            $operacoes = new Operacoes();
            $data['data'] = $operacoes->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);

                $id = $operacoes->add($users->getSubscriber(), $id, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/operacoes");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/operacoes/operacoes_edit', $data);
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

        if ($users->hasPermission('operacoes') && $users->hasPermission('operacoes_delete')) {
            $operacoes = new Operacoes();
            $operacoes->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/operacoes");
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

        if ($users->hasPermission('operacoes') && $users->hasPermission('operacoes_sinc')) {
            
            $operacoes = new Operacoes();
            $operacao = $operacoes->getData($users->getSubscriber(), $id);

            $sincWp = new SincWp();
            $chave = intval($sincWp->sincCaracteristicas($operacao['chave']));

            if ($chave>0) {                

                $operacoes->setChave($users->getSubscriber(), $id, $chave);
            }

            header("Location: ".BASE_URL."/operacoes");
        } else {

            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
