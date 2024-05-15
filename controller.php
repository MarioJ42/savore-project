
<?php
require 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // regist
    if (isset($_POST['signUp'])) { 
        $nama_pelanggan = $_POST['nama'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];

        try {
            $sql = "INSERT INTO pelanggan (nama_pelanggan, email, telp, password) VALUES (:nama_pelanggan, :email, :telp, :password)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telp', $telp);
            $stmt->execute();
            header("Location: login.php"); 
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['signIn'])) { 
        // login
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $sql = "SELECT * FROM pelanggan WHERE email = :email AND password = :password";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: index.php"); 
                exit();
            } else {
                echo "Invalid email or password."; 
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }elseif (isset($_POST['pay'])) { 
        $id_produk_array = $_POST['id_produk'];
        $quantity_array = $_POST['quantity'];
        
        try {
            session_start();
            $id_pelanggan = $_SESSION['user']['id_pelanggan'];
    
            $sql_last_nota = "SELECT MAX(nota_pesanan) as last_nota_pesanan FROM pesanan";
            $stmt_last_nota = $dbh->prepare($sql_last_nota);
            $stmt_last_nota->execute();
            $result = $stmt_last_nota->fetch(PDO::FETCH_ASSOC);
    
            $last_nota_pesanan = ($result && isset($result['last_nota_pesanan'])) ? $result['last_nota_pesanan'] + 1 : 1;
            
            foreach ($id_produk_array as $key => $id_produk) {
                $quantity = intval($quantity_array[$key]); 
    
                if ($quantity > 0) {
                    $sql_produk = "SELECT harga FROM produk WHERE id_produk = :id_produk";
                    $stmt_produk = $dbh->prepare($sql_produk);
                    $stmt_produk->bindParam(':id_produk', $id_produk);
                    $stmt_produk->execute();
                    $produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);
                    $harga = floatval($produk['harga']);
                    $harga_total = $harga * $quantity;
    
                    $sql_insert_pesanan = "INSERT INTO pesanan (nota_pesanan, id_produk, quantity, harga_total, STATUS, id_pelanggan) 
                                           VALUES (:nota_pesanan, :id_produk, :quantity, :harga_total, :status, :id_pelanggan)";
                    $stmt_insert_pesanan = $dbh->prepare($sql_insert_pesanan);
                    $stmt_insert_pesanan->bindParam(':nota_pesanan', $last_nota_pesanan);
                    $stmt_insert_pesanan->bindParam(':id_produk', $id_produk);
                    $stmt_insert_pesanan->bindParam(':quantity', $quantity);
                    $stmt_insert_pesanan->bindParam(':harga_total', $harga_total);
                    $stmt_insert_pesanan->bindValue(':status', 1);
                    $stmt_insert_pesanan->bindParam(':id_pelanggan', $id_pelanggan);
                    $stmt_insert_pesanan->execute();
                }
            }
    
            // Redirect to Order.php after processing all orders
            header("Location: Order.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
}

?>