<?php
class imobiliariasController extends controller {
    
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
        $data["has_imobiliarias_add"] = $users->hasPermission('imobiliarias_add');
        $data["has_imobiliarias_edit"] = $users->hasPermission('imobiliarias_edit');

        if ($users->hasPermission('imobiliarias')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $imobiliarias = new Imobiliarias();
            $data["imobiliarias_list"] = $imobiliarias->getList($users->getSubscriber(), $offiset);

            $data["imobiliarias_count"] = $imobiliarias->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["imobiliarias_count"] / 10 );

            $this->loadTamplate('imobiliarias', $data);
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

        if ($users->hasPermission('imobiliarias') && $users->hasPermission('imobiliarias_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                
                $imobiliarias = new Imobiliarias();
                $id = $imobiliarias->add($users->getSubscriber(), 0, $name);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/imobiliarias");
                } else {
                    $data['error'] = "Imobiliaria já existe!";
                }
            }

            $this->loadTamplate('/imobiliarias/imobiliarias_add', $data);
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

        if ($users->hasPermission('imobiliarias') && $users->hasPermission('imobiliarias_edit')) {
            $imobiliarias = new Imobiliarias();
            $data['data'] = $imobiliarias->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                
                $id = $imobiliarias->add($users->getSubscriber(), $id, $name);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/imobiliarias");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/imobiliarias/imobiliarias_edit', $data);
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

        if ($users->hasPermission('imobiliarias') && $users->hasPermission('imobiliarias_delete')) {
            $imobiliarias = new Imobiliarias();
            $imobiliarias->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/imobiliarias");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
