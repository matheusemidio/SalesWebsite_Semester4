<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created purchase class
#Matheus Emidio (1931358) 2021-04-30 Fixed problem with setters and constructor, created load, save, update and delete functions
#Matheus Emidio (1931358) 2021-04-31 Added updated columns subtotal, taxes amount and grandtotal
#                                    Added function calculate to set the results for subtotal, taxes and grand total

require_once FILE_CONNECTION;

class purchase
{
    //Attributes
    private $purchase_id = "";
    private $customer_id = "";
    private $product_id = "";
    private $purchase_quantity = "";
    private $purchase_price = "";
    private $purchase_comment = "";
    private $purchase_subtotal = "";
    private $purchase_taxesAmount = "";
    private $purchase_grandTotal = "";
    
    function __construct($newPurchase_id = "", $newCustomer_id = "", $newProduct_id = "",$newPurchase_quantity = "",$newPurchase_price = "", $newPurchase_comment = "", $newPurchase_subtotal = "",
            $newPurchase_taxesAmount = "", $newPurchase_grandTotal = "")
    {
        
        //echo "Im on the purchase constructor";
        $this->setPurchaseId($newPurchase_id);
        $this->setCustomerId($newCustomer_id);
        $this->setProductId($newProduct_id);
        $this->setQuantity($newPurchase_quantity);
        $this->setPrice($newPurchase_price);
        $this->setComment($newPurchase_comment);  
        
    }
    
    //Getters
    public function getPurchaseId()
    {
        return $this->purchase_id;
    }
    public function getCustomerId()
    {
        return $this->customer_id;
    }
    public function getProductId()
    {
        return $this->product_id;
    }
    public function getQuantity()
    {
        return $this->purchase_quantity;
    }
    public function getPrice()
    {
        return $this->purchase_price;
    }
    public function getComment()
    {
        return $this->purchase_comment;
    }
    public function getSubtotal()
    {
        return $this->purchase_subtotal;
    }
    public function getTaxesAmount()
    {
        return $this->purchase_taxesAmount;
    }
    public function getGrandtotal()
    {
        return $this->purchase_grandTotal;
    }
    
    //Setters
    public function setPurchaseId($newPurchase_id)
    {
        $this->purchase_id = $newPurchase_id;
    }
    public function setCustomerId($newCustomer_id)
    {
        $this->customer_id = $newCustomer_id;
    }
    public function setProductId($newProduct_id)
    {
        $this->product_id = $newProduct_id;
    }
    public function setQuantity($newPurchase_quantity)
    {
        //Validating Quantity
                    
        //Checking if quantity is entirely numeric
        if(!is_numeric($newPurchase_quantity))
        {
            //$errorQuantity = "The quantity has to be numeric";
            return "The quantity has to be numeric";
        }
        else
        {
            //Checking if price is empty
            if($newPurchase_quantity == "")
            {
                //$errorQuantity = "Please enter the quantity. It can not be empty.";
                return "Please enter the quantity. It can not be empty.";
            }
            else
            {
                //Checking if quantity is has decimals 
                if((int)$newPurchase_quantity != (float)$newPurchase_quantity)
                {
                    //$errorQuantity = "Please, enter a value without decimals.";
                    return "Please, enter a value without decimals.";
                }
                else
                {
                    //Checking if quantity is higher than the minimum predefined
                    if((int)$newPurchase_quantity < QUANTITY_MIN)
                    {
                        //$errorQuantity = "The price can not be lower than " . QUANTITY_MIN;
                        return "The price can not be lower than " . QUANTITY_MIN;
                    }
                    else
                    {
                        //Checking if quantity exceeds the maximum predefined
                        if((int)$newPurchase_quantity > QUANTITY_MAX)
                        {
                            //$errorQuantity = "The quantity can not be higher than " . QUANTITY_MAX;
                            return "The quantity can not be higher than " . QUANTITY_MAX;
                        }
                        //Successful passed the validation
                        else
                        {
                            //$errorPrice = "";
                            
                            $this->purchase_quantity = $newPurchase_quantity;
                            return "";
                        }
                    }                                
                }

            }
        }        
    }
    public function setPrice($newPurchase_price)
    {
        //Checking if price is entirely numeric
        if(!is_numeric($newPurchase_price))
        {
            return "The price has to be numeric";
        }
        else
        {
            //Checking if price is empty
            if($newPurchase_price == "")
            {
                return "Please enter the price. It can not be empty.";
            }
            else
            {
                //Checking if price is a positive number
                if($newPurchase_price < PRICE_MIN)
                {
                    return "The price has to be a positive number";
                }
                else
                {
                    //Checking if price exceeds the maximum predefined
                    if($newPurchase_price > PRICE_MAX)
                    {
                        return "The price can not be higher than " . PRICE_MAX . "$.";
                    }
                    //Successful passed the validation
                    else
                    {
                        $this->purchase_price = number_format($newPurchase_price, PRICE_PRECISION);                                                
                        return "";

                    }
                }
            }
        }        
    }
    public function setComment($newPurchase_comment)
    {
        //Checking if product description is empty
        if($newPurchase_comment == "")
        {
            return "Please enter the purchase comment. It can not be empty.";
        }
        else
        {
            //Checking if product description has more than the maximum predefined length
            if(mb_strlen($newPurchase_comment) >  COMMENT_MAX_LENGTH)
            {
                return "The purchase comment can not have more than " . PRODUCT_DESCRIPTION_MAX_LENGTH . " characters.";
            }
            else
            {
                $this->purchase_comment = $newPurchase_comment;
                return "";
            }
        }        
    }
    public function setSubtotal($newPurchase_subtotal)
    {
       //Checking if subtotal is entirely numeric
        if(!is_numeric($newPurchase_subtotal))
        {
            return "The subtotal has to be numeric";
        }
        else
        {
            //Checking if subtotal is empty
            if($newPurchase_subtotal == "")
            {
                return "Please enter the price. It can not be empty.";
            }
            else
            {
                //Checking if subtotal is a positive number
                if($newPurchase_subtotal < PRICE_MIN)
                {
                    return "The subtotal has to be a positive number";
                }
                else
                {
                    //Successful passed the validation
                    
                        $this->purchase_subtotal = number_format($newPurchase_subtotal, PRICE_PRECISION);                                                
                        return "";

                    
                }
            }
        } 
    }
    public function setTaxesAmount($newPurchase_taxesAmount)
    {
      //Checking if taxes is entirely numeric
        if(!is_numeric($newPurchase_taxesAmount))
        {
            return "The taxes amount has to be numeric";
        }
        else
        {
            //Checking if taxes is empty
            if($newPurchase_taxesAmount == "")
            {
                return "Please enter the taxes amount. It can not be empty.";
            }
            else
            {
                //Checking if taxes amount is a positive number
                if($newPurchase_taxesAmount < PRICE_MIN)
                {
                    return "The taxes amount has to be a positive number";
                }
                else
                {
                    //Successful passed the validation
                    
                        $this->purchase_taxesAmount = number_format($newPurchase_taxesAmount, PRICE_PRECISION);                                                
                        return "";

                    
                }
            }
        }         
    }
    public function setGrandtotal($newPurchase_grandtotal)
    {
      //Checking if grand total is entirely numeric
        if(!is_numeric($newPurchase_grandtotal))
        {
            return "The grandtotal has to be numeric";
        }
        else
        {
            //Checking if grandtotal is empty
            if($newPurchase_grandtotal == "")
            {
                return "Please enter the grandtotal. It can not be empty.";
            }
            else
            {
                //Checking if grandtotal is a positive number
                if($newPurchase_grandtotal < PRICE_MIN)
                {
                    return "The grandtotal has to be a positive number";
                }
                else
                {
                    //Successful passed the validation
                    
                        $this->purchase_grandTotal = number_format($newPurchase_grandtotal, PRICE_PRECISION);                                                
                        return "";

                    
                }
            }
        }          
    }
    public function load($p_purchase_id)
    {
        global $connection;
        //echo "Im on the purchases ->load()";

        #call the stored procedure
        $SQLQuery = "CALL purchases_select_one(:purchase_id);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":product_id", $p_purchase_id);
        $PDOStatement->execute();
        
        #check if you loaded something
        if($row = $PDOStatement->fetch())
        {
            #since it comes from the database, we can trust the information is already validated
            $this->purchase_id = $row['purchase_id'];
            $this->customer_id = $row['fk_customer_id'];
            $this->product_id = $row['fk_product_id'];
            $this->purchase_quantity = $row["purchase_quantity"];
            $this->purchase_price = $row['purchase_price']; 
            $this->purchase_comment = $row['purchase_comment'];     
            $this->purchase_subtotal = $row["purchase_subtotal"];
            $this->purchase_taxesAmount = $row["purchase_taxesAmount"];
            $this->purchase_grandTotal = $row["purchase_grandtotal"];
            return true;
        }
        
        return false;         
    }
    public function save()
    {
        global $connection;
        //echo "Im on the purchases ->save()";


        //if($this->customer_id == "")
        //{
            #set error handler
            #set exception handler
            #call stored procedures
        $SQLQuery = "CALL purchases_insert("
                                        . ":fk_customer_id,"
                                        . ":fk_product_id,"
                                        . ":purchase_quantity,"
                                        . ":purchase_price,"
                                        . ":purchase_comment,"
                                        . ":purchase_subtotal,"
                                        . ":purchase_taxesAmount,"
                                        . ":purchase_grandtotal);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":fk_customer_id", $this->customer_id);
        $PDOStatement->bindParam(":fk_product_id", $this->product_id);
        $PDOStatement->bindParam(":purchase_quantity", $this->purchase_quantity);
        $PDOStatement->bindParam(":purchase_price", $this->purchase_price);
        $PDOStatement->bindParam(":purchase_comment", $this->purchase_comment);
        $PDOStatement->bindParam(":purchase_subtotal", $this->purchase_subtotal);
        $PDOStatement->bindParam(":purchase_taxesAmount", $this->purchase_taxesAmount);
        $PDOStatement->bindParam(":purchase_grandtotal", $this->purchase_grandTotal);
        
        $PDOStatement->execute();        
    }
        public function update()
    {
        global $connection;
        echo "Im on the purchases ->update()";

        //else
        //{
        #set_error_handler
        #set_exception_handler
        #call the stored procedure
        //$SQLQuery = "UPDATE purchases SET "
        //                        . "fk_customer_id = :fk_customer_id, "
        //                        . "fk_product_id = :fk_product_id, "
        //                        . "purchase_quantity = :purchase_quantity, "
        //                        . "purchase_price = :purchase_price, "                  
        //                        . "purchase_comment = :purchase_comment, "                  
        //        .               " WHERE purchase_id = :purchase_id;";
        
        $SQLQuery = "CALL purchases_update("
                                        . ":fk_customer_id,"
                                        . ":fk_product_id,"
                                        . ":purchase_quantity,"
                                        . ":purchase_price,"
                                        . ":purchase_comment,"
                                        . ":purchase_subtotal,"
                                        . ":purchase_taxesAmount,"
                                        . ":purchase_grandtotal,"
                                        . ":purchase_id);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":fk_customer_id", $this->customer_id);
        $PDOStatement->bindParam(":fk_product_id", $this->product_id);
        $PDOStatement->bindParam(":purchase_quantity", $this->purchase_quantity);
        $PDOStatement->bindParam(":purchase_price", $this->purchase_price);
        $PDOStatement->bindParam(":purchase_comment", $this->purchase_comment);
        $PDOStatement->bindParam(":purchase_subtotal", $this->purchase_subtotal);
        $PDOStatement->bindParam(":purchase_taxesAmount", $this->purchase_taxesAmount);
        $PDOStatement->bindParam(":purchase_grandtotal", $this->purchase_grandtotal);
        $PDOStatement->bindParam(":purchase_id", $this->purchase_id);        
        $PDOStatement->execute();       
    }
    public function delete()
    {
        global $connection;
        echo "Im on the purchases ->delete()";

        //else
        //{
        #set_error_handler
        #set_exception_handler
        #call the stored procedure
        //$SQLQuery = "DELETE FROM purchases "                
        //        .               " WHERE purchase_id = :purchase_id;";
        $SQLQuery = "CALL purchases_delete("
                                        . ":purchase_id);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":purchase_id", $this->purchase_id);            
        $PDOStatement->execute();        
    }
    public function calculate()
    {
        echo "Im on the purchases ->calculate()";

        //$newSubtotal = 0;
        //$newTaxesAmount = 0;
        //$newGrandtotal = 0;
        
        $this->purchase_subtotal = $this->purchase_price * $this->purchase_quantity;
        $this->purchase_taxesAmount = $this->purchase_subtotal * LOCAL_TAXES;
        $this->purchase_grandTotal = (floatval($this->purchase_subtotal)) + floatval($this->purchase_taxesAmount);
        
        
    }

}

