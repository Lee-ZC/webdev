<?php 
session_start();
include("server.php");


if (isset($_POST['update'])){
    
    //$id = $_POST['id'];
    $username = $_POST['UpdateUserName'];
    $email = $_POST['UpdateEmail'];
   
    
    
    
    //Update data from database 
    $query = "UPDATE `users` SET username= '$_POST[UpdateUserName]', email = '$_POST[UpdateEmail]', password = '$_POST[UpdatePass]' WHERE username ='$_POST[UpdateUserName]'";
    $query_run = mysqli_query($con,$query);
    
    
    
    if ($query_run)
    {
        $_SESSION['username'] =  $username;
        $_SESSION['email'] =  $email;
        $_SESSION['Updatestatus'] = 'Update Successfully';
        
    }
    
}
?>



<!DOCTYPE html>
<html>
    
<head>
  <title>Setting Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


<style>

.row {
--bs-gutter-x: 1.rem;
}

body{
    background-color: #dee9ff;
}

.registration-form{
	padding: 10px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 20px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
	text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}

</style>
</head>


<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>
    
<!-- Site navigation menu -->
<?php require_once ('headerLogoutV2.php'); ?>

<br>



<?php 

    if(isset($_SESSION['Updatestatus'])){
        
        ?>
        <script>
        Swal.fire(
            'Update Successfully ! ',
            'Password have been updated !',
            'success'
          )
        </script>
   
   <?php
        unset($_SESSION['Updatestatus']);  
    }
    
    ?>
        
        
        
<br>
<br>

<div align="center" style= "background: linear-gradient(45deg,#00dbde,#fc00ff);" >
    <hr>
    <h3>Setting User Profile</h3>
    <hr>
</div>
    


     <div class="registration-form">
        <form method="post" action ="">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>           
            <div class="form-group">
                <input type="text" class="form-control item" name="UpdateUserName"   required placeholder=<?php echo $_SESSION['username']; ?> >
            </div>
            <div class="form-group">
                <input type="email" class="form-control item" name="UpdateEmail"   required  placeholder=<?php echo $_SESSION['email']; ?> >
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="UpdatePass"  placeholder="Enter new password" required >
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-block create-account" name="update" value="Update">
            </div>
        </form>
<!--         <div class="social-media">
        </div>-->
    </div>

</body>
</html>






