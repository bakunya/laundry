<?php

class Store_model {
    protected $table = "outlet";
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahStore($data) {
        $query = "INSERT INTO outlet VALUES (:id, :nama, :alamat, :telp)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telp", $data['telp']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStore($data){
        $query = "UPDATE $this->table SET nama = :nama, alamat = :alamat, telp = :telp WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("id", $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllStore($columns) {
        $query = "SELECT $columns FROM $this->table ORDER BY nama ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function deleteStore($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchStore($param) {
        $query = "SELECT * FROM $this->table WHERE id LIKE :param1 OR alamat LIKE :param1 ORDER BY nama DESC LIMIT 20";
        $this->db->query($query);
        $this->db->bind("param1", "%".$param."%");

        return $this->db->resultSet();
    }

    public function getStore($columnName, $value, $result) {
        $query = "SELECT * FROM $this->table WHERE " . $columnName . " = :param ORDER BY nama ASC";
        $this->db->query($query);
        $this->db->bind("param", $value);
        return $this->db->$result();
    }    
    
}