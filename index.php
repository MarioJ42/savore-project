<?php
session_start();
$cekManager = isset($_SESSION['user']) && $_SESSION['user']['email'] === 'manager@gmail.com';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Savoré Cafe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="" width="45px" height="50px">
        <h1>Savoré Cafe<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="profile.php">Profile</a></li>
          <?php if ($cekManager): ?>
            <li><a class="" href="manager.php">Manager</a></li>
          <?php endif; ?>
          
        </ul>
      </nav><!-- .navbar -->
      <a class="btn_signIn" href="login.php">Log Out</a>
      
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">
            HEY !
            ENJOY YOUR COFFEE Time
            <br>FRESHLY ROASTED & BREWED</h2>
          <p data-aos="fade-up" data-aos-delay="100" style="margin-top: 3vw;">Start your wonderful day with a cup of coffee.</p>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/kopi.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <img src="assets/img/room.jpg" width="600px" style="border-radius: 30px;">
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Nestled in the heart of Ngagel, Savoré is a haven for coffee aficionados seeking a cozy spot to indulge in their favorite brew. 
                Alongside our delectable range of Western comfort food, our specialty lies in crafting the perfect cup of coffee, sourced from the finest beans around the world. 
                Our friendly ambiance, complemented by the rich aroma of freshly brewed coffee, makes Savoré the ultimate destination for those seeking a delightful coffee experience in Ngagel.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Exceptional Coffee Experience</li>
                <li><i class="bi bi-check2-all"></i> Warm and welcoming ambiance</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Savoré Cafe?</h3>
              <p>
                Dive into a world of culinary excellence at Savore Cafe, where each dish is meticulously crafted to tantalize your taste buds.Experience the epitome of hospitality at Savore Cafe, where our friendly staff ensures every visit is a delightful journey.At Savore Cafe, earning and maintaining the trust of our customers is not just a priority
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Customer Trust</h4>
                  <p>At Savore Cafe, customer trust is the cornerstone of our establishment. We pride ourselves on a warm and welcoming environment where every patron feels valued and appreciated. </p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Our Specialization</h4>
                  <p>Specializing in coffee, Savore Cafe takes pride in crafting the perfect brew to elevate your morning ritual</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Our Goal</h4>
                  <p>The goal of Savore Cafe is to be more than just a place to dine; it's to create a haven where culinary artistry meets heartfelt hospitality.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="1" class="purecounter"></span>
              <p>Menu</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="2005" data-purecounter-duration="1" class="purecounter"></span>
              <p>Established</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="7" data-purecounter-duration="1" class="purecounter"></span>
              <p>Days a Week</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
              <p>Branch</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Menu</span></p>
          
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#best">
              <h4>Our Bestselller</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#coffee">
              <h4>Coffee and Latte</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#frappe">
              <h4>Frappe</h4>
            </a><!-- End tab nav item -->

            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#fruitie">
                <h4>Fruitie Series</h4>
              </a>
            </li>
            
            <?php if ($cekManager): ?>
            <li class="nav-item" style="margin-top:10px;">
              <a class="btn_signIn" href="MenuManager.php">Add Menu</a>
            </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="best">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Bestselller</h3>
            </div>

            <div class="row gy-5">

            <?php

require 'connection.php';


try {
    $sql = "SELECT id_produk, SUM(quantity) AS total_quantity
            FROM D_jual
            GROUP BY id_produk
            ORDER BY total_quantity DESC
            LIMIT 5";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $best_sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


foreach ($best_sellers as $best_seller) {
    $id_produk = $best_seller['id_produk'];
    $total_quantity = $best_seller['total_quantity'];


    try {
        $sql_produk = "SELECT * FROM produk WHERE id_produk = :id_produk";
        $stmt_produk = $dbh->prepare($sql_produk);
        $stmt_produk->bindParam(':id_produk', $id_produk);
        $stmt_produk->execute();
        $produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);


        echo "<div class='col'>";
        echo "<div class='card' style='width: 15rem;'>";
        echo "<img src='assets/img/menu/{$produk['id_produk']}.png' class='card-img-top' alt='...' style='height: 30vh;'>";
        echo "<div class='card-body text-center'>";
        echo "<h5 class='card-title'>{$produk['nama_produk']}</h5>";
        echo "<p class='card-text'>Rp." . number_format($produk['harga'], 2) . "</p>";
        echo "<input type='hidden' name='id_produk[]' value='{$produk['id_produk']}'>";
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="coffee">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Coffee and Latte</h3>
            </div>

            <div class="row gy-5">

            <div class="row row-cols-1 row-cols-md-3 g-4 coffeeLatte hidden"> 
            <!-- =========================== -->
          <?php
            $products = array(
                array("id_produk" => 1, "nama" => "Americano", "harga" => 30000),
                array("id_produk" => 2, "nama" => "Cappuccino", "harga" => 30000),
                array("id_produk" => 3, "nama" => "Ice Espresso", "harga" => 35000),
                array("id_produk" => 4, "nama" => "Mocha", "harga" => 35000),
                array("id_produk" => 5, "nama" => "Caramel Macchiato", "harga" => 40000),
                array("id_produk" => 6, "nama" => "Ice Coffee with Milk", "harga" => 30000)
            );
            foreach ($products as $product) {
            ?>
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/<?php echo $product['id_produk']; ?>.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $product['nama']; ?></h5>
                        <p class="card-text ">Rp.<?php echo number_format($product['harga'], 2); ?></p>
                        <input type="hidden" name="id_produk[]" value="<?php echo $product['id_produk']; ?>">

                    </div>
                </div>
            </div>
            <?php } ?>
          </div>


            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="frappe">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Frappe</h3>
            </div>

            <div class="row gy-5">

            <div class="row row-cols-1 row-cols-md-3 g-4 frappe hidden">
            <!-- =========================== -->
          <?php
           
            $products = array(
                array("id_produk" => 7, "nama" => "Caramel Frappe", "harga" => 40000),
                array("id_produk" => 8, "nama" => "Vanilla Frappe", "harga" => 35000),
                array("id_produk" => 9, "nama" => "Matcha Frappe", "harga" => 35000)
                
            );
            foreach ($products as $product) {
            ?>
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/<?php echo $product['id_produk']; ?>.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $product['nama']; ?></h5>
                        <p class="card-text ">Rp.<?php echo number_format($product['harga'], 2); ?></p>
                        <input type="hidden" name="id_produk[]" value="<?php echo $product['id_produk']; ?>">

                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>


            </div>
          </div><!-- End Lunch Menu Content -->
          
          <?php if (!$cekManager): ?>
          <div class="tab-pane fade" id="fruitie">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Fruitie Series</h3>
            </div>

            <div class="row gy-5">

            <div class="row row-cols-1 row-cols-md-3 g-4 fruitie hidden">
            <!-- =========================== -->
          <?php
           
            $products = array(
                array("id_produk" => 10, "nama" => "Strawberry Jasmine Tea", "harga" => 30000),
                array("id_produk" => 11, "nama" => "Mango Green Tea", "harga" => 30000),
                array("id_produk" => 12, "nama" => "Dragon Fruit Lemonade", "harga" => 35000),
                array("id_produk" => 13, "nama" => "Pineapple PassionFruit Lemonade", "harga" => 40000)
                
            );
            foreach ($products as $product) {
            ?>
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/<?php echo $product['id_produk']; ?>.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $product['nama']; ?></h5>
                        <p class="card-text ">Rp.<?php echo number_format($product['harga'], 2); ?></p>
                        <input type="hidden" name="id_produk[]" value="<?php echo $product['id_produk']; ?>">
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>
            </div>
          </div>
          <?php endif; ?>
          <!-- End Lunch Menu Content -->
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg" >
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>What Are They <span>Saying About Us</span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="row">
          <div class="col-md-6">
          <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=ngagel%20jaya%20tengah,%20sur&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
          <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
        </div><!-- End Google Maps -->

        <div class="col-md-6">
          <div class="info-item d-flex flex-column">
            <div class="content">
            <i class="icon bi bi-map flex-shrink-0"></i>
              <div class="deskripsi">
                <h3>Our Address</h3>
                <p>Jl. Ngagel Jaya Tengah, No-70-73</p>
              </div>
            </div>
            <div class="content">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div class="deskripsi">
                <h3>Email Us</h3>
                <p>cssavore@gmail.com</p>
              </div>
            </div>
            <div class="content">
            <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div class="deskripsi">
                <h3>Call Us</h3>
                <p>+62 89637855667</p>
              </div>
            </div>
            <div class="content">
            <i class="icon bi bi-share flex-shrink-0"></i>
              <div class="deskripsi">
                <h3>Opening Hours</h3>
                <p><strong>Mon-Sat:</strong> 11AM - 23PM<br><strong>Sunday:</strong> Closed</p>
              </div>
            </div>
            
        </div>
      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              Jl. Ngagel Jaya Tengah , No 70-73 <br>
              Surabaya, Jawa Timur<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +62 89637855667<br>
              <strong>Email:</strong> cssavore@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Savore Cafe</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Savore Cafe</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

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