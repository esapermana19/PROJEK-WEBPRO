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
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
          <h3 class="card-title">Products</h3>

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
          <div class="mb-3">
            <a href="dashboard.php?page=addproducts" class="btn btn-primary">Add Product</a>
            <a href="pages/products/print.php" class="btn btn-success">Print</a>
          </div>
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
          <!-- FILTER -->
          <form action="" method="GET">
            <input type="hidden" name="page" value="products">
            <div class="row">
              <div class="col-11">
                <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                  value="<?php if (isset($_GET['product_name'])) {
                            echo $_GET['product_name'];
                          } ?>">
              </div>
              <div class="col-1"><button type="submit" class="btn btn-primary">Cari</button></div>
            </div>
          </form>

          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Code</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>stock</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM products
              INNER JOIN categories ON products.category_id = categories.category_id ";
              if (isset($_GET['product_name'])) {
                $product_name = $_GET['product_name'];
                $sql .= "WHERE product_name LIKE '%$product_name%'";
              }
              $query = mysqli_query($koneksi, $sql);
              while ($products = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $products['product_code']; ?></td>
                  <td><?php echo $products['product_name']; ?></td>
                  <td><?php echo $products['category_name']; ?></td>
                  <td><?php echo "Rp " . $products['price']; ?></td>
                  <td><?php echo $products['stock']; ?></td>
                  <td>
                    <div class="d-flex">
                      <a href="dashboard.php?page=edit_product&product_id=<?php echo $products['product_id']; ?>" class="btn btn-sm btn-success mr-2">Edit</a>
                      <a href="pages/products/action.php?act=delete&product_id=<?php echo $products['product_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, Delete data?')">Delete</a>
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