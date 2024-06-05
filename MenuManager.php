<?php
require 'connection.php';
require 'controller.php';

try {
    $sql = "SELECT * FROM produk";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            
        }
        .navbar {
            background-color: #fbebcb;
            overflow: hidden;
            
            display: flex;
            align-items: center;
        }
        .navbar img {
            margin-left: 50px;
            width: 5vw;
        }
        .navbar a {
            display: block;
            color: #a8803c;
            text-align: center;
            
            text-decoration: none;
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="assets/img/logo.png" alt="">
        <a href="#" id="addMenuBtn" style="margin-left: -400px;">Add Menu</a>
        <a href="#" id="seeMenuBtn" style="margin-left: -400px;">Menu</a>
        <button type="submit"  class="btn btn-danger" style="margin-right:30px ;"> <a href="login.php" style="color:white; text-decoration:none;">LogOut</a></button>
        
        
    </div>

    <div id="addMenuSection" class="section container mt-5">
        <div class="container mt-5" style="max-width: 600px; padding: 2rem; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; background-color: #fff;">
            <h2 class="mt-4" style="text-align: center; margin-bottom: 1.5rem;">Add New Menu</h2>
            <form action="controller.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="kategori" style="font-weight: bold;">Category :</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        <option value="1">Coffee</option>
                        <option value="2">Frappe</option>
                        <option value="3">Fruitie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="pict" style="font-weight: bold;">Image:</label>
                    <input type="file" class="form-control-file" id="pict" name="pict" required>
                </div>
                <button type="submit" class="btn btn-danger" name="addItem" style="width: 100%; padding: 0.75rem; margin:10px;">Add</button>
            </form>
        </div>
    </div>

    <div id="menuSection" class="section container" data-aos="fade-up" style="margin-top: 50px;">
        <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#best">
                    <h4>Our Bestseller</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#coffee">
                    <h4>Coffee and Latte</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#frappe">
                    <h4>Frappe</h4>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#fruitie">
                    <h4>Fruitie Series</h4>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="best">
                <!-- Bestsellers content here -->
            </div>
            <div class="tab-pane fade" id="coffee">
                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Coffee and Latte</h3>
                </div>

                <div class="row gy-5">
                    <?php foreach ($products as $product) {
                        if ($product['id_kategori'] == 1) { ?>
                            <div class="col-lg-4 menu-item">
                                <a href="<?= $product['file_path'] ?>" class="glightbox"><img src="<?= $product['file_path'] ?>" class="menu-img img-fluid" alt=""></a>
                                <h4><?= $product['nama_produk'] ?></h4>
                                <p class="price">
                                    Rp.<?= number_format($product['harga'], 2, ',', '.') ?>
                                </p>
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id_produk'] ?>">
                                    <button type="submit" class="btn btn-danger" name="deleteItem">Hapus</button>
                                </form>
                            </div><!-- Menu Item -->
                        <?php }
                    } ?>
                </div>
            </div>

            <div class="tab-pane fade" id="frappe">
                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Frappe</h3>
                </div>

                <div class="row gy-5">
                    <?php foreach ($products as $product) {
                        if ($product['id_kategori'] == 2) { ?>
                            <div class="col-lg-4 menu-item">
                                <a href="<?= $product['file_path'] ?>" class="glightbox"><img src="<?= $product['file_path'] ?>" class="menu-img img-fluid" alt=""></a>
                                <h4><?= $product['nama_produk'] ?></h4>
                                <p class="price">
                                    Rp.<?= number_format($product['harga'], 2, ',', '.') ?>
                                </p>
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id_produk'] ?>">
                                    <button type="submit" class="btn btn-danger" name="deleteItem">Hapus</button>
                                </form>
                            </div><!-- Menu Item -->
                        <?php }
                    } ?>
                </div>
            </div>

            <div class="tab-pane fade" id="fruitie">
                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Fruitie Series</h3>
                </div>

                <div class="row gy-5">
                    <?php foreach ($products as $product) {
                        if ($product['id_kategori'] == 3) { ?>
                            <div class="col-lg-4 menu-item">
                                <a href="<?= $product['file_path'] ?>" class="glightbox"><img src="<?= $product['file_path'] ?>" class="menu-img img-fluid" alt=""></a>
                                <h4><?= $product['nama_produk'] ?></h4>
                                <p class="price">
                                    Rp.<?= number_format($product['harga'], 2, ',', '.') ?>
                                </p>
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id_produk'] ?>">
                                    <button type="submit" class="btn btn-danger" name="deleteItem">Hapus</button>
                                </form>
                            </div><!-- Menu Item -->
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.getElementById('addMenuBtn').addEventListener('click', function() {
            document.getElementById('addMenuSection').classList.add('active');
            document.getElementById('menuSection').classList.remove('active');
        });

        document.getElementById('seeMenuBtn').addEventListener('click', function() {
            document.getElementById('menuSection').classList.add('active');
            document.getElementById('addMenuSection').classList.remove('active');
        });

        
        document.getElementById('menuSection').classList.add('active');
    </script>
</body>
</html>
