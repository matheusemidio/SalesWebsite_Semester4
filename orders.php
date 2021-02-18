<?php
//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Orders");

    //Calling and writing space
    ?>
        <p>Orders Page!</p>
    <?php


//End of the HTML
generateFooter();

