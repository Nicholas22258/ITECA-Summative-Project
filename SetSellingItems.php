<?php
//Nicholas Leong EDUV4551823
    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c");
    
    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }
    
    $customerID = $_COOKIE["customerID"];
    $username = $_COOKIE["user"];
    
    $setSelling_sql = "UPDATE customer "
                    . "SET is_selling = 1 "
                    . "WHERE customer_id = $customerID AND username = '$username'";
    
    $query = mysqli_query($link, $setSelling_sql);
    
    setCookie('selling', 1, time() + 86400/2, "/");
?>