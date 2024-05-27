<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>PEGAWAI</h3>
    <a class="btn_signIn" href="login.php">Log Out</a>

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
                        <form action="PegawaiController.php" method="post">
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
          <h2>Order List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
              require 'connection.php';
              require 'controller.php';

              try {
                  $sql = "SELECT * FROM H_jual where STATUS = 1";
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