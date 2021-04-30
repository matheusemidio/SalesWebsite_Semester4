<?php
#Revision History
#Matheus Emidio (1931358) 2021-03-09 Tested the function to read from text file and display it on the screen for debug.
#Matheus Emidio (1931358) 2021-03-10 Added function to generate table



//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Orders");

    //Calling and writing space
    //loginForm("orders");
    readClientInput();
    generateTable();
    require_once FILE_PRODUCTS;
    require_once FILE_CONNECTION;
    $products = new products();
    
    echo "<span> " . $products->count() . "</span>";

//End of the HTML
generateFooter();

