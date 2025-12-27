
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
          <h3 class="card-title">Categories</h3>

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
            <a href="dashboard.php?page=addcategory" class="btn btn-primary">Add Category</a>
            <a href="pages/category/print.php?
            <?php
              if (isset($_GET['category_name'])) {
              echo 'category_name=' . $_GET['category_name'] . '&';
              }
              if (isset($_GET['category_id'])) {
              echo 'category_id=' . $_GET['category_id'];
              }
              ?>" 
              class="btn btn-success" target="_blank">
              Print
              </a>

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
                  <i class="fas fa-ban"></i>
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
          <!-- FILTER NAMA CATEGORY -->
          <form action="" method="GET" class="mb-3">
            <input type="hidden" name="page" value="category">
            <div class="row">
              <!-- Filter Nama -->
              <div class="col-md-5">
                <input class="form-control" type="text" name="category_name" placeholder="category Name"
                  value="<?php echo isset($_GET['category_name']) ? $_GET['category_name'] : ''; ?>">
              </div>


              <!-- Tombol Submit -->
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>
            </div>
          </form>


          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM categories";
              //Filter Nama
              if (isset($_GET['category_name'])) {
                $category_name = $_GET['category_name'];
                $sql .= " WHERE category_name LIKE '%$category_name%'";
              }

              $query = mysqli_query($koneksi, $sql);
              while ($category = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $category['category_id']; ?></td>
                  <td><?php echo $category['category_name']; ?></td>
                  <td>
                    <div class="d-flex">
                      <a href="dashboard.php?page=editcategory&category_id=<?php echo $category['category_id']; ?>" class="btn btn-sm btn-success mr-2">Edit</a>
                      <a href="pages/category/action.php?act=delete&category_id=<?php echo $category['category_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, Delete data?')">Delete</a>
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