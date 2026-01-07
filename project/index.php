<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once "class/database.php";

// koneksi global
$db = new Database();

// routing
$page = $_GET['page'] ?? 'home';

// halaman publik
$public_pages = ['login', 'home'];

if (!in_array($page, $public_pages)) {
    if (!isset($_SESSION['is_login'])) {
        header('Location: index.php?page=login');
        exit;
    }
}

/* ======================
   HEADER SEKALI SAJA
====================== */
if ($page !== 'login') {
    include "template/header.php";
}

/* ======================
   ROUTING ISI KONTEN
====================== */
switch ($page) {

    case 'login':
        include "module/user/login.php";
        break;

    case 'logout':
        include "module/user/logout.php";
        break;

    case 'artikel':
        include "module/artikel/list.php";
        break;

    case 'profile':
        include "module/user/profile.php";
        break;

    case 'change-password':
        include "module/user/change_password.php";
        break;

    default:
        include "template/dashboard.php";
        break;
}

/* ======================
   FOOTER SEKALI SAJA
====================== */
if ($page !== 'login') {
    include "template/footer.php";
}
