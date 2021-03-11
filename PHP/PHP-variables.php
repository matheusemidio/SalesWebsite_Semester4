<?php
#Revision History
#Matheus Emidio (1931358) 2021-02-18 Worked on the dynamic path for folders and php files
#Matheus Emidio (1931358) 2021-02-19 Worked on the dynamic path for the images, but still have to add the content
#Matheus Emidio (1931358) 2021-03-03 Prepared arrays for products to receive future content and created required variables for form input
#Matheus Emidio (1931358) 2021-03-05 Added images to the folder and content to the arrays.
#Matheus Emidio (1931358) 2021-03-09 Added variables required for the subtotal, taxes amount and grand total calculations
#Matheus Emidio (1931358) 2021-03-10 Corrected mistake on array_client_input, added another support array and necessary support variables to handle existing bugs on the validation.


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

 //Text File Variables  
 define("FOLDER_DATA", "DATA/");
 define("FILE_PURCHASES", FOLDER_DATA . "purchases.txt");

$array_seixas = array(
    "path" => FILE_AD1_BIGGER,
    "about" => "This destination is located only 500 meters from the coast of Seixas beach. This point is known as the easternmost point of the Americas. There, you will be able to find a natural bank of corals, covered by seawater, which is visible only when the tide is low, forming natural pools of warm, crystal clear water that allow you to view colorful fish and other sea animals. Come visit this true ecological paradise, nicknamed the Brazilian Caribbean.",
    "price" => "R$ 50,00",    
);

$array_sunset = array(
    "path" => FILE_AD4,
    "about" => "Located in the Paraiba River, in Cabedelo, this boat ride has many wonderful attractions. Leaving from a pier, our boat takes a tour through the river. You will be able to view the natural beauty of the region while hearing its history and geographic information from a Tourism Guide, accredited by the Ministry of Tourism. In addition to this, you will be able to see and participate in a cultural dance show, performed by a couple of 'cangaceiros', performing the roles of historical figures from our region, Lampiao and Maria Bonita. In the end, you will be able to contemplate one of the most beautiful sunsets to the sound of a live performance of Jurandy do Sax, a Guinness book recordist saxophone musician.",
    "price" => "R$ 50,00",     
);
$array_picaozinho = array(
    "path" => FILE_AD2,
    "about" => "This ride is only located 2 kilometers from the coast of Tambau beach, in Joao Pessoa. In Picãozinho, you will be able to see a natural bank of corals that form pools of clear waters, allowing you to view colorful fish and other marine animals. The colorful fish are the attraction of Picãozinho, they crowd around you, giving you an experience that will turn to be an unforgettable memory.",
    "price" => "R$ 60,00",     
);
$array_areia = array(
    "path" => FILE_AD3,
    "about" => "Located in Poço Beach, in Cabedelo, this destination is another great beauty of Joao Pessoa. There you will be able to witness the island of Areia Vermelha, formed by a huge sandbank of a different color, reddish, covered by seawater, being visible only when the tide is low, forming natural pools of warm and transparent waters.",
    "price" => "R$ 40,00",     
);
$array_pirate = array(
    "path" => FILE_AD5,
    "about" => "Enjoy a ride in our thematic boat through crystal clear, warm waters.. Here you will be able to enjoy good service, use our water slide, board to jump, gazebo for photos, and the 1st floor with panoramic view. Perfect place to live great experiences.",
    "price" => "R$ 70,00",  
);
$array_products = array(
    $array_areia,
    $array_picaozinho,
    $array_seixas,
    $array_sunset,
    $array_pirate,
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

define("LOCAL_TAXES", (12.05/100));
define("GRAND_TOTAL_PRECISION", 2);
define("SUBTOTAL_PRECISION", 2);
define("TAXES_PRECISION", 2);
define("PRICE_PRECISION", 2);

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
$errorGeneral = "";

$subtotal = 0;
$taxesAmout = 0;
$grandTotal = 0;

$array_client_input = array(
    "productCode" => "",
    "firstName" => "",
    "lastName" => "",
    "city" => "",
    "comment" => "",
    "price" => 0, 
    "quantity" => 0,
    "subtotal" => 0,
    "taxesAmount" => 0,
    "grandTotal" => 0
);

$array_client_output = array(
    "productCode" => "",    
    "firstName" => "",
    "lastName" => "",
    "city" => "",
    "comment" => "",
    "price" => 0, 
    "quantity" => 0,
    "subtotal" => 0,
    "taxesAmount" => 0,
    "grandTotal" => 0
);

