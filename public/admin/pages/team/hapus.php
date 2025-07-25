<?php
//memanggil koneksi
include_once("../koneksi/koneksi.php");

//menangkap ID yang dikirimkan dari index.php
$id_user = $_GET["id_user"];

//querry untuk hapus data
$result = mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user" );

//mengambalikan ke halaman index.php
echo "<script>
                if (confirm('Data berhasil dihapus ke database! Klik OK untuk nmelihat data.')) {
                window.location.href = 'team.php'; 
    }
                </script>";
?>
