<?php
class bairrosController extends controller {
    
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
        $data["has_bairros_add"] = $users->hasPermission('bairros_add');
        $data["has_bairros_edit"] = $users->hasPermission('bairros_edit');

        if ($users->hasPermission('bairros')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $bairros = new Bairros();
            $data["bairros_list"] = $bairros->getList($users->getSubscriber(), $offiset);

            $data["bairros_count"] = $bairros->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["bairros_count"] / 10 );

            $this->loadTamplate('bairros', $data);
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

        if ($users->hasPermission('bairros') && $users->hasPermission('bairros_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $bairros = new Bairros();
                $id = $bairros->add($users->getSubscriber(), 0, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/bairros");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/bairros/bairros_add', $data);
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

        if ($users->hasPermission('bairros') && $users->hasPermission('bairros_edit')) {
            $bairros = new Bairros();
            $data['data'] = $bairros->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $chave = addslashes($_POST['chave']);
                
                $id = $bairros->add($users->getSubscriber(), $id, $name, $chave);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/bairros");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/bairros/bairros_edit', $data);
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

        if ($users->hasPermission('bairros') && $users->hasPermission('bairros_delete')) {
            $bairros = new Bairros();
            $bairros->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/bairros");
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

        if ($users->hasPermission('bairros') && $users->hasPermission('bairros_sinc')) {
            
            $bairros = new Bairros();
            $bairro = $bairros->getData($users->getSubscriber(), $id);

            $sincWp = new SincWp();
            $chave = intval($sincWp->sincCaracteristicas($bairro['chave']));

            if ($chave>0) {                

                $bairros->setChave($users->getSubscriber(), $id, $chave);
            }

            header("Location: ".BASE_URL."/bairros");
        } else {

            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
