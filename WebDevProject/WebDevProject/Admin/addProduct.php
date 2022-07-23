<?php 
session_start();

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../API/config/database.php';
include_once '../API/objects/products.php';
  
$database = new database();
$db = $database->getConnection();
  
$product = new Product($db);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST['p_name']) || !empty($_POST['p_price']) || !empty($_POST['p_image']) || !empty($_POST['p_desc'])
        ){
        $product->name = $_POST['p_name'];
        $product->price = $_POST['p_price'];
        $product->image = $_POST['p_image'];
        $product->description = $_POST['p_desc'];
     
        
        // create the product
        if($product->create()){

            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Product was created."));

            header("Location: ../Admin/adminV2.php", TRUE, 301);
            $_SESSION['AdminStatus'] = 'Added Successfully';
        }
  
        // if unable to create the product, tell the user
        else{

            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create product."));
        }
    }
    // tell the user data is incomplete
    else{

        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
    }
}