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
            header("Location: register.php");
            $_SESSION['Duplicate_status'] = 'Username already used !';
            //die;
            }
            

            if( !is_numeric($username) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) > 5 )
            {
                    //save to database
                    $query = "insert into users (username,email,password) values ('$username','$email','$password')";
                    mysqli_query($con, $query);
                        
                    $_SESSION['status'] = 'Register Successfully';
                    header("Location: login.php");
                    
//                    die;
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Icon-->
<link rel="icon" href="Image/ZClogo.ico" /> 


<style>
/*body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}*/

* {
  box-sizing: border-box;
}

body  {
  background-color:  #b5b0b0;
}

/*Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
/*  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;*/
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
  border: 2px solid green;   
  box-sizing: border-box;  
}


/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


/* Set a style for the submit button */
.registerbtn {
  background-color: #5495f0;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius: 4px;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

</style>

</head>

<body>
<!-- Site navigation menu -->
<?php require_once ('header.php'); ?>

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

<form method ="post" action="register.php">
  
    <div class="container" style="text-align:center">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username"   required>
    <br>
    
    <br>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"    required>
    <br>

    <br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password"  name="password" required>
    <br>
    
    <hr>
    
    <button type="submit" class="registerbtn" name="reg_user">Register</button>
  </div>
  
    
  <div class="container signin" style="text-align:center">
    <br>
    <p>Already have an account ? <a href = "login.php" style="text-decoration: none;">Sign in</a></p>
  </div>
    
    
</form>

</body>
</html>
