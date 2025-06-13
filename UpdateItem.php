<!DOCTYPE html>

<html dir = "ltr" lang = "en">
    <head>
        <title>Update Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "Header_And_Footer.css">
        <link rel = "stylesheet" href = "Sell_Item.css">
        
        <script type = "text/javascript" src = "LogIn.js"></script>
        <script type = "text/javascript" src = "SetItemDetails.js"></script>
    </head>
    <body onload = "setDetails()">
        <header>
            <img src = "images_main/Logo.png" alt = "Nick C2C Logo" id = "logo" onclick = "window.open('index.php', '_self')">
            <div id = "buy_sell">
                <label id = "buy" onclick = "window.open('index.php', '_self')">Buy</label>
                <label id = "sell" onclick = "whichScreen()">Sell</label>
            </div>
            <div id = "searchbox">
                <form action = "Search.php" method = "GET">
                    <input type = "text" id = "search" name = "search">
                    <input type = "submit" id = "btnSearch" value = "Search">
                </form>
            </div>
            <div id = "account">
                <label id = "user" onclick = "whichScreen()" onload = "LogIn.js">Log In</label>
            </div>
        </header>
        
        <main>
            <div id = "enterInfo">
                <form action = "UpdateInformation.php" method = "POST">
                    <label for = "itemName">Item Name: </label><br>
                    <input type = "text" id = "itemName" name = "itemName" class = "inputBoxes"><br><br>
<!--                    <label>Item Picture: </label><br>
                    <img src = "" alt = " " id = "itemPicture" name = "itemPicture"><br>
                    <input type = "file" id = "imageInput" name = "imageInput" accept = "image/*"><br>-->
                    <label for = "price">Price: </label><br>
                    <input type = "text" id = "price" name = "price"  class = "inputBoxes"><br><br>
                    <label for = "description">Description: </label><br>
                    <textarea id = "description" name = "description" rows = "5" cols = "50" maxlength = "500"></textarea><br><br>
                    <input type = "submit" id = "submit" name = "submit" value = "Update Item" onclick = "return confirm('Are you sure you want to update this item?');">
                </form>
                <button id = "cancel" name = "cancel" onclick = "deleteDetails()">Cancel</button>
            </div>
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
