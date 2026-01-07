<?php
require __DIR__ . '/../../config/database.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id'");
$barang = mysqli_fetch_assoc($data);
?>

<h2>Edit Barang</h2>

<form method="post">
    Kategori: <input type="text" name="kategori" value="<?= $barang['kategori'] ?>"><br><br>
    Nama: <input type="text" name="nama" value="<?= $barang['nama'] ?>"><br><br>
    Gambar: <input type="text" name="gambar" value="<?= $barang['gambar'] ?>"><br><br>
    Harga Beli: <input type="number" name="harga_beli" value="<?= $barang['harga_beli'] ?>"><br><br>
    Harga Jual: <input type="number" name="harga_jual" value="<?= $barang['harga_jual'] ?>"><br><br>
    Stok: <input type="number" name="stok" value="<?= $barang['stok'] ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {

    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "UPDATE data_barang SET 
        kategori='$kategori',
        nama='$nama',
        gambar='$gambar',
        harga_beli='$harga_beli',
        harga_jual='$harga_jual',
        stok='$stok'
        WHERE id_barang='$id'
    ");

    echo "<script>
            alert('Data berhasil diupdate!');
            window.location='index.php?page=user/list';
          </script>";
}
?>
