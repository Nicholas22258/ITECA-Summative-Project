<?php
//Nicholas Leong EDUV4551823
    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    if (array_key_exists('approve', $_POST)){
        approveItem();
    }else if (array_key_exists('reject', $_POST)){
        rejectItem();
    }
    
//==============================================================================
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
//==============================================================================
    function approveItem(){
        $itemName = filter_data($_POST["itemNameInput"]);
        $itemPrice = filter_data($_POST["itemPriceInput"]);
        $itemDescription = filter_data($_POST["itemDescrInput"]);
        $contact = filter_data($_POST["contactInput"]);
        $email = filter_data($_POST["emailInput"]);
        
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c");
        
        $getLink_sql = "SELECT link_to_item_picture FROM items_for_approval WHERE item_name = '$itemName' AND item_description = '$itemDescription'";
        $setLinkQuery = mysqli_query($link, $getLink_sql);
        if (mysqli_num_rows($setLinkQuery) > 0){
            while ($row = mysqli_fetch_assoc($setLinkQuery)){
                $oldLink = $row["link_to_item_picture"];
            }
        }else{
            $alert = "<script>alert('Error: Query unsuccessful');</script>";
            echo $alert;
        }
        
        $extension = pathinfo($oldLink, PATHINFO_EXTENSION);
        $tempLink = "images_items/$itemName.".$extension;
        rename($oldLink, $tempLink);

        $insert_sql = "INSERT INTO items_for_sale (item_name, item_price, link_to_item_picture, item_description, date_added, customer_id) "
                    . "VALUES ('$itemName', $itemPrice, '$tempLink', '$itemDescription', NOW(), (SELECT customer_id FROM customer WHERE username = '$contact' AND email = '$email'))";
        

        $connect = mysqli_query($link, $insert_sql);
        
        $delete_sql = "DELETE FROM items_for_approval WHERE item_name = '$itemName' AND item_description = '$itemDescription'";
        
        $delete = mysqli_query($link, $delete_sql);
        
        header("Location: Admin.php");
        exit();
    }
    
//==============================================================================
    
    function rejectItem(){
        $itemName = filter_data($_POST("itemName"));
        $itemDescription = filter_data($_POST("itemDescription"));
        
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c");
        
        $getLink_sql = "SELECT link_to_item_picture FROM items_for_approval WHERE item_name = '$itemName' AND item_description = '$itemDescription'";
        
        $query = mysqli_query($link, $getLink_sql);
        
        if (mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $link = $row["link_to_item_picture"];
            }
            if (file_exists($link)){
                    unlink($link);
                    echo "File Successfully Delete."; 
                }else{
                    echo "File does not exist"; 
                }
        }else{
            $alert = "<script>alert('Error: Removal unsuccessful');</script>";
            echo $alert;
        }
        
        $delete_sql = "DELETE FROM items_for_approval WHERE item_name = '$itemName' AND item_description = '$itemDescription'";
        
        $delete = mysqli_query($link, $delete_sql);
        
        header("Location: Admin.php");
        exit();
    }
    

?>