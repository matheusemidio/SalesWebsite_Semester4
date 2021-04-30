<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created product class

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
        
        echo "Im on the constructor";
        $this->product_id = $newProduct_id;
        $this->product_code = $newProduct_code;
        $this->product_description = $newProduct_description;
        $this->product_price = $newProduct_price;
        $this->product_cost = $newProduct_cost;
        if($newProduct_id != "")
        {
            
        }
        if($newProduct_code != "")
        {
            
        }
        if($newProduct_description != "")
        {
            
        }
        if($newProduct_price != "")
        {
            
        }
        if($newProduct_cost != "")
        {
            
        }
        
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
    public function setId($newPrduct_id)
    {
        $this->product_id = $newPrduct_id;
    }
    public function setCode($newPrduct_code)
    {
        global $errorProductCode;
        //Validating Product Code
                    
        //Checking if product code is empty
        if($product_code == "")
        {
            $errorProductCode = "Please enter the product code. It can not be empty.";
            return False;
        }
        else
        {
            //Checking if product code has more than the maximum predefined length
            if(mb_strlen($product_code) >  PRODUCT_CODE_MAX_LENGTH)
            {
                $errorProductCode = "The product code can not have more than " . PRODUCT_CODE_MAX_LENGTH . " characters.";
                return False;
            }
            else
            {
                //Checking if the product code begins with P or p
                $firstChar = strtolower(substr($product_code, 0, 1));
                if($firstChar != strtolower(PRODUCT_CODE_REQUIRED_INITIAL_CHAR))
                {
                    $errorProductCode = "Product code must begin with the letter P";
                    return False;
                }
                //Successful passed the validation
                else
                {
                    #$errorProductCode = "";
                    return True;
                }
            }
        }
        
    }
    public function setDescription($newPrduct_description)
    {
        
    }
    public function setPrice($newPrduct_price)
    {
        
    }
    public function setCost($newPrduct_cost)
    {
        
    }
    public function load()
    {
        
    }
    public function save()
    {
        
    }

}