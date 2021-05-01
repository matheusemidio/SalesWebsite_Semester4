<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created product class
#Matheus Emidio (1931358) 2021-04-30 Fixed problem with setters and constructor, created load, save, update and delete functions
#Matheus Emidio (1931358) 2021-04-30 Added the customer_id to load

require_once FILE_CONNECTION;

class product
{
    //Attributes
    private $product_id = "";
    private $product_code = "";
    private $product_description = "";
    private $product_price = "";
    private $product_cost = "";
    
    function __construct($newProduct_id = "", $newProduct_code = "", $newProduct_description = "",$newProduct_price = "",$newProduct_cost = "")
    {
        
        echo "Im on the product constructor";
        $this->setId($newProduct_id);
        $this->setCode($newProduct_code);
        $this->setDescription($newProduct_description);
        $this->setPrice($newProduct_price);
        $this->setCost($newProduct_cost);
        
    }
    //Getters
    public function getId()
    {
        return $this->product_id;
    }
    public function getCode()
    {
        return $this->product_code;
    }
    public function getDescription()
    {
        return $this->product_description;
    }
    public function getPrice()
    {
        return $this->product_price;
    }
    public function getCost()
    {
        return $this->product_cost;
    }
    
    //Setters
    public function setId($newProduct_id)
    {
        $this->product_id = $newProduct_id;
    }
    public function setCode($newProduct_code)
    {
        //global $errorProductCode;
        //Validating Product Code
                    
        //Checking if product code is empty
        if($newProduct_code == "")
        {
            //$errorProductCode = "Please enter the product code. It can not be empty.";
            //return False;
            return "Please enter the product code. It can not be empty.";
        }
        else
        {
            //Checking if product code has more than the maximum predefined length
            if(mb_strlen($newProduct_code) >  PRODUCT_CODE_MAX_LENGTH)
            {
                //$errorProductCode = "The product code can not have more than " . PRODUCT_CODE_MAX_LENGTH . " characters.";
                //return False;
                return "The product code can not have more than " . PRODUCT_CODE_MAX_LENGTH . " characters.";
            }
            else
            {
                //Checking if the product code begins with P or p
                $firstChar = strtolower(substr($newProduct_code, 0, 1));
                if($firstChar != strtolower(PRODUCT_CODE_REQUIRED_INITIAL_CHAR))
                {
                    //$errorProductCode = "Product code must begin with the letter P";
                    //return False;
                    return "Product code must begin with the letter P";
                }
                //Successful passed the validation
                else
                {
                    //$errorProductCode = "";
                    //return True;
                    $this->product_code = $newProduct_code;
                    return "";
                }
            }
        }
        
    }
    public function setDescription($newProduct_description)
    {
        //Checking if product description is empty
        if($newProduct_description == "")
        {
            return "Please enter the product description. It can not be empty.";
        }
        else
        {
            //Checking if product description has more than the maximum predefined length
            if(mb_strlen($newProduct_description) >  PRODUCT_DESCRIPTION_MAX_LENGTH)
            {
                return "The product description can not have more than " . PRODUCT_DESCRIPTION_MAX_LENGTH . " characters.";
            }
            else
            {
                $this->product_description = $newProduct_description;
                return "";
            }
        }
    }
    public function setPrice($newProduct_price)
    {
        //Checking if price is entirely numeric
        if(!is_numeric($newProduct_price))
        {
            return "The price has to be numeric";
        }
        else
        {
            //Checking if price is empty
            if($newProduct_price == "")
            {
                return "Please enter the price. It can not be empty.";
            }
            else
            {
                //Checking if price is a positive number
                if($newProduct_price < PRICE_MIN)
                {
                    return "The price has to be a positive number";
                }
                else
                {
                    //Checking if price exceeds the maximum predefined
                    if($newProduct_price > PRICE_MAX)
                    {
                        return "The price can not be higher than " . PRICE_MAX . "$.";
                    }
                    //Successful passed the validation
                    else
                    {
                        $this->product_price = number_format($newProduct_price, PRICE_PRECISION);                                                
                        return "";

                    }
                }
            }
        }        
    }
    public function setCost($newProduct_cost)
    {
        //Checking if price is entirely numeric
        if(!is_numeric($newProduct_cost))
        {
            return "The cost has to be numeric";
        }
        else
        {
            //Checking if price is empty
            if($newProduct_cost == "")
            {
                return "Please enter the cost. It can not be empty.";
            }
            else
            {
                //Checking if price is a positive number
                if($newProduct_cost < PRICE_MIN)
                {
                    return "The cost has to be a positive number";
                }
                else
                {
                    
                    //Successful passed the validation
                    $this->product_cost = number_format($newProduct_cost, COST_PRECISION);                        
                    return "";

                    
                }
            }
        }                
    }
    public function load($p_product_id)
    {
        global $connection;
        echo "Im on the products ->load()";

        #call the stored procedure
        $SQLQuery = "CALL products_select_one(:product_id);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":product_id", $p_product_id);
        $PDOStatement->execute();
        
        #check if you loaded something
        if($row = $PDOStatement->fetch())
        {
            #since it comes from the database, we can trust the information is already validated
            $this->product_id = $row['product_id'];
            $this->product_code = $row['product_code'];
            $this->product_description = $row['product_description'];
            $this->product_price = $row["product_price"];
            $this->product_cost = $row['product_cost'];           
            return true;
        }
        
        return false;         
    }
    public function save()
    {
        global $connection;
        echo "Im on the products ->save()";


        //if($this->customer_id == "")
        //{
            #set error handler
            #set exception handler
            #call stored procedures
        $SQLQuery = "CALL products_insert("
                                        . ":product_code,"
                                        . ":product_description,"
                                        . ":product_price,"
                                        . ":product_cost);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":product_code", $this->product_code);
        $PDOStatement->bindParam(":product_description", $this->product_description);
        $PDOStatement->bindParam(":product_price", $this->product_price);
        $PDOStatement->bindParam(":product_cost", $this->product_cost);
        $PDOStatement->execute();        
    }
    public function update()
    {
        global $connection;
        echo "Im on the products ->update()";

        //else
        //{
        #set_error_handler
        #set_exception_handler
        #call the stored procedure
        //$SQLQuery = "UPDATE products SET "
        //                        . "product_code = :product_code, "
        //                        . "product_description = :product_description, "
        //                        . "product_price = :product_price, "
        //                        . "product_cost = :product_cost, "                  
        //        .               " WHERE product_id = :product_id;";
        $SQLQuery = "CALL products_update("
                                        . ":product_id,"
                                        . ":product_code,"
                                        . ":product_description,"
                                        . ":product_price,"
                                        . ":product_cost);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":product_id", $this->product_id);
        $PDOStatement->bindParam(":product_code", $this->product_code);
        $PDOStatement->bindParam(":product_description", $this->product_description);
        $PDOStatement->bindParam(":product_price", $this->product_price);
        $PDOStatement->bindParam(":product_cost", $this->product_cost);
        $PDOStatement->bindParam(":product_id", $this->product_id);
        $PDOStatement->execute();       
    }
    public function delete()
    {
        global $connection;
        echo "Im on the products ->delete()";

        //else
        //{
        #set_error_handler
        #set_exception_handler
        #call the stored procedure
        //$SQLQuery = "DELETE FROM products "                
        //        .               " WHERE product_id = :product_id;";
        $SQLQuery = "CALL products_delete("
                                        . ":product_id);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":product_id", $this->product_id);            
        $PDOStatement->execute();        
    }

}