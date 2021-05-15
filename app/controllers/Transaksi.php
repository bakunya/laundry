<?php

class Transaksi extends Controller {
    public function ourtransaction() {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['link'] = "<a class='tambah filter' href='". BASEURL ."/transaksi/alltransaction'>Tampilkan Semua Data</a>";
        $data['hutang'] = '<a class="tambah filter" href="'.BASEURL.'/transaksi/hutang">Pelanggan Belum Lunas</a>';
        $data['title'] = "Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal", "transaksi");
        $data['js'] = array("navbar", "manage", "modal", "transaksi");
        $data['transaksi'] = $this->model("Transaksi_model")->getOurData();
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/index", $data);
        $this->view("templates/footer", $data);
    }

    public function alltransaction() {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['link'] = "<a class='tambah filter' href='". BASEURL ."/transaksi/ourtransaction'>Tampilkan Data Kita</a>";
        $data['hutang'] = '<a class="tambah filter" href="'.BASEURL.'/transaksi/hutang">Pelanggan Belum Lunas</a>';
        $data['title'] = "Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal", "transaksi");
        $data['js'] = array("navbar", "manage", "modal", "transaksi");
        $data['transaksi'] = $this->model("Transaksi_model")->getAllData();
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/index", $data);
        $this->view("templates/footer", $data);
    }

    public function hutang() {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['link'] = "<a class='tambah filter' href='". BASEURL ."/transaksi/ourtransaction'>Tampilkan Semua Data</a>";
        $data['title'] = "Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal", "transaksi");
        $data['js'] = array("navbar", "manage", "modal", "transaksi");
        $data['transaksi'] = $this->model("Transaksi_model")->getHutang();
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/hutang", $data);
        $this->view("templates/footer", $data);
    }

    public function searchtransaksi($invoice = '0') {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['link'] = "<a class='tambah filter' href='". BASEURL ."/transaksi/ourtransaction'>Tampilkan Data Kita</a>";
        $data['hutang'] = '<a class="tambah filter" href="'.BASEURL.'/transaksi/hutang">Pelanggan Belum Lunas</a>';
        $data['title'] = "Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "modal", "transaksi");
        $data['js'] = array("navbar", "manage", "modal", "transaksi");
        $data['transaksi'] = $this->model("Transaksi_model")->searchTransaksi($invoice);
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/index", $data);
        $this->view("templates/footer", $data);
    }

    public function tambah() {      
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['paket'] = $this->model("Paket_model")->getPaket("nama, id", "id_outlet", $_SESSION['user-information']['id_outlet'], "resultSet");
        $data['telp'] = $this->model("Pelanggan_model")->getAllPelanggan("telp");
        $data['title'] = "Tambah Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "transaksi");
        $data['js'] = array("navbar", "transaksi");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/tambah", $data);
        $this->view("templates/footer", $data);
    }

    public function update($id = '0') {        
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data['id'] = $id;
        $data['update'] = $this->model("Transaksi_model")->getTransaksi("qty, batas_waktu, tgl_bayar, biaya_tambahan, pajak, status, dibayar, keterangan", "id", $id, "result");
        $data['title'] = "Edit Transaksi";
        $data['css'] = array("form-loginregister", "navbar", "manage", "transaksi");
        $data['js'] = array("navbar");
        $this->view("templates/header", $data);
        $this->view("templates/" . $_SESSION['user-information']['role'] . "-nav", $data);
        $this->view("transaksi/update", $data);
        $this->view("templates/footer", $data);
    }

    public function getstatus($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        $data = $this->model("Transaksi_model")->getTransaksi("status", "id", $id, "result");
        echo json_encode($data);
    }

    public function tambahtransaksi() {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        if (isset($_POST)) {
            if ($this->model("Transaksi_model")->tambahTransaksi($_POST) > 0) {
                Flasher::setFlash("Berhasil menambah transaksi.", "Transaksi", "success");
            } else {
                Flasher::setFlash("Gagal menambah transaksi, silahkan coba lagi.", "Transaksi", "error");
            };
            header("Location: " . BASEURL . "/transaksi/ourtransaction");
            exit;
        }
    }

    public function updatetransaksi($id = '0') {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        if (isset($_POST['submit'])) {
            if ($this->model("Transaksi_model")->updateTransaksi($_POST, $id) > 0) {
                Flasher::setFlash("Berhasil mengupdate transaksi.", "Transaksi", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate transaksi, silahkan coba lagi.", "Transaksi", "error");
            };
            header("Location: " . BASEURL . "/transaksi/ourtransaction");
            exit;
        }
    }

    public function updatestatus() {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        if (isset($_POST['submit'])) {
            if ($this->model("Transaksi_model")->updateStatus($_POST) > 0) {
                Flasher::setFlash("Berhasil mengupdate transaksi.", "Transaksi", "success");
            } else {
                Flasher::setFlash("Gagal mengupdate transaksi, silahkan coba lagi.", "Transaksi", "error");
            };
            header("Location: " . BASEURL . "/transaksi/ourtransaction");
            exit;
        }
    }

    public function delete($id) {
        Security::isLogin();
        Security::checkRole(array("admin", "kasir"));
        if ($this->model("Transaksi_model")->deleteTransaksi($id) > 0) {
            Flasher::setFlash("Berhasil menghapus transaksi.", "Transaksi", "success");
        } else {
            Flasher::setFlash("Gagal menghapus transaksi, silahkan coba lagi.", "Transaksi", "error");
        };
        header("Location: " . BASEURL . "/transaksi/ourtransaction");
        exit;
    }
}