<?php 
session_start();

    include("server.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
            //something was posted
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(!empty($username) && !empty($password) && !is_numeric($username))
            {

                //read from database
                $query = "select * from users where username = '$username' limit 1";
                $result = mysqli_query($con, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);

                        if($user_data['password'] === $password)
                        {                                  
                            $_SESSION['username'] =  $username;
                            header("Location: index2.php");

          
                        }
                    }
                }

                    $_SESSION['StatusInvalid'] = 'Invalid Username OR Email !';
            }else
            {
                    $_SESSION['StatusInvalid'] = 'Invalid Username OR Email !';
            }
	}
        
        

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<link rel="icon" href="Image/ZClogo.ico" />


<style>   
/* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #ecf0f3;
/*  background: linear-gradient(to right, #b92b27, #1565c0);*/


}

.wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
/*    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;*/
}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #03A9F4;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #039BE5;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4;
}

.wrapper a:hover {
    color: #039BE5;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}

    

</style>   
   
<body>    
    
   <!-- Site navigation menu -->
   <?php require_once ('headerV2.php'); ?>
   
   <?php 

    if(isset($_SESSION['StatusInvalid'])){
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username OR Email Not Found!',
        footer: '<a href="support.php">Why do I have this issue?</a>'
        })
        </script>

        
   
   <?php
        unset($_SESSION['StatusInvalid']);
            
    }
    ?>
   
   
    <?php 
    
    if(isset($_SESSION['status'])){
        
        ?>
<!--        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['status']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>-->

        <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Register Successful ! ',
        showConfirmButton: false,
        timer: 2500
      })
        </script>

       
   <?php
        unset($_SESSION['status']);
            
    }
    
    ?>

    <br>
    <br>
    
    
    <div class="wrapper">
        <div class="logo">
            <img src="Image/ZClogo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Online Electronic Sales (OES)
        </div>
        <form class="p-3 mt-3" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="registerV2.php">Sign up</a>
        </div>
    </div>

    <br>
    <br>
    <br>
    
    

</body>
</html>