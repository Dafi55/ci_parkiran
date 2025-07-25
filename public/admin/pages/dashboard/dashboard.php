<?php 
 session_start();
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
      header("Location: ../authen/auth-login-basic.php");
      exit();
  } 
include_once("../koneksi/koneksi.php");

// Fetch total product stock
$total_stock = 0;
$result_stock = mysqli_query($conn, "SELECT SUM(stok) as total_stock FROM produk");
if ($result_stock) {
    $row = mysqli_fetch_assoc($result_stock);
    $total_stock = $row['total_stock'] ?? 0;
}

// Fetch total products count
$total_products = 0;
$result_products = mysqli_query($conn, "SELECT COUNT(*) as total_products FROM produk");
if ($result_products) {
    $row = mysqli_fetch_assoc($result_products);
    $total_products = $row['total_products'] ?? 0;
}

// Fetch total team members count
$total_team = 0;
$result_team = mysqli_query($conn, "SELECT COUNT(*) as total_team FROM user");
if ($result_team) {
    $row = mysqli_fetch_assoc($result_team);
    $total_team = $row['total_team'] ?? 0;
}

// Fetch recent 5 products
$recent_products = [];
$result_recent_products = mysqli_query($conn, "SELECT nama_produk FROM produk ORDER BY id_produk DESC LIMIT 5");
if ($result_recent_products) {
    while ($row = mysqli_fetch_assoc($result_recent_products)) {
        $recent_products[] = $row['nama_produk'];
    }
}

// Fetch recent 5 team members
$recent_team = [];
$result_recent_team = mysqli_query($conn, "SELECT nama_user FROM user ORDER BY id_user DESC LIMIT 5");
if ($result_recent_team) {
    while ($row = mysqli_fetch_assoc($result_recent_team)) {
        $recent_team[] = $row['nama_user'];
    }
}

// Fetch products with low stock (<= 5)
$low_stock_products = [];
$result_low_stock = mysqli_query($conn, "SELECT nama_produk, stok FROM produk WHERE stok <= 5 ORDER BY stok ASC");
if ($result_low_stock) {
    while ($row = mysqli_fetch_assoc($result_low_stock)) {
        $low_stock_products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard</title>
  <meta name="description" content="" />
  <?php include_once("../logo_web/logo.php"); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../../assets/css/demo.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="../../assets/vendor/js/helpers.js"></script>
  <script src="../../assets/js/config.js"></script>
  <script src="../../libs/apex-charts/apexcharts.min.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include_once("../aside/aside.php") ?>
      <div class="layout-page">
        <?php include_once("../navbar/navbar.php") ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex align-items-center mb-4">
              <div>
                <h1 class="fw-bold mb-3">Selamat datang di Dashboard Anda</h1>
                
              </div>
              <div class="ms-auto">
                <img src="../../assets/img/illustrations/man-with-laptop-light.png" alt="Dashboard Illustration"
                  style="max-height: 120px;" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="card bg-stock card-hover shadow-sm rounded">
                  <div class="card-body text-center" style="background-color: #f0f8ff;">
                    <i class="bx bx-package card-icon mb-3"></i>
                    <h5 class="card-title">Total Product Stock</h5>
                    <p class="card-text display-5 text-dark"><?php echo $total_stock; ?></p>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="card bg-products card-hover shadow-sm rounded">
                  <div class="card-body text-center" style="background-color: #fff0f5;">
                    <i class="bx bx-cart-alt card-icon mb-3"></i>
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-5 text-dark"><?php echo $total_products; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card bg-team card-hover shadow-sm rounded">
                  <div class="card-body text-center" style="background-color: #f5f5dc;">
                    <i class="bx bx-user card-icon mb-3"></i>
                    <h5 class="card-title">Total Team Members</h5>
                    <p class="card-text display-5 text-dark"><?php echo number_format($total_team); ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-lg-6">
                <div class="card shadow-sm rounded">
                  <div class="card-header">
                    <h5 class="mb-0">Aktivitas Terkini</h5>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <?php foreach ($recent_products as $product): ?>
                      <li class="list-group-item">New product added: <?php echo $product; ?></li>
                      <?php endforeach; ?>
                      <?php foreach ($recent_team as $member): ?>
                      <li class="list-group-item">Team member joined: <?php echo $member; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card shadow-sm rounded">
                  <div class="card-header">
                    <h5 class="mb-0">Peringatan Produk (Stok Rendah)</h5>
                  </div>
                  <div class="card-body">
                    <?php if (count($low_stock_products) > 0): ?>
                      <ul class="list-group list-group-flush">
                        <?php foreach ($low_stock_products as $product): ?>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $product['nama_produk']; ?>
                            <span class="badge bg-danger rounded-pill"><?php echo $product['stok']; ?></span>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php else: ?>
                      <p class="text-success">Semua produk memiliki stok yang cukup.</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>
  <script src="../../assets/js/main.js"></script>
</body>

</html>
