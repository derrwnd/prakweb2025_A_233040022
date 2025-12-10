<div class="container mt-4">
  <h3>Tambah Data Mahasiswa</h3>

  <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" required>
    </div>

    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" class="form-control" id="nim" name="nim" required>
    </div>

    <div class="mb-3">
      <label for="jurusan" class="form-label">Jurusan</label>
      <input type="text" class="form-control" id="jurusan" name="jurusan" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary">Batal</a>
  </form>
</div>