<?php         
    //Nicholas Leong EDUV4551823

    ini_set('display_errors','Off');  //disables errors from showing
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);

    $username = "";
    $email = "";    //instanitate username, password, email, and phone number 
    $phoneNumber = "";
    $password = "";

    $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

    if (!$link){//checks for connection
        die("Error: could not connect to database. ".mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_data($_POST['username']);
        $password = filter_data($_POST['password']);
        $email = filter_data($_POST['email']);  //sets username, password, email and phone number data
        $phoneNumber = filter_data($_POST['phonenumber']);
    }

    $insert_sql = "INSERT INTO customer (username, password, phone_number, email, is_customer, is_selling, date_created) "
                . "VALUES ('$username', MD5('$password'), '$phoneNumber', '$email', 1, 0, NOW())";
    
    $check_sql = "SELECT username FROM customer WHERE username = '$username'";
    $check_query = mysqli_query($link, $check_sql);
    
    $alert = "";
    $alreadyExists = false;
    
    if (mysqli_num_rows($check_query) > 0){//checks if username already exists
        $alreadyExists = true;
    }

    if (!$alreadyExists){
        $query = mysqli_query($link, $insert_sql);
        if ($check_query){
            if (mysqli_num_rows($check_query) > 0){   //if the profile is found
                while ($row = mysqli_fetch_assoc($check_query)){  //for each relevant row with this email
                    setcookie('user', $username, time() + 86400/2, "/");    //expires after 12 hours

                    $select_sql = "SELECT * FROM customer WHERE customer_id = (SELECT max(customer_id FROM customer))";//get the last record to get customer_id
                    $query = mysqli_query($link, $select_sql);
                    if (mysqli_num_rows($query) > 0){
                        while ($rowID = mysqli_fetch_assoc($query)){
                            setCookie('customerID', $rowID["customer_id"], time() + 86400/2, "/");
                        }
                    }

                    setCookie('password', md5($password), time() + 86400/2, "/");
                    setCookie('phoneNumber', $phoneNumber, time() + 86400/2, "/");
                    setCookie('email', $email, time() + 86400/2, "/");
                    setCookie('selling', "false", time() + 86400/2, "/");

                    $alert = "<script>alert('Account successfully created.');</script>";
                    echo $alert;
                    header("location:index.php"); //go to homepage after Sidn up
                    exit();
                }
            }else{
                $alert = "<script>alert('Query unsuccessful.');</script>";
                echo $alert;
            }
        }else{
            $alert = "<script>alert('Error in creating account. Please try again.');</script>";
            echo $alert;
            header("location:SignUp.html");
            exit();
        }
    }else{
        $alert = "<script>alert('Username already exists. Please try another username.');</script>";
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

