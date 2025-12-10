<?php

class MahasiswaModel {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // mengambil semua data mahasiswa
    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // mengambil data mahasiswa berdasarkan id
    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // menambah data mahasiswa
    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (:nama, :nim, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // menghapus data mahasiswa
    public function hapusDataMahasiswa($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // mengubah data mahasiswa
    public function updateDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET 
                    nama = :nama, 
                    nim = :nim, 
                    jurusan = :jurusan 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}