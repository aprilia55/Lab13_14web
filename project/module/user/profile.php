<?php
global $db;

$username = $_SESSION['username'];

$data = $db->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc();
?>

<div class="container">
    <h2>Profil User</h2>

    <table>
        <tr>
            <th>Username</th>
            <td><?= $data['username'] ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $data['nama'] ?></td>
        </tr>
    </table>

    <br>
    <a href="index.php?page=change-password" class="btn">Ganti Password</a>
</div>
