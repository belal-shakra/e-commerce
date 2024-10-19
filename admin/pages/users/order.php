<?php
	$title = "User's Orders";
	$users = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show User's Order</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Orders</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>







<?php
  $content = ob_get_clean();
  include '../../layout.php';
?>