<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    
<head>
  <title>Online Electronic Sales (OES)</title>
  <link rel="stylesheet" href="Bootstrap/header.css">
  <link rel="stylesheet" href="Bootstrap/mystyle.css">
  
</head>


<!--Search bar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>

<!-- Site navigation menu -->
<div class="scrollmenu topnav" style="text-align:left" >
    <img src="Image/ZClogo.png"  width="45" height="40" alt="logo" style="margin-left: 1%;" >
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="support.php">Support</a>
    <a href="feedback.php">Feedback</a>
    <a href="about.php">About</a>
    <a href ="loginV2.php">Account</a>
    <div class="search-container">
        <form action="" method="post" target="_blank">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>


    <?php 
    $search_URL ="http://www.google.com/search?q=";
    
    
    if(isset($_POST['search'])) {
        $keywords = $_POST['search'];
        header("location: ".$search_URL.$keywords.'');
    }
    
    ?>



</body>
</html>