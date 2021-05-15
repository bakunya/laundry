<?php

class Auth extends Controller {
    public function index() {
        header("Location: " . BASEURL . "/auth/login");
    }

    public function login() {
        $this->checkIsLogin();
        $data['title'] = "Sign in";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("auth/login");
        $this->view("templates/footer", $data);
    }

    public function lupapassword() {
        $data['title'] = "Lupa Password";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("auth/forgetpassword");
        $this->view("templates/footer", $data);
    }

    public function gantipassword() {
        Security::isLogin();
        $data['title'] = "Update Password";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("auth/updatepassword");
        $this->view("templates/footer", $data);
    }

    public function register() {
        $this->checkIsLogin();
        $data['title'] = "Sign up";
        $data['css'] = array("form-loginregister");
        $data['js'] = array("form-loginregister");
        $this->view("templates/header", $data);
        $this->view("auth/register");
        $this->view("templates/footer", $data);
    }

    public function logout() {
        session_unset();
        setcookie("id", "", 0, "/");
        header("Location: " . BASEURL . "/auth/login");
    }


    public function signup() {
        if (isset($_POST["submit"])) {
            $this->checkPasswordConfirmation($_POST);

            if ($this->model("Auth_model")->signup($_POST) > 0) {
                Flasher::setFlash("Berhasil mendaftar, silahkan login untuk melanjutkan.", "Register", "success");
                header("Location: " . BASEURL . "/auth/login");
                exit;
            } else {
                Flasher::setFlash("Gagal mendaftar, silahkan coba lagi.", "Register", "error");
                header("Location: " . BASEURL . "/auth/register");
                exit;
            };
        }
    }

    public function signin() {
        if (isset($_POST["submit"])) {
            $user = $this->model("Auth_model")->getUserByTelephone($_POST['telephone']);
            $this->checkUser($user, "/auth/login");
            $this->checkPassword($_POST['password'], $user['password'], "/auth/login");
            $_SESSION['user-information'] = $user;
            $passwordKredensial = $this->model("Credentials_model")->getCredentialsByPhone();
            var_dump($passwordKredensial);
            if ($passwordKredensial['nama_ayah'] == false) {
                Flasher::setFlash("Silahkan lengkapi kredensial kata sandi di bagian pengaturan untuk pengalaman yang lebih baik.", "Profil", "warning");
            }
            $_SESSION['password-kredensial'] = $passwordKredensial;
            setcookie("id", $user['id'], time() + (86400 * 30), "/");
            header("Location: " . BASEURL . "/home/dashboard");
        }
    }

    public function forgotpassword() {
        if (isset($_POST["submit"])) {
            $credentials = $this->model("Auth_model")->getCredentialsLupaPassword($_POST);
            $this->checkUser($credentials, "/auth/lupapassword");
            $this->checkingCredentials($_POST, $credentials);
            if ($this->model("Auth_model")->updatePassword($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate password.", "Register", "success");
                $this->logout();
                exit;
            } else {
                Flasher::setFlash("Gagal mengupdate password.", "Register", "error");
                header("Location: " . BASEURL . isset($_SESSION['user-information']) ? "/home/dashboard" : "/auth/login");
                exit;
            };
        }
    }

    public function updateuser()  {
        if (isset($_POST["submit"])) {
            if ($this->model("Auth_model")->update($_POST) > 0) {
                $_SESSION['user-information'] = $this->model("Auth_model")->getUserByTelephone($_POST['telephone']);
                Flasher::setFlash("Berhasil update data kamu.", "Update", "success");
                header("Location: " . BASEURL . "/home/dashboard");
                exit;
            } else {
                Flasher::setFlash("Gagal update data kamu, silahkan coba lagi.", "Update", "error");
                header("Location: " . BASEURL . "/home/dashboard");
                exit;
            };
        }
    }

    public function updatepassword() {
        Security::isLogin();
        $this->checkPassword($_POST['password-old'], $_SESSION['user-information']['password'], "/auth/gantipassword");
        $user = ["password" => $_POST['password'], "telephone" => $_SESSION['user-information']['telp']];
        if ($this->model("Auth_model")->updatepassword($user) > 0) {
            $_SESSION['user-information'] = $this->model("Auth_model")->getUserByTelephone($_SESSION['user-information']['telp']);
            Flasher::setFlash("Berhasil mengubah password.", "password", "success");
            header("Location: " . BASEURL . "/home/dashboard");
            exit;
        } else {
            Flasher::setFlash("Gagal mengubah password.", "password", "error");
            header("Location: " . BASEURL . "/auth/gantipassword");
            exit;
        };

    }


    protected function checkUser($data, $redirect) {
        if ($data == false) {
            Flasher::setFlash("User tidak ditemukan.", "Login", "error");
            header("Location: " . BASEURL . $redirect);
            exit;
        } 
        return;
    }

    protected function checkPassword($passwordRAW, $passwordHash, $redirect) {
        if (!password_verify($passwordRAW, $passwordHash)) {
            Flasher::setFlash("Password salah.", "Login", "error");
            header("Location: " . BASEURL . $redirect);
            exit;
        } 
        return;
    }

    protected function checkPasswordConfirmation($data) {
        if ($data['password'] !== $data['re-password']) {
            Flasher::setFlash("Kombinasi password salah. Silahkan cek kolom password dan kolom konfirmasi password.", "Register", "warning");
            header("Location: " . BASEURL . "/auth/register");
            exit;
        } 
        return;
    }

    protected function checkIsLogin() {
        if (isset($_SESSION['user-information'])) {
            Flasher::setFlash("Kamu telah melakukan login sebelumnya.", "Login", "warning");
            header("Location: " . BASEURL . "/home/dashboard");
            exit;
        } else {
            $dataUser = Security::checkCookie();
            if ($dataUser != false) {
                $_SESSION['user-information'] = $dataUser;
                $this->checkIsLogin();
            }
            return;
        }
    }

    protected function checkingCredentials($fromUser, $fromDB)  {
        if ( 
            $fromUser['nama_ayah'] != $fromDB['nama_ayah'] ||
            $fromUser['ibu'] != $fromDB['nama_ibu'] ||
            $fromUser['tempat'] != $fromDB ['tempat_tinggal_masa_kecil']
        ) {
            Flasher::setFlash("Kredensial salah.", "Register", "error");
            header("Location: " . BASEURL . "/auth/lupapassword");
            exit;
        }
    }
}