
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Admin</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="Bootstrap/headerAdmin.css">
  
</head>


   
<body id="body-pd">
    
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin OES</span> </a>
                <div class="nav_list"> 
                <a href="adminV2.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Add Product</span> </a> 
                <a href="adminMP.php" class="nav_link "> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Manage Product</span> </a>
                <a href="adminUser.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name"> Manage User-Types</span> </a> 
                <a href="TransactionRecord.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Transaction Record</span> </a> 
                <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a>                 
                <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> 
                </div>
            </div> 
            
            <a onclick="sweetalert()" class="nav_link" ><i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    
    
    
    

    
    
    
<script>
document.addEventListener("DOMContentLoaded", function(event) {
   
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

 // Your code to run since DOM is loaded and ready
});


function sweetalert(){
        Swal.fire({
        title: 'Are you sure to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href="../index.php";
          
        }
      })       
    }

</script>


</body>
</html>