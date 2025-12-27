<?php
include "../../../config/koneksi.php";
session_start();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == "insert") {
        $customer_code = $_POST['customer_code'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //CEK KODE PRODUK
        $query_check_customer = "SELECT * FROM customers where customer_code='$customer_code'";
        $execute_check_customer = mysqli_query($koneksi, $query_check_customer);
        $check_customer = mysqli_num_rows($execute_check_customer);
        if ($check_customer > 0) {
            $_SESSION['message'] = 'customer code is already';
            $_SESSION['alert_type'] = 'alert-danger';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        }

        $sql = "INSERT INTO customers (customer_code, name, address, phone)
        VALUES ('$customer_code','$name','$address','$phone')";
        $execute = mysqli_query($koneksi, $sql);

        if ($execute) {
            $_SESSION['message'] = 'customer has been saved';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        } else {
            $_SESSION['message'] = 'customer failed saved';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        }
    }

    // UPDATE
    elseif ($act == "update") {
        $customer_id = $_GET['customer_id'];
        $customer_code = $_POST['customer_code'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //CEK KODE PRODUK
        $query_check_customer = "SELECT * FROM customers where customer_code='$customer_code'
        AND customer_id != '$customer_id'";
        $execute_check_customer = mysqli_query($koneksi, $query_check_customer);
        $check_customer = mysqli_num_rows($execute_check_customer);
        if ($check_customer > 0) {
            $_SESSION['message'] = 'customer code is already';
            $_SESSION['alert_type'] = 'alert-danger';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        }

        $sql = "UPDATE customers SET customer_code='$customer_code',name='$name',
        address='$address',phone='$phone' WHERE customer_id='$customer_id'";

        $execute = mysqli_query($koneksi, $sql);
        if ($execute) {
            $_SESSION['message'] = 'customer has been edited';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        } else {
            $_SESSION['message'] = 'customer failed edited';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        }
    }
    //HAPUS
    elseif($act == "delete") {
        $customer_id = $_GET['customer_id'];
        $sql = "DELETE FROM customers WHERE customer_id='$customer_id'";
        $execute = mysqli_query($koneksi,$sql);
        if ($execute) {
            $_SESSION['message'] = 'customer has been deleted';
            $_SESSION['alert_type'] = 'alert-success';
            $_SESSION['type'] = 'succes';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        } else {
            $_SESSION['message'] = 'customer failed deleted';
            $_SESSION['alert_type'] = 'alert-failed';
            $_SESSION['type'] = 'failed';
            mysqli_close($koneksi);
            header('location: ../../dashboard.php?page=customers');
            exit;
        }

    }
}
