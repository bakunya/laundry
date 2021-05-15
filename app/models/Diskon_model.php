<?php

class Diskon_model {
    protected $table = "diskon";
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahDiskon($data) {
        $semua = isset($_POST['semua']) ? filter_var($_POST['semua'], FILTER_VALIDATE_BOOLEAN) : false;
        if ($semua == true) {
            $this->updateSemuaBerlangsung();
        }
        $query = "INSERT INTO $this->table VALUES (:id, :nama, :diskon, :semua, :berlangsung, :date_end)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("diskon", $data['diskon']);
        $this->db->bind("semua", $semua);
        $this->db->bind("berlangsung", 1);
        $this->db->bind("date_end", $data['tgl_berakhir']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDiskon($data) {
        $berakhir = isset($_POST['berakhir']) ? filter_var($_POST['berakhir'], FILTER_VALIDATE_BOOLEAN) : false;
        $query = "UPDATE $this->table SET nama = :nama, diskon = :diskon, berlangsung = :berakhir, date_end = :date_end WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $data['id']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("diskon", $data['diskon']);
        $this->db->bind("berakhir", $berakhir);
        $this->db->bind("date_end", $data['tgl_berakhir']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllDiskon() {
        $query = "SELECT * FROM $this->table ORDER BY berlangsung DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDiskon($columnName, $value, $result) {
        $query = "SELECT * FROM $this->table WHERE " . $columnName . " = :param ORDER BY date_end ASC";
        $this->db->query($query);
        $this->db->bind("param", $value);
        return $this->db->$result();
    }

    public function searchDiskon($param) {
        $query = "SELECT * FROM $this->table WHERE id LIKE :param1 OR nama LIKE :param2 ORDER BY date_end DESC LIMIT 20";
        $this->db->query($query);
        $this->db->bind("param1", "%".$param."%");
        $this->db->bind("param2", "%".$param."%");
        return $this->db->resultSet();
    }

    public function deleteDiskon($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDiskonAllService() {
        $query = "SELECT diskon, date_end FROM $this->table WHERE semua_layanan = true AND berlangsung = true";
        $this->db->query($query);
        return $this->db->result();
    }

    protected function updateSemuaBerlangsung() {
        $query = "UPDATE $this->table SET berlangsung = 0";
        $this->db->query($query);
        $this->db->execute();
    }
}