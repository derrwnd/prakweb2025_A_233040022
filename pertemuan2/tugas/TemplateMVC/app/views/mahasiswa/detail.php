<div class="container mt-4">
  <h3>Detail Mahasiswa</h3>
  <ul class="list-group">
    <li class="list-group-item"><b>Nama:</b> <?= $data['mhs']['nama']; ?></li>
    <li class="list-group-item"><b>NIM:</b> <?= $data['mhs']['nim']; ?></li>
    <li class="list-group-item"><b>Jurusan:</b> <?= $data['mhs']['jurusan']; ?></li>
  </ul>
  <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary mt-3">Kembali</a>
</div>