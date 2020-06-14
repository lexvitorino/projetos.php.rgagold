<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

class opcionaisController extends controller {
    
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
        $data["has_opcionais_add"] = $users->hasPermission('opcionais_add');
        $data["has_opcionais_edit"] = $users->hasPermission('opcionais_edit');

        if ($users->hasPermission('opcionais')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $opcionais = new Opcionais();
            $data["opcionais_list"] = $opcionais->getList($users->getSubscriber(), $offiset);

            $data["opcionais_count"] = $opcionais->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["opcionais_count"] / 10 );

            $this->loadTamplate('opcionais', $data);
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

        if ($users->hasPermission('opcionais') && $users->hasPermission('opcionais_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $opcionais = new Opcionais();
                $id = $opcionais->add($users->getSubscriber(), 0, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/opcionais");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/opcionais/opcionais_add', $data);
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

        if ($users->hasPermission('opcionais') && $users->hasPermission('opcionais_edit')) {
            $opcionais = new Opcionais();
            $data['data'] = $opcionais->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $id = $opcionais->add($users->getSubscriber(), $id, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/opcionais");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/opcionais/opcionais_edit', $data);
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

        if ($users->hasPermission('opcionais') && $users->hasPermission('opcionais_delete')) {
            $opcionais = new Opcionais();
            $opcionais->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/opcionais");
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

        if ($users->hasPermission('opcionais') && $users->hasPermission('opcionais_sinc')) {
            
            $opcionais = new Opcionais();
            $opcional = $opcionais->getData($users->getSubscriber(), $id);

            $sincWp = new SincWp();
            $chave = intval($sincWp->sincCaracteristicas($opcional['chave']));

            if ($chave>0) {                

                $opcionais->setChave($users->getSubscriber(), $id, $chave);
            }

            header("Location: ".BASE_URL."/opcionais");
        } else {

            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
