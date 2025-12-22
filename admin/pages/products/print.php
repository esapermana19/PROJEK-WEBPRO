<?php
include "../pos/config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <link rel="stylesheet" href="../../../assets/paper/paper.css">
</head>

<body>

    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->

    <body class="A5">

        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
        <section class="sheet padding-10mm">

            <!-- Write HTML just like a web page -->
            <article>
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
                        include "../pos/config/koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM products
                        INNER JOIN categories ON products.category_id = categories.category_id ";
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
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </article>

        </section>

    </body>
</body>

</html>