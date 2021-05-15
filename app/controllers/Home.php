<?php 

class Home extends Controller {
    public function index() {
        $data['allservice'] = $this->model("Diskon_model")->getDiskonAllService();
        $data['paketdiskon'] = $this->model("Paket_model")->getOnlyPaketDiskon();
        $data['css'] = array("landing");
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
    
    public function dashboard() {
        Security::isLogin();
        $data['css'] = array("dashboard", "navbar", "form-loginregister");
        $data['js'] = array("dashboard", "form-loginregister");
        $this->view("templates/header", $data);
        $this->view("home/dashboard");
        $this->view("templates/footer", $data);
    }

    public function cucian() {
        Security::isLogin();
        $data['title'] = "Home";
        $data['id'] = "12";
        $data['css'] = array("form-loginregister", "navbar", "home-user");
        $data['js'] = array("navbar", "manage");
        $data['cucian'] = $this->model("Cucian_model")->getCucian();
        $data['link'] = '<a class="tambah filter" href="'.BASEURL.'/home/tagihan">Tampilkan Tagihan</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav");        
        $this->view("home/cucian", $data);
        $this->view("templates/footer", $data);
    }

    public function searchcucian($invoice = '0') {
        Security::isLogin();
        $data['cucian'] = $this->model("Cucian_model")->searchCucian($invoice);
        $data['link'] = '<a class="tambah filter" href="'.BASEURL.'/home/cucian">Tampilkan Cucian</a>';
        $data['title'] = "Home";
        $data['id'] = "12";
        $data['css'] = array("form-loginregister", "navbar", "home-user");
        $data['js'] = array("navbar", "manage");
        $this->view("templates/header", $data);
        if (isset($_SESSION['user-information'])) {
            $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav");
        } else {
            $this->view("templates/regular-nav");
        }
        
        $this->view("home/cucian", $data);
        $this->view("templates/footer", $data);
    }

    public function tagihan() {
        Security::isLogin();
        $cucian = $this->model("Cucian_model")->getHutang();
        $data['link'] = '<a class="tambah filter" href="'.BASEURL.'/home/cucian">Tampilkan Cucian</a>';
        $data['total'] = $cucian['total'];
        $data['cucian'] = $cucian['data'];
        $data['title'] = "Home";
        $data['id'] = "12";
        $data['css'] = array("form-loginregister", "navbar", "home-user");
        $data['js'] = array("navbar", "manage");
        $this->view("templates/header", $data);
        if (isset($_SESSION['user-information'])) {
            $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav");
        } else {
            $this->view("templates/regular-nav");
        }
        
        $this->view("home/cucian", $data);
        $this->view("templates/footer", $data);
    }

    public function detail($id = 1) {
        Security::isLogin();
        $data['detail'] = $this->model("Transaksi_model")->getDetail($id);
        Security::checkAuthorization($data['detail']['id_pelanggan']);
        $data['id'] = $id;
        $data['title'] = "Detail cucian atas nama " . $data['detail']['pelanggan'];
        $data['css'] = array("navbar", "detail");
        $data['js'] = array("navbar");
        $data['notfound'] = "cucian";
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav");        
        $this->view("home/detail", $data);
        $this->view("templates/footer", $data);
    }

    public function printdetail($id = 1) {
        Security::isLogin();
        $data['detail'] = $this->model("Transaksi_model")->getDetail($id);
        Security::checkAuthorization($data['detail']['id_pelanggan']);
        $data['id'] = $id;
        $data['title'] = "Detail cucian atas nama " . $data['detail']['pelanggan'];
        $data['css'] = array("navbar", "detail");
        $data['js'] = array("navbar", "print");
        $data['notfound'] = "cucian";
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav");
        $this->view("templates/print");
        $this->view("home/detail", $data);
        $this->view("templates/footer", $data);
    }
}