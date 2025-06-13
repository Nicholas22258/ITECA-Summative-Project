<?php
//Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //Database connection
    
    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $oldPassword = filter_data($_POST['oldPassword']);    //gets password details
        $newPassword = filter_data($_POST['newPassword']);
        $confirmPassword = filter_data($_POST['confirmPassword']);
    }
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $passwordsMatch = false;
    
    if (md5($oldPassword) === $_COOKIE["password"]){ //checks if current password is correct
        if ($newPassword === $confirmPassword){ //compares new and confirmation password
            $passwordsMatch = true;
            $newPassword = md5($confirmPassword);
        }else{
            echo "<script>alert('Error: New and confirm passwords do not match. Please try again.');</script>";
        }
    }else{
        echo "<script>alert('Error: Current password is incorrect. Please try again.');</script>";
    }
    
    if ($passwordsMatch){
        if (!isset($_COOKIE["customerID"])){
            echo "<script>alert('Error: Database entry not found. Please contact your administrator.');</script>";
        }else{
            $custID = $_COOKIE["customerID"];
            if ($custID < 10){  //adds a 0 to the digit to match with the database entry
                $custIDString = "0".strval($custID);
            }else{
                $custIDString = strval($custID);
            }
//        echo "<script>alert('$custIDString');</script>";
        }
        
        $updatePassword_sql = "UPDATE customer "
                            . "SET password = '$newPassword' "
                            . "WHERE customer_id = '$custIDString'";
        
        if (mysqli_query($link, $updatePassword_sql)){
            echo "<script>alert('Password updated successfully!');</script>";

            setcookie('password', $newPassword, time() + 86400/2, "/");    //resets password cookie

            header("location:ProfilePage.php");
        }else{
            echo "<script>alert('Error: Details failed to update. Please try again.');</script>";
        }
    }
?>