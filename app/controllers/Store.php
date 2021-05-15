<?php

class Store extends Controller {
    public function tambahstore() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Store_model")->tambahStore($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah outlet.", "Outlet", "success");
            } else {
                Flasher::setFlash("Gagal menambah outlet, silahkan coba lagi.", "Outlet", "error");
            };
            header("Location: " . BASEURL . "/manage/semuastore");
            exit;
        }
    }

    public function deletestore($id = 0) {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if ($this->model("Store_model")->deleteStore($id) > 0) {
            Flasher::setFlash("Berhasil menghapus outlet.", "Outlet", "success");
        } else {
            Flasher::setFlash("Gagal menghapus outlet, silahkan coba lagi.", "Outlet", "error");
        };
        header("Location: " . BASEURL . "/manage/semuastore");
        exit;
    }

    public function getstore($id = 0) {
        Security::isLogin();
        Security::checkRole(array("admin"));
        $data = $this->model("Store_model")->getStore("id", $id, "result");
        echo json_encode($data);
    }

    public function updatestore() {
        Security::isLogin();
        Security::checkRole(array("admin"));
        if (isset($_POST['submit'])) {
            if ($this->model("Store_model")->updateStore($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate outlet.", "Outlet", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate outlet, silahkan coba lagi.", "Outlet", "error");
            };
            header("Location: " . BASEURL . "/manage/semuastore");
            exit;
        }
    }
}
