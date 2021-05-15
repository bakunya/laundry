<?php

class Manage extends Controller {
    public function index() {
        echo "index";
    }

    /**
     * Paket
     */

    public function allpaket() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['diskon'] = $this->model("Diskon_model")->getDiskon("berlangsung", true, "resultSet");
        $data['paket'] = $this->model("Paket_model")->getAllPaket("nama, id, id_diskon");
        $data['title'] = "Paket";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "paket");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/ourpaket">Tampilkan Data Kita</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/paket/index",$data);
        $this->view("templates/footer", $data);
    }

    public function ourpaket() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['diskon'] = $this->model("Diskon_model")->getDiskon("berlangsung", true, "resultSet");
        $data['paket'] = $this->model("Paket_model")->getPaket("nama, id, id_diskon", "id_outlet", $_SESSION['user-information']['id_outlet'], "resultSet");
        $data['title'] = "Paket";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "paket");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/allpaket">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/paket/index",$data);
        $this->view("templates/footer", $data);
    }

    public function searchpaket($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['diskon'] = $this->model("Diskon_model")->getDiskon("berlangsung", true, "resultSet");
        $data['paket'] = $this->model("Paket_model")->searchPaket("nama, id, id_diskon", $id);
        $data['title'] = "Paket";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "paket");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/ourpaket">Tampilkan Data Kita</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/paket/index",$data);
        $this->view("templates/footer", $data);
    }

    /**
     * Paket End
     */



    /**
     * Store
     */

    public function ourstore() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['store'] = $this->model("Store_model")->getStore("id", $_SESSION['user-information']['id_outlet'], "resultSet");
        $data['title'] = "Outlet Kita";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "store");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/semuastore">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/store/index", $data);
        $this->view("templates/footer", $data);
    }

    public function semuastore() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['store'] = $this->model("Store_model")->getAllStore("nama, id");
        $data['title'] = "Semua Outlet";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "store");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/ourstore">Tampilkan Data Kita</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/store/index", $data);
        $this->view("templates/footer", $data);
    }

    public function searchstore($param = "0") {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['store'] = $this->model("Store_model")->searchStore($param);
        $data['title'] = "Semua Outlet";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "store");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/semuastore">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/store/index", $data);
        $this->view("templates/footer", $data);
    }

    /**
     * Store End
     */


    /**
     * Pegawai
     */

    public function ourpegawai() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['pegawai'] = $this->model("Pegawai_model")->getPegawai("id_outlet", $_SESSION['user-information']['id_outlet'], "resultSet");
        $data['title'] = "Pegawai";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pegawai");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/semuapegawai">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pegawai/index", $data);
        $this->view("templates/footer", $data);
    }

    public function semuapegawai() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['pegawai'] = $this->model("Pegawai_model")->getAllPegawai();
        $data['title'] = "Pegawai";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pegawai");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/ourpegawai">Tampilkan Data Kita</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pegawai/index", $data);
        $this->view("templates/footer", $data);
    }

    public function searchpegawai($param = "0") {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['pegawai'] = $this->model("Pegawai_model")->searchPegawai($param);
        $data['title'] = "Search Pegawai";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pegawai");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/semuapegawai">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pegawai/index", $data);
        $this->view("templates/footer", $data);
    }

    /**
     * Pegawai End
     */

    public function pelanggan() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['pelanggan'] = $this->model("Pelanggan_model")->getAllPelanggan("*");
        $data['title'] = "Pelanggan";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pelanggan");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pelanggan/index", $data);
        $this->view("templates/footer", $data);
    }

    public function searchpelanggan($param = "0") {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['pelanggan'] = $this->model("Pelanggan_model")->searchPelanggan($param);
        $data['title'] = "Search Pelanggan";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pelanggan");
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/pelanggan">Tampilkan Semua Data</a>';
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pelanggan/index", $data);
        $this->view("templates/footer", $data);
    }

    public function pelanggandetail($pelangganid = "0") {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['cucian'] = $this->model("Cucian_model")->getCucianByPelanggan($pelangganid);
        $data['title'] = "Pelanggan";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "pelanggan");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/pelanggan/detail", $data);
        $this->view("templates/footer", $data);
    }


    /**
     * Diskon
     */

    public function diskon() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/berlangsungdiskon">Diskon Yang Berlangsung</a>';
        $data['diskon'] = $this->model("Diskon_model")->getAllDiskon();
        $data['title'] = "Diskon";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "diskon");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/diskon/index", $data);
        $this->view("templates/footer", $data);
    }
    
    public function berlangsungdiskon() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/diskon">Tampilkan Semua Diskon</a>';
        $data['diskon'] = $this->model("Diskon_model")->getDiskon("berlangsung", 1, "resultSet");
        $data['title'] = "Diskon";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "diskon");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/diskon/index", $data);
        $this->view("templates/footer", $data);
    }

    public function searchdiskon($param = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['link'] = '<a class="tambah filter" href="'. BASEURL .'/manage/berlangsungdiskon">Diskon Yang Berlangsung</a>';
        $data['diskon'] = $this->model("Diskon_model")->searchDiskon($param);
        $data['title'] = "Diskon";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal");
        $data['js'] = array("navbar", "modal", "manage", "diskon");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/diskon/index", $data);
        $this->view("templates/footer", $data);
    }    

    public function diskondetail($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data['diskon'] = $this->model("Diskon_model")->getDiskon("id", $id, "result");
        $data['paket'] = $this->model("Paket_model")->getPaket("*", "id_diskon", $id, "resultSet");
        $data['title'] = "Diskon";
        $data['css'] = array("form-loginregister", "navbar", "manage");
        $data['js'] = array("navbar");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("manage/diskon/detail", $data);
        $this->view("templates/footer", $data);
    }

    /**
     * Diskon End
     */
}