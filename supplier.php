<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    <h2>Stok</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo ($product['id_stok']); ?></td>
                <td><?php echo ($product['nama_stok']); ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Daftar Supplier</h2>
    <table border="1">
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
            require 'connection.php';

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
                    echo "<form action='controller.php' method='post'>";
                    echo "<input type='hidden' name='action' value='update_no_telp'>";
                    echo "<input type='hidden' name='id_supplier' value='" . $supplier['id_supplier'] . "'>";
                    echo "<input type='text' name='no_telp' placeholder='No. Telp Baru'>";
                    echo "<button type='submit'>Update No. Telp</button>";
                    echo "</form>";
                    echo "<form action='controller.php' method='post'>";
                    echo "<input type='hidden' name='action' value='delete_supplier'>";
                    echo "<input type='hidden' name='id_supplier' value='" . $supplier['id_supplier'] . "'>";
                    echo "<button type='submit'>Delete</button>";
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

        <h2>Tambah Supplier</h2>
    <form action="controller.php" method="post">
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