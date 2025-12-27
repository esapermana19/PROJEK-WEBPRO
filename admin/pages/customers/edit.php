<style>
    .form-scroll {
        max-height: calc(100vh - 220px);
        overflow-y: auto;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">customers</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit customer</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body form-scroll">
                <?php
                $customer_id = $_GET['customer_id'];
                $sql = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
                $execute = mysqli_query($koneksi, $sql);
                $datacustomer = mysqli_fetch_array($execute);
                ?>

                <form method="POST" action="pages/customers/action.php?act=update&customer_id=<?php echo $customer_id ?>">
                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <label>customer Code</label>
                            <input value="<?= $datacustomer['customer_code'] ?>" class="form-control" type="text" name="customer_code" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>customer Name</label>
                            <input value="<?= $datacustomer['name'] ?>" class="form-control" type="text" name="name" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Phone</label>
                            <input value="<?= $datacustomer['phone'] ?>" class="form-control" type="number" name="phone" required>
                        </div>

                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" required><?= $datacustomer['address'] ?></textarea>
                    </div>


                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>

            </div>
            </form>
        </div>

        <!-- /.card-body -->
    </div>
</div><!-- /.container-fluid -->
</div>