<?php

class Paket_model {
    protected $table = "paket";
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahPaket($data) {
        $query = $data['id_diskon'] == "" 
            ? "INSERT INTO $this->table (id, id_outlet, layanan, nama, service, harga) VALUES (:id, :id_outlet, :layanan, :nama, :service, :harga)"
            : "INSERT INTO $this->table (id, id_outlet, id_diskon, layanan, nama, service, harga) VALUES (:id, :id_outlet, :id_diskon, :layanan, :nama, :service, :harga)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("id_outlet", $_SESSION['user-information']['id_outlet']);
        if ($data['id_diskon'] != '') {
            $this->db->bind("id_diskon", $data['id_diskon']);
        }
        $this->db->bind("layanan", $data['jenis']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("service", $data['service']);
        $this->db->bind("harga", $data['pay']);
        echo $query;
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePaket($data) {
        $query = $data['id_diskon'] == "" 
                ?  "UPDATE $this->table SET id_outlet = :id_outlet, id_diskon = NULL, layanan = :layanan, nama = :nama, service = :service, harga = :harga WHERE id = :id"
                : "UPDATE $this->table SET id_outlet = :id_outlet, id_diskon = :id_diskon, layanan = :layanan, nama = :nama, service = :service, harga = :harga WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $data['id']);
        $this->db->bind("id_outlet", $_SESSION['user-information']['id_outlet']);
        if ($data['id_diskon'] != "" ) {
            $this->db->bind("id_diskon", $data['id_diskon']);
        }
        $this->db->bind("layanan", $data['jenis']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("service", $data['service']);
        $this->db->bind("harga", $data['pay']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPaket($columns, $column, $value, $result) {
        $query = "SELECT $columns FROM $this->table WHERE $column = :value";
        $this->db->query($query);
        $this->db->bind("value", $value);
        return $this->db->$result();
    }

    public function getPaketDiskon($column, $value, $result) {
        $query = 
            "SELECT 
                paket.id, paket.nama, paket.harga, paket.final_harga, paket.layanan, paket.service, diskon.id AS diskon_id, diskon.diskon, diskon.date_end
            FROM $this->table 
            INNER JOIN diskon 
            ON diskon.id = paket.id_diskon
            WHERE $column = :value";

        $this->db->query($query);
        $this->db->bind("value", $value);
        return $this->db->$result();
    }

    public function getAllPaket($columns) {
        $query = "SELECT $columns FROM $this->table";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllPaketDiskon() {
        $query = "SELECT `$this->table`.*, diskon.diskon FROM $this->table LEFT JOIN diskon ON diskon.id = `$this->table`.id_diskon ORDER BY diskon DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllPaketDiskonAndOutlet($outletId) {
        $query = "SELECT `$this->table`.*, diskon.diskon FROM $this->table LEFT JOIN diskon ON diskon.id = `$this->table`.id_diskon WHERE `$this->table`.id_outlet = :id ORDER BY diskon DESC";
        $this->db->query($query);
        $this->db->bind("id", $outletId);
        return $this->db->resultSet();
    }

    public function searchPaket($columns, $param) {
        $query = "SELECT $columns FROM $this->table WHERE id LIKE :param OR nama LIKE :param ORDER BY nama DESC LIMIT 20";
        $this->db->query($query);
        $this->db->bind("param", '%'.$param.'%');
        return $this->db->resultSet();
    }

    public function deletePaket($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getOnlyPaketDiskon() {
        $query = "SELECT `$this->table`.id_diskon, `$this->table`.id_outlet, `$this->table`.layanan, `$this->table`.harga, `$this->table`.final_harga, diskon.date_end FROM $this->table INNER JOIN diskon ON diskon.id = `$this->table`.id_diskon";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}