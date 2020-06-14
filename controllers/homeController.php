<?php
class homeController extends controller {
    
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
        
        $this->loadTamplate('home', $data);
    }
    
}
