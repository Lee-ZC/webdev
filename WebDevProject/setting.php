<?php 
session_start();

    include("server.php");
    
    
   
    
    
?>



<!DOCTYPE html>
<html>
    
<head>
  <title>Online Electronic Sales (OES)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<style>

.row {
    --bs-gutter-x: 1.rem;
    }

</style>
</head>


<!--website icon -->
<link rel="icon" href="Image/ZClogo.ico" />


<body>
    
<!-- Site navigation menu -->
<?php require_once ('headerLogout.php'); ?>

<br>
<div align="center">
    <hr>
    <h3>Update User Information</h3>
    <hr>
    
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="post">
                <?php
                
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    
                //something was posted
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                
                $currentUser  = $_SESSION['username'] ;
                $sql = "SELECT * FROM users WHERE username = '$currentUser' ";

                 $gotResults = mysqli_query($con,$sql);

                 if ($gotResults){
                    if(mysqli_num_rows($gotResults)>0){
                         while($row = mysqli_fetch_array($gotResults)){
                            print_r($row['username']);
                         }
                     }

                }



                }
                
                
                ?>
                
                
                
                <div class="form-group">
                    <input type="text" name="UpdateUserName"class="form-comtrol" value="">
                </div>
                <br>
                <div class="form-group">
                    <input type="email" name="UpdateEmail"class="form-comtrol" value="">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="UpdatePass"class="form-comtrol" value="">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <input type="submit" name="Update"class="btn btn-info" value="Update">
                </div>
            </form>   
        </div>
    </div>
    
    
</div>




</body>
</html>
