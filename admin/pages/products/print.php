<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <link rel="stylesheet" href="../../../assets/paper/paper.css">
    <style>
        /* Style untuk tampilan print */
        @media print {
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #000;
            }

            h2 {
                color: #007bff;
                /* Judul biru */
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 6px 8px;
                text-align: left;
            }

            th {
                background-color: #cce5ff;
                /* Header tabel biru muda */
            }

            /* Hilangkan elemen yang tidak perlu dicetak */
            .no-print {
                display: none !important;
            }
        }

        /* Style untuk tampilan web */
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 15px;
        }

        table.table {
            width: 100%;
            border-collapse: collapse;
        }

        table.table th,
        table.table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table.table th {
            background-color: #cce5ff;
        }
    </style>
</head>

<body class="A4">

    <section class="sheet padding-15mm">
        <article>
            <h2>Data Product</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../../config/koneksi.php";

                    $no = 1;
                    $sql = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id";

                    $where = [];

                    if (!empty($_GET['product_name'])) {
                        $product_name = mysqli_real_escape_string($koneksi, $_GET['product_name']);
                        $where[] = "products.product_name LIKE '%$product_name%'";
                    }

                    if (!empty($_GET['category_id'])) {
                        $category_id = mysqli_real_escape_string($koneksi, $_GET['category_id']);
                        $where[] = "products.category_id = '$category_id'";
                    }

                    if (!empty($where)) {
                        $sql .= " WHERE " . implode(" AND ", $where);
                    }

                    $query = mysqli_query($koneksi, $sql);
                    while ($products = mysqli_fetch_array($query)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$products['product_code']}</td>
                                <td>{$products['product_name']}</td>
                                <td>{$products['category_name']}</td>
                                <td>Rp " . number_format($products['price'], 0, ',', '.') . "</td>
                                <td>{$products['stock']}</td>
                              </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </article>
    </section>

</body>

</html>