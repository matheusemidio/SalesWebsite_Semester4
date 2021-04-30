<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created purchase class

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

    
    //Getters
    public function getPurchaseId($newPurchase_id)
    {
        return $this->purchase_id;
    }
    public function getCustomerId($newCustomer_id)
    {
        return $this->customer_id;
    }
    public function getProductId($newProduct_id)
    {
        return $this->product_id;
    }
    public function getQuantity($newPurchase_quantity)
    {
        return $this->purchase_quantity;
    }
    public function getPrice($newPurchase_price)
    {
        return $this->purchase_price;
    }
    public function getComment($newPurchase_comment)
    {
        return $this->purchase_comment;
    }
    
    //Setters
    public function setPurchaseId($newPurchase_id)
    {
        
    }
    public function setCustomerId($newCustomer_id)
    {
        
    }
    public function setProductId($newProduct_id)
    {
        
    }
    public function setQuantity($newPurchase_quantity)
    {
        
    }
    public function setPrice($newPurchase_price)
    {
        
    }
    public function setComment($newPurchase_comment)
    {
        
    }
    public function load()
    {
        
    }
    public function save()
    {
        
    }
}