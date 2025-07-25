<?php
//memanggil koneksi
include_once("../koneksi/koneksi.php");

//menangkap ID yang dikirimkan dari index.php
$id_produk = $_GET["id_produk"];

//querry untuk hapus data
$result = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk" );

//mengambalikan ke halaman index.php
echo "<script>
                if (confirm('Data berhasil dihapus ke database! Klik OK untuk nmelihat data.')) {
                window.location.href = 'produk.php'; 
    }
                </script>";
?>
