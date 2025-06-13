<?php
//Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);
    
    if (array_key_exists('delete', $_POST)){
        deleteItem();
    }else if (array_key_exists('update', $_POST)){
        updateItem();
    }
    
    //==========================================================================

    function deleteItem(){
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

        if (!$link){//checks for connection
            die("Error: could not connect to database. ".mysqli_connect_error());
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $itemName = filter_data($_POST['itemName']);
            $itemDescription = filter_data($_POST['itemDescription']);
        }

        $getLink_sql = "SELECT link_to_item_picture FROM items_for_approval WHERE item_name = '$itemName' AND item_description = '$itemDescription'";
        $linkQuery = mysqli_query($link, $getLink_sql);
        if (mysqli_num_rows($linkQuery) > 0){
            while ($row = mysqli_fetch_assoc($linkQuery)){
                $picture = $row["link_to_item_picture"];
            }
            if (file_exists($picture)){
                unlink($picture);//checks if the picture exists, then deletes it
            }
        }else{
            $alert = "<script>alert('Error: Picture removal unsuccessful. Please contact the administrator.');</script>";
            echo $alert;
        }

        $deleteItem_sql = "DELETE FROM items_for_sale WHERE item_name = '$itemName' AND item_description = '$itemDescription'";

        $query = mysqli_query($link, $deleteItem_sql);

        if ($query){
            $alert = "<script>alert('Item successfully removed!');</script>";
            echo $alert;

            header("Location: ProfilePage.php");
            exit;
        }
    }
    
    //==========================================================================
    
    function updateItem(){
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

        if (!$link){//checks for connection
            die("Error: could not connect to database. ".mysqli_connect_error());
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $currentItemName = filter_data($_POST['itemName']);
            $currentItemPrice = filter_data($_POST['itemPrice']);
            $currentItemDescription = filter_data($_POST['itemDescription']);
        }
        
        $getID_sql = "SELECT item_id FROM items_for_sale WHERE item_name = '$currentItemName' AND item_description = '$currentItemDescription'";
        $idQuery = mysqli_query($link, $getID_sql);
        if (mysqli_num_rows($idQuery) > 0){
            while ($row = mysqli_fetch_assoc($idQuery)){
                $currentID = $row["item_id"];
            }
        }
        
        setcookie('currentItemID', $currentID, time() + 21600, "/");//expires after 6 hours
        setcookie('currentItemName', $currentItemName, time() + 21600, "/");
        setcookie('currentItemDescr', $currentItemDescription, time() + 21600, "/");
        setcookie('currentItemPrice', $currentItemPrice, time() + 21600, "/");
        
        header("Location: UpdateItem.php");
        exit;
    }
    
    //==========================================================================
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>