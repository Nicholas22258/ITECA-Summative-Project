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

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $messageBody = filter_data($_GET['messageBody']);
        $messageSender = filter_data($_GET['messageSender']);
    }

    $deleteMessage_sql = "DELETE FROM admin_messages WHERE message_body = '$messageBody' AND message_sender = '$messageSender'";

    $query = mysqli_query($link, $deleteMessage_sql);

    if ($query){
        $alert = "<script>alert('Message successfully deleted!');</script>";
        echo $alert;

        header("Location: Admin.php");
        exit;
    }else{
        $alert = "<script>alert('Message unsuccessfully deleted.');</script>";
        echo $alert;

        header("Location: Admin.php");
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