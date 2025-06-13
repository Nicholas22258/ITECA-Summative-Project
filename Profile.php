<?php
//Nicholas Leong EDUV4551823

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c");
    
    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_data($_POST['username']);    //password will be changed elsewhere
        $email = filter_data($_POST['email']);  //sets username, email and phone number data
        $phoneNumber = filter_data($_POST['phonenumber']);
    }
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $custID = "";
    
    if (!isset($_COOKIE["customerID"])){
        echo "<script>alert('Error: Database entry not found. Please contact your administrator.');</script>";
    }else{
        $custID = $_COOKIE["customerID"];
        if ($custID < 10){  //adds a 0 to the digit to match with the database entry
            $custIDString = "0".strval($custID);
        }else{
            $custIDString = strval($custID);
        }
    }
    
    $update_sql = "UPDATE customer "
                . "SET username = '$username', phone_number = '$phoneNumber', email = '$email' "
                . "WHERE customer_id = '$custIDString'";

    if (mysqli_query($link, $update_sql)){
        echo "<script>alert('Details updated successfully!');</script>";
        
        setcookie('user', $username, time() + 86400/2, "/");    //resets cookies
        setCookie('phoneNumber', $phoneNumber, time() + 86400/2, "/");
        setCookie('email', $email, time() + 86400/2, "/");
        
        header("location:ProfilePage.php");
    }else{
        echo "<script>alert('Error: Details failed to update. Please try again.');</script>";
    }
?>