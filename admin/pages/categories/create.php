<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Category</h1>
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
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>

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
                
                <form method="POST" action="pages/categories/action.php?act=insert">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" placeholder="Category Name" required>
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