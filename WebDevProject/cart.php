<?php
session_start();
include './server.php';


    if(isset($_POST['update_update_btn'])){
       $update_value = $_POST['update_quantity'];
       $update_id = $_POST['update_quantity_id'];
       $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
       if($update_quantity_query){
          header('location:cart.php');
       };
    };

    if(isset($_GET['remove'])){
       $remove_id = $_GET['remove'];
       mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
       header('location:cart.php');
    };

    if(isset($_GET['delete_all'])){
       mysqli_query($con, "DELETE FROM `cart`");
       header('location:cart.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="Admin/style.css">

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

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

.btn,
.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   height: 50px;
   text-align: center;
   background-color: var(--blue);
   color:var(--white);
   font-size: 1.0rem;
   padding:0.8rem 3rem;
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


.shopping-cart table{
   text-align: center;
   width: 100%;
}

.shopping-cart table thead th{
   padding:1rem;
   font-size: 1rem;
   color:var(--white);
   background-color: var(--black);
}

.shopping-cart table tr td{
   border-bottom: var(--border);
   padding:1rem;
   font-size: 1rem;
   color:var(--black);
}

.shopping-cart table input[type="number"]{
   border: var(--border);
   padding:1rem 1rem;
   font-size: 1rem;
   color:var(--black);
   width: 5rem;
}

.shopping-cart table input[type="submit"]{
   padding:.5rem 1.5rem;
   cursor: pointer;
   font-size: 1rem;
   background-color: var(--orange);
   color:var(--white);
}

.shopping-cart table input[type="submit"]:hover{
   background-color: var(--black);
}

.shopping-cart table .table-bottom{
   background-color: var(--bg-color);
}

.shopping-cart .checkout-btn{
   text-align: center;
   margin-top: 1rem;
}

.shopping-cart .checkout-btn a{
   display: inline-block;
   width: auto;
}

.shopping-cart .checkout-btn a.disabled{
   pointer-events: none;
   opacity: .5;
   user-select: none;
   background-color: var(--red);
}

    
</style>
<body>

<?php require_once './headerLogoutV2.php'; ?>

<div class="container">

<section class="shopping-cart">
    
    <br>
    <br>
   <i style="font-size:30px; padding: 20px" class="fa">&#xf07a; Shopping Cart </i>

   <br>

   <table style="background: antiquewhite;">

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="Admin/uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format((float)$fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format((float)$fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           (float)$grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="index2.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
    
    
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>