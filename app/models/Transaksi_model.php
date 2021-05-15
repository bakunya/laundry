<?php

class Transaksi_model {
    protected $table = 'transaksi';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahTransaksi($data) {
        $query =  
            "INSERT INTO $this->table 
                (
                    id, 
                    id_outlet, 
                    id_pelanggan, 
                    id_pegawai, 
                    id_paket, 
                    invoice, 
                    qty, 
                    tgl_masuk, 
                    batas_waktu, 
                    biaya_tambahan, 
                    diskon, 
                    pajak, 
                    status, 
                    dibayar, 
                    keterangan
                )
            VALUES 
                (
                    :id, 
                    :id_outlet, 
                    :id_pelanggan, 
                    :id_pegawai, 
                    :id_paket, 
                    :invoice, 
                    :qty, 
                    :tgl_masuk, 
                    :batas_waktu, 
                    :biaya_tambahan, 
                    :diskon, 
                    :pajak, 
                    :status, 
                    :dibayar, 
                    :keterangan
                )";
        $this->db->query($query);

        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("id_outlet", $_SESSION['user-information']['id_outlet']);
        $this->db->bind("id_pelanggan", $data['telephone']);
        $this->db->bind("id_pegawai", $_SESSION['user-information']['id']);
        $this->db->bind("id_paket", $data['paket']);
        $this->db->bind("invoice", $data['invoice']);
        $this->db->bind("qty", $data['qty']);
        $this->db->bind("tgl_masuk", $data['tgl_diterima']);
        $this->db->bind("batas_waktu", $data['batas_waktu']);
        $this->db->bind("biaya_tambahan", 0);
        $this->db->bind("diskon", $data['diskon']);
        $this->db->bind("pajak", 0);
        $this->db->bind("status", "masuk");
        $this->db->bind("dibayar", "belum dibayar");
        $this->db->bind("keterangan", $data['keterangan']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateTransaksi($data, $id) {
        $tgl_bayar = $data['tgl_bayar'] == "" ? NULL : $data['tgl_bayar'];
        $query = 
            "UPDATE $this->table SET 
                qty = :qty, 
                batas_waktu = :batas_waktu, 
                tgl_bayar = :tgl_bayar, 
                biaya_tambahan = :biaya_tambahan, 
                pajak = :pajak, 
                status = :status, 
                dibayar = :dibayar, 
                keterangan = :keterangan 
            WHERE 
                id = :id";
        $this->db->query($query);
        $this->db->bind("qty", $data['qty']);
        $this->db->bind("batas_waktu", $data['batas_waktu']);
        $this->db->bind("tgl_bayar", $tgl_bayar);
        $this->db->bind("biaya_tambahan", $data['biaya_tambahan']);
        $this->db->bind("pajak", $data['pajak']);
        $this->db->bind("status", $data['status']);
        $this->db->bind("dibayar", $data['dibayar']);
        $this->db->bind("keterangan", $data['keterangan']);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStatus($data) {
        $query = "UPDATE $this->table SET status = :status WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("status", $data['status']);
        $this->db->bind("id", $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllData() {
        $query = "SELECT user.nama, transaksi.id_pelanggan, transaksi.id, transaksi.dibayar FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan ORDER BY transaksi.dibayar DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getOurData() {
        $query = 
            "SELECT 
                user.nama, 
                transaksi.id_outlet, 
                transaksi.id_pelanggan,
                transaksi.id, 
                transaksi.dibayar,
                transaksi.status
            FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan WHERE transaksi.id_outlet = :outlet ORDER BY transaksi.dibayar DESC";

        $this->db->query($query);
        $this->db->bind("outlet", $_SESSION['user-information']['id_outlet']);
        return $this->db->resultSet();
    }

    public function getHutang() {
        $query = "SELECT (((paket.harga - ((transaksi.diskon / 100) * paket.harga)) * transaksi.qty) + transaksi.pajak + transaksi.biaya_tambahan) AS total, transaksi.id_outlet, transaksi.id_pelanggan, transaksi.id, transaksi.dibayar, user.nama FROM $this->table INNER JOIN user ON user.id = transaksi.id_pelanggan INNER JOIN paket ON paket.id = transaksi.id_paket WHERE transaksi.id_outlet = :outlet AND transaksi.dibayar = :bayar ORDER BY user.nama ASC";

        $this->db->query($query);
        $this->db->bind("outlet", $_SESSION['user-information']['id_outlet']);
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

    public function searchTransaksi($invoice) {
        $query = "SELECT user.nama, transaksi.id_outlet, transaksi.status, transaksi.id_pelanggan, transaksi.id, transaksi.invoice, transaksi.dibayar FROM transaksi INNER JOIN user ON user.id = transaksi.id_pelanggan WHERE transaksi.id_outlet = :outlet AND transaksi.invoice LIKE :invoice LIMIT 20";
        $this->db->query($query);
        $this->db->bind("outlet", $_SESSION['user-information']['id_outlet']);
        $this->db->bind("invoice", '%'.$invoice.'%');
        return $this->db->resultSet();
    }

    public function getTransaksi($args, $column, $value, $result) {
        $query = "SELECT $args FROM $this->table WHERE $column = :value";
        $this->db->query($query);
        $this->db->bind("value",$value);
        return $this->db->$result();
    }

    public function getDetail($id) {
        $query = "SELECT (((paket.harga - ((transaksi.diskon / 100) * paket.harga)) * transaksi.qty) + transaksi.pajak + transaksi.biaya_tambahan) AS total, paket.harga, transaksi.*, pelanggan.nama AS pelanggan, pelanggan.alamat AS pelanggan_alamat, pelanggan.telp AS pelanggan_telp, pegawai.nama AS pegawai, outlet.nama AS outlet, outlet.alamat AS outlet_alamat, outlet.telp AS outlet_telp, paket.layanan, paket.nama AS paket FROM $this->table INNER JOIN user AS pelanggan ON pelanggan.id = transaksi.id_pelanggan INNER JOIN user AS pegawai ON pegawai.id = transaksi.id_pegawai INNER JOIN paket ON paket.id = transaksi.id_paket INNER JOIN outlet ON outlet.id = transaksi.id_outlet WHERE transaksi.id = :id";

        $this->db->query($query);
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function deleteTransaksi($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}