<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
</head>
<body>
    <h3>Manager</h3>
    <a class="btn_signIn" href="login.php">Log Out</a>
    <a class="btn_signIn" href="supplier.php">Supplier</a>

<?php
    require 'connection.php';

    // Fetching Stok data
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
                <!-- <th>Delete</th> -->
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
                    <button type="submit" name="action" value="increase" style="background-color: green; color: black; border-radius: 5px;height:30px;">Tambah</button>
                    <button type="submit" name="action" value="decrease" style="background-color: red; color: black; border-radius: 5px;height:30px;">Kurangi</button>
                </form>
            </td>
            <td>
                <form action="ManagerController.php" method="post" style="display:inline;">
                    <input type="hidden" name="id_stok" value="<?php echo ($product['id_stok']); ?>">
                    <button type="submit" name="action" value="delete_stok" style="background-color: darkred; color: white; border-radius: 5px;height:30px;">Delete</button>
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
            // Fetching Pegawai data
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
                    <td><?php echo ($employee['nama_pegawai']); ?></td>
                    <td><?php echo ($employee['gaji']); ?></td>
                    <td><?php echo ($employee['telp']); ?></td>
                    <td>
                        <form action="ManagerController.php" method="post">
                            <input type="hidden" name="id_pegawai" value="<?php echo ($employee['id_pegawai']); ?>">
                            <input type="number" name="new_gaji" value="<?php echo ($employee['gaji']); ?>" min="0" required>
                            <button type="submit" name="action" value="update_gaji" class="btn btn-success">Update</button>
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
</body>
</html>
