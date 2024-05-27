<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $nota_pesanan = isset($_GET['nota_pesanan']) ? $_GET['nota_pesanan'] : '';

        try {
            $sql = "SELECT * FROM D_jual WHERE nota_pesanan = :nota_pesanan";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nota_pesanan', $nota_pesanan, PDO::PARAM_STR);
            $stmt->execute();
            $details = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
    <div class="container">
      <div class="col" style="padding: 40px;">
        <h2>Detail Pesanan</h2>
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID Detail</th>
              <th>ID Produk</th>
              <th>Quantity</th>
              <th>ID Pelanggan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($details as $detail): ?>
            <tr>
              <td><?php echo htmlspecialchars($detail['id_detail']); ?></td>
              <td><?php echo htmlspecialchars($detail['id_produk']); ?></td>
              <td><?php echo htmlspecialchars($detail['quantity']); ?></td>
              <td><?php echo htmlspecialchars($detail['id_pelanggan']); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <form action="controller.php" method="post" class="mt-4">
          <input type="hidden" name="nota_pesanan" value="<?php echo htmlspecialchars($nota_pesanan); ?>">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
