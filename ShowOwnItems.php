<?php
// Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }
    
    $customerID = $_COOKIE["customerID"];
    
    if ($_COOKIE["selling"] == 1){
        $showItems_sql = "SELECT item_id, item_name, item_price, link_to_item_picture, item_description, date_added, customer_id "
                    ."FROM items_for_sale "
                    ."WHERE items_for_sale.customer_id = $customerID";

        $query = mysqli_query($link, $showItems_sql);

        $ownItemsArray = array();

        if (mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $ownItemsArray[] = array($row["item_id"],   //0
                    $row["item_name"],                      //1
                    $row["item_price"],                     //2
                    $row["link_to_item_picture"],           //3
                    $row["item_description"],               //4
                    $row["date_added"]);                    //5
            }
        }else{
            $alert = "<script>alert('Error: Query unsuccessful');</script>";
            echo $alert;
        }

        foreach ($ownItemsArray as $item){
            echo "<div data-id = '{$item[0]}'>
                    <form action = 'DeleteUpdateItem.php' method = 'POST' class = 'itemborder'>
                        <img src = '{$item[3]}' alt = '{$item[1]}' class = 'pic'>
                            <input type = 'image' src = '{$item[3]}' alt = '{$item[1]}' id = 'image' name = 'image' hidden>
                        <h4 class = 'information'>{$item[1]}</h4>
                            <input type = 'text' value = '{$item[1]}' id = 'itemName' name = 'itemName' hidden>
                        <label class = 'information'>R{$item[2]}</label>
                            <input type = 'text' value = '{$item[2]}' id = 'itemPrice' name = 'itemPrice' hidden>
                        <label class = 'information'>{$item[4]}</label>
                            <input type = 'text' value = '{$item[4]}' id = 'itemDescription' name = 'itemDescription' hidden>
                        <label class = 'information'>Date-added: {$item[5]}</label>
                            <input type = 'text' value = '{$item[5]}' id = 'dateAdded' name = 'dateAdded' hidden>
                        <input type = 'submit' id = 'delete' name = 'delete' value = 'Delete' class = 'delete' onclick = 'return confirm('Are you sure you want to delete this item?');'>
                        <input type = 'submit' id = 'update' name = 'update' value = 'Update' class = 'update'>
                    </form>
                </div>";
        }
    }
//      onclick='return confirm('Are you sure you want to delete this item?');'
    
?>