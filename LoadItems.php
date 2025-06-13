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
  
    $selectItems_sql = "SELECT items_for_sale.item_id, "
                    . "items_for_sale.item_name, "
                    . "items_for_sale.item_price, "
                    . "items_for_sale.link_to_item_picture, "
                    . "items_for_sale.item_description, "
                    . "customer.username, customer.email "
                . "FROM items_for_sale, customer "
                . "WHERE items_for_sale.customer_id = customer.customer_id";
    $query = mysqli_query($link, $selectItems_sql);//retrieves items
    
    $alert = "";
    
    $itemsArray = array();
    
    //loads the items into a 2d array
    if (mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            $itemsArray[] = array($row["item_id"],   //0
                $row["item_name"],                   //1
                $row["item_price"],                  //2
                $row["link_to_item_picture"],        //3
                $row["item_description"],            //4
                $row["username"],                    //5
                $row["email"]);                      //6
        }
        shuffle($itemsArray);   //shows items in different order every time
    }else{
        $alert = "<script>alert('Error: Query unsuccessful');</script>";
        echo $alert;
    }
    
    foreach ($itemsArray as $item){
        echo "<div class = 'itemborder' data-id = '{$item[0]}'>
                <img src = '{$item[3]}' alt = '{$item[1]}' class = 'pic'>
                <h4 class = 'information'>{$item[1]}</h4>
                <label class = 'information'>R{$item[2]}</label>
                <label class = 'information'>{$item[4]}</label>
                <hr />
                <label class = 'information'>Contact: {$item[5]}</label>
                <label class = 'information'>email: {$item[6]}</label>
            </div>";
    }
    
    //The dummy images used here were generated using https://deepai.org/machine-learning-model/text2img
    //The following prompts were used:

    //yellow cheddar cheese wheel
    //simple blue tshirt on a white background
    //simple autographed rugby ball on a white background
    //assorted foreign coins layed out on a wooden table
    //cone-shaped grass woven hat on a grey carpet
    //simple folded grey blanket
    //giraffe made from wire and beads
    //rustic homemade wooden chair on a white background
    //simple homemade handbag charm made from beads
    //2nd hand red volkswagen polo
    //2nd hand nokia 3310
    //a closed book with the title "English Dictionary"
    //a small box of assorted novels
    //empty coffee mug with a picture printed on it
    //small south african flag
    //red scrum cap on a white background
    //cool looking stone on a metal table
    //steel braai rack on a white background with no food
    //pink hair ties on a white background
    //blue homemade hand fan
    //small bunch of 5 peacock feathers
    //a ring made from gold that has a small blue sapphire set into it. Set the focus on the whole ring
    //three greek-style clay pots without handles
    //simple red empty coffee mug with a smiley face
    //simple laptop
    //jetski that is sitting on grass
    //light brown chopsticks sitting on a white tablecloth
    //camping chairs
    //colourful mouse pad on a white background
    
    //sunflower seeds - https://pixabay.com/photos/sunflower-seeds-bird-food-kernels-537652/
    //adzuki beans - https://pixabay.com/photos/bean-leguminous-plant-adzuki-5178460/
    
?>  