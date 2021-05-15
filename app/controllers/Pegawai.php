<?php 

class Pegawai extends Controller {
    public function index() {
        header("Location: " . BASEURL . "/manage/ourpegawai");
    }

    public function tambahpegawai() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Pegawai_model")->tambahPegawai($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah pegawai.", "Pegawai", "success");
            } else {
                Flasher::setFlash("Gagal menambah pegawai, silahkan coba lagi.", "Pegawai", "error");
            }
            header("Location: " . BASEURL . "/manage/ourpegawai");
            exit;
        }
    }

    public function updatepegawai() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Pegawai_model")->updatePegawai($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate pegawai.", "Pegawai", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate pegawai, silahkan coba lagi.", "Pegawai", "error");
            }
            header("Location: " . BASEURL . "/manage/ourpegawai");
            exit;
        }
    }

    public function getpegawai($id = 0) {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data = $this->model("Pegawai_model")->getPegawai("id", $id, "result");
        echo json_encode($data);
    }

    public function deletepegawai($id = 0) {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if ($this->model("Pegawai_model")->deletePegawai($id) > 0) {
            Flasher::setFlash("Berhasil menghapus pegawai.", "Pegawai", "success");
        } else {
            Flasher::setFlash("Gagal menghapus pegawai, silahkan coba lagi.", "Pegawai", "error");
        }
        header("Location: " . BASEURL . "/manage/ourpegawai");
        exit;
    }
}