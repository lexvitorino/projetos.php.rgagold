<?php
class ajaxController extends controller {
    
    public function __construct() {
        parent::__construct();

        $users = new Users();
        if ($users->isLogged() == false) {
            header("Location: ".BASE_URL."/login");
        }
    }

    public function index() { }

    public function search_propriedades() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();

        if (isset($_POST['q']) && !empty($_POST['q'])) {
            $q = addslashes($_POST['q']);
    
            $propriedades = new Propriedades();
            $propriedades = $propriedades->searchPropriedades($users->getSubscriber(), $q);
    
            foreach ($propriedades as $c) {
                $data[] = array(
                    'id' => $c['id'],
                    'name' => $c['name'],
                    'link' => BASE_URL.'/propriedades/edit/'.$c['id']
                );
            }
        }

        echo json_encode($data);
    }

    public function excluiFoto() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();

        if (isset($_POST['id']) && !empty($_POST['field'])) {
            $id = addslashes($_POST['id']);
            $field = addslashes($_POST['field']);
            $file = 'assets/specs/images/fotos/'.addslashes($_POST['file']);
    
            $propriedades = new Propriedades();
            $result = $propriedades->excluiFoto($users->getSubscriber(), $id, $field);
    
            if ($result == 'true') {
                unlink($file);
            }
        }

        echo json_encode($data);
    }

}
