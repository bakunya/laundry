<?php

class Cucian_model {
    protected $table = 'transaksi';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCucian() {
        $column = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? "transaksi.id_pelanggan" 
                    : "transaksi.id_outlet";
        $value = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? $_SESSION['user-information']['id'] 
                    : $_SESSION['user-information']['id_outlet'];
        $query = "SELECT user.nama, paket.layanan, transaksi.id_pelanggan, transaksi.id, transaksi.status, transaksi.tgl_masuk, transaksi.dibayar FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan INNER JOIN paket ON paket.id = transaksi.id_paket WHERE $column = :value ORDER BY transaksi.dibayar DESC";

        $this->db->query($query);
        $this->db->bind("value", $value);
        return $this->db->resultSet();
    }

    public function searchCucian($invoice) {
        $column = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? "transaksi.id_pelanggan" 
                    : "transaksi.id_outlet";
        $value = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? $_SESSION['user-information']['id'] 
                    : $_SESSION['user-information']['id_outlet'];

        $query = "SELECT user.nama, paket.layanan, transaksi.id_pelanggan, transaksi.id, transaksi.status, transaksi.tgl_masuk, transaksi.dibayar FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan INNER JOIN paket ON paket.id = transaksi.id_paket WHERE $column = :value AND transaksi.invoice LIKE :invoice LIMIT 20";
        $this->db->query($query);
        $this->db->bind("value", $value);
        $this->db->bind("invoice", '%'.$invoice.'%');
        return $this->db->resultSet();
    }

    public function getHutang() {
        $column = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? "transaksi.id_pelanggan" 
                    : "transaksi.id_outlet";
        $value = $_SESSION['user-information']['role'] == "pelanggan" 
                    ? $_SESSION['user-information']['id'] 
                    : $_SESSION['user-information']['id_outlet'];

        $query = "SELECT (((paket.harga - ((transaksi.diskon / 100) * paket.harga)) * transaksi.qty) + transaksi.pajak + transaksi.biaya_tambahan) AS total,  user.nama, paket.layanan, transaksi.id_pelanggan, transaksi.id, transaksi.status, transaksi.tgl_masuk, transaksi.dibayar FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan INNER JOIN paket ON paket.id = transaksi.id_paket WHERE $column = :value AND transaksi.dibayar = :bayar ORDER BY user.nama ASC";

        $this->db->query($query);
        $this->db->bind("value", $value);
        $this->db->bind("bayar", "belum dibayar");
        $data = $this->db->resultSet();
        $total = 0;
        for ($i=0; $i < count($data); $i++) { 
            $total += $data[$i]['total'];
        }
        return [
            "total" => $total,
            "data" => $data
        ];
    }

    public function getCucianByPelanggan($userid) {
        $query = "SELECT user.id, user.nama, user.telp, user.alamat, paket.layanan, transaksi.id AS transaksi_id, transaksi.qty, transaksi.invoice, transaksi.status, transaksi.tgl_masuk, transaksi.dibayar FROM user LEFT JOIN transaksi ON transaksi.id_pelanggan = user.id LEFT JOIN paket ON paket.id = transaksi.id_paket WHERE user.id = :userId ORDER BY transaksi.dibayar DESC";
        $this->db->query($query);
        $this->db->bind("userId", $userid);
        return $this->db->resultSet();
    }
}