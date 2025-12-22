<?php
include "../../../config/koneksi.php";
session_start();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == "insert") {
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $stock = $_POST['stock'];
        $category = $_POST['category_id'];
        $price = $_POST['price'];
        //CEK KODE PRODUK
        $query_check_product = "SELECT * FROM products where product_code='$product_code'";
        $execute_check_roduct = mysqli_query($koneksi, $query_check_product);
        $check_product = mysqli_num_rows($execute_check_roduct);
        if ($check_product > 0) {
            $_SESSION['message'] = 'product code is already';
            $_SESSION['alert_type'] = 'alert-danger';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        }

        $sql = "INSERT INTO products (product_code,category_id,product_name,price,stock)
        VALUES ('$product_code','$category','$product_name','$price','$stock')";
        $execute = mysqli_query($koneksi, $sql);

        if ($execute) {
            $_SESSION['message'] = 'product has been saved';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        } else {
            $_SESSION['message'] = 'product failed saved';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        }
    }

    // UPDATE
    elseif ($act == "update") {
        $product_id = $_GET['product_id'];
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $stock = $_POST['stock'];
        $category = $_POST['category_id'];
        $price = $_POST['price'];
        //CEK KODE PRODUK
        $query_check_product = "SELECT * FROM products where product_code='$product_code'
        AND product_id != '$product_id'";
        $execute_check_roduct = mysqli_query($koneksi, $query_check_product);
        $check_product = mysqli_num_rows($execute_check_roduct);
        if ($check_product > 0) {
            $_SESSION['message'] = 'product code is already';
            $_SESSION['alert_type'] = 'alert-danger';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        }

        $sql = "UPDATE products SET product_code='$product_code',product_name='$product_name',
        category_id='$category',price='$price',stock='$stock' WHERE product_id='$product_id'";

        $execute = mysqli_query($koneksi, $sql);
        if ($execute) {
            $_SESSION['message'] = 'product has been edited';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        } else {
            $_SESSION['message'] = 'product failed edited';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        }
    }
    //HAPUS
    elseif($act == "delete") {
        $product_id = $_GET['product_id'];
        $sql = "DELETE FROM products WHERE product_id='$product_id'";
        $execute = mysqli_query($koneksi,$sql);
        if ($execute) {
            $_SESSION['message'] = 'product has been deleted';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        } else {
            $_SESSION['message'] = 'product failed deleted';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=products');
            exit;
        }

    }
}
