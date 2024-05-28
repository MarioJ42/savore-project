<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .navbar {
            background-color: #fbebcb;
            overflow: hidden;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        .navbar img {
            margin-right: 20px;
            width: 5vw;

        }
        .navbar a {
            display: block;
            color: #a8803c;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        h3 {
            margin-bottom: 20px;
        }
        .btn_signIn {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn_signIn:hover {
            background-color: #0056b3;
        }
        h2 {
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-success {
            background-color: green;
            color: white;
        }
        .btn-success:hover {
            background-color: darkgreen;
        }
        .btn-primary {
            background-color: blue;
            color: white;
        }
        .btn-primary:hover {
            background-color: darkblue;
        }
        form div {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"], input[type="password"], input[type="number"], input[type="email"] {
            padding: 5px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="assets/img/logo.png" alt="">
        <a href="index.php">Home</a>
        <a href="login.php">Log Out</a>
        <a href="supplier.php">Supplier</a>
    </div>
    <h3>PEGAWAI</h3>
    <a class="btn_signIn" href="login.php">Log Out</a>

    <?php
    require 'connection.php';

    try {
        $sql = "SELECT * FROM stok";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <h2>Stok</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Quantity</th>
                <th>Update Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo ($product['id_stok']); ?></td>
                <td><?php echo ($product['nama_stok']); ?></td>
                <td><?php echo ($product['quantity']); ?></td>
                <td>
                    <form action="PegawaiController.php" method="post">
                        <input type="hidden" name="id_stok" value="<?php echo ($product['id_stok']); ?>">
                        <input type="number" name="quantity" value="0" min="0">
                        <button type="submit" name="action" value="increase" style="background-color: green; color: white; border-radius: 5px; height: 30px;">Tambah</button>
                        <button type="submit" name="action" value="decrease" style="background-color: red; color: white; border-radius: 5px; height: 30px;">Kurangi</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Order List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Harga Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT * FROM H_jual WHERE STATUS = 1";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $orders = $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>

            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo ($order['nota_pesanan']); ?></td>
                <td><?php echo ($order['harga_total']); ?></td>
                <td><?php echo ($order['STATUS']); ?></td>
                <td>
                    <form action="detailpesanan.php" method="get" style="display: inline;">
                        <input type="hidden" name="nota_pesanan" value="<?php echo ($order['nota_pesanan']); ?>">
                        <button type="submit" class="btn btn-primary" name="action" value="view_detail">Detail</button>
                    </form>
                    <form action="PegawaiController.php" method="post" style="display: inline;">
                        <input type="hidden" name="nota_pesanan" value="<?php echo ($order['nota_pesanan']); ?>">
                        <button type="submit" class="btn btn-success" name="action" value="complete_order">Selesai</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
