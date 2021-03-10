<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-18 Worked on the functions to generate html for header, footer, navigation bar and logo
#Matheus Emidio (1931358) 2021-02-19 Worked on the container for the body content
#Matheus Emidio (1931358) 2021-02-20 Worked on the beginning of the forms generator
#Matheus Emidio (1931358) 2021-02-21 Worked on the function that will generate the advertising pictures 
#Matheus Emidio (1931358) 2021-03-03 Added red asterix to the required fields, error messages and values to the form inputs 
#Matheus Emidio (1931358) 2021-03-05 Added network headers for solving cache memory problem and modied the advertising generator function
#Matheus Emidio (1931358) 2021-03-09 Created function to handle the calculation of grand total, subtotal and taxes. Also created function to write on the text file and another to read from it. 





//Getting access to the variables definition file
define("FILE_PHP_VARIABLES","PHP-variables.php");

require_once FILE_PHP_VARIABLES; 


function generateHeader($title)
{
    //Headers
   //This means that the page already expired, so it will always get the page. Never having to press crtl F5 again (always put the date on the past to make it already expired)
   //Force the browser to read it again (use the three of them)
   header("Expires: Thu, 01 Dec 1994 14:00:00 GMT");    //watch out with the spaces and every detail, it can break. It has to be exactly like this
   
   header("Cache-Control: no-cache");
   
   header("Pragma: no-cache");
   
   header('Content-Type: text/html; charset=UTF-8');
    ?><!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <!-- Neccessary for responsive design -->
                <meta name="viewport" content="width=device-width, initial-scale = 1.0"> 
                <link rel="stylesheet" type="text/css" href= "<?php echo FILE_CSS_STYLESHEET; ?>">                
                <title> <?php echo $title; ?></title>
                
            </head>
            <body>

            </body>
        </html>
    <?php
    createNavigationMenu($title);
    createHeadContainer();
    
    

}

function generateFooter()
{
    createFootContainer();
    ?>
        
        <div class="footer">    
            <br><br>&copy; Matheus Emidio (1931358) <?php echo date('Y'); ?>     
            </body>
            </html>
        </div>
    <?php
}

function createNavigationMenu()
{
        ?>       
        <div class="navbar">
                <nav>
                    <?php createLogo(); ?>
                    <ul>  
                        <li><a href=" <?php echo FILE_INDEX_PHP; ?>">Home</a></li>                        
                        <li><a href="<?php echo FILE_ORDERS_PHP; ?>">Orders</a></li>
                        <li><a href="<?php echo FILE_BUYING_PHP; ?>">Buying</a></li>   
                    </ul>                  
                </nav>
                <br><br>
            </div>
        <?php    
}

function createLogo()
{
    ?>
        <img class="logo margin-zero" src="<?php echo FILE_LOGO; ?>" alt="logo"/>
   <?php
}

function createHeadContainer()
{
    ?>
        <div class="container">          
    <?php
}

function createFootContainer()
{
    ?>
        </div>
    <?php
}

function createForm()
{
    global $product_code;
    global $firstname;
    global $lastname;
    global $city;
    global $comment;
    global $price;
    global $quantity;
    global $errorProductCode;
    global $errorFirstName;
    global $errorLastName;
    global $errorCity;
    global $errorComment;
    global $errorPrice;
    global $errorQuantity;
    
    
    ?>
        <form action="buying.php" method="POST" class="form">
                <p>
                    
                    <label class="required" for="productcode"> Product Code: </label>
                    <input type="text" name="productcode" placeholder="P45MOUSE" value="<?php echo $product_code; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorProductCode;
                        ?>
                    </span>                    
                    <br>
                    
                    <label class="required" for="firstname"> Customer First Name: </label>
                    <input type="text" name="firstname" placeholder="Matheus" value="<?php echo $firstname; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorFirstName;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="lastname">Customer Last Name: </label>
                    <input type="text" name="lastname" placeholder="Cadena" value="<?php echo $lastname; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorLastName;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="city">Customer City: </label>
                    <input type="text" name="city" placeholder="Montréal" value="<?php echo $city; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorCity;
                        ?>
                    </span>                     
                    <br>
                    
                    <label for="comment">Comment: </label>
                    <input type="text" name="comment" value="<?php echo $comment; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorComment;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="price">Price: </label>
                    <input type="text" name="price" value=" <?php echo $price; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorPrice;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="quantity">Quantity: </label>
                    <input type="text" name="quantity" value="<?php echo $quantity; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorQuantity;
                        ?>
                    </span>                     
                    <br>
                    
                </p>
                <input type="submit" value="Submit" name="save" class="button"/>            
        </form>
    <?php
}

    function showAdvertisingPicture()
    {
        //Calling the global variable that is an array of arrays.
        global $array_products;
        shuffle($array_products);
        ?>
            <div class="img-container">
        <?php
                //If the path of the array element is equal to the FILE_AD1_BIGGER, it will have a different class that is going to show it 100% bigger and with a border.
                if($array_products[0]["path"] == FILE_AD1_BIGGER)
                {
                    //The image source and the text are called from the array element that has these content
                    ?>                    
                        <a href="https://www.google.com/"><img class="advertising-picture-bigger" src="<?php echo $array_products[0]["path"]; ?>" alt="advertising"/></a>     
                        <p class="aboutText"><?php echo $array_products[0]["about"]; ?> </p>
                    <?php
                }
                else{
                    ?>
                        <a href="https://www.google.com/"><img class="advertising-picture" src="<?php echo $array_products[0]["path"]; ?>" alt="advertising"/></a>
                        <p class="aboutText"><?php echo $array_products[0]["about"]; ?> </p>                        
                    <?php
                }
        ?>
            </div>
        <?php
    }
    function calculate()
    {
        //Adding global variables required
        global $subtotal;
        global $taxesAmout;
        global $grandTotal;
        global $price;
        global $quantity;    
             
        //Calculating
        $subtotal = $price * $quantity;
        $taxesAmout = $subtotal * LOCAL_TAXES;
        //number_format function will force the number to have the amount of decimal digits required, no matter if he had less or more than it.
        $grandTotal = number_format($subtotal + $taxesAmout, GRAND_TOTAL_PRECISION); 
    }
    
    function writeClientInput()
    {
        //Adding global variables required
        global $firstname;
        global $lastname;
        global $city;
        global $comment;
        global $price;
        global $quantity;         
        global $subtotal;
        global $taxesAmout;
        global $grandTotal;
        global $array_client_input;
        
        //Saving data to the array
        $array_client_input = array();
        $array_client_input["firstName"] = $firstname;
        $array_client_input["lastName"] = $lastname;
        $array_client_input["city"] = $city;
        $array_client_input["comment"] = $comment;
        $array_client_input["price"] = $price;
        $array_client_input["quantity"] = $quantity;
        $array_client_input["subtotal"] = $subtotal;
        $array_client_input["taxesAmount"] = $taxesAmout;
        $array_client_input["grandTotal"] = $grandTotal;
        
        //Passing array data to text file
        //the accent in Montréal is being passed as Montr\u00e9al to the text file
        $input = json_encode($array_client_input). "\r\n";
        $fileHandle = fopen(FILE_PURCHASES, "a") or die("Cannot open the file");
        fwrite($fileHandle, $input);
        
        fclose($fileHandle);
        
        
    }
    function readClientInput()
    {       
        $myArray = array();
        $counter = 0;
        $content = "";
        $fileHandle = fopen(FILE_PURCHASES, "r") or die("Cannot open the file");        
        while(!feof($fileHandle))
        {
            //fgets read only one line
            //$content = fgets($fileHandle) . "<br>";
            $content = fgets($fileHandle);

            //Here I have the information for the first line of the text file, showing that I'm able to read it and display
            echo $content;
            
            echo "<br>";
            //Problem to be solved -> json_decode was returning null everytime, now its returning me two array elements, one is the actual line that I wanted and the other is a null.
            $myArray[$counter] = json_decode($content, true);
            $counter++;
        }        
        fclose($fileHandle);       
        echo "<br>";        
        echo "<br>";
        var_dump($myArray);
        
        echo "<br>";
        echo "<br>";        
        var_dump($myArray[0])
        ;
        echo "<br>";
        echo "<br>";         
        var_dump($myArray[0]["firstName"]);
        
        echo "<br>";
        echo "<br>";
        var_dump($myArray[0]["city"]);
        
        echo '<br>Done';
    }