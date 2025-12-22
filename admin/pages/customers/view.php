<!-- <style>
  /* Supaya halaman tidak ikut scroll */
  .content-wrapper {
    height: calc(100vh - 57px);
    /* tinggi layar dikurangi navbar */
    overflow: hidden;
  }

  /* Scroll hanya di card body */
  .card-body {
    max-height: 500px;
    overflow-y: auto;
  }

  /* Scrollbar halus */
  .card-body::-webkit-scrollbar {
    width: 6px;
  }

  .card-body::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 10px;
  }


</style> -->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Csutomers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <a href="dashboard.php?page=addcustomer" class="btn btn-primary mb-3">Add Customer</a>
          <?php
          if (isset($_SESSION['message'])) {
          ?>
            <div class="alert <?php echo $_SESSION['alert_type'] ?> alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5>
                <?php
                if ($_SESSION['type'] == 'success') {
                  echo $_SESSION['type']; ?>
                  <i class="fas fa-check"></i>
                <?php } else {
                ?>
                  <i class="fas fa-check"></i>
                <?php
                } ?>

              </h5>
              <!-- pesan error -->
              <?php echo $_SESSION['message']; ?>
            </div>
          <?php
            unset($_SESSION['message']);
            unset($_SESSION['alert_type']);
            unset($_SESSION['type']);
          }
          ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM customers
              ORDER BY customer_code ASC";
              $query = mysqli_query($koneksi, $sql);
              while ($customers = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $customers['customer_code']; ?></td>
                  <td><?php echo $customers['name']; ?></td>
                  <td><?php echo $customers['phone']; ?></td>
                  <td><?php echo $customers['address']; ?></td>
                  <td>
                    <div class="d-flex">
                      <a href="dashboard.php?page=edit_product&product_id=<?php echo $products['product_id'];?>" class="btn btn-sm btn-success mr-2">Edit</a>
                      <a href="pages/products/action.php?act=delete&product_id=<?php echo $products['product_id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, Delete data?')">Delete</a>
                    </div>
                  </td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </div>
</body>