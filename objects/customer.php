<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created customer class

require_once FILE_CONNECTION;

class customer
{
    //Attributes
    private $customer_id = "";
    private $customer_firstName = "";
    private $customer_lastName = "";
    private $customer_address = "";
    private $customer_city = "";
    private $customer_province = "";
    private $customer_postalCode = "";
    private $customer_username = "";
    private $customer_password = "";
    
    //Constructor
    function __construct($newCustomer_id = "",$newCustomer_firstName = "", $newCustomer_lastName = "",
        $newCustomer_address = "", $newCustomer_city = "", $newCustomer_province = "",
        $newCustomer_postalCode = "",$newCustomer_username = "",$newCustomer_password = "") 
    {
        if($newCustomer_id != "")
        {
            
        }
        if($newCustomer_firstName != "")
        {
            
        }
        if($newCustomer_lastName != "")
        {
            
        }
        if($newCustomer_address != "")
        {
            
        }
        if($newCustomer_city != "")
        {
            
        }
        if($newCustomer_province != "")
        {
            
        }
        if($newCustomer_postalCode != "")
        {
            
        }
        if($newCustomer_username != "")
        {
            
        }
        if($newCustomer_password != "")
        {
            
        }
        
    }
    
    //Getters
    public function getId()
    {
        return $this->customer_id;
    }
    public function getFirstName()
    {
        return $this->customer_firstName;
    }
    public function getLastName()
    {
        return $this->customer_lastName;
    }
    public function getAddress()
    {
        return $this->customer_address;
    }
    public function getCity()
    {
        return $this->customer_city;
    }
    public function getProvince()
    {
        return $this->customer_province;
    }
    public function getPostalCode()
    {
        return $this->customer_postalCode;
    }
    public function getUsername()
    {
        return $this->customer_username;
    }
    public function getPassword()
    {
        return $this->customer_password;
    }
    
    //Setters
    public function setId($newId)
    {
        
    }
    public function setFirstName($newFirstName)
    {
        
    }
    public function setLastName($newLastName)
    {
        
    }
    public function setAddress($newAddress)
    {
        
    }
    public function setCity($newCity)
    {
        
    }
    public function setProvince($newProvince)
    {
        
    }
    public function setPostalCode($newPostalCode)
    {
        
    }
    public function setUsername($newUsername)
    {
        
    }
    public function setPassword($newPassword)
    {
        
    }
    
    
}