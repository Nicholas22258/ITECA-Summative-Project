<?php
// Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

//==========================Upload Image========================================

    $target_dir = "items_maybe/";
    $target_file = $target_dir.basename($_FILES["imageInput"]["name"]);
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])){
        $check = getimagesize($_FILES["imageInput"]["tmp_name"]);
        if ($check !== false){
//            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }else{
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0; 
        }
    }
    
    // Check file size ( > 1MB)
    if ($_FILES["imageInput"]["size"] > 1000000){
        echo "<script>alert('Image is too large.');</script>";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg"){
        echo "<script>alert('Only JPG, JPEG and PNG images are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOK == 0){
        echo "<script>alert('Sorry, your image was not uploaded.');</script>";
    }else{
        if (move_uploaded_file($_FILES["imageInput"]["tmp_name"], $target_file)){
            echo "<script>alert('Image successfully uploaded.');</script>";
        }else{
            echo "<script>alert('Sorry, your image was not uploaded.');</script>";
        }
    }
    
//==========================POST Data===========================================
    
    if ($uploadOK == 1){
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

        if (!$link){//checks for connection
            die("Error: could not connect to database. ".mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $itemName = filter_data($_POST["itemName"]);
            $itemPrice = filter_data($_POST["price"]);
            $itemDescription = filter_data($_POST["description"]);
        }
        
        $customerID = $_COOKIE["customerID"];
        
        $insert_sql = "INSERT INTO items_for_approval (item_name, item_price, link_to_item_picture, item_description, date_submitted, customer_id) "
                        ."VALUES ('$itemName', $itemPrice, '$target_file', '$itemDescription', NOW(), $customerID)";
        
        $query = mysqli_query($link, $insert_sql);
        
        if ($query){
            echo "<script>alert('Upload Successfull! Your item's details have been sent to the administrators for approval. It will appear in your \"Your Items\" box when it is approved.');</script>";
            
            header("Location: ProfilePage.php", "_self");
            exit;
        }else{
            echo "<script>alert('Upload unsuccessfull. Please try again.');</script>";
        }
    }
    
//==============================================================================

    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>