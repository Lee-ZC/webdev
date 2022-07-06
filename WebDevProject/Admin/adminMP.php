<?php
session_start();
include("../server.php");


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      $_SESSION['AdminStatus3'] = 'Added Unsuccessfully';     
      
   }else{
     
      $_SESSION['AdminStatus3'] = 'Added Unsuccessfully';
   };
};



if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($con, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);      
      header('location:adminMP.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:adminMP.php');
   }

}

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

   
   

</head>

<style>
:root{
   --blue:#2980b9;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --dark-bg:rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid #999;
}


.btn,
.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color: var(--blue);
   color:var(--white);
   font-size: 1.2rem;
   padding:1.2rem 3rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;
}

.btn:hover,
.option-btn:hover,
.delete-btn:hover{
   background-color: var(--black);
}

.option-btn i,
.delete-btn i{
   padding-right: .5rem;
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   margin-top: 0;
   background-color: var(--red);
}    


.display-product-table table{
   width: 100%;
   text-align: center;
}

.display-product-table table thead th{
   padding:1.5rem;
   font-size: 1.5rem;
   background-color: var(--black);
   color:var(--white);
}

.display-product-table table td{
   padding:1.5rem;
   font-size: 1.5rem;
   color:var(--black);
}

.display-product-table table td:first-child{
   padding:0;
}

.display-product-table table tr:nth-child(even){
   background-color: var(--bg-color);
}

.display-product-table .empty{
   margin-bottom: 2rem;
   text-align: center;
   background-color: var(--bg-color);
   color:var(--black);
   font-size: 2rem;
   padding:1.5rem;
}


.edit-form-container{
   position: fixed;
   top:0; left:0;
   z-index: 1100;
   background-color: var(--dark-bg);
/*   padding:2rem;*/
   display: none;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   width: 100%;
}

.edit-form-container form{
   width: 50rem;
   border-radius: .5rem;
   background-color: var(--white);
   text-align: center;
   padding:2rem;
}

.edit-form-container form .box{
   width: 100%;
   background-color: var(--bg-color);
   border-radius: .5rem;
   margin:1rem 0;
   font-size: 1.5rem;
   color:var(--black);
   padding:1.2rem 1.0rem;
   text-transform: none;
}


    
    
</style>

<body >
    
    <?php 

    if(isset($_SESSION['AdminStatus3'])){
        
        ?>
        <script>
        Swal.fire(
            'Product Deleted !',
            '',
            'success'
        )
        </script>
   
   <?php
        unset($_SESSION['AdminStatus3']);  
    }
    
    ?>

       
<?php require_once ('headerAdminV2.php'); ?>
    

 
   <br>
   <h1 style="text-align:center">  <i class="fas fa-tasks"></i> Manage Products</h1>
   <br>
    
    <div class="container">
    
        <section class="display-product-table">

        <table>

           <thead>
              <th>Product image</th>
              <th>Product name</th>
              <th>Product price</th>
              <th>Action</th>
           </thead>

           <tbody>
              <?php

                 $select_products = mysqli_query($con, "SELECT * FROM `products`");
                 if(mysqli_num_rows($select_products) > 0){
                    while($row = mysqli_fetch_assoc($select_products)){
              ?>

              <tr>
                 <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                 <td><?php echo $row['name']; ?></td>
                 <td>$<?php echo $row['price']; ?>/-</td>
                 <td>
                    <a href="adminMP.php?delete=<?php echo $row['id']; ?>" class="delete-btn"  onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                    <a href="adminMP.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                 </td>
              </tr>

              <?php
                 };    
                 }else{
                    echo "<div class='empty'>no product added</div>";
                 };
              ?>
           </tbody>
        </table>

        </section>




        <section class="edit-form-container">

            <?php

            if(isset($_GET['edit'])){
               $edit_id = $_GET['edit'];
               $edit_query = mysqli_query($con, "SELECT * FROM `products` WHERE id = $edit_id");
               if(mysqli_num_rows($edit_query) > 0){
                  while($fetch_edit = mysqli_fetch_assoc($edit_query)){
            ?>

            <form action="" method="post" enctype="multipart/form-data">
               <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
               <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
               <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
               <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
               <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
               <input type="submit" value="update the prodcut" name="update_product" class="btn">
               <input type="reset" value="cancel" id="close-edit" class="option-btn">
            </form>

            <?php
                     };
                  };
                  echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
               };
            ?>

        </section>

    </div>


<script>
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};


document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = 'adminMP.php';
}; 
    
</script>

</body>
</html>