<div class="container mt-4">
  <h3>Edit Data Mahasiswa</h3>

  <form action="<?= BASEURL; ?>/mahasiswa/update" method="post">
    <input type="hidden" name="id" value="<?= $data['mhs']['id']; ?>">

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['mhs']['nama']; ?>" required>
    </div>

    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['mhs']['nim']; ?>" required>
    </div>

    <div class="mb-3">
      <label for="jurusan" class="form-label">Jurusan</label>
      <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $data['mhs']['jurusan']; ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary">Batal</a>
  </form>
</div>