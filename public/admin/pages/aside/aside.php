<?php
$current_page = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    global $current_page;
    return $current_page === $page ? 'active' : '';
}
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
  style="height: 100vh; display: flex; flex-direction: column; justify-content: space-between; background-color: white;">
  <div class="app-brand demo" style="padding: 1rem; border-bottom: 1px solid #eee;">
    <a href="" class="app-brand-link d-flex align-items-center gap-2"
      style="color: #333; font-weight: 700; font-size: 1.25rem; text-decoration: none;">
      <span class="app-brand-logo demo" style="display: flex; align-items: center;">
        <img src="/nbd/admin/pages/aside/logoroti.png" alt="Logo" width="30"
          style="border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.15);" />
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color: #333;">Admin</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
      style="color: #333;">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1"
    style="flex-grow: 1; display: flex; flex-direction: column; justify-content: flex-start; gap: 10px; padding-left: 0;">
    <!-- Dashboard -->
    <li class="menu-item <?php echo isActive('dashboard.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/dashboard/dashboard.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-bar-chart-square" style="color: #2575fc;"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>


    <li class="menu-item <?php echo isActive('home.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/home/home.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-home-circle" style="color: #2575fc;"></i>
        <div data-i18n="Notifications">Home</div>
      </a>
      <li class="menu-item <?php echo isActive('produk.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/produk/produk.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-package" style="color: #2575fc;"></i>
        <div data-i18n="Notifications">Produk</div>
      </a>
    </li>
    </li>
    <li class="menu-item <?php echo isActive('team.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/team/team.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-group" style="color: #2575fc;"></i>
        <div data-i18n="Notifications">Team</div>
      </a>
    </li>
    <li class="menu-item <?php echo isActive('about.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/about/about.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-info-circle" style="color: #2575fc;"></i>
        <div data-i18n="Notifications">About</div>
      </a>
    </li>
    
    <li class="menu-item <?php echo isActive('contact.php'); ?>" style="transition: background-color 0.3s ease;">
      <a href="/nbd/admin/pages/contact/contact.php" class="menu-link"
        style="color: #333; display: flex; align-items: center; gap: 10px; padding: 10px 15px; border-radius: 6px;">
        <i class="menu-icon tf-icons bx bx-phone-call" style="color: #2575fc;"></i>
        <div data-i18n="Notifications">Contact</div>
      </a>
    </li>
    
      </ul>
    </li>

  </ul>
</aside>