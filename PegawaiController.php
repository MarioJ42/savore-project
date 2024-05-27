
<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_stok = isset($_POST['id_stok']) ? (int) $_POST['id_stok'] : 0;
        $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;
        $action = isset($_POST['action']) ? $_POST['action'] : '';
    
        try {
            if ($action === 'increase') {
                $sql = "UPDATE stok SET quantity = quantity + :quantity WHERE id_stok = :id_stok";
            } elseif ($action === 'decrease') {
                $sql = "UPDATE stok SET quantity = quantity - :quantity WHERE id_stok = :id_stok";
            } else {
                throw new Exception("Invalid action");
            }
    
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id_stok', $id_stok, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
    
            header('Location: pegawai.php');
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = isset($_POST['action']) ? $_POST['action'] : '';
    
        if ($action === 'complete_order') {
            $nota_pesanan = isset($_POST['nota_pesanan']) ? $_POST['nota_pesanan'] : '';
    
            try {
                $sql = "SELECT d.id_pelanggan, h.harga_total
                        FROM D_jual d
                        JOIN H_jual h ON d.nota_pesanan = h.nota_pesanan
                        WHERE d.nota_pesanan = :nota_pesanan";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':nota_pesanan', $nota_pesanan, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($result) {
                    $id_pelanggan = $result['id_pelanggan'];
                    $total_transaksi = $result['harga_total'];
                    $tanggal = date('Y-m-d'); 
                    $sql_insert = "INSERT INTO history (id_pelanggan, total_transaksi, tanggal) 
                                   VALUES (:id_pelanggan, :total_transaksi, :tanggal)";
                    $stmt_insert = $dbh->prepare($sql_insert);
                    $stmt_insert->bindParam(':id_pelanggan', $id_pelanggan, PDO::PARAM_INT);
                    $stmt_insert->bindParam(':total_transaksi', $total_transaksi, PDO::PARAM_INT);
                    $stmt_insert->bindParam(':tanggal', $tanggal, PDO::PARAM_STR);
                    $stmt_insert->execute();
                    $sql_update = "UPDATE H_jual SET status = 0 WHERE nota_pesanan = :nota_pesanan";
                    $stmt_update = $dbh->prepare($sql_update);
                    $stmt_update->bindParam(':nota_pesanan', $nota_pesanan, PDO::PARAM_STR);
                    $stmt_update->execute();
                }
    
                header('Location: pegawai.php');
                exit;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>