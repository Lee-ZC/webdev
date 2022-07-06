<header class="header">

   <div class="flex">

      <a href="#" class="logo">Admin</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav>

      <?php
      include '../server.php';
      
      $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>
      
      
     <a href="../index.php" class="cart">Logout </a>

   </div>

</header>