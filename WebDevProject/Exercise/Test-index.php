<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Online Electronic Sales (OES)</title>
        <link rel="stylesheet" href="Bootstrap/mystyle.css">
    </head>
    
    <!--Search bar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="Image/ZClogo.ico" />
    
<!--     Font Awesome 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

     MDB 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    
     MDB 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js" > </script>-->

    
<body style="background-color:powderblue;">
    <!-- Site navigation menu -->
    <?php require_once ('header.php'); ?>
      
    <h2 style="text-align:center"> Announcement </h2>
       

    <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img_nature_wide.jpg"  width="500" height="333">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img_snow_wide.jpg"  width="500" height="333">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img_mountains_wide.jpg"  width="500" height="333">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
 
    <br>
    <br>
        
    <?php
    // put your code here
    $txt = "<h2> Electronic Product </h2>";
    echo "<center>$txt</center>";
    ?>
    
    <div id="myBtnContainer">
      <button class="btn active" onclick="filterSelection('all')"> Show all</button>
      <button class="btn" onclick="filterSelection('Phone')"> Phone </button>
      <button class="btn" onclick="filterSelection('laptop')"> Laptop </button>
      <button class="btn" onclick="filterSelection('earphone')"> Earphone </button>
      <button class="btn" onclick="filterSelection('watch')"> Smart Watch </button>
    </div>

    <div class="container">
      <div class="filterDiv Phone">Iphone 11
      <img src="img_snow_wide.jpg"  width="100" height="100">
      <button class="button"> Buy </button>
      </div>
      <div class="filterDiv earphone ">Airpods 1</div>
      <div class="filterDiv Phone">Iphone X</div>
      <div class="filterDiv earphone">Airpods Pro</div>
      <div class="filterDiv Phone ">Iphone 13
      <img src="img_nature_wide.jpg"  width="100" height="100">
      <button class="button"> Buy </button>
      </div>
      <div class="filterDiv earphone">HuaweiBuds</div>
      <div class="filterDiv laptop">Imac</div>
      <div class="filterDiv laptop">Asus ROG</div>
      <div class="filterDiv watch ">Asus Watch</div>
      <div class="filterDiv laptop">Imac pro</div>
      <div class="filterDiv Phone">Apple 2X</div>
      <div class="filterDiv watch">Apple Watch</div>
    </div>
    
    <br>
    <br>
    <br>
    
<!--    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
    </button>-->
    
    <footer>
  <p>© 2020 Copyright: MDBootstrap.com<br>
  <a href="mailto:hege@example.com">hege@example.com</a></p>
    </footer>
    
      
<script>
    
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " ";
    }

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



   
   
// Back-To-Top 
//Get the button
//let mybutton = document.getElementById("btn-back-to-top");
//
//// When the user scrolls down 20px from the top of the document, show the button
//window.onscroll = function() {
//    scrollFunction();
//};
//
//function scrollFunction() {
//    if (
//        document.body.scrollTop > 20 ||
//        document.documentElement.scrollTop > 20
//    ) {
//        mybutton.style.display = "block";
//    } else {
//        mybutton.style.display = "none";
//    }
//}
//// When the user clicks on the button, scroll to the top of the document
//mybutton.addEventListener("click", backToTop);
//
//function backToTop() {
//    document.body.scrollTop = 0;
//    document.documentElement.scrollTop = 0;
//}

   
    
</script>


</body>
</html>
