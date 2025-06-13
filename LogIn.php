<?php         
    //Nicholas Leong EDUV4551823

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

    $select_sql = "SELECT * FROM customer WHERE customer.email = '$email'";

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
                        mysqli_close($link);    //closes database connection
                        setcookie('user', $row["username"], time() + 86400/2, "/");    //expires after 12 hours
                        setCookie('customerID', $row["customer_id"], time() + 86400/2, "/");  //gets the customer_id
                        setCookie('password', $row["password"], time() + 86400/2, "/");
                        setCookie('phoneNumber', $row["phone_number"], time() + 86400/2, "/");
                        setCookie('email', $row["email"], time() + 86400/2, "/");
                        setCookie('selling', $row["is_selling"], time() + 86400/2, "/");
                        header("location:Homepage.php"); //go to homepage after log in
                        exit();
                    }else{
                       $alert = "<script>alert('Wrong password.');</script>";
                       echo $alert;
                       header("location:LogIn.html");
                       exit();
                    }
                }
            }
        }else{
            $alert = "<script>alert('Email or password is incorrect. Please try again.');</script>";
            echo $alert;
            header("location:LogIn.html");
            exit();
        }
        
    //==========================================================================

    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

