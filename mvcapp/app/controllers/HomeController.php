<?php

require_once '../app/models/Message.php';

class HomeController {
    public function index() {
        $messageModel = new Message();
        $message = $messageModel->getMessage();

        require_once '../app/views/home.php';
    }
}
