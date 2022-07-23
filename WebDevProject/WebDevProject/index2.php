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


?>



<!DOCTYPE html>
<html>
<head>
  <title>Online Electronic Sales (OES)</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

<!--Icon-->
<link rel="icon" href="Image/ZClogo.ico" /> 



<style>    

filterDiv {
float: left;
/*background-color: #2196F3;
color: #ffffff;*/
width: 350px;
/*line-height: 100px;
text-align: center;
margin: 2px;*/
display: none;
}


.show {
  display: block;
}

.container {
  margin-top: 20px;
  overflow: hidden;
}

.card {
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: orange;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}


.card button:hover {
  opacity: 0.7;
}


/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  text-align: center
}

/* Remove extra left and right margins, due to padding */
.row {
    --bs-gutter-x: 1.rem;
    }

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  text-align: center
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 50%;
    display: block;
    margin-bottom: 20px;
    text-align: center
  }
}



/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}



 footer {
  text-align: center;
  padding: 3px;
  background-color: DarkSalmon;
  color: white;
}


body  {

  background: linear-gradient(to right, #b92b27, #1565c0);
}

p.ex1 {
  margin: 40px;
}

.dot {
cursor: pointer;
height: 8px;
width: 8px;
margin: 0 2px;
background-color: #bbb;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}
    
    
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

.star {
    COLOR: RED;
}




section{
   padding:2rem;
}

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
   font-size: 2.0rem;
   color:var(--black);
}

.products .box-container .box .price{
   font-size: 1.5rem;
   color:var(--black);
}

</style>




</head>

<body>

<!-- Site navigation menu -->
<?php require_once ('headerLogoutV2.php'); ?>

    <br>
    <br>
    <br>
    <?php 
    
    if(isset($_SESSION['username'])){
        
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['username']; ?>
        <?php echo ", Welcome To Online Electronic Sales (OES) "; ?>    
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php
            
    }
    
    ?>


<!-- Back-To-Top -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>




    <!-- Slide Show -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel" style=" top: -7px;" >


      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Image/announcement2.png" alt="Los Angeles" class="d-block" style="width:100%; height: 600px;">
        </div>
        <div class="carousel-item">
          <img src="Image/announcement1.png" alt="Chicago" class="d-block" style="width:100%; height: 600px;">
        </div>
        <div class="carousel-item">
          <img src="Image/announcement3.PNG" alt="New York" class="d-block" style="width:100%; height: 600px;">
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
      
    </div>



<br>
<br>
<br>



<center>
<h2>Latest Products <b>Arivals</b></h2>
 <hr width="15%" color="red"  size="5px" />
</center>


    

    <div class="container2" >

        <section class="products" >

           <div class="box-container" id="zc">
            
              <form action="" method="post" >
                  
                 <div class="box"  style= "background-color: #fefbd8;" >
                    
                 </div>
              
              </form>
             
           </div>

        </section>

    </div>





   <script src='product.js'></script>   
<br>
<br>
<br>
<br>
<br>
<br>


<footer style ="background: linear-gradient(45deg,#00dbde,#fc00ff);">
<p>
<a href = "Sitemap.php" style="text-decoration: none; ">Site Map</a><br>
© 2020 Copyright: OES.com<br>
</footer>






<script>
//Get the button
var mybutton = document.getElementById("myBtn");


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    
    

//Filter 
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

</script>





</body>
</html>