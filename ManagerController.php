<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'update_gaji') {
        $id_pegawai = $_POST['id_pegawai'];
        $new_gaji = $_POST['new_gaji'];

        try {
            $sql = "UPDATE pegawai SET gaji = :new_gaji WHERE id_pegawai = :id_pegawai";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':new_gaji', $new_gaji, PDO::PARAM_INT);
            $stmt->bindParam(':id_pegawai', $id_pegawai, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: manager.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif ($action === 'add_employee') {
        $nama_pegawai = $_POST['nama_pegawai'];
        $password = $_POST['password'];
        $gaji = $_POST['gaji'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];

        try {
            $sql = "INSERT INTO pegawai (nama_pegawai, password, gaji, telp, email) VALUES (:nama_pegawai, :password, :gaji, :telp, :email)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nama_pegawai', $nama_pegawai);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':gaji', $gaji);
            $stmt->bindParam(':telp', $telp);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            header('Location: manager.php');
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif ($action === 'increase' || $action === 'decrease') {
        $id_stok = isset($_POST['id_stok']) ? (int) $_POST['id_stok'] : 0;
        $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;

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

            header('Location: manager.php');
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
