<?php
session_start();
include '../koneksi/koneksi.php';

$id = $_SESSION['id_admin'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

mysqli_query($conn, "UPDATE admin SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$id'");
header("Location: pages-account-settings-account.php?pesan=update_berhasil");
?>
