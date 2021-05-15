<?php 

class Service extends Controller {
    public function index() {
        header("Location: " . BASEURL . "/service/harga");
    }

    public function harga() {
        Security::isLogin();
        $data['css'] = array("navbar", "daftar-harga");
        $data['js'] = array("navbar");
        $data['title'] = "Daftar Harga";
        $data['paket'] = $this->model("Paket_model")->getAllPaketDiskon();
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("service/harga", $data);
        $this->view("templates/footer", $data);
    }

    public function outlet() {
        Security::isLogin();
        $data['css'] = array("form-loginregister", "navbar", "daftar-harga");
        $data['js'] = array("navbar", "manage");
        $data['title'] = "Daftar Outlet";
        $data['outlet'] = $this->model("Store_model")->getAllStore("*");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("service/outlet", $data);
        $this->view("templates/footer", $data);
    }

    public function detailoutlet($id= '0') {
        Security::isLogin();
        $data['css'] = array("form-loginregister", "navbar", "daftar-harga");
        $data['js'] = array("navbar", "manage");
        $data['title'] = "Daftar Outlet";
        $data['paket'] = $this->model("Paket_model")->getAllPaketDiskonAndOutlet($id);
        $data['outlet'] = $this->model("Store_model")->getStore("id" ,$id, "result");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("service/detail", $data);
        $this->view("service/harga", $data);
        $this->view("templates/footer", $data);
    }

    public function searchoutlet($id= '0') {
        Security::isLogin();
        $data['css'] = array("form-loginregister", "navbar", "daftar-harga");
        $data['js'] = array("navbar", "manage");
        $data['title'] = "Daftar Outlet";
        $data['outlet'] = $this->model("Store_model")->searchStore($id);
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("service/outlet", $data);
        $this->view("templates/footer", $data);
    }
}