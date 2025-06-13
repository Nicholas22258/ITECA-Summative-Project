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
    
    $getMessages_sql = "SELECT message_id, message_title, message_body, message_sender, date_sent "
                        . "FROM admin_messages";

    $query = mysqli_query($link, $getMessages_sql);
    
    $messageArray = array();
    $retrievedMessages = false;
    
    if (mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            $messageArray[] = array($row["message_id"],
                                    $row["message_title"], 
                                    $row["message_body"], 
                                    $row["message_sender"], 
                                    $row["date_sent"]);
        }
        $retrievedMessages = true;
    }else{
        echo "<script>alert('Error: Unable to load messages');</script>";
    }
    
    if ($retrievedMessages){
        foreach ($messageArray as $messagePiece){
            $messageBody = filter_data($messagePiece[2]);
            echo "<div data-id = '{$messagePiece[0]}'>
                    <form action = 'DeleteMessage.php' method = 'GET'>
                        <b><label class = 'messages'>{$messagePiece[1]}</label></b><br>
                            <input type = 'text' id = 'title' name = 'title' value = '{$messagePiece[1]}' hidden>
                        <label class = 'messages'>$messageBody</label><br>
                            <input type = 'text' id = 'messageBody' name = 'messageBody' value = '$messageBody' hidden>
                        <label class = 'messages'>Sender: {$messagePiece[3]}</label><br>
                            <input type = 'text' id = 'messageSender' name = 'messageSender' value = '{$messagePiece[3]}' hidden>
                        <label class = 'messages'>Date sent: {$messagePiece[4]}</label><br>
                            <input type = 'text' id = 'dateSent' name = 'dateSent' value = '{$messagePiece[4]}' hidden>
                        <input type = 'submit' id = 'delete' name = 'delete' value = 'Delete'  onclick = 'return confirm('Are you sure you want to delete this message?');'>
                    </form>
                    <hr>
                 </div>";
        }
    }
    
    //==========================================================================
    
    function filter_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
}
?>