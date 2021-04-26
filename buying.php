<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-20 Worked on the receiving user's input
#Matheus Emidio (1931358) 2021-03-03 Added trim function to the user's input, build the validation and created the error messages to be displayed
#Matheus Emidio (1931358) 2021-03-09 Worked on the calculation of subtotal, taxes amount and grand total and inserted function to interact with the text file.
#Matheus Emidio (1931358) 2021-03-10 Inserted confirmation messages and variable to handle validation bug.
#Matheus Emidio (1931358) 2021-03-13 Fixed bugs with the price validation

//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;

//Beginning of the HTML 
generateHeader("Buying");

    //Beginning of calling and writing space
            if(isset($_POST["save"]))
                {
                    //Getting input from the user
                    $product_code = htmlspecialchars(trim($_POST["productcode"]));
                    $errorProductCode = "";
                    
                    $firstname =  htmlspecialchars(trim($_POST["firstname"]));
                    $errorFirstName = "";
                    
                    $lastname = htmlspecialchars(trim($_POST["lastname"]));
                    $errorLastName = "";
                    
                    $city = htmlspecialchars(trim($_POST["city"]));
                    $errorCity = "";
                    
                    $comment = htmlspecialchars(trim($_POST["comment"]));
                    $errorComment = "";
                    
                    $price = htmlspecialchars(trim($_POST["price"]));
                    $errorPrice = "";
                    
                    $quantity = htmlspecialchars(trim($_POST["quantity"]));
                    $errorQuantity = "";

                    //Validating Product Code
                    
                    //Checking if product code is empty
                    if($product_code == "")
                    {
                        $errorProductCode = "Please enter the product code. It can not be empty.";
                    }
                    else
                    {
                        //Checking if product code has more than the maximum predefined length
                        if(mb_strlen($product_code) >  PRODUCT_CODE_MAX_LENGTH)
                        {
                            $errorProductCode = "The product code can not have more than " . PRODUCT_CODE_MAX_LENGTH . " characters.";
                        }
                        else
                        {
                            //Checking if the product code begins with P or p
                            $firstChar = strtolower(substr($product_code, 0, 1));
                            if($firstChar != strtolower(PRODUCT_CODE_REQUIRED_INITIAL_CHAR))
                            {
                                $errorProductCode = "Product code must begin with the letter P";
                            }
                            //Successful passed the validation
                            else
                            {
                                $errorProductCode = "";
                            }
                        }
                    }
                    
                    //Validation First Name 
                    
                    //Checking if First Name is empty
                    if($firstname == "")
                    {
                        $errorFirstName = "Please enter the first name. It can not be empty";
                    }
                    else
                    {
                        //Checking if First Name has more than the required max length                        
                        if(mb_strlen($firstname) > FIRST_NAME_MAX_LENGTH)
                        {
                            $errorFirstName = "First Name can not have more than " . FIRST_NAME_MAX_LENGTH . " characters";
                        }
                        //Successful passed the validation
                        else
                        {
                            $errorFirstName = "";
                        }
                    }
                    
                    //Validation Last Name 
                    
                    //Checking if Last Name is empty
                    if($lastname == "")
                    {
                        $errorLastName = "Please enter the last name. It can not be empty";
                    }
                    else
                    {
                        //Checking if Last Name has more than the required max length                        
                        if(mb_strlen($lastname) > LAST_NAME_MAX_LENGTH)
                        {
                            $errorLastName = "Last Name can not have more than " . LAST_NAME_MAX_LENGTH . " characters";
                        }
                        //Successful passed the validation
                        else
                        {
                            $errorLastName = "";
                        }
                    }
                    
                    //Validating City
                    
                    //Checking if City is empty
                    if($city == "")
                    {
                        $errorCity = "Please enter the city. It can not be empty";
                    }
                    else
                    {
                        //Checking if City has more than the required max length                        
                        if(mb_strlen($city) > CITY_MAX_LENGTH)
                        {
                            $errorCity = "City can not have more than " . CITY_MAX_LENGTH . " characters";
                        }
                        //Successful passed the validation
                        else
                        {
                            $errorCity = "";
                        }
                    }

                    //Validating Comments
                    
                    //Checking if comment has more than the min predefined length
                    if(mb_strlen($comment) < COMMENT_MIN_LENGTH)
                    {
                        $errorComment = "The comment must have more than " . COMMENT_MIN_LENGTH ." characters.";
                    }
                    else
                    {
                        //Checking if comment has more than the max predefined length
                        if(mb_strlen($comment) > COMMENT_MAX_LENGTH)
                        {
                            $errorComment = "The comment can not have more than " .COMMENT_MAX_LENGTH . " characters";   
                        }
                        //Successful passed the validation
                        else
                        {
                            $errorComment = "";
                        }
                    }
                    
                    //Validating Price
                    
                    //Checking if price is entirely numeric
                    if(!is_numeric($price))
                    {
                        $errorPrice = "The price has to be numeric";
                    }
                    else
                    {
                        //Checking if price is empty
                        if($price == "")
                        {
                            $errorPrice = "Please enter the price. It can not be empty.";
                        }
                        else
                        {
                            //Checking if price is a positive number
                            if($price < PRICE_MIN)
                            {
                                $errorPrice = "The price has to be a positive number";
                            }
                            else
                            {
                                //Checking if price exceeds the maximum predefined
                                if($price > PRICE_MAX)
                                {
                                    $errorPrice = "The price can not be higher than " . PRICE_MAX . "$.";
                                }
                                //Successful passed the validation
                                else
                                {
                                    $errorPrice = "";
                                    
                                }
                            }
                        }
                    }
                    
                    //Validating Quantity
                    
                    //Checking if quantity is entirely numeric
                    if(!is_numeric($quantity))
                    {
                        $errorQuantity = "The quantity has to be numeric";
                    }
                    else
                    {
                        //Checking if price is empty
                        if($quantity == "")
                        {
                            $errorQuantity = "Please enter the quantity. It can not be empty.";
                        }
                        else
                        {
                            //Checking if quantity is has decimals 
                            if((int)$quantity != (float)$quantity)
                            {
                                $errorQuantity = "Please, enter a value without decimals.";
                            }
                            else
                            {
                                //Checking if quantity is higher than the minimum predefined
                                if((int)$quantity < QUANTITY_MIN)
                                {
                                    $errorQuantity = "The price can not be lower than " . QUANTITY_MIN;
                                }
                                else
                                {
                                    //Checking if quantity exceeds the maximum predefined
                                    if((int)$quantity > QUANTITY_MAX)
                                    {
                                        $errorQuantity = "The quantity can not be higher than " . QUANTITY_MAX;
                                    }
                                    //Successful passed the validation
                                    else
                                    {
                                        $errorPrice = "";
                                    }
                                }                                
                            }

                        }
                    }
                        $errorGeneral = "error";
                        //Debug tools
                        //echo "Error Product Code: $errorProductCode <br>";
                        //echo "Error First Name: $errorFirstName <br>";
                        //echo "Error Last Name: $errorLastName <br>";
                        //echo "Error City: $errorCity <br>";
                        //echo "Error Comment: $errorComment <br>";
                        //echo "Error Price: $errorPrice <br>";
                        //echo "Error Quantity: $errorQuantity <br>"; 
                        //echo "<br>";
                        
                    //No errors detected after the validation
                    if(($errorFirstName == "") && ($errorLastName == "") && ($errorProductCode == "") && ($errorCity == "") && ($errorQuantity == "") && ($errorPrice == "") && ($errorComment == ""))
                    {
                        echo "<br>All the data entered was validated successfully.<br>";
                     
                        global $subtotal;
                        global $taxesAmout;
                        global $grandTotal;
                        //Saving
                        calculate();
                        writeClientInput();
                        echo "<br>Order Confirmed! Thank you.<br>";
                        $errorGeneral = "";
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
                //echo 'No input detected';
                 
            }

        createForm();

    //End of writing space
    
        //loginForm("buying");

//End of the HTML
generateFooter();

