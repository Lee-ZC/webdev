<?php 

session_start();

include("server.php");

    $id ="";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
    }
    
    $sql_query = "SELECT * FROM `products` WHERE id = '$id'";
    
    $result = $con -> query($sql_query) ;
    
    
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
    
    
    if(isset($_POST['add_to_wishlist'])){

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
       

        $select_cart = mysqli_query($con, "SELECT * FROM `wishlist` WHERE name = '$product_name'");

        if(mysqli_num_rows($select_cart) > 0){
          $_SESSION['status2'] = 'Delete Successfully';
        }else{
           $insert_product = mysqli_query($con, "INSERT INTO `wishlist`(name, price, image) VALUES('$product_name', '$product_price', '$product_image')");
          $_SESSION['status2'] = 'Delete Successfully';
        }

     }
    

?>

<!DOCTYPE html>
<html lang="en">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  
  
  <style>
    body {
/*      font-family: 'open sans';*/
      overflow-x: hidden; 
      background: linear-gradient(45deg,#00dbde,#fc00ff);
    }

    img {
      max-width: 100%; }

    .preview {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
          -ms-flex-direction: column;
              flex-direction: column; }
      @media screen and (max-width: 996px) {
        .preview {
          margin-bottom: 20px; } }

    .preview-pic {
      -webkit-box-flex: 1;
      -webkit-flex-grow: 1;
          -ms-flex-positive: 1;
              flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
      border: none;
      margin-top: 15px; }
      .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; }
        .preview-thumbnail.nav-tabs li img {
          max-width: 100%;
          display: block; }
        .preview-thumbnail.nav-tabs li a {
          padding: 0;
          margin: 0; }
        .preview-thumbnail.nav-tabs li:last-of-type {
          margin-right: 0; }

    .tab-content {
      overflow: hidden; }
      .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
                animation-name: opacity;
        -webkit-animation-duration: .3s;
                animation-duration: .3s; }

    .card {
      margin-top: 50px;
      background: #eee;
      padding: 3em;
      line-height: 1.5em; }

    @media screen and (min-width: 997px) {
      .wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex; } }

    .details {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
          -ms-flex-direction: column;
              flex-direction: column; }

    .colors {
      -webkit-box-flex: 1;
      -webkit-flex-grow: 1;
          -ms-flex-positive: 1;
              flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
      text-transform: UPPERCASE;
      font-weight: bold; }

    .checked, .price span {
      color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
      margin-bottom: 15px; }

    .product-title {
      margin-top: 0; }

    .size {
      margin-right: 10px; }
      .size:first-of-type {
        margin-left: 40px; }

    .color {
      display: inline-block;
      vertical-align: middle;
      margin-right: 10px;
      height: 2em;
      width: 2em;
      border-radius: 2px; }
      .color:first-of-type {
        margin-left: 20px; }

    .add-to-cart, .like {
      background: #ff9f1a;
      padding: 1.2em 1.5em;
      border: none;
      text-transform: UPPERCASE;
      font-weight: bold;
      color: #fff;
      -webkit-transition: background .3s ease;
              transition: background .3s ease; }
      .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    .not-available {
      text-align: center;
      line-height: 2em; }
      .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; }

    .orange {
      background: #ff9f1a; }

    .green {
      background: #85ad00; }

    .blue {
      background: #0076ad; }

    .tooltip-inner {
      padding: 1.3em; }

    @-webkit-keyframes opacity {
      0% {
        opacity: 0;
        -webkit-transform: scale(3);
                transform: scale(3); }
      100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1); } }

    @keyframes opacity {
      0% {
        opacity: 0;
        -webkit-transform: scale(3);
                transform: scale(3); }
      100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1); } }

.span {
      color: #ff9f1a; }

.product-description {
      margin-bottom: 15px; }
  </style>

  <body>
      
    <!-- Site navigation menu -->
    <?php require_once ('headerLogoutV2.php'); ?>

        
        
    <?php 
        if(isset($_SESSION['status2'])){

            ?>
            <script>
            Swal.fire(
                'Added To Wishlist ! ',
                '',
                'success'
              )
            </script>

        <?php
            unset($_SESSION['status2']);  
        }    
    ?>
    
    <br>
    <br>
    <br>
    <br>

      
	<div class="container">
		<div class="card" >
			<div class="container-fliud">
				<div class="wrapper row">
                                     <?php 
                                                    if($result ->num_rows > 0){
                                                       while($fetch_product =  $result -> fetch_assoc( )){                                              
                                                   ?>
                                    <form action="" method="post">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                                                  
						  <div class="tab-pane active" id="pic-1"  name="product_image"><img src="Admin/uploaded_img/<?php echo $fetch_product['image']; ?>"  style=" width: 290px; height: 290px;"></div>	
                                                   
						</div>												
					</div>
                                    
                                    
					<div class="details col-md-6">
						<h3 class="product-title"  name="product_name" ><input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>"> <?php echo $fetch_product['name']; ?></h3>
						
                                               <p class="product-description">
                                               <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>"> <?php echo $fetch_product['description']; ?> 
                                               
                                               </p>
                                                
						<h4 class="price"  name="product_price">current price: <span> <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>"></span><span> <?php echo $fetch_product['price']; ?></span></h4>
                                                
						
                                                
						<div class="action">							
                                                        <input type="submit" class="btn" value="add to cart" name="add_to_cart" style= "background: yellow;" >  
                                                        <br>
                                                        <br>
                                                        <span class="fa fa-heart" style= "color: orange;"> </span>
                                                        <input type="submit" class="btn"  class="fa fa-heart" value="wishlist" name="add_to_wishlist" style= "background: orange;">
                                                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
						</div>
					</div>
                                    
                                    </form>
                                    <?php
                                        };
                                     };
                                     ?>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
