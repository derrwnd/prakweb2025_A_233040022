<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= BASEURL; ?>">
            PrakWebII
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($data['judul'] == 'Home') ? 'active' : '' ?>" href="<?= BASEURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($data['judul'] == 'Mahasiswa') ? 'active' : '' ?>" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

