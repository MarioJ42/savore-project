
<?php
require 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if ($email === 'manager@gmail.com' && $password === 'manager') {
            session_start();
            $_SESSION['user'] = [
                'email' => $email,
                'role' => 'manager'
            ];
            header("Location: index.php");
            exit();
        }else{
            echo("INVALID!");
        }
    
        try {
            $sql_pegawai = "SELECT * FROM pegawai WHERE email = :email AND password = :password";
            $stmt_pegawai = $dbh->prepare($sql_pegawai);
            $stmt_pegawai->bindParam(':email', $email);
            $stmt_pegawai->bindParam(':password', $password);
            $stmt_pegawai->execute();
    
            $pegawai = $stmt_pegawai->fetch(PDO::FETCH_ASSOC);
    
            if ($pegawai) {
                session_start();
                $_SESSION['user'] = $pegawai;
                header("Location: pegawai.php"); 
                exit();
            }
            $sql_pelanggan = "SELECT * FROM pelanggan WHERE email = :email AND password = :password";
            $stmt_pelanggan = $dbh->prepare($sql_pelanggan);
            $stmt_pelanggan->bindParam(':email', $email);
            $stmt_pelanggan->bindParam(':password', $password);
            $stmt_pelanggan->execute();
    
            $pelanggan = $stmt_pelanggan->fetch(PDO::FETCH_ASSOC);
    
            if ($pelanggan) {
                session_start();
                $_SESSION['user'] = $pelanggan;
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
            $harga_total = 0;
    
            foreach ($id_produk_array as $idx => $id_produk) {
                $quantity = intval($quantity_array[$idx]);
    
                if ($quantity > 0) {
                    $sql_produk = "SELECT harga FROM produk WHERE id_produk = :id_produk";
                    $stmt_produk = $dbh->prepare($sql_produk);
                    $stmt_produk->bindParam(':id_produk', $id_produk);
                    $stmt_produk->execute();
                    $produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);
                    $harga = floatval($produk['harga']);
                    $harga_total += $harga * $quantity;
                }
            }
    
            $sql_insertHjual = "INSERT INTO H_jual (harga_total, STATUS) VALUES (:harga_total, :status)";
            $stmt_hjual = $dbh->prepare($sql_insertHjual);
            $stmt_hjual->bindParam(':harga_total', $harga_total);
            $stmt_hjual->bindValue(':status', 1);
            $stmt_hjual->execute();

            $nota_pesanan = $dbh->lastInsertId();
            foreach ($id_produk_array as $idx => $id_produk) {
                $quantity = intval($quantity_array[$idx]);
    
                if ($quantity > 0) {
                    $sql_produk = "SELECT harga FROM produk WHERE id_produk = :id_produk";
                    $stmt_produk = $dbh->prepare($sql_produk);
                    $stmt_produk->bindParam(':id_produk', $id_produk);
                    $stmt_produk->execute();
                    $produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);
                    $harga = floatval($produk['harga']);
    
                    $sql_insertDjual = "INSERT INTO D_jual (nota_pesanan, id_produk, quantity, id_pelanggan) 
                                         VALUES (:nota_pesanan, :id_produk, :quantity, :id_pelanggan)";
                    $stmt_djual = $dbh->prepare($sql_insertDjual);
                    $stmt_djual->bindParam(':nota_pesanan', $nota_pesanan);
                    $stmt_djual->bindParam(':id_produk', $id_produk);
                    $stmt_djual->bindParam(':quantity', $quantity);
                    $stmt_djual->bindParam(':id_pelanggan', $id_pelanggan);
                    $stmt_djual->execute();
                }
            }
    
            header("Location: Order.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (isset($_POST['addItem'])) {
        
        $target_dir = "menu/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        
        $name = $_POST['name'];
        $kategori = $_POST['kategori'];
        $price = $_POST['price'];
        $file = $_FILES['pict'];
    
        
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        
        if (file_exists($target_file)) {
            echo "file already exists.";
            $uploadOk = 0;
        }
    
        
        if ($file["size"] > 5000000) { 
            echo "file is too large.";
            $uploadOk = 0;
        }
    
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    
        
        if ($uploadOk == 0) {
            echo " file was not uploaded.";
        
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded.";
            } else {
                echo "an error uploading your file.";
            }
        }
    
       
        if ($uploadOk == 1) {
            try {
                
                $dbh = new PDO("mysql:host=$host;dbname=$db", $dbuser, $dbpass, $options);
    
                
                $sql = "INSERT INTO produk (nama_produk, id_kategori, harga, file_path) VALUES (:name, :kategori, :price, :file)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':kategori', $kategori);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':file', $target_file);
                $stmt->execute();
    
                echo "New record created successfully";
                header("Location: MenuManager.php");
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    if (isset($_POST['deleteItem'])) {
        $product_id = $_POST['product_id'];
        
        try {
            
            $dbh = new PDO("mysql:host=$host;dbname=$db", $dbuser, $dbpass, $options);
    
            
            $sql = "DELETE FROM produk WHERE id_produk = :product_id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
    
            
            header("Location: MenuManager.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
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
    
            header('Location: manager.php');
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
                $sql = "UPDATE H_jual SET status = 0 WHERE nota_pesanan = :nota_pesanan";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':nota_pesanan', $nota_pesanan, PDO::PARAM_STR);
                $stmt->execute();
    
                header('Location: pegawai.php');
                exit;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    }
}

?>