<?php

class Credentials extends Controller {
    public function index() {
        Security::isLogin();
        header("Location: ". BASEURL . "/credentials/tambahcredentials");
    }

    public function tambahcredentials() {
        Security::isLogin();
        if(isset($_SESSION['password-kredensial']['nama_ayah'])) {
            header("Location: ". BASEURL . "/credentials/editcredentials");
            exit;
        }
        $data['title'] = "Tambah Kredensial";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("credentials/tambah");
        $this->view("templates/footer", $data);
    }

    public function editcredentials() {
        Security::isLogin();
        if(!isset($_SESSION['password-kredensial']['nama_ayah'])) {
            header("Location: ". BASEURL . "/credentials/tambahcredentials");
            exit;
        }
        $data['title'] = "Edit Kredensial";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("credentials/edit");
        $this->view("templates/footer", $data);
    }

    public function updatecredentials() {
        if (isset($_POST['submit'])) {
            $this->checkPassword($_POST['password'], $_SESSION['user-information']['password'], "/credentials/update");
            if($this->model("Credentials_model")->updateCredentials($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate kredensial.", "Password", "success");
                $passwordKredensial = $this->model("Credentials_model")->getCredentialsByPhone();
                $_SESSION['password-kredensial'] = $passwordKredensial;
                header("Location: " . BASEURL . "/home/dashboard");
                exit;
            } else {
                Flasher::setFlash("Gagal mengupdate kredensial.", "Password", "error");
                header("Location: " . BASEURL . "/credentials/editcredentials");
                exit;
            }
        }
    }

    public function addcredentials() {
        if (isset($_POST['submit'])) {
            $this->checkPassword($_POST['password'], $_SESSION['user-information']['password'], "/credentials/update");
            if($this->model("Credentials_model")->addCredentials($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah kredensial.", "Password", "success");
                $passwordKredensial = $this->model("Credentials_model")->getCredentialsByPhone();
                $_SESSION['password-kredensial'] = $passwordKredensial;
                header("Location: " . BASEURL . "/home/dashboard");
                exit;
            } else {
                Flasher::setFlash("Gagal menambah kredensial.", "Password", "error");
                header("Location: " . BASEURL . "/add/editcredentials");
                exit;
            }
        }
    }


    protected function checkPassword($passwordRAW, $passwordHash, $redirect) {
        if (!password_verify($passwordRAW, $passwordHash)) {
            Flasher::setFlash("Password salah.", "Password", "error");
            header("Location: " . BASEURL . $redirect);
            exit;
        } 
        return;
    }
}