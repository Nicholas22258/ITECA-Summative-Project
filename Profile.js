//Nicholas Leong EDUV4551823

function logOut(){//deletes the cookies to log the user out
    document.cookie = "user=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "customerID=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "password=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "phoneNumber=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "email=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "selling=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
        
    window.open('index.php', '_self');
}

//==============================================================================

function getDetails(){//sets the details into their respective input boxes
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookieArray = decodedCookie.split(';');
    
    let username = cookieArray[1];  //assignes the relevant details to the variables
    let phoneNumber = cookieArray[4];
    let email = cookieArray[5];
    
    let trimmedUsername = username.substring(6, username.length);   //gets the individual piece of information
    let trimmedPhoneNumber = phoneNumber.substring(13, phoneNumber.length);
    let trimmedEmail = email.substring(7, email.length);

    let usernameBox = document.getElementById("username");
    let phoneNumberBox = document.getElementById("phonenumber");
    let emailBox = document.getElementById("email");
    
    usernameBox.value = trimmedUsername;
    phoneNumberBox.value = trimmedPhoneNumber;
    emailBox.value = trimmedEmail;
    
}

//==============================================================================

function showPasswordDIV(){//shows the changePassword DIV
    document.getElementById("column2").hidden = false;
}

//==============================================================================

function isSelling(){
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookieArray = decodedCookie.split(';');
    
    let selling = cookieArray[6];

    let result = selling.substring(9, 10);
    
    return result;
}