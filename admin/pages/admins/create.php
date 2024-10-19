<?php
	$title = 'Add New Admins';
	$admins = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Add New Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Admins</li>
        <li class="breadcrumb-item active">Add Admin</li>
      </ol>
    </nav>
  </div>




  <div class="row">
    <div class="col-sm-12 col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Admin</h5>

          <form action="" method="POST">
            <div class="row my-2">
              <div class="col-sm-12 col-lg-6">
                <label for="inputNanme4" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputNanme4">
              </div>
              <div class="col-sm-12 col-lg-6">
                <label for="inputNanme4" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputNanme4">
              </div>
            </div>

            <div class="my-2">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" >
            </div>

            <div class="my-2">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail4">
            </div>

            <div class="my-2">
              <label class="form-label">Role</label>
              <select name="role" class="form-control">
                <option>Select</option>
                <option value="admin">Admin</option>
                <option value="admin">Super Admin</option>
              </select>
            </div>

            <div class="my-5 d-grid gap-2">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>





<?php
  $content = ob_get_clean();
  include '../../layout.php';
?>