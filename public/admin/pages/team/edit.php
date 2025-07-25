<?php
include_once("../navbar.php");
 // memanggil koneksi database
    
    include_once("../koneksi/koneksi.php");

 
if(isset($_POST['submit'])) {
   $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    
   
    
    // Membuat query untuk insert data
    move_uploaded_file($file_tmp, 'foto/'.$foto);

   $result = mysqli_query($conn, "UPDATE user SET 
    nama_user='$nama_user',
    jenis_kelamin='$jenis_kelamin',
    no_hp='$no_hp',
    alamat='$alamat',
    jabatan='$jabatan',
    tgl_lahir='$tgl_lahir',
    username='$username',
    password='$password',
    foto='$foto'
    WHERE id_user='$id_user'");

    
   $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
$row = mysqli_fetch_assoc($result);
$foto_lama = $row['foto'];
if (!empty($foto_baru)) {
    move_uploaded_file($tmp, 'foto/' . $foto_baru);
    $foto = $foto_baru;
} else {
    $foto = $foto_lama;
}
    // keterangan jika data berhasil ditambahkan
    
    echo "<script>
                if (confirm('Data berhasil diinputkan ke database! Klik OK untuk nmelihat data.')) {
                window.location.href = 'team.php'; 
    }
                </script>";
}
    ?>

 <?php
//menangkap ID yang dikirimkan dari index.php
$id_user= $_GET["id_user"];

// mengambil data yang ada didalam tabel user
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
while($user_data = mysqli_fetch_array($result)) { 
  $nama_user = $user_data['nama_user'];
  $jenis_kelamin = $user_data['jenis_kelamin'];
  $no_hp = $user_data['no_hp'];
  $alamat = $user_data['alamat'];
  $jabatan = $user_data['jabatan'];
  $tgl_lahir = $user_data['tgl_lahir'];
  $username = $user_data['username'];
  $password = $user_data['password'];
  $foto = $user_data['foto'];
  }


?>
 <!DOCTYPE html>

 <!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
 <!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>About layout</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include_once("../logo_web/logo.php"); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include_once ("../aside/aside.php")
  ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include_once("../navbar.php"); ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">User Tabel</h5>
                      
                    </div>

                    

                    <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                      <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                    <label class="form-label" for="nama_user">NAMA</label>
                    <input type="text" id="nama_user" name="nama_user" class="form-control" value="<?php echo $nama_user?>">
                  </div>
                        <div class="form-group">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control custom-select">
                      <option value="<?php echo $jenis_kelamin ?>" <?php echo $jenis_kelamin?></option>
                      
                      <option value="LAKI-LAKI">Laki-Laki</option>
                      <option value="PEREMPUAN">Perempuan</option>
                    </select>
                  </div>
                        <div class="mb-3">
                          <label class="form-label" for="no_hp">NO HP</label>
                          <input type="number" class="form-control" id="no_hp" name="no_hp"  value="<?php echo $no_hp?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat"  value="<?php echo $alamat?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="jabatan">Jabatan</label>
                          <input type="text" class="form-control" id="jabatan" name="jabatan"  value="<?php echo $jabatan?>"/>
                        </div>
                        <div class="form-group">
                      <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir?>">
                      </div>
                      <div class="form-group">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" name="username" class="form-control" value="<?php echo $username?>">
                      </div>
                      <div class="form-group">
                      <label class="form-label" for="password">Password</label>
                      <input type="text" id="password" name="password" class="form-control" value="<?php echo $password?>">
                      </div>
                        <div class="form-group"><br>
                        <label class="form-label" for="foto">Foto </label><br>
                        <img src="foto/<?php echo $foto ?>" alt="Foto User" width="150" height="150"><br><br>
                        <input type="file" id="foto" name="foto" class="form-control">
                        </div>
                          </div>
                        <input type="submit" name="submit" class="btn btn-success">
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <!-- <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer> -->
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>