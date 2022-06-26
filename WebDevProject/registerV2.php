<?php   
session_start();

    include ("server.php");
    
//    $alert = " <script> alert('Invalid Username OR Email !') </script> " ;
//    $result = '<div class = "alert alert-success" > Thank You! I will be in touch </div>';
      
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
            //something was posted
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            
            //Validate Duplicate Username 
            $duplicate = mysqli_query($con, "select * from users where username='$username' ");
            if (mysqli_num_rows($duplicate)>0)
            {
            header("Location: registerV2.php");
            $_SESSION['Duplicate_status'] = 'Username already used !';
            die;
            }
            
            //Validate username & email format 
            if( !is_numeric($username) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) > 5  )
            {
                    //save to database
                    $query = "insert into users (username,email,password) values ('$username','$email','$password')";
                    mysqli_query($con, $query);
                        
                    $_SESSION['status'] = 'Register Successfully';
                    $_SESSION['email'] = $email ; 
                    header("Location: loginV2.php");
                    
                    die;
            }else
            {
                    //echo $alert;
                    $_SESSION['status'] = 'Invalid Username OR Email !';
            }           
	}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--Icon-->
    <link rel="icon" href="Image/ZClogo.ico" /> 


<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
}
body {
  background: #fbf3ff;
} 
.container {
  position: absolute;
  max-width: 800px;
  height: 500px;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
} 
.myRightCtn {
  position: relative;
  background-image: linear-gradient(45deg, #f046ff, #9b00e8);
  border-radius: 25px;
  height: 100%;
  padding: 25px;
  color: rgb(192, 192, 192);
  font-size: 12px; 
  display: flex;
  justify-content: center;
  align-items: center;
}
.myLeftCtn {
  position: relative;
  background: #fff;
  border-radius: 25px;
  height: 100%;
  padding: 25px;
  padding-left: 50px;
}
.myLeftCtn header {
  color: blueviolet;
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 20px;
}

.row{
height: 100%;
} 

.myCard {
  position: relative;
  background: #fff;
  height: 100%;
  border-radius: 25px;
  -webkit-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
} 

.myRightCtn header {
  color: #fff;
  font-size: 44px;
}

.box {
  position: relative;
  margin: 20px;
  margin-bottom: 100px;
} 

.myLeftCtn .myInput {
  width: 230px;
  border-radius: 25px;
  padding: 10px;
  padding-left: 50px;
  border: none;
  -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
}

.myLeftCtn .myInput:focus {
  outline: none;
} 

.myForm {
  position: relative;
  margin-top: 50px;
} 

.myLeftCtn .butt {
  background: linear-gradient(45deg, #bb36fd, #9b00e8);
  color: #fff;
  width: 230px;
  border: none;
  border-radius: 25px;
  padding: 10px;
  -webkit-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
} 

.myLeftCtn .butt:hover {
  background: linear-gradient(45deg, #c85bff, #b726ff);
}

.myLeftCtn .butt:focus {
  outline: none;
} 

.myLeftCtn .fas {
  position: relative;
  color: #bb36fd;
  left: 36px;
} 

.butt_out {
  background: transparent;
  color: #fff;
  width: 120px;
  border: 2px solid#fff;
  border-radius: 25px;
  padding: 10px;
  -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
} 

.butt_out:hover {
  border: 2px solid#eecbff;
} 

.butt_out:focus {
  outline: none;
}
</style>
</head>

<body> 
    
    <!-- Site navigation menu -->
   <?php require_once ('headerV2.php'); ?>
    
    
    <br>
    <?php 

    if(isset($_SESSION['status'])){
        
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Invalid Username OR Email !',
        footer: '<a href="support.php">Why do I have this issue?</a>'
        })
        </script>
   
   <?php
        unset($_SESSION['status']);  
    }
    
    ?>
        
        
    <?php 
    
    if(isset($_SESSION['Duplicate_status'])){
        
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username already used !',
        footer: '<a href="support.php">Why do I have this issue?</a>'
        })
        </script>
   
   <?php
        unset($_SESSION['Duplicate_status']);  
    }
    
    
    ?>
   
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method ="post" action="registerV2.php" >
                            <h4>Create new account</h4>                         
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" id="username" name="username" required> 
                            </div>                 
                            
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" id="email" name="email" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" placeholder="Password"  name="password"  required> 
                            </div>                       
                            
                            <br>
                            <input type="submit" class="butt" value="CREATE ACCOUNT" name="reg_user">
                            <br>
                            <br>
                            <p>Already have an account ? <a href = "loginV2.php" style="text-decoration: none;">Sign in</a></p>
                            
                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
<!--                            <div class="box"><header>Hello !</header>-->
                             <img src="Image/registerV2.png" alt="Los Angeles" class="d-block" style="width:200%; height: 450px;">
<!--                            <p>Already have an account ? <a href = "login.php" style="text-decoration: none;">Sign in</a></p>
                                <input type="button" class="butt_out" value="Learn More"/>
                            </div>-->
                                
                    </div>
                </div>
            </div>
        </div>
</div>
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>

