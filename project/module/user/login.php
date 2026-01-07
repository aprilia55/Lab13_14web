<?php
// session & database sudah dari index.php

if (isset($_SESSION['is_login'])) {
    header('Location: index.php?page=dashboard');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = $db->query($sql);

    if ($result && $data = $result->fetch_assoc()) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];

            header('Location: index.php?page=dashboard');
            exit;
        }
    }

    $message = "Username atau password salah!";
}
?>

<div class="login-box">
    <h2>Login</h2>

    <?php if ($message): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
