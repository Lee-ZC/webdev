<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    
<head>
  <title>Online Electronic Sales (OES)</title>
  <link rel="stylesheet" href="Bootstrap/header.css">
  <link rel="stylesheet" href="Bootstrap/mystyle.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<style>

.dropdown {
  float: right;
  overflow: hidden;
  position: relative;
  left: -1040px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: grey;
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #d6d2d2;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
} 
</style>
</head>



<!--Search bar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>
<!-- Site navigation menu -->
<div class="scrollmenu topnav" style="text-align:left" >
    <img src="Image/ZClogo.png"  width="45" height="40" alt="logo" style="margin-left: 1%;" >
    <a href="index2.php">Home</a>
    <a href="#">Cart</a>
    <a href="#contact">Support</a>
    <a href="#about">About</a>
    <div class="dropdown">
        <button class="dropbtn">Profile
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="setting.php">Setting</a>
          <a onclick="sweetalert()">Logout</a>
        </div>
  </div> 
    <div class="search-container" style="position: relative; right: -97px ;">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>



<script>
    
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
