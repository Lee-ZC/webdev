<?php
session_start();
include("../server.php");

//if(isset($_POST['add_product'])){
//   $p_name = $_POST['p_name'];
//   $p_desc = $_POST['p_desc'];
//   $p_price = $_POST['p_price'];
//   $p_image = $_FILES['p_image']['name'];
//   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
//   $p_image_folder = 'uploaded_img/'.$p_image;
//
//   $insert_query = mysqli_query($con, "INSERT INTO `products`(`name`, `price`, `image` , `description`) VALUES ('$p_name','$p_price','$p_image','$p_desc');") or die('query failed');
//
//
//   if($insert_query){
//      move_uploaded_file($p_image_tmp_name, $p_image_folder);
//      $message[] = 'product add succesfully';
//      $_SESSION['AdminStatus'] = 'Added Successfully';
//   }else{
//      $message[] = 'could not add the product';
//      $_SESSION['AdminStatus2'] = 'Added Unsuccessfully';
//   }
//};

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

<body style="background: linear-gradient(45deg,#00dbde,#fc00ff);">

    <?php 

    if(isset($_SESSION['AdminStatus'])){
        
        ?>
        <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Product Added Successfully',
        showConfirmButton: false,
        timer: 1500
        })
        </script>
   
   <?php
        unset($_SESSION['AdminStatus']);  
    }
    
    ?>
        
        
 

<?php require_once ('headerAdminV2.php'); ?>

 
    <br>
    <br>
    <br>

    
   
    <form action="addProduct.php" method="post" class="add-product-form" enctype="multipart/form-data">
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h3 class="card-title mb-3" style="text-align: center;">Add New Product</h3>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="p_name" id="p_name" placeholder="Enter the product name" class="form-control" required> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> 
                                    <input type="number" name="p_price" id="p_price"min="0" placeholder="Enter the product price"  class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">                               
                                    <input type="file" name="p_image" id="p_image" accept="image/png, image/jpg, image/jpeg" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="p_desc"  id="p_desc"placeholder="Enter the product description" class="form-control" required> </div>
                        </div>
                    </div>

                    <br>
                    <input type="submit" value="Add  product" name="add_product"  class="btn btn-primary btn-block confirm-button">
                </div>
            </div>
        </div>
    </form>
    
    
    <br>
    <br>
    <br>
    <br>
    <br>

</body>
</html>