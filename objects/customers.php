<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created customers class

require_once FILE_CONNECTION;
require_once FILE_COLLECTION;
require_once FILE_CUSTOMER;

class customers extends collection
{
    function __construct()
    {
        global $connection;
        
        #use a stored procedure
        #$SQLQuery = "SELECT car_id, description, year FROM cars;";
        #$SQLQuery = "SELECT car_id, description, year FROM cars WHERE year >= :year "
        #        . " ORDER BY year;";
        $SQLQuery = "CALL customers_select_all();";
        
        $PDOStatement = $connection->prepare($SQLQuery);
        #$PDOStatement->bindParam(":year", $year);
        
        $PDOStatement->execute();     
        
        #check if you loaded something
        while($row = $PDOStatement->fetch())
        {
            $customer = new customer($row["customer_id"], $row["customer_firstName"], $row["customer_lastName"], $row["customer_address"], $row["customer_city"], 
                    $row["customer_province"], $row["customer_postalCode"], $row["customer_username"], $row["customer_password"]);
            $this->add($row['customer_id'], $customer);
            
        }     
    }
}