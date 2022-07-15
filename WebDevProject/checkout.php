<?php
session_start();
include ('server.php');

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($con, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='index2.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
<link rel="stylesheet" href="Admin/Bootstrap/style.css">

</head>

<style>

</style>

<body>

<!-- Site navigation menu -->
<?php require_once ('headerLogoutV2.php'); ?>


   <div class="container">

        <section class="checkout-form">

           <h1 class="heading">complete your order</h1>

            <form action="" method="post">

            <div class="display-order">
               <?php
                  $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
                  $total = 0;
                  $grand_total = 0;
                  if(mysqli_num_rows($select_cart) > 0){
                     while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                     $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                     $grand_total = $total += $total_price;
               ?>
               <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
               <?php
                  }
               }else{
                  echo "<div class='display-order'><span>your cart is empty!</span></div>";
               }
               ?>
               <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
            </div>

               <div class="flex">
                  <div class="inputBox">
                     <span>your name</span>
                     <input type="text" placeholder="enter your name" name="name" required>
                  </div>
                  <div class="inputBox">
                     <span>your number</span>
                     <input type="number" placeholder="enter your number" name="number" required>
                  </div>
                  <div class="inputBox">
                     <span>your email</span>
                     <input type="email" placeholder="enter your email" name="email" required>
                  </div>
                  <div class="inputBox">
                     <span>payment method</span>
                     <select name="method">
                        <option value="cash on delivery" selected>cash on devlivery</option>
                        <option value="credit cart">credit cart</option>
                        <option value="paypal">paypal</option>
                     </select>
                  </div>
                  <div class="inputBox">
                     <span>address line 1</span>
                     <input type="text" placeholder="e.g. flat no." name="flat" required>
                  </div>
                  <div class="inputBox">
                     <span>address line 2</span>
                     <input type="text" placeholder="e.g. street name" name="street" required>
                  </div>
                  <div class="inputBox">
                     <span>city</span>
                     <input type="text" placeholder="e.g. mumbai" name="city" required>
                  </div>
                  <div class="inputBox">
                     <span>state</span>
                     <input type="text" placeholder="e.g. maharashtra" name="state" required>
                  </div>
                  <div class="inputBox">
                     <span>country</span>
                     <input type="text" placeholder="e.g. india" name="country" required>
                  </div>
                  <div class="inputBox">
                     <span>pin code</span>
                     <input type="text" placeholder="e.g. 123456" name="pin_code" required>
                  </div>
               </div>
               <input type="submit" value="order now" name="order_btn" class="btn">
            </form>

        </section>

    </div>



<!--    <div class="wrapper">
        <div class="container">
            <form action="">
                <h1>
                    <i class="fas fa-shipping-fast"></i>
                    Shipping Details
                </h1>
                <div class="name">
                    <div>
                        <label for="f-name">Name</label>
                        <input type="text" placeholder="enter your name" name="name" required>
                    </div>
                    <div>
                        <label for="l-name">Mobile Number</label>
                        <<input type="number" placeholder="enter your number" name="number" required>
                    </div>
                </div>
                <div class="street">
                    <label for="name">Email</label>
                    <input type="email" placeholder="enter your email" name="email" required>
                </div>
                 <div class="street">
                    <label for="name">Adress line 1</label>
                    <input type="text" placeholder="e.g. flat no." name="flat" required>
                </div>
                <div class="street">
                    <label for="name">Adress line 2</label>
                     <input type="text" placeholder="e.g. street name" name="street" required>
                </div>
                <div class="address-info">
                    <div>
                        <label for="city">City</label>
                       <input type="text" placeholder="e.g. Bayan Lepas" name="city" required>
                    </div>
                    <div>
                        <label for="city">State</label>
                        <input type="text" placeholder="e.g. Pulau Penang" name="state" required>
                    </div>
                    <div>
                        <label for="state">Country</label>
                       <input type="text" placeholder="e.g. Malaysia" name="country" required>
                    </div>
                    <div>
                        <label for="zip">Zip</label>
                        <input type="text" placeholder="e.g. 06000" name="pin_code" required>
                    </div>
                </div>
                <h1>
                    <i class="far fa-credit-card"></i> Payment Information
                </h1>
                <div class="cc-num">
                     <span>payment method</span>
                         <select name="method">
                            <option value="cash on delivery" selected>cash on devlivery</option>
                            <option value="credit cart">credit cart</option>
                            <option value="paypal">paypal</option>
                         </select>
                </div>
                <div class="btns">
                     <input type="submit" value="order now" name="order_btn" class="btn">
                    <button>Back to cart</button>
                </div>
            </form>
        </div>
    </div>-->

   
</body>
</html>