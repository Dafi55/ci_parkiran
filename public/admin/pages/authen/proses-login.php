<?php
session_start();
include '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_admin'] = $data['id_user'];  // ID user disimpan (fixed to match user table)
        $_SESSION['nama_user'] = $data['nama_user']; // Store user name in session
        $_SESSION['jabatan'] = $data['jabatan']; // Store user position in session
        $_SESSION['foto'] = $data['foto']; // Store user photo in session
        header("Location: ../dashboard/dashboard.php");
        exit();
    } else {
        header("Location: auth-login-basic.php?error=wrongpassword");
        exit();
    }
} else {
    header("Location: auth-login-basic.php");
    exit();
}

?>
