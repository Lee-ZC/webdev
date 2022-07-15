<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Bootstrap/headerV2.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
          <a href="index.php"><i class="uil uil-home"></i> Home</a>
          <a href="support.php"><i class="uil uil-compass"></i> Support</a>
<!--          <a href="cart.php"><i class="uil uil-compass"></i> Cart</a>
          <a href="feedback.php"><i class="uil uil-compass"></i> FeedBack</a>
          <a href="about.php"><i class="uil uil-info-circle"></i> About</a>-->
          <a href="loginV2.php"><i class="uil uil-document-layout-left"></i> Account</a>
          
          
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
    
    
    
    
   
            
    
            
            
          
    
    
    
  </script>

</body>
</html>
      