<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
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
        .container {
            padding: 20px;
        }
        h2, h3 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 30px;
        }
        table, th, td {
            border: 5px solid #7d5715;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #7d5715;
        }
        form {
            display: inline-block;
        }
        form input[type="number"], form input[type="text"], form input[type="email"], form input[type="password"] {
            padding: 5px;
            margin: 5px 0;
            width: 100%;
        }
        form button {
            padding: 5px 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        form button[type="submit"]:hover {
            background-color: #218838;
        }
        form button[type="submit"].delete {
            background-color: darkred;
        }
        form button[type="submit"].delete:hover {
            background-color: #a00000;
        }
        .button-group button {
            margin-right: 5px;
        }
    </style>
</head>
<body style: background-color:#b4946c>
    <div class="navbar">
        <img src="assets/img/logo.png" alt="">
        <a href="index.php">Home</a>
        <a href="login.php">Log Out</a>
        <a href="supplier.php">Supplier</a>
    </div>
    <div class="container">

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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo ($product['id_stok']); ?></td>
            <td><?php echo ($product['nama_stok']); ?></td>
            <td><?php echo ($product['quantity']); ?></td>
            <td>
                <form action="ManagerController.php" method="post">
                    <input type="hidden" name="id_stok" value="<?php echo ($product['id_stok']); ?>">
                    <input type="number" name="quantity" value="0" min="0">
                    <div class="button-group">
                        <button type="submit" name="action" value="increase" style="background-color: green; color: white;">Tambah</button>
                        <button type="submit" name="action" value="decrease" style="background-color: red; color: white;">Kurangi</button>
                    </div>
                </form>
            </td>
            <td>
                <form action="ManagerController.php" method="post">
                    <input type="hidden" name="id_stok" value="<?php echo ($product['id_stok']); ?>">
                    <button type="submit" name="action" value="delete_stok" class="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Pegawai</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Gaji</th>
                <th>Telp</th>
                <th>Update Gaji</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT * FROM pegawai";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $employees = $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>

            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo ($employee['id_pegawai']); ?></td>
                    <td><?php echo ($employee['nama_pegawai']); ?></td>
                    <td><?php echo ($employee['gaji']); ?></td>
                    <td><?php echo ($employee['telp']); ?></td>
                    <td>
                        <form action="ManagerController.php" method="post">
                            <input type="hidden" name="id_pegawai" value="<?php echo ($employee['id_pegawai']); ?>">
                            <input type="number" name="new_gaji" value="<?php echo ($employee['gaji']); ?>" min="0" required>
                            <input type="hidden" name="id_pegawai" value="<?php echo ($employee['id_pegawai']); ?>">
                            <button type="submit" name="action" value="update_gaji" style="background-color: #28a745; color: white;">Update</button>
                            <button type="submit" name="action" value="delete_pegawai" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Tambah Pegawai</h2>
    <form action="ManagerController.php" method="post">
        <input type="hidden" name="action" value="add_employee">
        <div>
            <label for="nama_pegawai">Nama Pegawai:</label>
            <input type="text" name="nama_pegawai" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="gaji">Gaji:</label>
            <input type="number" name="gaji" min="0" required>
        </div>
        <div>
            <label for="telp">No. Telp:</label>
            <input type="text" name="telp" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Tambah Pegawai</button>
    </form>

    <h2>Tambah Stok Baru</h2>
    <form action="ManagerController.php" method="post">
        <input type="hidden" name="action" value="add_stock">
        <div>
            <label for="nama_stok">Nama Stok:</label>
            <input type="text" name="nama_stok" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" min="0" required>
        </div>
        <button type="submit">Tambah Stok</button>
    </form>
    </div>
</body>
</html>
