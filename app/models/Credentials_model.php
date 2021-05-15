<?php

class Credentials_model {
    private $table = "lupa_password";
    private $db;

    public function __construct () {
        $this->db = new Database;
    }

    public function updateCredentials($data) {
        $query = "UPDATE $this->table SET nama_ayah = :ayah, nama_ibu = :ibu, tempat_tinggal_masa_kecil = :tempat WHERE telp = :telp";
        $this->db->query($query);
        $this->db->bind("ayah", $data['nama_ayah']);
        $this->db->bind("ibu", $data['ibu']);
        $this->db->bind("tempat", $data['tempat']);
        $this->db->bind("telp", $_SESSION['user-information']['telp']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addCredentials($data) {
        $query = "INSERT INTO $this->table VALUES (:id, :telp, :ayah, :ibu, :tempat)";
        $this->db->query($query);
        $this->db->bind("id", uniqid(null, true));
        $this->db->bind("telp", $_SESSION['user-information']['telp']);
        $this->db->bind("ayah", $data['nama_ayah']);
        $this->db->bind("ibu", $data['ibu']);
        $this->db->bind("tempat", $data['tempat']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getCredentialsByPhone() {
        $query = "SELECT nama_ayah, nama_ibu, tempat_tinggal_masa_kecil FROM $this->table WHERE telp = :telp";
        $this->db->query($query);
        $this->db->bind("telp", $_SESSION['user-information']['telp']);
        return $this->db->result();
    }
}