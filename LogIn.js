//Nicholas Leong EDUV4551823
console.log(document.cookie);
//document.cookie = "__temp=839ed518b99aaed84c80eefe3988ab89; expires=Wed, 11 Jun 2025 01:00:00 UTC; path=/";
console.log(document.cookie);

var isLoggedIn = false;
var logInLabel = document.getElementById("user");

document.addEventListener("DOMContentLoaded", function(event) { 
    let userLogIn = "";
    const defaultLogInText = "Log In";

    function getCookie(cookieName){//gets cookie containing the user's username
        let name = cookieName + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let cookieArray = decodedCookie.split(';');
        
        if (cookieArray[0].substring(0, 5) === "__test"){
            logInLabel.innerText = "Log In";
            isLoggedIn = false;
        }else{
            if (cookieArray[1] === null || cookieArray[1] === undefined){
                logInLabel.innerText = "Log In";
                isLoggedIn = false;
                return "Log In";
            }else{
                let username = cookieArray[1].substring(6, cookieArray[1].length);
                return username;
            }
        }
    
    }

    console.log(document.cookie);

    function checkCookie(){//changes the "Log In" label to the user's username
        let userLabel = document.getElementById("user");
        let username = getCookie("user");
        if (username !== ""){
            userLabel.innerText = username;
            isLoggedIn = true;
        }else{
            userLabel.innerText = defaultLogInText;
            isLoggedIn = false;
        }
    }

    checkCookie();
});

//==============================================================================
    
function whichScreen(){//determines if the click should go the Log In page or the Account Page
    if (isLoggedIn){
        window.open('ProfilePage.php', '_self');
    }else{
        window.open('LogIn.html', '_self');
    }
}
