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
</head>
<body>
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
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
    <div class="tab-header text-center" >
        <p>Menu</p>
        <h3>Frappe</h3>
    </div>

    <div class="row gy-5">
        <?php foreach ($products as $product) {
            if ($product['id_kategori'] == 2) { ?>
                <div class="col-lg-4 menu-item" >
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
    <div class="tab-header text-center" >
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
</section>


<div class="container mt-5">
    <h2 class="mt-4">Add New Menu</h2>
    <form action="controller.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="kategori">Category ID:</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="1">Coffee</option>
                <option value="2">Frappe</option>
                <option value="3">Fruitie</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="pict">Image:</label>
            <input type="file" class="form-control-file" id="pict" name="pict" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addItem">Add</button>
    </form>
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
</body>
</html>
