<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-18 Worked on the functions to generate html for header, footer, navigation bar and logo
#Matheus Emidio (1931358) 2021-02-19 Worked on the container for the body content
#Matheus Emidio (1931358) 2021-02-20 Worked on the beginning of the forms generator
#Matheus Emidio (1931358) 2021-02-21 Worked on the function that will generate the advertising pictures 
#Matheus Emidio (1931358) 2021-03-03 Added red asterix to the required fields, error messages and values to the form inputs 
#Matheus Emidio (1931358) 2021-03-05 Added network headers for solving cache memory problem and modied the advertising generator function
#Matheus Emidio (1931358) 2021-03-09 Created function to handle the calculation of grand total, subtotal and taxes. Also created function to write on the text file and another to read from it. 
#Matheus Emidio (1931358) 2021-03-10 Fixed the previous problem with the array, created function to build table and corrected some bugs with the validation
#Matheus Emidio (1931358) 2021-03-12 Added function to download cheatsheet
#Matheus Emidio (1931358) 2021-03-13 Added functions to modify page by the URL commands and corrected the bugs caused by the number_format function
#Matheus Emidio (1931358) 2021-04-24 Created login and register functions



//Getting access to the variables definition file
define("FILE_PHP_VARIABLES","PHP-variables.php");

require_once FILE_PHP_VARIABLES; 


function generateHeader($title)
{
    //Goal:
    //Created this function to display the first part of the html structure. Since we are working with php and want to generate HTML automatically,
    //the structure has been broken down into two parts. This was done to allow us to write in the middle.
    

    
    //Remember to change this to false
    $debug = true;
    function manageError($errorNumber, $errorMessage, $errorFile, $errorLine)
    {
        global $debug;
        $date = (new DateTime())->format("H:m:s:u");
        
        echo 'An error occurred. The dev team is already aware of the problem.';
        
        if($debug == true)
        {
            echo "An error occured in the file $errorFile at line $errorLine:"
                . "Error number $errorNumber: $errorMessage"; 
        }
        else
        {
            $error = "Date: $date. An error occured in the file $errorFile at line $errorLine:"
                . "Error number $errorNumber: $errorMessage \r\n" ; 
            $fileHandle = fopen(FILE_ERROR, "a") or die("Cannot open the file");
            fwrite($fileHandle, $error);
        
            fclose($fileHandle);           
        }

        die();
    }
    #Error: a problem occured when calling PHP functions
    #Exceptions: a problem occurred when running a functions
    function manageException($errorObject)
    {
        global $debug;
        $date = (new DateTime())->format("H:m:s:u");
        
        echo 'An exception occurred. The dev team is already aware of the problem.';
        if($debug == true)
        {
        echo "An error occured in the file " . $errorObject->getFile() . " at line"
                . $errorObject->getLine() . " " . $errorObject->getMessage();            
        }
        else
        {
             $exception = "Date: $date. An error occured in the file $errorFile at line $errorLine:"
                . "Error number $errorNumber: $errorMessage \r\n" ; 
            $fileHandle = fopen(FILE_EXCEPTION, "a") or die("Cannot open the file");
            fwrite($fileHandle, $exception);
        
            fclose($fileHandle);            
        }
        die();
    }
    set_error_handler("manageError");
    set_exception_handler("manageException");
    
    //Headers for Cache memory
    //This means that the page already expired, so it will always get the page. Never having to press crtl F5 again (always put the date on the past to make it already expired)
    //Force the browser to read it again (use the three of them) 
    //watch out with the spaces and every detail, it can break. It has to be exactly like this
   header("Expires: Thu, 01 Dec 1994 14:00:00 GMT");    
   header("Cache-Control: no-cache");
   header("Pragma: no-cache");
   
   //Header for UTF-8
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
            <body class="<?php backgroundModifier(); ?>">

            </body>
        </html>
    <?php
    //Calling function to create the navigation bar, with a dynamic title
    createNavigationMenu($title);
    
    //Calling function to start the container for body content
    createHeadContainer();
}
function downloadCheatSheet()
{
    //Goal:
    //Create this function to make my cheatsheet available to be downloaded when the button is clicked.
    //The path to the cheatsheet is dynamic
    
    ?>
        <span> 
            <a href="<?php echo FILE_CHEATSHEET; ?>">
                <input type="button" class="buttonCheatsheet" value="Download Cheatsheet!" name="cheatsheet"/>
            </a>
        </span>
    <?php
}
function generateFooter()
{
    //Goal:
    //Create this function to close what has been open before: the container for body content and the html structure.
    createFootContainer();
    
    //This function will have the button to download the cheatsheet, calling the downloadCheatSheet() and also the date on the copyright will be dynamic.
    ?>
        
        <div class="footer">    
            <?php downloadCheatSheet(); ?> 
            <br><br>&copy; Matheus Emidio (1931358) <?php echo date('Y'); ?>     
            </body>
            </html>
        </div>
    <?php
}

function createNavigationMenu()
{
    //Goal:
    //This function was created to display the structure for the navigation bar. It will be called in the header. Path to the php pages are dynamic
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
    //Goal:
    //Created this function to display the logo image. Path to the image is dynamic.
    ?>
        <img class="logo margin-zero <?php opacityModifier(); ?>" src="<?php echo FILE_LOGO; ?>" alt="logo"/>
   <?php
}

function createHeadContainer()
{
    //Goal:
    //Function to start the div that will contain the body content in order to be able to have the correct layout.
    ?>
        <div class="container">          
    <?php
}

function createFootContainer()
{
    //Goal:
    //Function to close the container for body content.
    ?>
        </div>
    <?php
}

function createForm()
{
    //Goal:
    //This function was created to generate the form that will be displayed on the buying page.
    
    //Calling global variables
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
    global $errorGeneral;
    
    //Added errorGeneral to tell the form if all the inputs were correctly validated. If errorGeneral is empty, it means that all the inputs are valid and should be erased
    //if errorGeneral is not empty, it means that we should keep the previous inputed information on the text box.
    ?>
        <form action="buying.php" method="POST" class="form">
                <p>
                    
                    <label class="required" for="productcode"> Product Code: </label>
                    <input type="text" name="productcode" placeholder="P45MOUSE" value="<?php echo($errorGeneral == "")? "":$product_code; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorProductCode;
                        ?>
                    </span>                    
                    <br>
                    
                    <label class="required" for="firstname"> Customer First Name: </label>
                    <input type="text" name="firstname" placeholder="Matheus" value="<?php echo($errorGeneral == "")? "": $firstname; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorFirstName;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="lastname">Customer Last Name: </label>
                    <input type="text" name="lastname" placeholder="Cadena" value="<?php echo($errorGeneral == "")? "": $lastname; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorLastName;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="city">Customer City: </label>
                    <input type="text" name="city" placeholder="Montréal" value="<?php echo($errorGeneral == "")? "": $city; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorCity;
                        ?>
                    </span>                     
                    <br>
                    
                    <label for="comment">Comment: </label>
                    <input type="text" name="comment" value="<?php echo($errorGeneral == "")? "": $comment; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorComment;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="price">Price: </label>
                    <input type="text" name="price" value=" <?php echo($errorGeneral == "")? "": $price; ?>"/>
                    <span class="errorMessage">
                        <?php 
                            echo $errorPrice;
                        ?>
                    </span>                     
                    <br>
                    
                    <label class="required" for="quantity">Quantity: </label>
                    <input type="text" name="quantity" value="<?php echo($errorGeneral == "")? "": $quantity; ?>"/>
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
        //Goal:
        //This function was created to randomly display an advertising image from the array. If the element to be displayed is the one is the specific one that has to be different
        //it will have a different css class.
        
        
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
                        <a href="https://www.google.com/"><img class="advertising-picture-bigger <?php opacityModifier(); ?>" src="<?php echo $array_products[0]["path"]; ?>" alt="advertising"/></a>     
                        <p class="aboutText"><?php echo $array_products[0]["about"]; ?> </p>
                    <?php
                }
                else{
                    ?>
                        <a href="https://www.google.com/"><img class="advertising-picture <?php opacityModifier(); ?>" src="<?php echo $array_products[0]["path"]; ?>" alt="advertising"/></a>
                        <p class="aboutText"><?php echo $array_products[0]["about"]; ?> </p>                        
                    <?php
                }
        ?>
            </div>
        <?php
    }
    function calculate()
    {
        //Goal:
        //Created this function to handle the calculations for subtotal, taxes amount and total.
                
        //Adding global variables required
        global $subtotal;
        global $taxesAmout;
        global $grandTotal;
        global $price;
        global $quantity;    
        //var_dump($price);
        //var_dump($quantity);
        //var_dump($subtotal);
        
        //Calculating
        $subtotal = $price * $quantity;
        $taxesAmout = $subtotal * LOCAL_TAXES;
        $grandTotal = $subtotal + $taxesAmout;
        //var_dump($subtotal);
        //number_format function will force the number to have the amount of decimal digits required, no matter if he had less or more than it.
        
        //Updated History -> Changed number_format to round because it was converting the number into a string and it was generating bugs on the whole project. Number format
        //will just be used at the moment that we print the table on the screens.
        $subtotal = round($subtotal , SUBTOTAL_PRECISION);
        $taxesAmout = round($taxesAmout, TAXES_PRECISION);
        $grandTotal = round($grandTotal, GRAND_TOTAL_PRECISION); 
        //var_dump($price);
        //var_dump($quantity);
        //var_dump($subtotal);
    }
    
    function writeClientInput()
    {
        //Goal:
        //Create this function to perform the writing of data into the text file. The user's inputs will be placed inside an array, encoded and 
        //will compose a line of our text file.
        
        //Adding global variables required
        global $product_code;
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
        $array_client_input["productCode"] = $product_code;
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
        //Note: the accent in Montréal is being passed as Montr\u00e9al to the text file but will be solved when decoded
        $input = json_encode($array_client_input). "\r\n";
        $fileHandle = fopen(FILE_PURCHASES, "a") or die("Cannot open the file");
        fwrite($fileHandle, $input);
        
        fclose($fileHandle);
        
        
    }
    function readClientInput()
    {       
        //Goal:
        //Created this function to read the data from the text file. While reading a line at a time, this line will be saved, decoded and stored as an element of the array.
        //At the end we will have an array with every line from the text file as an element and we will be able to manipulate it as we need.
        
        //Global variables
        global $array_client_output;
        $myArray = array();
        $counter = 0;
        $content = "";
        $fileHandle = fopen(FILE_PURCHASES, "r") or die("Cannot open the file");        
        while(!feof($fileHandle))
        {
            //fgets read only one line
            //$content = fgets($fileHandle) . "<br>";
            $content = fgets($fileHandle);

            //Handling the end of character from the text file
            if($content != "")
            {
                //Here I have the information for the first line of the text file, showing that I'm able to read it and display
                 //echo $content;

                 //echo "<br>";
                 //Problem to be solved -> json_decode was returning null everytime --> Updated: now its returning me two array elements, one is the actual line that I wanted and the other is a null. --> Updated: Solved
                 $myArray[$counter] = json_decode($content, true);
                 $counter++;                
            }
 
        }        
        fclose($fileHandle);   
        $array_client_output = $myArray;
        //echo "<br>";        
        //echo "<br>";
        //var_dump($myArray);
        
        //echo "<br>";
        //echo "<br>";        
        //var_dump($myArray[0]);
        //echo "<br>";
        //echo "<br>";         
        //var_dump($myArray[0]["firstName"]);
        
        //echo "<br>";
        //echo "<br>";
        //var_dump($myArray[0]["city"]);
        
        
        //echo '<br>Done';
    }
    
    function generateTable()
    {
        //Goal:
        //Created this function to generate the table to be displayed on the orders page. The array of data will be called and we will display every element of the array as a row.
        //Here the function is number_format is been used to make sure all the numbers follow the same patter of 2 decimals.
        
        //Global variables
        global $array_client_output;
        
        //Checking if file exists
        if(file_exists(FILE_PURCHASES))
        {
            //Creating table headers
            ?>
                <table class="productTable">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>Comments</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Taxes</th>
                            <th>Grand Total</th>                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php   
                        //Creating table body 
                            for($counter = 0; $counter < count($array_client_output); $counter++)
                            {
                                //Excluding null elements, just to make sure
                                if($array_client_output[$counter] != "")
                                {
                                    //Writing lines of the table
                                    ?>
                                        <tr> 
                                            <td><?php echo $array_client_output[$counter]["productCode"]; ?>    </td>
                                            <td><?php echo $array_client_output[$counter]["firstName"];?>       </td>
                                            <td><?php echo $array_client_output[$counter]["lastName"];?>        </td>
                                            <td><?php echo $array_client_output[$counter]["city"];?>            </td>
                                            <td><?php echo $array_client_output[$counter]["comment"];?>         </td>
                                            <td><?php echo number_format($array_client_output[$counter]["price"], PRICE_PRECISION);?>$          </td>
                                            <td><?php echo $array_client_output[$counter]["quantity"];?>        </td>
                                            <td class="<?php echo tableModifier($array_client_output[$counter]["subtotal"]); ?>"><?php echo number_format($array_client_output[$counter]["subtotal"], SUBTOTAL_PRECISION);?>$       </td>
                                            <td><?php echo number_format($array_client_output[$counter]["taxesAmount"],TAXES_PRECISION);?>$    </td>
                                            <td><?php echo number_format($array_client_output[$counter]["grandTotal"], GRAND_TOTAL_PRECISION);?>$     </td>                                            
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    

    }
    
    function backgroundModifier()
    {
        //Goal:
            //This function was created to get the $_GET parameters from the URL and, if the user type command=print, this function will echo a CSS class to modify the background color
            
        
        if(isset($_GET["command"]))
        {
            $backgroundColor = htmlspecialchars($_GET["command"]);
            
            if($backgroundColor == "print")
            {
                echo "whiteBackground";
            }
            else
            {
                //echo "regularBackground";
            }
        }
    }
    function opacityModifier()
    {
                //Goal:
            //This function was created to get the $_GET parameters from the URL and, if the user type command=print, this function will echo a CSS class to modify the background color
            
        
        if(isset($_GET["command"]))
        {
            $opacity = htmlspecialchars($_GET["command"]);
            
            if($opacity == "print")
            {
                echo "opacityChange";
            }
            else
            {
                //echo "regularBackground";
            }
        }
    }
    function tableModifier($subtotalAmount)
    {
        $subtotalAmount = floatval($subtotalAmount);
        //Goal:
            //This function was created to get the $_GET parameters from the URL and, if the user type command=color, this function will echo a CSS class to modify the colors of the table
        if(isset($_GET["command"]))
        {
            $tableColor = htmlspecialchars($_GET["command"]);
            
            if($tableColor == "color")
            {
                //Subtotal less than 100
                if($subtotalAmount < COLOR_MIN_PARAMETER)
                {
                    echo 'redColor';
                }
                else
                {
                    //Subtotal greater than 1000
                    if($subtotalAmount < COLOR_MAX_PARAMETER)
                    {
                        echo 'lightOrangeColor';
                    }
                    else
                    {
                        echo "greenColor"; 
                    }
                }
            }          
        }
    }
    function displayAbout()
    {
        ?>
            <span>
                <p class="aboutText"> <?php echo ABOUT_COMPANY; ?></p>
            </span>
        <?php
    }
    
    function loginForm($title)
    {   $username == "";
        if($username == "")
        {
            ?>
                <div class = "login">
                    <form action="<?php echo $title; ?>.php" method="POST" class="form">
                        <p>
                            <label for="username"> Username: </label>
                            <input type="text" name="username" placeholder="matheusemidio" value="<?php //echo($errorGeneral == "")? "":$product_code; ?>"/>
                            <span class="errorMessage">
                                <?php 
                                    //echo $errorProductCode;
                                ?>
                            </span>                    
                            <br>
                            <label for="password"> Password: </label>
                            <input type="text" name="password" placeholder="password" value="<?php //echo($errorGeneral == "")? "":$product_code; ?>"/>
                            <span class="errorMessage">
                                <?php 
                                    //echo $errorProductCode;
                                ?>
                            </span>                    
                            <br>
                            
                            <input type="submit" value="Login" name="login" class="button" />
                        </p>
                    </form>
                </div>    
            <?php
        }
        
        else
        {
            ?>
                <div class="login">
            <?php        
            //User is logged in
//----------Still needs to Load
            echo "Welcome " . $firstName . " " . $lastName;
            
            //Loggout part
            ?>
                <form action ="<?php echo $title; ?>.php" method="POST" class="form" >
                    <br>
                    <input type="submit" value="Logout" name="logout" class="button" />
                    <span>Need a user account? <a href="<?php echo FILE_REGISTER; ?>">Register</a> </span>
    
                </form>
            <?php
            ?>
                </div>
            <?php  
        }
 
    }
    
    function register()
    {
        global $firstname;
        $firstname = "";
        global $lastname;
        $lastname = "";
        global $address;
        global $city;
        global $postalCode;
        global $username;
        global $password;
        global $errorFirstName;
        global $errorLastName;
        global $errorAddress;
        global $errorCity;
        global $errorPostalCode;
        global $errorUsername;
        global $errorPassword;
        ?>
            <div>
                <br>
        <?php  
        
        ?>
            <form action="action" method="POST">
                <label class="required" for="firstName"> First Name: </label>
                <input type="text" name="firstName" placeholder="Matheus" value="<?php echo($errorGeneral == "")? "":$firstName; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorFirstName;
                    ?>
                </span>                    
                <br>
                <label class="required" for="lastName"> Product Code: </label>
                <input type="text" name="lastName" placeholder="Cadena" value="<?php echo($errorGeneral == "")? "":$lastname; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorLastName;
                    ?>
                </span>                    
                <br>
                <label class="required" for="address"> Product Code: </label>
                <input type="text" name="address" placeholder="5178" value="<?php echo($errorGeneral == "")? "":$address; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorAddress;
                    ?>
                </span>                    
                <br>
                <label class="required" for="city"> Product Code: </label>
                <input type="text" name="city" placeholder="Montréal" value="<?php echo($errorGeneral == "")? "":$city; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorCity;
                    ?>
                </span>                    
                <br>
                <label class="required" for="postalCode"> Product Code: </label>
                <input type="text" name="postalcode" placeholder="H1X 2N9" value="<?php echo($errorGeneral == "")? "":$postalCode; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorPostalCode;
                    ?>
                </span>                    
                <br>
                <label class="required" for="username"> Product Code: </label>
                <input type="text" name="username" placeholder="matheusemidio" value="<?php echo($errorGeneral == "")? "":$username; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorUsername;
                    ?>
                </span>                    
                <br>
                <label class="required" for="password"> Product Code: </label>
                <input type="text" name="password" placeholder="123456" value="<?php echo($errorGeneral == "")? "":$password; ?>"/>
                <span class="errorMessage">
                    <?php 
                        echo $errorPassword;
                    ?>
                </span>                    
                <br>
                <input type="submit" value="Register" name="register" class="button" />
            </form>
        <?php
        ?>
            </div>
        <?php  
    }