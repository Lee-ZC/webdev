<!DOCTYPE html>
<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


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


body {
 background: linear-gradient(to right, #b92b27, #1565c0);
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

.row {
    --bs-gutter-x: 1.rem;
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
  <br>
  <p>Online Electronic Sales(OES) is a website that sell a variety of electronic products to the consumers.</p>
  <p>Through this website, it also can enhance the shopping experience of the consumers since the website has a user-friendly user interface.</p>
</div>

<br>



<div class="row">
  <div class="column">
    
  </div>
    
    
<!--  <div class="column" style="text-align:center">
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
  </div>-->

<br>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="Image/sohaicat.jpeg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Lee ZhiCheng</h5>
        
        <p class="card-text"><small class="text-muted">OES Website Director</small></p>
        <br>
        <p class="card-text">Although I am a cat but i will keep Trying To Do Better !</p>
        <br>
        <button type="button" class="btn btn-outline-info" onclick="sweetalertclick()" >Awesome</button>
      </div>
    </div>
  </div>
</div>

</div>

<script>
    
    function sweetalertclick(){
   
    Swal.fire({
    title: 'You are AWESOME too ! ',
    width: 600,
    padding: '3em',
    color: '#716add',
    background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
    backdrop: `
    rgba(0,0,123,0.4)
    url("https://sweetalert2.github.io/images/nyan-cat.gif")
    left top
    no-repeat
      `
    })

    }
    
    
   

</script>

</body>
</html>
