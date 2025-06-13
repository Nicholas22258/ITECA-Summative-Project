<?php
//Nicholas Leong EDUV4551823
    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $itemName = filter_data($_POST['itemName']);
        $itemPrice = filter_data($_POST['price']);
        $itemDescription = filter_data($_POST['description']);
        $itemID = filter_data($_COOKIE["currentItemID"]);
    }
        
    $update_sql = "UPDATE items_for_sale "
                . "SET item_name = '$itemName', item_price = '$itemPrice', item_description = '$itemDescription' "
                . "WHERE item_id = $itemID";

    $query = mysqli_query($link, $update_sql);
    
    if ($query){
        $alert = "<script>alert('Item successfully updated!');</script>";
        echo $alert;
        
        deleteCookies();

        header("Location: ProfilePage.php");
        exit;
    }else{
        $alert = "<script>alert('Item not updated successfully. Please try again or contact the administrator.');</script>";
        echo $alert;

        header("Location: UpdateItem.php");
        exit;
    }
    
    //==========================================================================
    
    function deleteCookies(){
        setcookie('currentItemID', "", time(), "/");//expires after 6 hours
        setcookie('currentItemName', "", time(), "/");
        setcookie('currentItemDescr', "", time(), "/");
        setcookie('currentItemPrice', "", time(), "/");
    }
    
    //==========================================================================
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>