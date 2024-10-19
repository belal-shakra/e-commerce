<?php
	$title = 'All Users';
	$users = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>



  <div class="row">
    <div class="col-sm-12 col-lg-5 mb-5">
      <img src="https://media.istockphoto.com/id/1300512215/photo/headshot-portrait-of-smiling-ethnic-businessman-in-office.jpg?s=612x612&w=0&k=20&c=QjebAlXBgee05B3rcLDAtOaMtmdLjtZ5Yg9IJoiy-VY="
      class="img-fluid" alt="user-profile-image">
    </div>

    <div class="col-sm-12 col-lg-6 mb-5 py-2">
      <h2 class="mb-3">Belal Shakra</h2>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">Username : </span>belal_shakra
      </p>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">Email : </span>belal_shakra@gmail.com
      </p>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">Phone : </span>+342 123 1274 222
      </p>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">Registerd at : </span>20-7-2017
      </p>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">no. of Orders : </span>7
      </p>

      <p class="fs-5">
        <span class="fw-bold pe-3 d-inline-block" style="width: 170px;">Address : </span> Amman, CD st. 23
      </p>

      <p class="fs-5">
        <a href="#" class="btn btn-danger">Block</a>
      </p>
    </div>
  </div>



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">User Orders</h5>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">no. of items</th>
              <th scope="col">applyed cuopon</th>
              <th scope="col">original price</th>
              <th scope="col">price after discount</th>
              <th scope="col">discount</th>
              <th scope="col">order date</th>
              <th scope="col">Details</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <th scope="row"><a href="./order.php">#0001</a></th>
              <td>05</td>
              <td>NEWCUOPON</td>
              <td>$100</td>
              <td>$90</td>
              <td>10%</td>
              <td>6-10-2024</td>
              <td><a href="./order.php" class="btn btn-primary">Show</a></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>





<?php
	$content = ob_get_clean();
	include '../../layout.php';
?>