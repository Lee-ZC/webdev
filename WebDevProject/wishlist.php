<?php 
session_start();
include("server.php");


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `wishlist` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      $_SESSION['status'] = 'Delete Successfully';
     
   }else{
      $_SESSION['status'] = 'Delete Successfully';
    
   };
};




?>



<!DOCTYPE html>
<html>
    
<head>
  <title> Wishlist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

 <!-- custom css file link  -->
<!--   <link rel="stylesheet" href="Admin/Bootstrap/style.css">-->
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#2980b9;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --dark-bg:rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid #999;
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

html{
   font-size:70%;
   overflow-x: hidden;
}

.container{
   max-width: 1200px;
   margin:0 auto;
    padding-bottom: 5rem; 
}




.btn,
.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color: var(--blue);
   color:var(--white);
   font-size: 1.7rem;
   padding:1.2rem 3rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;
}

.btn:hover,
.option-btn:hover,
.delete-btn:hover{
   background-color: var(--black);
}

.option-btn i,
.delete-btn i{
   padding-right: .5rem;
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   margin-top: 0;
   background-color: var(--red);
}




.products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   gap:1.5rem;
   justify-content: center;
}

.products .box-container .box{
   text-align: center;
   padding:2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
}

.products .box-container .box img{
   height: 25rem;
}

.products .box-container .box h3{
   margin:1rem 0;
   font-size: 2.5rem;
   color:var(--black);
}

.products .box-container .box .price{
   font-size: 2.5rem;
   color:var(--black);
}




body{
    background-color: #dee9ff;
}


</style>
</head>


<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>
    
<!-- Site navigation menu -->
<?php require_once ('headerLogoutV2.php'); ?>


    <?php 

    if(isset($_SESSION['status'])){
        
        ?>
        <script>
        Swal.fire(
            'Product has deleted ! ',
            '',
            'success'
          )
        </script>
   
   <?php
        unset($_SESSION['status']);  
    }    
    ?>
        
<br>
<br>
<br>
    <div class="container">

        <section class="products">

           <h1 style="text-align:center" > Wishlist</h1>
            <br>
           <div class="box-container">

              <?php

              $select_products = mysqli_query($con, "SELECT * FROM `wishlist`");
              if(mysqli_num_rows($select_products) > 0){
                 while($fetch_product = mysqli_fetch_assoc($select_products)){
              ?>

              <form action="" method="post">
                 <div class="box">
                    <img src="Admin/uploaded_img/<?php echo $fetch_product['image']; ?>"  style=" width: 290px; height: 290px;">
                    <h3><?php echo $fetch_product['name']; ?></h3>
                    <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                    <br>
                    <a href="wishlist.php?delete=<?php echo $fetch_product['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fa fa-trash" aria-hidden="true"></i> delete </a>
                 </div>
              </form>

              <?php
                 };
              };
              ?>

           </div>

        </section>

    </div>


</body>
</html>






