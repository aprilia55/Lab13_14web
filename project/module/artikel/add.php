<h2>Tambah Barang</h2>

<form method="post" enctype="multipart/form-data">
    Kategori: <input type="text" name="kategori"><br><br>
    Nama: <input type="text" name="nama"><br><br>
    Gambar: <input type="file" name="gambar"><br><br>
    Harga Beli: <input type="number" name="harga_beli"><br><br>
    Harga Jual: <input type="number" name="harga_jual"><br><br>
    Stok: <input type="number" name="stok"><br><br>

    <button type="submit" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
    require __DIR__ . '/../../config/database.php';

    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];

    // Ambil file
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // Pindahkan file ke folder uploads
    move_uploaded_file($tmp, "uploads/" . $gambar);

    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "INSERT INTO data_barang
        (kategori, nama, gambar, harga_beli, harga_jual, stok)
        VALUES ('$kategori', '$nama', '$gambar', '$harga_beli', '$harga_jual', '$stok')");

    echo "<script>
            alert('Barang berhasil ditambahkan!');
            window.location='index.php?page=user/list';
          </script>";
}
?>
