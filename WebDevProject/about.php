<!DOCTYPE html>
<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

/*body  {
  background-color:  #B97A6C;
}*/
body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
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

<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>
    

<!-- Site navigation menu -->
<?php require_once ('header.php'); ?>

<div class="about-section">
  <h1>About Us</h1>
  <p>Online Electronic Sales(OES) is a website that sell a variety of electronic products to the consumers.</p>
  <p>Through this website, it also can enhance the shopping experience of the consumers since the website has a user-friendly user interface.</p>
</div>

<br>

<!-- Back-To-Top -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>



<div class="row">
  <div class="column">
    
  </div>
    
  <div class="column" style="text-align:center">
    <div class="card" style="text-align:center">
        <br>
      <img src="Image/sohaicat.jpeg" alt="Mike" style="width:50%">
      <div class="container">
        <h2>Lee ZhiCheng</h2>
        <p class="title"> OES Website Director</p>
        <p>Trying To Do Better !</p>
        <p>zc@gmail.com</p>
        <p><button onclick="sweetalertclick()" class="button" style=" font-size: large;">Awsome</button></p>
      </div>
    </div>
  </div>
  

<script>
    
    function sweetalertclick(){
    Swal.fire(
    'Thank You!',
    'You are Awsome Too!',
    'success' )
    }
    
    
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


</script>

</body>
</html>
