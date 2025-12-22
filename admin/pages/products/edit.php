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
                <h1 class="m-0">Edit Product</h1>
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
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>

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
                $product_id = $_GET['product_id'];
                $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
                $execute = mysqli_query($koneksi, $sql);
                $dataproduct = mysqli_fetch_array($execute);
                ?>

                <form method="POST" action="pages/products/action.php?act=update&product_id=<?php echo $product_id?>">
                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <label>Product Code</label>
                            <input value="<?= $dataproduct['product_code'] ?>" class="form-control" type="text" name="product_code" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Category</label>
                            <select class="form-control" name="category_id" required>
                                <option>Choose Category</option>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $execute = mysqli_query($koneksi, $sql);
                                while ($categories = mysqli_fetch_array($execute)) {
                                ?>
                                    <option value="<?= $categories['category_id']; ?>"
                                    <?php
                                    if($categories['category_id'] == $dataproduct['category_id']) { echo 'selected';}
                                    ?>
                                    >
                                    <?php echo $categories['category_name']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Product Name</label>
                            <input value="<?= $dataproduct['product_name'] ?>" class="form-control" type="text" name="product_name" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Price</label>
                            <input value="<?= $dataproduct['price'] ?>" class="form-control" type="number" name="price" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Stock</label>
                            <input value="<?= $dataproduct['stock'] ?>" class="form-control" type="number" name="stock" required>
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