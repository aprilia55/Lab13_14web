<?php
global $db;

// ambil total barang
$result = $db->query("SELECT * FROM data_barang");
$total_barang = $result->num_rows;
?>

<div class="dashboard-box">
    <h1>Selamat Datang di Dashboard</h1>
    <p>
        Ini adalah halaman utama untuk mengelola data barang pada aplikasi
        <b>Toko Online</b> berbasis <b>PHP OOP</b>.
        Gunakan menu di samping untuk mengelola data.
    </p>
</div>

<div class="dashboard-cards">

    <div class="card card-blue">
        <h3>Total Barang</h3>
        <div class="card-value"><?= $total_barang ?></div>
        <span>Jumlah data barang</span>
    </div>

    <div class="card card-green">
        <h3>Status Login</h3>
        <div class="card-value">
            <?= isset($_SESSION['is_login']) ? 'Aktif' : 'Tidak Aktif'; ?>
        </div>
        <span>Session pengguna</span>
    </div>

</div>
