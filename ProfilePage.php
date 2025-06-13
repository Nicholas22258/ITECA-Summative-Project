<!DOCTYPE html>

<html dir = "ltr">
    <head>
        <title>Your Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content=""ice-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "Header_And_Footer.css">
        <link rel = "stylesheet" href = "Profile.css">
        
        <script type = "text/javascript" src = "Profile.js"></script>
        <script type = "text/javascript" src = "LogIn.js"></script>
        <script type = "text/javascript">
            function confirmSellItem(){
                let message = "By continuing, you agree to put your username and email into the public domain, where other users may use those details to contact you.";
                
                let selling = isSelling();//determines if the customer is already selling
        
                if (selling === 0){
                    if (confirm(message) === true){//gets permission
                        window.open("SellItem.html", "_self");
                        <?php include "SetSellingItems.php";?>
                    }
                }else{
                    window.open("SellItem.html", "_self");
                }
            }
        </script>
    </head>
    <body onload = "getDetails()">
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
        
        <main id = "gridLayout">
            <div id = "column1" class = "columns">
                <div id = "leftBlock">
    <!--                <div id = "profilePic">
                        <img src = "" alt = "Your Profile Picture" id = "profilePicture">
                        <button id = "changePicture" name = "changePicture">Change Picture</button>

                    </div><br><br>-->

                    <div id = "personalInfo">
                        <form action = "Profile.php" method = "post">
                            <label for = "username">Username: </label><br>
                            <input type = "text" id = "username" name = username class = "inputBoxes"><br><br>
                            <label for = "phonenumber">Phone Number: </label><br>
                            <input type = "tel" id = "phonenumber" name = phonenumber class = "inputBoxes"><br><br>
                            <label for = "email">Email: </label><br>
                            <input type = "email" id = "email" name = email class = "inputBoxes"><br><br>
                            <button id = "save" name = "save">Save</button>
                        </form>
                        <div id = "innerDIV">
                            <button id = "password" name = "password" onclick = "showPasswordDIV()">Change Password</button><br><br>
                            <button id = "logOut" name = "logOut" onclick = "logOut()">Log Out</button>
                            <form action = "DeleteProfile.php" method = "POST">
                                <input type = "submit" id = "deleteAccount" name = "deleteAccount" value = "Delete Account" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id = "column2" class = "columns" hidden>
                <div id = "changePasswordDIV" >
                    <form action = "ChangePassword.php" method = "POST">
                        <label for = "oldPassword"> Old Password</label><br>
                        <input type = "password" id = "oldPassword" name = "oldPassword" class = "inputBoxes"><br><br>
                        <label for = "newPassword"> New Password</label><br>
                        <input type = "password" id = "newPassword" name = "newPassword" class = "inputBoxes"><br><br>
                        <label for = "confirmPassword"> Confirm Password</label><br>
                        <input type = "password" id = "confirmPassword" name = "confirmPassword" class = "inputBoxes"><br><br>
                        <input type = "submit" id = "changePassword" name = "changePassword" value = "Change Password">
                    </form>
                </div>
            </div>

            <div id = "column3" class = "columns">
                <fieldset id = "yourItems">
                    <legend id = "itemsLabel">Your Items:</legend>

                    <div id = 'addItem'>
                        <img src = 'images_main/Add.png' alt = 'Add Button' id = 'addItemPic' onclick = "confirmSellItem()">
                    </div>

                    <?php include 'ShowOwnItems.php';?>

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
