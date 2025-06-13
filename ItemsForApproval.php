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

    $getItems_sql = "SELECT items_for_approval.item_id, "
                    . "items_for_approval.item_name, "
                    . "items_for_approval.item_price, "
                    . "items_for_approval.link_to_item_picture, "
                    . "items_for_approval.item_description, "
                    . "customer.username, customer.email "
                . "FROM items_for_approval, customer "
                . "WHERE items_for_approval.customer_id = customer.customer_id";
    
    $query = mysqli_query($link, $getItems_sql);
    
    $itemsArray = array();
    
    if (mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            $itemsArray[] = array($row["item_id"],   //0
                $row["item_name"],                   //1
                $row["item_price"],                  //2
                $row["link_to_item_picture"],        //3
                $row["item_description"],            //4
                $row["username"],                    //5
                $row["email"]);                      //6
        }
    }else{
        $alert = "<script>alert('Error: Query unsuccessful');</script>";
        echo $alert;
    }
    
    foreach ($itemsArray as $item){
        echo "<div data-id = '{$item[0]}'>
                <form action = 'AcceptReject.php' method = 'POST' class = 'itemborder'>
                    <img id = 'image' src = '{$item[3]}' alt = '{$item[1]}' class = 'pic'>
                        <input type = 'image' id = 'imageInput' name = 'imageInput' src = '{$item[3]}' alt = '{$item[1]}' hidden>
                    <h4 id = 'itemName' class = 'information'>{$item[1]}</h4>
                        <input type = 'text' id = 'itemNameInput' name = 'itemNameInput' value = '{$item[1]}' hidden>
                    <label id = 'itemPrice' class = 'information'>R{$item[2]}</label>
                        <input type = 'text' id = 'itemPriceInput' name = 'itemPriceInput' value = '{$item[2]}' hidden>
                    <label id = 'itemDescription' class = 'information'>{$item[4]}</label>
                        <input type = 'text' id = 'itemDescrInput' name = 'itemDescrInput' value = '{$item[4]}' hidden>
                    <hr />
                    <label id = 'contact' class = 'information'>Contact: {$item[5]}</label>
                        <input type = 'text' id = 'contactInput' name = 'contactInput' value = '{$item[5]}' hidden>
                    <label id = 'email' class = 'information'>email: {$item[6]}</label>
                        <input type = 'text' id = 'emailInput' name = 'emailInput' value = '{$item[6]}' hidden>
                    <input type = 'submit' name = 'approve' value = 'Approve' class = 'approve' />
                    <input type = 'submit' name = 'reject' value = 'Reject' class = 'reject' />
                </form>
            </div>";
    }
?>