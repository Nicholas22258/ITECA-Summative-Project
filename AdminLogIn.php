<?php

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $email = "";    //instanitate email and password
    $password = "";

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_data($_POST['email']);  //sets email and password data
        $password = filter_data($_POST['password']);
    }

    $select_sql = "SELECT * FROM administrator WHERE administrator.email = '$email'";

    $query = mysqli_query($link, $select_sql);//checks if email exists
    $alert = "";

    if (mysqli_num_rows($query) > 0){   //if the profile is found
        while ($row = mysqli_fetch_assoc($query)){  //for each relevant row with this email
            if ($row["is_customer"] === 0){ //checks if the account is still active
                $alert = "<script>alert('This profile has been disabled. Please email the administrator if this is a mistake.');</script>";
                echo $alert;
            }else{
                $encPassword = $row['password'];    //gets encrypted password from the database
                if (md5($password) === $encPassword){   //compares the passwords
//                                    echo "Log in Successfull";
                    mysqli_close($link);    //closes database connection
                    $_SESSION['user'] = $row['username'];  //creates session
                    header("location:Admin.php"); //go to homepage after log in
                    exit();
                }else{
                   $alert = "<script>alert('Wrong password.');</script>";
                   echo $alert; 
                   header("location:AdminLogIn.html");
                }
            }
        }
    }else{
        $alert = "<script>alert('Email or password is incorrect. Please try again.');</script>";
        echo $alert;
    }

    //==========================================================================
            
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

