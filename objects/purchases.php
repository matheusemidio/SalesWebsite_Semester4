<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created purchases class
#Matheus Emidio (1931358) 2021-05-02 Modified the purchases to receive the new columns required and added the function filter by year to target the orders proposition.

require_once FILE_CONNECTION;
require_once FILE_COLLECTION;
require_once FILE_PURCHASE;
//echo "123";

class purchases extends collection
{
   
    function __construct()
    {
        global $connection;
        
        #use a stored procedure
        #$SQLQuery = "SELECT car_id, description, year FROM cars;";
        #$SQLQuery = "SELECT car_id, description, year FROM cars WHERE year >= :year "
        #        . " ORDER BY year;";
        $SQLQuery = "CALL purchases_select_all();";
        
        $PDOStatement = $connection->prepare($SQLQuery);
        #$PDOStatement->bindParam(":year", $year);
        
        $PDOStatement->execute();     
        
        #check if you loaded something
        while($row = $PDOStatement->fetch())
        {
            $purchase = new purchase($row["purchase_id"], $row["fk_customer_id"], $row["fk_product_id"], $row["purchase_quantity"], $row["product_price"],
                    $row["purchase_comment"], $row["purchase_subtotal"], $row["purchase_taxesAmount"], $row["purchase_grandTotal"]);
            $this->add($row['purchase_id'], $purchase);
            
        }     
    }
    
    function filterByYear($customerId, $year)
    {
        global $connection;
        //$customerId = "15f40d35-a1d2-11eb-a0b5-3c7c3f5e1be6";
        //echo "Im on the purchases->filterByYear()";
        #use a stored procedure
        #$SQLQuery = "SELECT car_id, description, year FROM cars;";
        #$SQLQuery = "SELECT car_id, description, year FROM cars WHERE year >= :year "
        #        . " ORDER BY year;";
        $SQLQuery = "CALL purchases_filterByYear("
                                            . ":purchase_creationTime,"
                                            . ":purchase_customer_id);";        
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":purchase_creationTime", $year);
        //$PDOStatement->bindParam(":purchase_customer_id", "15f40d35-a1d2-11eb-a0b5-3c7c3f5e1be6");
        $PDOStatement->bindParam(":purchase_customer_id", $customerId);

        $array_of_purchases = array();
        
        $PDOStatement->execute();     
        #check if you loaded something
        while($row = $PDOStatement->fetch())
        {
            $purchase = new purchase($row["purchase_id"], $row["fk_customer_id"], $row["fk_product_id"], $row["purchase_quantity"], $row["product_price"],
                    $row["purchase_comment"], $row["purchase_subtotal"], $row["purchase_taxesAmount"], $row["purchase_grandTotal"]);
            //$this->add($row['purchase_id'], $purchase);
            //echo "<br>";
            //echo $row["purchase_subtotal"];
            //echo "<br>";
            //echo $row["purchase_taxesAmount"];
            //echo "<br>";
            //echo $row["purchase_grandTotal"];
            //echo "<br>";
            $array_of_purchases[$row['purchase_id']] = $purchase;
           
        } 
        return $array_of_purchases;
    }
}