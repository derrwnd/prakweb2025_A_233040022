<?php

class Mahasiswa extends Controller {

    // menampilkan daftar semua mahasiswa
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    // menampilkan detail mahasiswa berdasarkan id
    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // menampilkan form tambah data
    public function formTambah() {
        $data['judul'] = 'Tambah Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/tambah');
        $this->view('templates/footer');
    }

    // proses tambah data mahasiswa
    public function tambah() {
        if ($this->model('MahasiswaModel')->tambahDataMahasiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // menampilkan form edit data
    public function ubah($id) {
        $data['judul'] = 'Edit Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/edit', $data);
        $this->view('templates/footer');
    }

    // proses ubah data
    public function update() {
        if ($this->model('MahasiswaModel')->updateDataMahasiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // proses hapus data
    public function hapus($id) {
        if ($this->model('MahasiswaModel')->hapusDataMahasiswa($id) > 0) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}