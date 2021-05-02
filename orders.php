<?php
#Revision History
#Matheus Emidio (1931358) 2021-03-09 Tested the function to read from text file and display it on the screen for debug.
#Matheus Emidio (1931358) 2021-03-10 Added function to generate table
#Matheus Emidio (1931358) 2021-04-01 Modified flow of the page to show orders only if user is logged in, also added the div to be replaced by the javascript



//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Orders");

    //Calling and writing space
    //loginForm("orders");
    //readClientInput();
    //generateTable();
    //$products = new products();
    
    //User is logged in
    if(isset($_SESSION["username"]))
    {
        generateSearch();
        ?>
            <div id="replace">
                
            </div>
        <?php
    }
    //User is not logged in
    else
    {
        echo "<br>You need to be logged in order to see the content of the orders page.";
    }

    //echo "<span> " . $products->count() . "</span>";

//End of the HTML
generateFooter();

