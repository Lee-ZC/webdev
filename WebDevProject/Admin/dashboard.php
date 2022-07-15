<?php
session_start();
include("../server.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
    <!-- custom css file link  -->
   <link rel="stylesheet" href="Bootstrap/adminV2.css">

</head>
<style>
    
.products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   gap:2rem;
   justify-content: center;
}

.products .box-container .box{
   text-align: center;
   padding:2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
}

.products .box-container .box img{
   height: 25rem;
}

.products .box-container .box h3{
   margin:1rem 0;
   font-size: 2.0rem;
   color:var(--black);
}

.products .box-container .box .price{
   font-size: 1.5rem;
   color:var(--black);
}
</style>


<body style="background: linear-gradient(45deg,#00dbde,#fc00ff);">

   
 

<?php require_once ('headerAdminV2.php'); ?>
    
   <br>

  <div class="container2">

        <section class="products">


           <div class="box-container" >

               <form action="" method="post" style="width:80%;">
                 <div class="box"  style= "background-color: #fefbd8;">
                 
                 <h4> Total Registered Account </h4>
                 <br>
                 <?php
                 $query ="SELECT id FROM users ORDER BY id";
                 $query_run = mysqli_query($con,$query);
                 

                 
                 $row = mysqli_num_rows($query_run);
                 
                 
                 echo "<h1>$row</h1>"
                 ?>
                                                
                 </div>
              </form>            

           </div>

        </section>
      
  </div>

   
   <br>
   <br>

  <div class="container2">

        <section class="products">


           <div class="box-container" >

               <form action="" method="post" style="width:80%;">
                 <div class="box"  style= "background-color: #fefbd8;">
                 
                 <h4>Types of Product</h4>
                 <br>
                 <?php
                 $query ="SELECT id FROM products ORDER BY id";
                 $query_run = mysqli_query($con,$query);
                 
                 $row = mysqli_num_rows($query_run);
                 
                 echo "<h1>$row</h1>"
                 ?>
                                                
                 </div>
              </form>            

           </div>

        </section>
  </div>
   
   
   <br>

  <div class="container2">

        <section class="products">


           <div class="box-container" >

               <form action="" method="post" style="width:80%;">
                 <div class="box"  style= "background-color: #fefbd8;">
                 
                 <h4>Number of Transactions</h4>
                 <br>
                 <?php
                 $query ="SELECT id FROM `order` ORDER BY id";
                 $query_run = mysqli_query($con,$query);
                 
                 $row = mysqli_num_rows($query_run);
                 
                 echo "<h1>$row</h1>"
                 ?>
                                                
                 </div>
              </form>            

           </div>

        </section>
  </div>
    
   <br>
    

</body>
</html>