<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Bootstrap/headerV2.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<!--Search bar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

  <header>
    <div class="nav-bar">
      <img src="Image/ZClogo.png"  width="45" height="40" alt="logo" style="margin-left: 5%;" >

      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="index2.php"><i class="uil uil-home"></i> Home</a>
          
          <?php
          include("server.php");

            $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

            ?>
          <a href="cart.php" class="cart">Cart <span><?php echo $row_count; ?></span> </a>
          <a href="wishlist.php"><i class="uil uil-compass"></i> Wishlist</a>              
          <a href="feedback.php"><i class="uil uil-compass"></i> FeedBack</a>
          <a href="about.php"><i class="uil uil-info-circle"></i> About</a>
          <a href="setting.php"><i class="uil uil-info-circle"></i> Setting</a>
          <a onclick="sweetalert()"><i class="uil uil-document-layout-left"></i> Logout</a>
          
          
          <div class="search-container" style= "float: right;">
            <form action="" method="post" target="_blank">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit" style=" left: 10; margin: right; margin-right: 20px; float: right;"> <i class="fa fa-search"></i> </button>
            </form>
          </div>
          
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
  </header>

  
   <?php 
    $search_URL ="http://www.google.com/search?q=";
    
    
    if(isset($_POST['search'])) {
        $keywords = $_POST['search'];
        header("location: ".$search_URL.$keywords.'');
    }
    
    ?>
 

  <script>
    //Javacript for the scroll indicator bar
    window.addEventListener("scroll", () => {
      const indicatorBar = document.querySelector(".scroll-indicator-bar");

      const pageScroll = document.body.scrollTop || document.documentElement.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const scrollValue = (pageScroll / height) * 100;

      indicatorBar.style.width = scrollValue + "%";
    });

    //Responsive navigation menu toggle
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      navigation.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
      navigation.classList.remove("active");
    });
    

    
    
    function sweetalert(){
        Swal.fire({
        title: 'Are you sure to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {         
          window.location.href="index.php";
          
        }
      })       
    }
    
    

  </script>

</body>
</html>
      