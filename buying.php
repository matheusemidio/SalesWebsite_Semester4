<?php
//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Buying");

    //Beginning of calling and writing space
        ?>
            <p>Buying Page!</p>
        <?php

            if(isset($_POST["save"]))
                {
                    $product_code = htmlspecialchars($_POST["productcode"]);
                    $firstname =  htmlspecialchars($_POST["firstname"]);
                    $lastname = htmlspecialchars($_POST["lastname"]);
                    $city = htmlspecialchars($_POST["city"]);
                    $comment = htmlspecialchars($_POST["comment"]);
                    $price = htmlspecialchars($_POST["price"]);
                    $quantity = htmlspecialchars($_POST["quantity"]);

                    echo "Product Code: $product_code <br>";
                    echo "First Name: $firstname <br>";
                    echo "Last Name: $lastname <br>";
                    echo "City: $city <br>";
                    echo "Comment: $comment <br>";
                    echo "Price: $price <br>";
                    echo "Quantity: $quantity <br>";                                                             
                }
            else
            {
                echo 'No input detected';
            }

        createForm();

    //End of writing space
    
        
//End of the HTML
generateFooter();

