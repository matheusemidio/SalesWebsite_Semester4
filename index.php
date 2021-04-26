<?php 
#Revision History
#Matheus Emidio (1931358) 2021-02-20 Inserted advertising function and verified its functionality without content.



//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Home");

    //Calling and writing space
        displayAbout();
        showAdvertisingPicture();
        //loginForm("index");

    //End of writing space


//End of the HTML
generateFooter();


