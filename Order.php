<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- midtrans -->
    <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-MberASDnQdnksJIt"></script>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .hidden {
          display: none;
        }
      </style>
    </head>
    <body>
        <a href="index.php">Back</a>

        <center>
            <div class="container" style="margin: 3vh;">
                <div class="btn-group mt-3" role="group" aria-label="Basic example">
                  <button type="button" class="btn" id="coffeeLatteBtn">Coffee and Latte</button>
                  <button type="button" class="btn" id="frappeBtn">Frappe</button>
                  <button type="button" class="btn" id="fruitieBtn">Fruitie Series</button>
                </div>
            </div>
        </center>

    
        
        <div class="container" >
          <div class="row row-cols-1 row-cols-md-3 g-4 bestseller">
                <!-- <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text ">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div> -->
        
                <!-- <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div>
        
                <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div>
        
                <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div>
        
                <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div>
        
                <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="assets/img/menu/two.png" class="card-img-top" alt="..." style="height: 30vh;">
                    <div class="card-body text-center">
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="card-text">Rp.30.000,00</p>
                    <center><input type="number" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
                </div> -->
            </div>
            </div>
          </div>
        </div>
        <form action="controller.php" method="POST">
        <div class="container">
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
                        <center><input type="number" name="quantity[]" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <div class="container">
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
                        <center><input type="number" name="quantity[]" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <div class="container">
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
                        <center><input type="number" name="quantity[]" class="form-control text-center" placeholder="" style="width: 6em;" min="0"></center>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <center>
        <button type="submit" id="pay-button" name="pay" class="btn btn-primary">Pay</button>
    </center>
      </form>
      </div>
    </div>


    <!-- <center><button style="width: 10vw; background-color: blue; margin: 3vh;border-radius: 10px;height: 5vh;">Order</button></center> -->
    <center>
      <!-- <button id="pay-button">Pay!</button> -->

    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
    <div id="snap-container"></div>
  
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', async function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        // window.snap.embed('YOUR_SNAP_TOKEN', {
        //   embedId: 'snap-container'
        // });
        
        // minta transaction token pakai ajax / fetch
        try {
          const response = await fetch('midtrans/placeOrder.php', {
            method: 'POST',
            body: data
          })
          const token = await response.text();
          console.log(token);
          // window.snap.pay('');

        } catch (err) {
          console.log(err.message);
        }



      });
    </script>
    </center>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

function removeBoldStyle() {
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.style.fontWeight = 'normal';
        });
    }

   

    document.getElementById('coffeeLatteBtn').addEventListener('click', function() {
        removeBoldStyle();
        this.style.fontWeight = 'bold';
    });

    document.getElementById('frappeBtn').addEventListener('click', function() {
        removeBoldStyle();
        this.style.fontWeight = 'bold';
    });

    document.getElementById('fruitieBtn').addEventListener('click', function() {
        removeBoldStyle();
        this.style.fontWeight = 'bold';
    });


        const coffeeLatteBtn = document.getElementById('coffeeLatteBtn');
        const frappeBtn = document.getElementById('frappeBtn');
        const fruitieBtn = document.getElementById('fruitieBtn');
      

        const coffeeLatteCards = document.querySelectorAll('.coffeeLatte');
        const frappeCards = document.querySelectorAll('.frappe');
        const fruitieCards = document.querySelectorAll('.fruitie');
    
        function hideAllCards() {
          coffeeLatteCards.forEach(card => card.classList.add('hidden'));
          frappeCards.forEach(card => card.classList.add('hidden'));
          fruitieCards.forEach(card => card.classList.add('hidden'));
        }
      

      
        coffeeLatteBtn.addEventListener('click', function() {
          hideAllCards();
          coffeeLatteCards.forEach(card => card.classList.remove('hidden'));
        });
      
        frappeBtn.addEventListener('click', function() {
          hideAllCards();
          frappeCards.forEach(card => card.classList.remove('hidden'));
        });
      
        fruitieBtn.addEventListener('click', function() {
          hideAllCards();
          fruitieCards.forEach(card => card.classList.remove('hidden'));
        });
      </script>
      </body>
      </html>
