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
            <?php include "LoadItems.php"?>
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
