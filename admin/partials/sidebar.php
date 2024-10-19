<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= $dashboard ?>" href="<?= asset() ?>/index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $orders ?>" href="<?= asset() ?>/index.php">
        <i class="bi bi-grid"></i>
        <span style="width: 100%;">Pinding Orders</span>
        <i class="bi bi-exclamation-circle-fill text-danger"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $category ?>" href="<?= asset() ?>/category/all.php">
        <i class="bi bi-tags"></i>
        <span>categories</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $products ?>" href="<?= asset() ?>/pages/product/">
        <i class="bi bi-box-seam"></i>
        <span>Products</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $coupons ?>" href="<?= asset() ?>/product/all.php">
        <i class="bi bi-ticket-perforated"></i>
        <span>Coupons</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $admins ?>" href="<?= asset() ?>/pages/admins">
        <i class="bi bi-person-gear"></i>
        <span>Admins</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $users ?>" href="<?= asset() ?>/pages/users">
        <i class="bi bi-people"></i>
        <span>Users</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $messages ?>" href="<?= asset() ?>/pages/messages">
        <i class="bi bi-people"></i>
        <span>Messages</span>
      </a>
    </li>


  </ul>

</aside>