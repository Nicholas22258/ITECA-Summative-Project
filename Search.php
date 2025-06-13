<!DOCTYPE html>
<!--Nicholas Leong EDUV4551823-->
<html dir = "ltr" lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NickC2C - Home</title>
        <link rel = "stylesheet" href = "Homepage_CSS.css">
        <link rel = "stylesheet" href = "Header_And_Footer.css">
                
        <script type = "text/javascript" src = "LogIn.js"></script>
        
    </head>
    <body>
        <header>
            <img src = "images_main/Logo.png" alt = "Nick C2C Logo" id = "logo" onclick = "window.open('index.php', '_self')">
            <div id = "buy_sell">
                <label id = "buy" onclick = "window.open('index.php', '_self')">Buy</label>
                <label id = "sell" onclick = "whichScreen()">Sell</label>
            </div>
            <div id = "searchbox">
                <form action = "Search.php" method = "GET" target = "_self">
                    <input type = "text" id = "search" name = "search">
                    <input type = "submit" id = "btnSearch" value = "Search">
                </form>
            </div>
            <div id = "account">
                <label id = "user" onclick = "whichScreen()" onload = "LogIn.js">Log In</label>
            </div>
        </header>
        
        <main>
            <?php
                ini_set('display_errors','Off');  //disables errors from showing
                ini_set('error_reporting', E_ALL );
                define('WP_DEBUG', false);
                define('WP_DEBUG_DISPLAY', false);

                $link = mysqli_connect("sql106.infinityfree.com", "if0_39185259", "Ke1616Hu", "if0_39185259_nickc2c"); //connects to database

                if (!$link){//checks for connection
                    die("Error: could not connect to database. ".mysqli_connect_error());
                }

                if ($_SERVER["REQUEST_METHOD"] == "GET"){
                    $searchParam = filter_data($_GET["search"]);
                }

                $searchItems_sql = "SELECT items_for_sale.item_id, "
                                . "items_for_sale.item_name, "
                                . "items_for_sale.item_price, "
                                . "items_for_sale.link_to_item_picture, "
                                . "items_for_sale.item_description, "
                                . "customer.username, customer.email "
                            . "FROM items_for_sale, customer "
                            . "WHERE items_for_sale.customer_id = customer.customer_id "
                        . "AND (LOWER(items_for_sale.item_name) LIKE LOWER('%$searchParam%') "
                        . "OR LOWER(items_for_sale.item_description) LIKE LOWER('%$searchParam%'))";
                $searchQuery = mysqli_query($link, $searchItems_sql);//retrieves items that match the search parameter

                $searchResults = array();
                $foundItems = false;

                if (mysqli_num_rows($searchQuery) > 0){
                    while ($row = mysqli_fetch_assoc($searchQuery)){
                        $searchResults[] = array($row["item_id"],   //0
                            $row["item_name"],                      //1
                            $row["item_price"],                     //2
                            $row["link_to_item_picture"],           //3
                            $row["item_description"],               //4
                            $row["username"],                       //5
                            $row["email"]);                         //6
                    }
                    $foundItems = true;
                }else{
                    $alert = "No results match your search";
                    echo $alert;
                }


                if ($foundItems){
                   foreach ($searchResults as $items){
                        echo "<div class = 'itemborder' data-id = '{$items[0]}'>
                                <img src = '{$items[3]}' alt = '{$items[1]}' class = 'pic'>
                                <h4 class = 'information'>{$items[1]}</h4>
                                <label class = 'information'>R{$items[2]}</label>
                                <label class = 'information'>{$items[4]}</label>
                                <hr />
                                <label class = 'information'>Contact: {$items[5]}</label>
                                <label class = 'information'>email: {$items[6]}</label>
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
        </main>

        <footer>
            <div id = "socialMedia">
                <img src = "images_main/Facebook.png" alt = "Facebook Logo" id = "facebook" class = "footerImages">
                <img src = "images_main/LinkedIn.png" alt = "LinkedIn Logo" id = "linkedin" class = "footerImages">
            </div>
            <div id = "footerLabels">
                <label id = "aboutUs" onclick = "window.open('AboutUs.html', '_self')">About Us</label>
                <label id = "help" onclick = "window.open('Help.html', '_self')">Help</label>
                <label id = "businessPolicies" onclick = "window.open('BusinessPolicies.html', '_self')">Business Policies</label>
                <label id = "copyright">Copyright Reserved</label>
            </div>
        </footer>
    </body>
</html>
