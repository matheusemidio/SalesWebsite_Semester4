<?php

#Revision History
#Matheus Emidio (1931358) 2021-05-01 Created file
#Matheus Emidio (1931358) 2021-05-01 Built the page, this page will call the filteryByYear stored procedure that will receive the custoemer id of the year that is logged and the year typed on the
#                                    text field. This will return an array of purchases. On this page we will need 3 calls to the database. The other two are to set the customer and product.
#                                    After this, I setted the elements of the table by calling the attributes of the objects.
#



//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");

require_once FILE_PHP_FUNCTIONS;
//require_once FILE_PURCHASE;

header('Content-type: text/plain');
//echo "0";
    //echo "My search page works";
//var_dump($_POST);
$customer = new customer();
$purchase = new purchase();
$product = new product();
$purchases = new purchases();

//echo "Im on the search-dates.php";
if(isset($_POST["year"]))
{
    //echo "123";

    //Loading the current customer logged in
    //Setting customer id for purchase (already trustful)
    if($customer->load($_SESSION["username"])){
        $purchase->setCustomerId($customer->getId());
    }
    
    
    $purchases_array = $purchases->filterByYear($purchase->getCustomerId(),trim(htmlspecialchars($_POST["year"])));
   
    echo "<table class='productTable'>";
    echo "<thead>";
    echo "<tr>";
        //echo "<th style = 'visibility:hidden;'> </th>";
        echo "<th>Delete</th>";
        echo "<th>Product Code</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name </th>";
        echo "<th>City</th>";
        echo "<th>Comments</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Subtotal</th>";
        echo "<th>Taxes</th>";
        echo "<th>Grandtotal</th>";
    echo "</thead>";
    echo "</tr>";
    echo "<tbody>";
    //var_dump($purchases);
        foreach ($purchases_array as $purchase)
           {
               //Product setcode will set the attribute
               //Product select code will receive a product id and load the product code
               //Purchase has the product id at this moment
               //$product->setCode($product->selectCode($purchase->getProductId()));
                if($product->load($purchase->getProductId())){    
                }
               //echo "<br>";
               //var_dump($product)
               echo "<tr>";
               #var_dump($car);
               //Delete
               //echo "<td>" . createButtonDelete() . "</td>";
               //echo "<td style = 'visibility:hidden;' class = 'purchaseId'>" . $purchase->getPurchaseId() . "</td>";
               createButtonDelete($purchase->getPurchaseId());
               //Hidden purchase id
               
               //Product Code
               echo "<td>" . $product->getCode() . "</td>";

               //First Name
               echo "<td>" . $customer->getFirstName() . "</td>";

               //Last Name
               echo "<td>" . $customer->getLastName() . "</td>";

               //City 
               echo "<td>" . $customer->getCity() . "</td>";

               //Comments
               echo "<td>" . $purchase->getComment() . "</td>";

               //Price
               echo "<td>" . $purchase->getPrice() . " $</td>";

               //Quantity
               echo "<td>" . $purchase->getQuantity() . "</td>";

               //Subtotal
               echo "<td>" . $purchase->getSubtotal() . " $</td>";

               //Taxes
               echo "<td>" . $purchase->getTaxesAmount() . " $</td>";

               //Grandtotal
               echo "<td>" . $purchase->getGrandtotal() . " $</td>";

               echo "</tr>";
           }  
    echo "</tbody>";
   echo "</table>";
}