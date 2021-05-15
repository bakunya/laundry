<?php

class Diskon extends Controller {
    public function tambahdiskon() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if(isset($_POST)) {
            if ($this->model("Diskon_model")->tambahDiskon($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah diskon.", "Diskon", "success");
            } else {
                Flasher::setFlash("Gagal menambah diskon, silahkan coba lagi.", "Diskon", "error");
            }
        }
        header("Location: " . BASEURL . "/manage/diskon");
        exit;
    }

    public function getdiskon($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $diskon = $this->model("Diskon_model")->getDiskon("id", $id, "result");
        $data = [
            'id' => $diskon['id'],
            'diskon' => $diskon['diskon'],
            'date_end' => date("Y-m-d\TH:i", strtotime($diskon['date_end'])),
            'nama' => $diskon['nama']
        ];
        echo json_encode($data);
    }

    public function updateDiskon() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if(isset($_POST)) {
            if ($this->model("Diskon_model")->updateDiskon($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate diskon.", "Diskon", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate diskon, silahkan coba lagi.", "Diskon", "error");
            }
        }
        header("Location: " . BASEURL . "/manage/diskon");
        exit;
    }

    public function deletediskon($id = "0") {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if ($this->model("Diskon_model")->deleteDiskon($id) > 0) {
            Flasher::setFlash("Berhasil Menghapus diskon.", "Diskon", "success");
        } else {
            Flasher::setFlash("Gagal Menghapus diskon, silahkan coba lagi.", "Diskon", "error");
        }
        header("Location: " . BASEURL . "/manage/diskon");
        exit;
    }
}