<?php
class cidadesController extends controller {
    
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
        $data["has_cidades_add"] = $users->hasPermission('cidades_add');
        $data["has_cidades_edit"] = $users->hasPermission('cidades_edit');

        if ($users->hasPermission('cidades')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $cidades = new Cidades();
            $data["cidades_list"] = $cidades->getList($users->getSubscriber(), $offiset);

            $data["cidades_count"] = $cidades->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["cidades_count"] / 10 );

            $this->loadTamplate('cidades', $data);
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

        if ($users->hasPermission('cidades') && $users->hasPermission('cidades_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                
                $cidades = new Cidades();
                $id = $cidades->add($users->getSubscriber(), 0, $name);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/cidades");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/cidades/cidades_add', $data);
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

        if ($users->hasPermission('cidades') && $users->hasPermission('cidades_edit')) {
            $cidades = new Cidades();
            $data['data'] = $cidades->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                
                $id = $cidades->add($users->getSubscriber(), $id, $name);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/cidades");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/cidades/cidades_edit', $data);
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

        if ($users->hasPermission('cidades') && $users->hasPermission('cidades_delete')) {
            $cidades = new Cidades();
            $cidades->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/cidades");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
