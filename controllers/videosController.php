<?php
class videosController extends controller {
    
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
        $data["has_videos_add"] = $users->hasPermission('videos_add');
        $data["has_videos_edit"] = $users->hasPermission('videos_edit');

        if ($users->hasPermission('videos')) {
            $offiset = 0; 

            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $videos = new Videos();
            $data["videos_list"] = $videos->getList($users->getSubscriber(), $offiset);

            $data["videos_count"] = $videos->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["videos_count"] / 10 );

            $this->loadTamplate('videos', $data);
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

        if ($users->hasPermission('videos') && $users->hasPermission('videos_add')) {
            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $url = addslashes($_POST['url']);
                
                $videos = new Videos();
                $id = $videos->add($users->getSubscriber(), 0, $name, $url);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/videos");
                } else {
                    $data['error'] = "Curso já existe!";
                }
            }

            $this->loadTamplate('/videos/videos_add', $data);
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

        if ($users->hasPermission('videos') && $users->hasPermission('videos_edit')) {
            $videos = new Videos();
            $data['data'] = $videos->getData($users->getSubscriber(), $id);

            if (isset($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $url = addslashes($_POST['url']);
                
                $id = $videos->add($users->getSubscriber(), $id, $name, $url);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/videos");
                } else {
                    $data['error'] = "Empresa já existe!";
                }
            }

            $this->loadTamplate('/videos/videos_edit', $data);
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

        if ($users->hasPermission('videos') && $users->hasPermission('videos_delete')) {
            $videos = new Videos();
            $videos->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/videos");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
