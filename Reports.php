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

    $sqlMonthNow = "MONTH(NOW())";
    $newCustomers = "SELECT COUNT(date_created) AS DateCreated FROM customer WHERE MONTH(date_created) = $sqlMonthNow";
    $newItems = "SELECT COUNT(date_added) AS DateAdded FROM items_for_sale WHERE MONTH(date_added) = $sqlMonthNow";
    $newItemsForApproval = "SELECT COUNT(date_submitted) AS DateSubmitted FROM items_for_approval WHERE MONTH(date_submitted) = $sqlMonthNow";
    $countAdminMessages = "SELECT COUNT(date_sent) AS DateSent FROM admin_messages WHERE MONTH(date_sent) = $sqlMonthNow";    
    
    $queryNewCustomers = mysqli_query($link, $newCustomers);
    $queryNewItems = mysqli_query($link, $newItems);
    $queryNewItemsForApproval = mysqli_query($link, $newItemsForApproval);
    $queryNewAdminMessages = mysqli_query($link, $countAdminMessages);
    
    $queryNow = mysqli_query($link, "SELECT NOW() AS Date");
    
    $temp = "";
    
    if (mysqli_num_rows($queryNow) > 0){
        while ($row = mysqli_fetch_assoc($queryNow)){
            $count = $row["Date"];
            $temp = $temp."<label id = 'date' class = 'reports'>Date: $count</label><br><br>";
        }
    }
    
    if (mysqli_num_rows($queryNewCustomers) > 0){
        while ($row = mysqli_fetch_assoc($queryNewCustomers)){
            $count = $row["DateCreated"];
            $temp = $temp."<label id = 'numNewCustomersThisMonth' class = 'reports'>New Customers This Month: $count</label><br><br>";
        }
    }
    
    if (mysqli_num_rows($queryNewItems) > 0){
        while ($row = mysqli_fetch_assoc($queryNewItems)){
            $count = $row["DateAdded"];
            $temp = $temp."<label id = 'numNewItemsThisMonth' class = 'reports'>New Items This Month: $count</label><br><br>";
        }
    }
    
    if (mysqli_num_rows($queryNewItemsForApproval) > 0){
        while ($row = mysqli_fetch_assoc($queryNewItemsForApproval)){
            $count = $row["DateSubmitted"];
            $temp = $temp."<label id = 'numNewItemsForApprovedThisMonth' class = 'reports'>New Items For Approval This Month: $count</label><br><br>";
        }
    }
    
    if (mysqli_num_rows($queryNewAdminMessages) > 0){
        while ($row = mysqli_fetch_assoc($queryNewAdminMessages)){
            $count = $row["DateSent"];
            $temp = $temp."<label id = 'numNewMessagesThisMonth' class = 'reports'>New Messages This Month: $count</label><br><br>";
        }
    }
    
    if ($queryNewCustomers && $queryNewItems && $queryNewItemsForApproval && $queryNewAdminMessages){
        echo "$temp";
    }else{
        echo "<script>alert('Error in fetching reports');</script>";
    }
?>