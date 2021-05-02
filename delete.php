<?php
#Revision History
#Matheus Emidio (1931358) 2021-05-02 Created the page delete to try to implement the delete part of the project. The idea here was to have a hidden column on the table that would have the 
#                                    purchase id to be deleted and here I would call the delete stored procedure. The javascript was successfully calling this page but the load was having a problem
#                                    because the $_POST["purchaseId"] was not returning what was expected.
#Matheus Emidio (1931358) 2021-05-02 Fixed the problem by passing the purchase id inside the value of the column clicked. The purchase id was passed as a parameter to the java script and sent
#                                    to this page where I call the purchase delete procedure.

//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");

require_once FILE_PHP_FUNCTIONS;
//require_once FILE_PURCHASE;

header('Content-type: text/plain');
//echo "0";
    //echo "My search page works";
//var_dump($_POST);
$purchase = new purchase();


//echo "Im on the search-dates.php";
if(isset($_POST["purchaseId"]))
{
    //echo "123";
    if($purchase->load(trim(htmlspecialchars($_POST["purchaseId"]))))
    {
        $purchase->delete(); 
        
    }
}