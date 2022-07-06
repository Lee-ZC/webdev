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
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    
    <!-- custom css file link  -->
   <link rel="stylesheet" href="Bootstrap/adminV2.css">
   
   
   
   <!-- DataTable -->
<!--   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script type="text/javascript"  src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 

</head>





<body style="background: linear-gradient(45deg,#00dbde,#fc00ff);">

 <br>
 <br>
 <br>
 

<?php require_once ('headerAdminV2.php'); ?>
 
   <h2 style="text-align:center">  <i class="bx bx-message-square-detail nav_icon"></i> Transaction Record</h2>
   <br>
    
    
    
    <div class="container mb-3 mt-3" style="background: white;" >
        <table id="mydatatable" class="table table-striped table-bodered mydatatable" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User-Type</th>                 
                </tr>
            </thead>
            <tbody class="tbody">
               
            </tbody>
        </table>
    </div>
   
   
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
    
    <script src='main.js'></script>
    
    
   

</body>
</html>