<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Customers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Customerss</li>
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
                <h3 class="card-title">Add Customers</h3>

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
                <form method="POST" action="pages/customers/action.php?act=insert">
                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <label>customer Code</label>
                            <input class="form-control" type="text" name="customer_code" placeholder="Customer Code" required>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">
                        <label>Customer Name</label>
                        <input class="form-control" type="text" name="customer_name" placeholder="Customer Name" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>Phone</label>
                        <input class="form-control" type="text" name="phone" placeholder="Phone" required>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Address</label>
                        <textarea
                            class="form-control"
                            name="address"
                            rows="3"
                            placeholder="Address"
                            required></textarea>
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