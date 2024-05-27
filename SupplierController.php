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
            elseif ($action === 'increase' || $action === 'decrease') {
                $id_stok = isset($_POST['id_stok']) ? (int)$_POST['id_stok'] : 0;
                $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    
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
            } elseif ($action === 'add_employee') {
                $nama_pegawai = $_POST['nama_pegawai'];
                $password = $_POST['password']; 
                $gaji = $_POST['gaji'];
                $telp = $_POST['telp'];
                $email = $_POST['email'];
    
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
            } elseif ($action === 'update_gaji') {
                $id_pegawai = $_POST['id_pegawai'];
                $new_gaji = $_POST['new_gaji'];
    
                $sql = "UPDATE pegawai SET gaji = :new_gaji WHERE id_pegawai = :id_pegawai";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':new_gaji', $new_gaji, PDO::PARAM_INT);
                $stmt->bindParam(':id_pegawai', $id_pegawai, PDO::PARAM_INT);
                $stmt->execute();
    
                header('Location: manager.php');
                exit;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }?>