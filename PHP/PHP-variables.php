<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-18 Worked on the dynamic path for folders and php files
#Matheus Emidio (1931358) 2021-02-19 Worked on the dynamic path for the images, but still have to add the content
#Matheus Emidio (1931358) 2021-03-03 Prepared arrays for products to receive future content and created required variables for form input




//  CSS Variables
define("FOLDER_CSS_STYLESHEET", "CSS/");
define("FILE_CSS_STYLESHEET", FOLDER_CSS_STYLESHEET. "styles.css");


//  PHP Variables

define("FILE_BUYING_PHP", "buying.php");
define("FILE_INDEX_PHP", "index.php");
define("FILE_ORDERS_PHP", "orders.php");


//  IMG Variables
define("FOLDER_IMG", "IMG/");
define("FILE_LOGO", FOLDER_IMG . "logo.png");
define("FILE_AD1_BIGGER",  FOLDER_IMG . "ad1.png");
define("FILE_AD2",  FOLDER_IMG . "ad2.png");
define("FILE_AD3",  FOLDER_IMG . "ad3.png");
define("FILE_AD4",  FOLDER_IMG . "ad4.png");
define("FILE_AD5",  FOLDER_IMG . "ad5.png");


$array_seixas = array(
    "path" => "",
    "about" => "",
    "price" => "",    
);

$array_sunset = array(
    "path" => "",
    "about" => "",
    "price" => "",     
);
$array_picaozinho = array(
    "path" => "",
    "about" => "",
    "price" => "",     
);
$array_areia = array(
    "path" => "",
    "about" => "",
    "price" => "",     
);

$array_products = array(
    $array_areia,
    $array_picaozinho,
    $array_seixas,
    $array_sunset,
);

//Variables for form 
define("PRODUCT_CODE_MAX_LENGTH", 12);
define("PRODUCT_CODE_REQUIRED_INITIAL_CHAR", "P");
define("FIRST_NAME_MAX_LENGTH", 20);
define("LAST_NAME_MAX_LENGTH", 20);
define("CITY_MAX_LENGTH", 8);
define("COMMENT_MIN_LENGTH", 0);
define("COMMENT_MAX_LENGTH", 200);
define("PRICE_MIN", 0);
define("PRICE_MAX", 10000);
define("QUANTITY_MIN", 1);
define("QUANTITY_MAX", 99);
$product_code = "";
$firstname = "";
$lastname = "";
$city = "";
$comment = "";
$price = "";
$quantity = "";
$errorProductCode = "";
$errorFirstName = "";
$errorLastName = "";
$errorCity = "";
$errorComment = "";
$errorPrice = "";
$errorQuantity = "";

