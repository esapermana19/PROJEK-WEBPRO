<?php
include "../../../config/koneksi.php";
session_start();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == "insert") {
        $category_name = $_POST['category_name'];

        $sql = "INSERT INTO categories (category_name)
        VALUES ('$category_name')";
        $execute = mysqli_query($koneksi, $sql);

        if ($execute) {
            $_SESSION['message'] = 'category has been saved';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        } else {
            $_SESSION['message'] = 'category failed saved';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        }
    }

    // UPDATE
    elseif ($act == "update") {
        $category_name = $_POST['product_name'];
        //CEK KODE PRODUK
        $query_check_product = "SELECT * FROM categories where category_name='$category_name'";
        $execute_check_roduct = mysqli_query($koneksi, $query_check_product);
        $check_product = mysqli_num_rows($execute_check_roduct);
        if ($check_product > 0) {
            $_SESSION['message'] = 'category code is already';
            $_SESSION['alert_type'] = 'alert-danger';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        }

        $sql = "UPDATE categories SET category_name='$category_name' WHERE category_id='$category_id'";

        $execute = mysqli_query($koneksi, $sql);
        if ($execute) {
            $_SESSION['message'] = 'category has been edited';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        } else {
            $_SESSION['message'] = 'category failed edited';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        }
    }
    //HAPUS
    elseif($act == "delete") {
        $product_id = $_GET['product_id'];
        $sql = "DELETE FROM categories WHERE product_id='$product_id'";
        $execute = mysqli_query($koneksi,$sql);
        if ($execute) {
            $_SESSION['message'] = 'product has been deleted';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        } else {
            $_SESSION['message'] = 'product failed deleted';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=categories');
            exit;
        }

    }
}
