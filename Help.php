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
        $email = filter_data($_POST['email']);  //sets email and password data
        $title = filter_data($_POST['title']);
        $message = filter_data($_POST['message']);
    }
    
    $insert_sql = "INSERT INTO admin_messages (message_title, message_body, message_sender, date_sent)"
                . "VALUES ('$title', '$message', '$email', NOW())";

    $query = mysqli_query($link, $insert_sql);
    
    echo "<sript>alert('Message successfully submitted.');</script>";
    
    header("Location:index.php");
    exit();
    
    //==========================================================================
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>