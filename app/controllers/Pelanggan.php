<?php

class Pelanggan extends Controller {
    public function tambahpelanggan() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if(isset($_POST)) {
            if ($this->model("Pelanggan_model")->tambahPelanggan($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah pelanggan.", "Pelanggan", "success");
            } else {
                Flasher::setFlash("Gagal menambah pelanggan, silahkan coba lagi.", "Pelanggan", "error");
            }
        }
        header("Location: " . BASEURL . "/manage/pelanggan");
        exit;
    }

    public function updatepelanggan() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if(isset($_POST)) {
            if ($this->model("Pelanggan_model")->updatePelanggan($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate pelanggan.", "Pelanggan", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate pelanggan, silahkan coba lagi.", "Pelanggan", "error");
            }
        }
        header("Location: " . BASEURL . "/manage/pelanggan");
        exit;
    }

    public function getpelanggan($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data = $this->model("Pelanggan_model")->getPelanggan("id", $id, "result");
        echo json_encode($data);
    }

    public function deletepelanggan($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if ($this->model("Pelanggan_model")->deletePelanggan($id) > 0) {
            Flasher::setFlash("Berhasil menghapus pelanggan.", "Pelanggan", "success");
        } else {
            Flasher::setFlash("Gagal menghapus pelanggan, silahkan coba lagi.", "Pelanggan", "error");
        }   
        header("Location: " . BASEURL . "/manage/pelanggan");
        exit;
    }
}