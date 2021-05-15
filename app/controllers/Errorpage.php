<?php

class Errorpage extends Controller {
    public function index() {
        header("Location: " . BASEURL . "/errorpage/notfound");
    }

    public function notfound() {
        Security::isLogin();
        $data['title'] = "404";
        $data['message'] = "page not found";
        $data['code'] = "404";
        $data['css'] = array("style", "navbar");
        $data['js'] = array("navbar");

        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("templates/notfound", $data);
        $this->view("templates/footer", $data);
    }

    public function unauthorized() {
        Security::isLogin();
        $data['title'] = "403";
        $data['message'] = "you don't have access to this page";
        $data['code'] = "403";
        $data['css'] = array("style", "navbar");
        $data['js'] = array("navbar");

        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("templates/notfound", $data);
        $this->view("templates/footer", $data);
    }
}