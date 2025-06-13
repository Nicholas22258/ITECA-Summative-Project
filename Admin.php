<!DOCTYPE html>
<!--Nicholas Leong EDUV4551823-->
<html dir = "ltr" lang = "en">
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "Header_And_Footer.css">
        <link rel = "stylesheet" href = "Admin.css">
    </head>
    <body>
        <header>
            <img src = "images_main/Logo.png" alt = "Nick C2C Logo" id = "logo" onclick = "window.open('index.php', '_self')">
            <div id = "buy_sell">
                <label id = "buy" disabled>Buy</label>
                <label id = "sell" disabled>Sell</label>
            </div>
            <div id = "searchbox">
                <form action = "" method = "GET" target = "_self" disabled>
                    <input type = "text" id = "search" name = "search">
                    <input type = "submit" id = "btnSearch" value = "Search">
                </form>
            </div>
            <div id = "account">
                <label id = "user" onclick = "window.open('index.php', '_self')">Log Out</label>
            </div>
        </header>
        
        <main>
            <div id = "reportSummary" class = "divs">
                <fieldset>
                    <legend>Reports and Summary</legend>
                                        
                    <?php include "Reports.php"?>
                </fieldset>
            </div>
            
            <div id = messages class = "divs">
                <fieldset>
                    <legend>Messages</legend>
                    
                    <?php include "AdminMessages.php"?>
                </fieldset>
            </div>
            
            <div  class = "divs">
                <fieldset id = "items">
                    <legend>Items For Approval</legend>
                    
                    <?php include "ItemsForApproval.php"?>
                    
                    <?php include "AcceptReject.php"?>

                </fieldset>
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
