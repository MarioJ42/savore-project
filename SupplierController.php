<?php
require 'connection.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = isset($_POST['action']) ? $_POST['action'] : '';
    
        try {
            if ($action === 'add_supplier') {
                $id_stok = $_POST['id_stok'];
                $nama_supplier = $_POST['nama_supplier'];
                $no_telp = $_POST['no_telp'];
        
                try {
                    $sql = "INSERT INTO supplier (id_stok, nama_supplier, no_telp) VALUES (:id_stok, :nama_supplier, :no_telp)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':id_stok', $id_stok, PDO::PARAM_INT);
                    $stmt->bindParam(':nama_supplier', $nama_supplier, PDO::PARAM_STR);
                    $stmt->bindParam(':no_telp', $no_telp, PDO::PARAM_STR);
                    $stmt->execute();
        
                    header('Location: supplier.php');
                    exit;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } 
            elseif ($action === 'update_no_telp') {
                $id_supplier = isset($_POST['id_supplier']) ? $_POST['id_supplier'] : '';
                $no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';
        
                try {
                    $sql = "UPDATE supplier SET no_telp = :no_telp WHERE id_supplier = :id_supplier";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':no_telp', $no_telp, PDO::PARAM_STR);
                    $stmt->bindParam(':id_supplier', $id_supplier, PDO::PARAM_INT);
                    $stmt->execute();
        
                    header('Location: supplier.php');
                    exit;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } 
            elseif ($action === 'delete_supplier') {
                $id_supplier = isset($_POST['id_supplier']) ? $_POST['id_supplier'] : '';
        
                try {
                    $sql = "DELETE FROM supplier WHERE id_supplier = :id_supplier";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':id_supplier', $id_supplier, PDO::PARAM_INT);
                    $stmt->execute();
        
                    header('Location: supplier.php');
                    exit;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
    }?>