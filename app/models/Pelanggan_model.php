<?php

class Pelanggan_model {
    protected $table = "user";
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahPelanggan($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $query = "INSERT INTO $this->table VALUES (:id, :outlet, :nama, :telp,  :password, :role, :alamat)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("password", $password);
        $this->db->bind("outlet", NULL);
        $this->db->bind("role", 'pelanggan');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePelanggan($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $query = "UPDATE $this->table SET nama = :nama, alamat = :alamat WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $data['id']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("alamat", $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPelanggan($columns) {
        $query = "SELECT * FROM $this->table WHERE role = :pelanggan ORDER BY nama ASC";
        $this->db->query($query);
        $this->db->bind("pelanggan", "pelanggan");
        return $this->db->resultSet();
    }

    public function getPelanggan($columnName, $value, $result) {
        $query = "SELECT * FROM $this->table WHERE " . $columnName . " = :param AND role = :pelanggan ORDER BY nama ASC";
        $this->db->query($query);
        $this->db->bind("param", $value);
        $this->db->bind("pelanggan", "pelanggan");
        return $this->db->$result();
    }

    public function deletePelanggan($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchPelanggan($param) {
        $query = "SELECT * FROM $this->table WHERE telp LIKE :param1 OR nama LIKE :param2 AND role = :pelanggan ORDER BY nama DESC LIMIT 20";
        $this->db->query($query);
        $this->db->bind("param1", "%".$param."%");
        $this->db->bind("param2", "%".$param."%");
        $this->db->bind("pelanggan", "pelanggan");

        return $this->db->resultSet();
    }
}