<?php

class Pegawai_model {
    protected $table = "user";
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahPegawai($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $query = "INSERT INTO $this->table VALUES (:id, :outlet, :nama, :telp, :password, :role, :alamat)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("password", $password);
        $this->db->bind("outlet", $data['outlet']);
        $this->db->bind("role", $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePegawai($data) {
        $query = "UPDATE $this->table SET nama = :nama, telp = :telp, id_outlet = :outlet, role = :role, alamat = :alamat WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $data['id']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("outlet", $data['outlet']);
        $this->db->bind("role", $data['role']);
        $this->db->bind("alamat", $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPegawai() {
        $query = "SELECT * FROM $this->table WHERE id_outlet IS NOT NULL ORDER BY nama ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPegawai($columnName, $value, $result) {
        $query = "SELECT * FROM $this->table WHERE " . $columnName . " = :param ORDER BY nama ASC";
        $this->db->query($query);
        $this->db->bind("param", $value);
        return $this->db->$result();
    }

    public function deletePegawai($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchPegawai($param) {
        $query = "SELECT * FROM $this->table WHERE id LIKE :param1 OR nama LIKE :param2 AND role != 'pelanggan' ORDER BY nama DESC LIMIT 20";
        $this->db->query($query);
        $this->db->bind("param1", "%".$param."%");
        $this->db->bind("param2", "%".$param."%");

        return $this->db->resultSet();
    }
}