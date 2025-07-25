<?php

include_once("../koneksi/koneksi.php");

// Ambil data dari database terlebih dahulu (agar tidak error saat halaman pertama kali diakses)
$result = mysqli_query($conn, "SELECT * FROM home WHERE id_home = '1'");
$user_data = mysqli_fetch_array($result);
$judul1 = $user_data['judul1'];
$judul2 = $user_data['judul2'];
$judul3 = $user_data['judul3'];
$judul4 = $user_data['judul4'];
$deskripsi = $user_data['deskripsi'];
$foto1   = $user_data['foto1'];
$foto2  = $user_data['foto2'];



// Jika form disubmit
if (isset($_POST['submit'])) {
    $judul1 = $_POST['judul1'];
    $judul2 = $_POST['judul2'];
    $judul3 = $_POST['judul3'];
    $judul4 = $_POST['judul4'];
    $deskripsi = $_POST['deskripsi'];
    $foto1_upload = $_FILES['foto1']['name'];
    $foto1_tmp = $_FILES['foto1']['tmp_name'];

    $foto2_upload = $_FILES['foto2']['name'];
    $foto2_tmp = $_FILES['foto2']['tmp_name'];

    $foto1_query = '';
    $foto2_query = '';

if ($foto1_upload != "") {
    move_uploaded_file($foto1_tmp, 'foto1/' . $foto1_upload);
    $foto1_query = ", foto1 = '$foto1_upload'";
} else {
    $foto1_upload = $foto1; // nama lama dari database
}

if ($foto2_upload != "") {
    move_uploaded_file($foto2_tmp, 'foto2/' . $foto2_upload);
    $foto2_query = ", foto2 = '$foto2_upload'";
} else {
    $foto2_upload = $foto2;
}

$foto_query = $foto1_query . $foto2_query;

$query = "UPDATE home SET 
judul1 ='$judul1', 
judul2 ='$judul2', 
judul3 = '$judul3', 
judul4 = '$judul4',
deskripsi = '$deskripsi'";

$query .= "$foto_query WHERE id_home = '1'";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('Data berhasil diperbarui'); window.location.href='home.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data');</script>";
}


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

    <title>Home</title>

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
          <?php include_once("../navbar/navbar.php") ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Home</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"></h5>
                      
                    </div>
                    <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                          <label class="form-label" for="judul1">Judul 1</label>
                          <input type="text" class="form-control" id="judul1" name="judul1" value="<?php echo $judul1 ?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="judul2">Judul 2</label>
                          <input type="text" class="form-control" id="judul2" name="judul2"  value="<?php echo $judul2 ?>"/>
                        </div>
                        <div class="form-group">
                        <label for="foto1">Foto 1</label><br>
                        <img src="foto1/<?php echo $foto1 ?>" alt="Foto User" width="150" height="150"><br><br>
                        <input type="file" id="foto1" name="foto1" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="judul3">Judul 3</label>
                          <input type="text" class="form-control" id="judul3" name="judul3" value="<?php echo $judul3 ?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="judul4">Judul 4</label>
                          <input type="text" class="form-control" id="judul4" name="judul4"  value="<?php echo $judul4 ?>"/>
                        </div>
                        <div class="mb-3">
                <label class="form-label" for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"><?php echo $deskripsi?></textarea>
            </div>
                          <div class="form-group">
                        <label for="foto2">Foto 2</label><br>
                        <img src="foto2/<?php echo $foto2 ?>" alt="Foto User" width="150" height="150"><br><br>
                        <input type="file" id="foto2" name="foto2" class="form-control">
                        </div>
                          
                        <input type="submit" name="submit" class="btn btn-success w-100">
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            
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
   
  </body>
</html>