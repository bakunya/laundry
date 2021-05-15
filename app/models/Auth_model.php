<?php

class Auth_model {
    private $table = "user";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function signup($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT, ["cost" => 12]);
        $query = "INSERT INTO $this->table (id, nama, telp, password, role, alamat) VALUES (:id, :nama, :telp, :password, :role, :alamat)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("nama", $data['name']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("password", $password);
        $this->db->bind("role", "pelanggan");
        $this->db->bind("alamat", $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserByTelephone($telp) {
        $query = "SELECT * FROM $this->table WHERE telp = :telp";
        $this->db->query($query);
        $this->db->bind("telp", $telp);
        
        return $this->db->result();
    }

    public function update($data) {
        $query = "UPDATE $this->table SET nama = :nama, telp = :telp, alamat = :alamat WHERE telp = :oldTelp";
        $this->db->query($query);
        $this->db->bind("nama", $data['name']);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("oldTelp", $_SESSION['user-information']['telp']);
        $this->db->bind("alamat", $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getCredentialsLupaPassword($data) {
        $table = 'lupa_password';
        $query = "SELECT * FROM `$table` WHERE telp = :telp";
        $this->db->query($query);
        $this->db->bind("telp", $data['telephone']);
        return $this->db->result();
    }

    public function updatePassword($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT, ["cost" => 12]);
        $query = "UPDATE $this->table SET password = :password WHERE telp = :telp";
        $this->db->query($query);
        $this->db->bind("telp", $data['telephone']);
        $this->db->bind("password", $password);

        $this->db->execute();

        return $this->db->rowCount();
    }
}