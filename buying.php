<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-20 Worked on the receiving user's input
#Matheus Emidio (1931358) 2021-03-03 Added trim function to the user's input, build the validation and created the error messages to be displayed
#Matheus Emidio (1931358) 2021-03-09 Worked on the calculation of subtotal, taxes amount and grand total and inserted function to interact with the text file.
#Matheus Emidio (1931358) 2021-03-10 Inserted confirmation messages and variable to handle validation bug.
#Matheus Emidio (1931358) 2021-03-13 Fixed bugs with the price validation
#Matheus Emidio (1931358) 2021-04-30 Changed flow of page and calling a new function to generate form and create a new purchase
#Matheus Emidio (1931358) 2021-05-02 This will only be visible if the user is logged in. It will have a combobox with the products on the database and after the customer fill the rest of the fields
#                                    it will save the customer id of the user that is logged and create a new purchase on the database.
//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;

//Beginning of the HTML 
generateHeader("Buying");
    
    $purchase = new purchase();
    $customer = new customer();
    $product = new product();
    
    //Beginning of calling and writing space
        if(isset($_SESSION["username"]))     
        {
            if(isset($_POST["buy"]))
                {
                    //customer id   ->ok
                    //product id    ->ok
                    //quantity      ->ok
                    //price         ->ok
                    //comment       ->ok
                    //subtotal
                    //taxesAmount
                    //grandtotal
                    
                    $errorPurchase = "";
                    //Setting customer id for purchase (already trustful)
                    if($customer->load($_SESSION["username"])){
                        $purchase->setCustomerId($customer->getId());
                    }
                    //Getting input from the user
                    $product_id = htmlspecialchars(trim($_POST["product_id"]));
                    $errorProductCode = "";

                    $comment = htmlspecialchars(trim($_POST["comment"]));
                    $errorComment = "";
                    
                    $quantity = htmlspecialchars(trim($_POST["quantity"]));
                    $errorQuantity = "";
                    
                    $purchase->setProductId($product_id);
                    $errorComment = $purchase->setComment($comment);
                    $errorQuantity = $purchase->setQuantity($quantity);
                    
                    //Setting price (already trustful)
                    if($product->load($product_id))
                    {
                        $purchase->setPrice($product->getPrice());
                    }
                    
                    
                    //Setting subtotal, taxesAmount and grandtotal (already trustuful
                    $purchase->calculate();
                    
                    //echo "<br>" . $_SESSION["username"];
                    //echo "<br>" . $purchase->getCustomerId();
                    //echo "<br>" . $purchase->getProductId();
                    //echo "<br>" . $purchase->getSubtotal();
                    //echo "<br>" . $purchase->getTaxesAmount();
                    //echo "<br>" . $purchase->getGrandtotal();
                    //echo "<br>" . $purchase->getQuantity();
                    //echo "<br>";
                    
                    //No errors detected after the validation
                    if(($errorComment == "") && ($errorQuantity == "") && ($errorPurchase == ""))
                    {
                        //echo "<br>All the data entered was validated successfully.<br>";

                        //global $subtotal;
                        //global $taxesAmout;
                        //global $grandTotal;
                        //Saving
                        //calculate();
                        $errorGeneral = "";
                        //writeClientInput();
                        $purchase->save();
                        echo "<br>Order Confirmed! Thank you.<br>";
                        //Debug tools
                        //echo "Product Code: $product_code <br>";
                        //echo "First Name: $firstname <br>";
                        //echo "Last Name: $lastname <br>";
                        //echo "City: $city <br>";
                        //echo "Comment: $comment <br>";
                        //echo "Price: $price <br>";
                        //echo "Quantity: $quantity <br>"; 
                        //echo "Subtotal: $subtotal <br>" ;
                        //echo "Taxes amount: $taxesAmout <br>";
                        //echo "Grand total: $grandTotal <br>";


                    }                                                                             
                }
                else
                {
                    //echo '<br>Error<br>';

                }

            //createForm();
            buyForm();
        }
        else
        {
            echo "<br>You need to be logged in order to see the content of the buy page.";
        }
    //End of writing space
    

//End of the HTML
generateFooter();

