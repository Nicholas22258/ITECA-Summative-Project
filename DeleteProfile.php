<?php
//Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    if (array_key_exists('deleteAccount', $_POST)){
        $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

        if (!$link){//checks for connection
            die("Error: could not connect to database. ".mysqli_connect_error());
        }

        $customerID = $_COOKIE["customerID"];
        $username = $_COOKIE["user"];

        $delete_sql = "UPDATE customer "
                    . "SET is_customer = 0 "
                    . "WHERE customer_id = $customerID AND username = '$username'";

        $delete = mysqli_query($link, $delete_sql);

        echo "<script>alert('Account successfully deleted. You will be logged out and cookies will be deleted.')</script>";

        setcookie('user', $row["username"], time(), "/");    //expires now
        setCookie('customerID', $row["customer_id"], time(), "/");  
        setCookie('password', $row["password"], time(), "/");
        setCookie('phoneNumber', $row["phone_number"], time(), "/");
        setCookie('email', $row["email"], time(), "/");

        header("location: index.php"); //go to homepage after account deleteion
        exit();
    }
?>