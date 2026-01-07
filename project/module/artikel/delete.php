<?php
require __DIR__ . '/../../config/database.php';

$id = $_GET['id'];

// Ambil data untuk hapus gambar juga
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id'"));

// Hapus file gambar dari folder uploads
if (!empty($data['gambar']) && file_exists(__DIR__ . '/../../uploads/' . $data['gambar'])) {
    unlink(__DIR__ . '/../../uploads/' . $data['gambar']);
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang='$id'");

echo "<script>
        alert('Barang berhasil dihapus!');
        window.location='index.php?page=user/list';
      </script>";
