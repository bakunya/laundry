<?php

class Paket extends Controller {
    public function tambahpaket() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Paket_model")->tambahPaket($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah paket.", "paket", "success");
            } else {
                Flasher::setFlash("Gagal menambah paket, silahkan coba lagi.", "paket", "error");
            }
            header("Location: " . BASEURL . "/manage/ourpaket");
            exit;
        }
    }

    public function updatepaket() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Paket_model")->updatePaket($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah paket.", "paket", "success");
            } else {
                Flasher::setFlash("Gagal menambah paket, silahkan coba lagi.", "paket", "error");
            }
            header("Location: " . BASEURL . "/manage/ourpaket");
            exit;
        }
    }

    public function getpaket($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $res = $this->model("Paket_model")->getPaket("id, final_harga, nama, layanan, service, harga, id_diskon, id_outlet", "id", $id, "result");
        echo json_encode($res);
    }

    public function getpaketdiskon($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $res = $this->model("Paket_model")->getPaketDiskon("paket.id", $id, "result");
        echo json_encode($res);
    }

    public function deletepaket($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if ($this->model("Paket_model")->deletePaket($id) > 0) {
            Flasher::setFlash("Berhasil menghapus paket.", "paket", "success");
        } else {
            Flasher::setFlash("Gagal menghapus paket, silahkan coba lagi.", "paket", "error");
        }
        header("Location: " . BASEURL . "/manage/ourpaket");
        exit;
    }
}