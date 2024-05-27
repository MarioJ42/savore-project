<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Manager</h3>
    <a class="btn_signIn" href="login.php">Log Out</a>
    <a class="btn_signIn" href="supplier.php">Supplier</a>
<?php
    require 'connection.php';
    require 'controller.php';

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
                    <form action="controller.php" method="post">
                        <input type="hidden" name="id_stok" value="<?php echo ($product['id_stok']); ?>">
                        <input type="number" name="quantity" value="0" min="0">
                        <button type="submit" name="action" value="increase" style="background-color: green; color: black; border-radius: 5px;height:30px,">Tambah</button>
                        <button type="submit" name="action" value="decrease" style="background-color: red; color: black; border-radius: 5px;height:30px,">Kurangi</button>
                    </form>
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
            </tr>
        </thead>
        <tbody>
            <?php
            require 'connection.php';

            try {
                $sql = "SELECT * FROM pegawai";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $orders = $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>

            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo ($order['nama_pegawai']); ?></td>
                    <td><?php echo ($order['gaji']); ?></td>
                    <td><?php echo ($order['telp']); ?></td>
                    <td>
                        <form action="controller.php" method="post">
                            <input type="hidden" name="id_pegawai" value="<?php echo ($order['id_pegawai']); ?>">
                            <input type="number" name="new_gaji" value="<?php echo ($order['gaji']); ?>" min="0" required>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Tambah Pegawai</h2>
        <form action="controller.php" method="post">
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
    
</body>
</html>