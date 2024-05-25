
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
?>