<?php 
session_start();

    $alert = " <script> alert('Wrong Username OR Email !') </script> " ;

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
                                    header("Location: index.php");
                                    die;
                                }
                            }
                    }

                    echo $alert;
            }else
            {
                    echo $alert;
            }
	}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Online Electronic Sales (OES)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<link rel="icon" href="Image/ZClogo.ico" />


<style>   

body  {
  background-color:  #b5b0b0;
}

button 
    {   
       background-color: #ffff80;   
       border-radius: 4px;
/*        width: 100%;  */
/*        color: orange;   */
/*        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   */
    }   
         
         
 form {   
/*        border: 3px solid #f1f1f1;   */
    }   
    
 input[type=text], input[type=password] {   
/*       width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;  */
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
    
 button:hover {   
        opacity: 0.7;   
    }   
    
    
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
.container {   
    padding: 25px;   
    background-color: lightblue;  
   }   


</style>   
   
<body>    
    
   <!-- Site navigation menu -->
   <?php require_once ('header.php'); ?>

    
    <br>
    <br>
    <center> <h1>  Login  </h1> </center>   
    <form method="post" >  
        <div class="container" style="text-align:center" >  
            <br>
            <br>
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <br>
            <br>
           
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <br>
            <br>
            <button type="submit" class="cancelbtn" >Login</button>   

            <button type="button" class="cancelbtn"><a href="register.php" style="text-decoration: none;"> Register</button>   

        </div>   
    </form>     

    <br>
    <br>
    <br>
    
    

</body>
</html>