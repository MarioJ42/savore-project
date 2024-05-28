<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        h2 {
            color: #333;
        }
        table {
            width: 90%;
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
            margin: 5px 0;
        }
        form input[type="text"], form select {
            padding: 5px;
            margin-right: 10px;
            box-sizing: border-box;
        }
        form button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
        }
        form button.delete {
            background-color: darkred;
        }
        form button.delete:hover {
            background-color: #a00000;
        }
        form button.update {
            background-color: #ffc107;
        }
        form button.update:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<div class="navbar">
        <img src="assets/img/logo.png" alt="">
        <a href="index.php">Home</a>
        <a href="login.php">Log Out</a>
        <a href="supplier.php">Supplier</a>
    </div>
<body>

<?php
    require 'connection.php';
    require 'controller.php';

    try {
        $sql = "SELECT id_stok, nama_stok from stok";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

    <center>
    <h2>Daftar Supplier</h2>
    <table class="table table-striped" >
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>ID Stok</th>
                <th>Nama Supplier</th>
                <th>No. Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT * FROM supplier";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $suppliers = $stmt->fetchAll();

                foreach ($suppliers as $supplier) {
                    echo "<tr>";
                    echo "<td>" . $supplier['id_supplier'] . "</td>";
                    echo "<td>" . $supplier['id_stok'] . "</td>";
                    echo "<td>" . $supplier['nama_supplier'] . "</td>";
                    echo "<td>" . $supplier['no_telp'] . "</td>";
                    echo "<td>";
                    echo "<form action='Suppliercontroller.php' method='post'>";
                    echo "<input type='hidden' name='action' value='update_no_telp'>";
                    echo "<input type='hidden' name='id_supplier' value='" . $supplier['id_supplier'] . "'>";
                    echo "<input type='text' name='no_telp' placeholder='No. Telp Baru'>";
                    echo "<button type='submit' class='update'>Update No. Telp</button>";
                    echo "</form>";
                    echo "<form action='Suppliercontroller.php' method='post'>";
                    echo "<input type='hidden' name='action' value='delete_supplier'>";
                    echo "<input type='hidden' name='id_supplier' value='" . $supplier['id_supplier'] . "'>";
                    echo "<button type='submit' class='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    </center>


    <form action="Suppliercontroller.php" method="post" style=margin-left:20px;>
        <input type="hidden" name="action" value="add_supplier">
        <div>
            <label for="id_stok">ID Stok:</label>
            <select name="id_stok" required>
                <?php foreach ($products as $product): ?>
                    <option value="<?php echo ($product['id_stok']); ?>"><?php echo ($product['nama_stok']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="nama_supplier">Nama Supplier:</label>
            <input type="text" name="nama_supplier" required>
        </div>
        <div>
            <label for="no_telp">No. Telp:</label>
            <input type="text" name="no_telp" required>
        </div>
        <button type="submit">Tambah Supplier</button>
    </form>
</body>
</html>
