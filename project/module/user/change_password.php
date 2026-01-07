<?php
global $db;

$message = "";

if ($_POST) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    $username = $_SESSION['username'];

    $user = $db->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc();

    if (!password_verify($old, $user['password'])) {
        $message = "Password lama salah!";
    } elseif ($new !== $confirm) {
        $message = "Konfirmasi password tidak cocok!";
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $db->query("UPDATE users SET password='$hash' WHERE username='$username'");
        $message = "Password berhasil diubah!";
    }
}
?>

<div class="container">
    <h2>Ganti Password</h2>

    <?php if ($message): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="password" name="old_password" placeholder="Password Lama" required><br><br>
        <input type="password" name="new_password" placeholder="Password Baru" required><br><br>
        <input type="password" name="confirm_password" placeholder="Ulangi Password Baru" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</div>
