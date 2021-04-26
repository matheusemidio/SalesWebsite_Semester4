<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created purchases class

require_once FILE_CONNECTION;
require_once FILE_COLLECTION;
require_once FILE_PURCHASE;


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
            $purchase = new purchase($row["purchase_id"], $row["fk_customer_id"], $row["fk_product_id"], $row["purchase_quantity"], $row["purchase_price"],
                    $row["purchase_comment"]);
            $this->add($row['purchase_id'], $purchase);
            
        }     
    }
}