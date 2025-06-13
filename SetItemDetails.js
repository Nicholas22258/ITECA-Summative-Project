//Nicholas Leong EDUV4551823

function setDetails(){
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookieArray = decodedCookie.split(';');

    console.log(document.cookie);

    let itemName = document.getElementById("itemName");
    let itemPrice = document.getElementById("price");
    let itemDescription = document.getElementById("description");

    let currentItemName = cookieArray[8].substr(17, cookieArray[7].length);
    let currentItemDescription = cookieArray[9].substr(18, cookieArray[8].length);
    let currentItemPrice = cookieArray[10].substr(18, cookieArray[9].length);
    
    //console.log(currentItemName);
    //console.log(currentItemPrice);
    //console.log(currentItemDescription);

    itemName.value = currentItemName;
    itemPrice.value = currentItemPrice;
    itemDescription.value = currentItemDescription;
}

//==============================================================================

function deleteDetails(){
    document.cookie = "currentItemID=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "currentItemName=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "currentItemDescr=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    document.cookie = "currentItemPrice=; expires = Sat, 01 Feb 2003 00:00:00 UTC; path=/";
    window.open('ProfilePage.php', '_self');
}