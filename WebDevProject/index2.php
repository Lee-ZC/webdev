<?php 
session_start();

    

    include("server.php");
	
	
    
?>



<!DOCTYPE html>
<html>
<head>
  <title>Online Electronic Sales (OES)</title>
  <link rel="stylesheet" href="Bootstrap/mystyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Icon-->
<link rel="icon" href="Image/ZClogo.ico" /> 



<style>
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
  background-color: #000;
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
  background-color:  #b5b0b0;
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
  left: 30px;
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
</style>




</head>

<body>

    
<!-- Site navigation menu -->
<?php require_once ('headerLogout.php'); ?>

    <?php 
    
    if(isset($_SESSION['username'])){
        
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['username']; ?>
        <?php echo ", Welcome To Online Electronic Sales (OES) "; ?>    
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<!--        <script>
        Swal.fire(
        'Good job!',
        'Welcome To Online Electronic Sales (OES)',
        'success'
          )
        </script>-->
   <?php
        unset($_SESSION['username']);
            
    }
    
    ?>


<!-- Back-To-Top -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>





<!-- Slide Show -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    
  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Image/announcement.png" alt="Los Angeles" class="d-block" style="width:80%">
    </div>
    <div class="carousel-item">
      <img src="Image/announcement.png" alt="Chicago" class="d-block" style="width:80%">
    </div>
    <div class="carousel-item">
      <img src="Image/announcement.png" alt="New York" class="d-block" style="width:80%">
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
<h2>Featured <b>Products</b></h2>
</center>


<div id="myBtnContainer" style="text-align:center">
    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
    <button class="btn" onclick="filterSelection('Phone')"> Phone </button>
    <button class="btn" onclick="filterSelection('laptop')"> Laptop </button>
    <button class="btn" onclick="filterSelection('earphone')"> Earphone </button>
    <button class="btn" onclick="filterSelection('watch')"> Smart Watch </button>
</div>

<br>


<div class="row" >
  <div class="column">
      
    <div class="Phone">
        <div class="card">
          <img src="Image/Iphoe13.jpg"  style="width:50%">
          <h3>Iphone 13</h3>
          <p>RM3899.00</p>
          <p>Our most advanced dual-camera system.</p>
          <button>Add to Cart</button>
        </div>
  </div>
      
  </div>

  <div class="column">
     <div class="Phone">
        <div class="card">
          <img src="Image/Iphone11.jpg"  style="width:50%;">
          <h3>Iphone 11</h3>
          <p>Some text</p>
          <p>Some text</p>
          <button>Add to Cart</button>
        </div>
     </div>
  </div>
  
  <div class="column">
     <div class=" Phone">
        <div class="card">
          <img src="Image/Iphone13pro.jpg"  style="width:50%">
          <h3>Iphone 13 pro max</h3>
          <p>Some text</p>
          <p>Some text</p>
          <button>Add to Cart</button>
        </div>
     </div>  
  </div>
    
   
   <div class="column">
     <div class=" laptop">   
        <div class="card">
          <img src="Image/Asus.png"  style="width:50%">
          <h3>Zenbook 14 UX425</h3>
          <p>Some text</p>
          <p>The beautiful new ZenBook 14 is more portable than ever. ZenBook 14 is perfect choice for an effortless on-the-go lifestyle.</p>
          <button>Add to Cart</button>
        </div>
    </div>   
  </div> 
  
</div>


<br>
<br>
<br>
    

<div class="row" >
  <div class="column">
    <div class=" earphone">  
        <div class="card">
          <img src="Image/airpods.png"  style="width:50%">
          <h3>Apple Airpods Pro</h3>
          <p>RM3899.00</p>
          <p>Our most advanced dual-camera system.</p>
          <button>Add to Cart</button>
        </div>
    </div>  
  </div>

    
  <div class="column">
    <div class=" Phone">  
        <div class="card">
          <img src="Image/samsungs22.png"  style="width:50%">
          <h3>Samsung S22</h3>
          <p>Some text</p>
          <p>Some text</p>
          <button>Add to Cart</button>
        </div>
    </div>  
  </div>
  
  <div class="column">
    <div class=" laptop">  
        <div class="card">
          <img src="Image/surfacelaptopgo.png"  style="width:50%">
          <h3>Microsoft Surface Laptop Go</h3>
          <p>Some text</p>
          <p>Some text</p>
          <button>Add to Cart</button>
        </div>
    </div> 
  </div>
    
  <div class="column">
     <div class=" watch">  
        <div class="card">
          <img src="Image/series3.png"  style="width:50%">
          <h3>Apple Watch Series 3</h3>
          <p>Some text</p>
          <p>Some text</p>
          <button>Add to Cart</button>
        </div>
    </div> 
  </div>
  
</div>

<br>
<br>
<br>



<footer>
<p>
<a href = "Sitemap.php" style="text-decoration: none;">Site Map</a><br>
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