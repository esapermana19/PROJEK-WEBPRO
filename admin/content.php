<?php
include "../config/koneksi.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case "products":
            include "pages/products/view.php";
            break;
        case "customers":
            include "pages/customers/view.php";
            break;
        case "supliers":
            include "pages/supliers/view.php";
            break;
        case "addproducts":
            include "pages/products/create.php";
            break;
        case "edit_product":
            include "pages/products/edit.php";
            break;
        case "addcustomer":
            include "pages/customers/create.php";
            break;
    }
} else {
    include "pages/home.php";
}
