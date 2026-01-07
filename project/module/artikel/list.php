<?php
// proteksi login
if (!isset($_SESSION['is_login'])) {
    header('Location: index.php?page=login');
    exit;
}

global $db;

/* =========================
   SEARCH
========================= */
$q = "";
$where = "";

if (isset($_GET['q']) && $_GET['q'] !== "") {
    // aman untuk project praktikum
    $q = htmlspecialchars($_GET['q']);
    $where = " WHERE nama LIKE '%$q%'";
}

/* =========================
   PAGINATION
========================= */
$limit = 5;
$page = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$page = ($page < 1) ? 1 : $page;
$offset = ($page - 1) * $limit;

/* =========================
   QUERY DATA
========================= */
$sql = "SELECT * FROM data_barang $where LIMIT $limit OFFSET $offset";
$result = $db->query($sql);

/* =========================
   TOTAL DATA
========================= */
$count_sql = "SELECT COUNT(*) as total FROM data_barang $where";
$count_result = $db->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_page = ceil($count_row['total'] / $limit);
?>

<!-- TOOLBAR -->
<div class="toolbar">
    <h2>Data Barang</h2>

    <div style="display:flex; gap:10px; align-items:center;">
        <form method="get" class="search-form">
            <input type="hidden" name="page" value="artikel">
            <input type="text" name="q" placeholder="Cari barang..." value="<?= $q ?>">
            <button type="submit" class="btn">Cari</button>
        </form>

        <a href="index.php?page=artikel_add" class="btn">+ Tambah</a>
    </div>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Nama Barang</th>
        <th>Gambar</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = $offset + 1;
    if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['kategori'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td>
            <?php if (!empty($row['gambar'])): ?>
                <img src="uploads/<?= $row['gambar'] ?>" width="60">
            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
        <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
        <td><?= $row['stok'] ?></td>
        <td>
            <a href="index.php?page=artikel_edit&id=<?= $row['id_barang'] ?>" class="btn">Edit</a>
            <a href="index.php?page=artikel_delete&id=<?= $row['id_barang'] ?>"
               class="btn btn-danger"
               onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; else: ?>
    <tr>
        <td colspan="8" style="text-align:center;">Data tidak ditemukan</td>
    </tr>
    <?php endif; ?>
</table>

<!-- PAGINATION -->
<div style="margin-top:25px; display:flex; gap:8px; flex-wrap:wrap;">
    <?php if ($page > 1): ?>
        <a class="btn" href="index.php?page=artikel&hal=<?= $page-1 ?>&q=<?= $q ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_page; $i++): ?>
        <a class="btn <?= ($i == $page) ? 'btn-primary' : '' ?>"
           href="index.php?page=artikel&hal=<?= $i ?>&q=<?= $q ?>">
           <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $total_page): ?>
        <a class="btn" href="index.php?page=artikel&hal=<?= $page+1 ?>&q=<?= $q ?>">Next</a>
    <?php endif; ?>
</div>
