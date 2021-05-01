<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created customer class
#Matheus Emidio (1931358) 2021-04-30 Fixed problem with setters and constructor, created load and save functions
#                         2021-04-30 Fixed probelm with parameters in queries                          
#                         2021-04-30 Added and fixed problems with password hash                          

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
       //echo "<br>im on the customer constructor</br>";
       $this->setId($newCustomer_id);
       $this->setFirstName($newCustomer_firstName);
       $this->setLastName($newCustomer_lastName);
       $this->setAddress($newCustomer_address);
       $this->setCity($newCustomer_city);
       $this->setProvince($newCustomer_province);
       $this->setPostalCode($newCustomer_postalCode);
       $this->setUsername($newCustomer_username);
       $this->setPassword($newCustomer_password);
        
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
        $this->customer_id = $newId;
    }
    public function setFirstName($newFirstName)
    {
        //global $errorFirstName;
        //Validation First Name 

        //Checking if First Name is empty
        if($newFirstName == "")
        {
            //$errorFirstName = "Please enter the first name. It can not be empty";
            //return false;
            return "Please enter the first name. It can not be empty";
            
        }
        else
        {
            //Checking if First Name has more than the required max length                        
            if(mb_strlen($newFirstName) > FIRST_NAME_MAX_LENGTH)
            {
                //$errorFirstName = "First Name can not have more than " . FIRST_NAME_MAX_LENGTH . " characters";
                //return false;
                return "First Name can not have more than " . FIRST_NAME_MAX_LENGTH . " characters";
            }
            //Successful passed the validation
            else
            {
                //$errorFirstName = "";
                //return true;
                $this->customer_firstName = $newFirstName;
                return "";
            }
        }        
    }
    public function setLastName($newLastName)
    {
        //global $errorLastName;
        //Validation Last Name 

       //Checking if Last Name is empty
       if($newLastName == "")
       {
           //$errorLastName = "Please enter the last name. It can not be empty";
           //return false;
           return "Please enter the last name. It can not be empty";
       }
       else
       {
           //Checking if Last Name has more than the required max length                        
           if(mb_strlen($newLastName) > LAST_NAME_MAX_LENGTH)
           {
               //$errorLastName = "Last Name can not have more than " . LAST_NAME_MAX_LENGTH . " characters";
               //return false;
               return "Last Name can not have more than " . LAST_NAME_MAX_LENGTH . " characters";
           }
           //Successful passed the validation
           else
           {
               //$errorLastName = "";
               //return true;
               $this->customer_lastName = $newLastName;
               return "";
           }
       }

    }
    public function setAddress($newAddress)
    {
        //Validating Address
        //global $errorAddress;
         //Checking if Address is empty
         if($newAddress == "")
         {
             //$errorAddress = "Please enter the address. It can not be empty";
             //return false;
             return "Please enter the address. It can not be empty";
         }
         else
         {
             //Checking if City has more than the required max length                        
             if(mb_strlen($newAddress) > ADDRESS_MAX)
             {
                 //$errorAddress = "Address can not have more than " . ADDRESS_MAX . " characters";
                 //return false;
                 return "Address can not have more than " . ADDRESS_MAX . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorAddress = "";
                 //return true;
                 $this->customer_address = $newAddress;
                 return "";
             }
         }        
    }
    public function setCity($newCity)
    {
        //Validating City
        //global $errorCity;
         //Checking if City is empty
         if($newCity == "")
         {
             //$errorCity = "Please enter the city. It can not be empty";
             //return false;
             return "Please enter the city. It can not be empty";
         }
         else
         {
             //Checking if City has more than the required max length                        
             if(mb_strlen($newCity) > CITY_MAX_LENGTH)
             {
                 //$errorCity = "City can not have more than " . CITY_MAX_LENGTH . " characters";
                 //return false;
                 return "City can not have more than " . CITY_MAX_LENGTH . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorCity = "";
                 //return true;
                 $this->customer_city = $newCity;
                 return "";
             }
         }
        
    }
    public function setProvince($newProvince)
    {
        //global $errorProvince;
        //Validating Province

         //Checking if City is empty
         if($newProvince == "")
         {
             //$errorProvince = "Please enter the province. It can not be empty";
             //return false;
             return "Please enter the province. It can not be empty";
         }
         else
         {
             //Checking if province has more than the required max length                        
             if(mb_strlen($newProvince) > PROVINCE_MAX)
             {
                 //$errorProvince = "Province can not have more than " . PROVINCE_MAX . " characters";
                 //return false;
                 return "Province can not have more than " . PROVINCE_MAX . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorProvince = "";
                 //return true;
                 $this->customer_province = $newProvince;
                 return "";
             }
         }        
    }
    public function setPostalCode($newPostalCode)
    {
        //global $errorPostalCode;
        //Validating Province
        
         //Checking if City is empty
         if($newPostalCode == "")
         {
             //$errorPostalCode = "Please enter the postal code. It can not be empty";
             //return false;
             return "Please enter the postal code. It can not be empty";
         }
         else
         {
             //Checking if Postal code has more than the required max length                        
             if(mb_strlen($newPostalCode) > POSTAL_CODE_MAX)
             {
                 //$errorPostalCode = "Postal Code can not have more than " . POSTAL_CODE_MAX . " characters";
                 //return false;
                 return "Postal Code can not have more than " . POSTAL_CODE_MAX . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorPostalCode = "";
                 //return true;
                 $this->customer_postalCode = $newPostalCode;
                 return "";
             }
         }          
    }
    public function setUsername($newUsername)
    {
        //global $errorUsername;
        //Validating Province

         //Checking if Username is empty
         if($newUsername == "")
         {
             //$errorUsername = "Please enter username. It can not be empty";
             //return false;
             return "Please enter username. It can not be empty";
         }
         else
         {
             //Checking if Username has more than the required max length                        
             if(mb_strlen($newUsername) > USERNAME_MAX)
             {
                 //$errorUsername = "Username can not have more than " . USERNAME_MAX . " characters";
                 //return false;
                 return "Username can not have more than " . USERNAME_MAX . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorUsername = "";
                 //return true;
                 $this->customer_username = $newUsername;
                 return "";
             }
         }        
    }
    public function setPassword($newPassword)
    {
        //global $errorPassword;
        //Validating Province

         //Checking if Password is empty
         if($newPassword == "")
         {
             //$errorPassword = "Please enter the password. It can not be empty";
             //return false;
             return "Please enter the password. It can not be empty";
         }
         else
         {
             //Checking if Password has more than the required max length                        
             if(mb_strlen($newPassword) > PASSWORD_MAX)
             {
                 //$errorPassword = "Password can not have more than " . PASSWORD_MAX . " characters";
                 //return false;
                 return "Password can not have more than " . PASSWORD_MAX . " characters";
             }
             //Successful passed the validation
             else
             {
                 //$errorPassword = "";
                 //return true;
                 $this->customer_password = $newPassword;
                 return "";
             }
         }         
    }
    public function load($p_username)
    {
        global $connection;
        
        #call the stored procedure
        $SQLQuery = "CALL customers_select_one(:customer_username);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":customer_username", $p_username);
        $PDOStatement->execute();
        
        #check if you loaded something
        if($row = $PDOStatement->fetch())
        {
            #since it comes from the database, we can trust the information is already validated
            $this->customer_id = $row["customer_id"];
            $this->customer_firstName = $row['customer_firstName'];
            $this->customer_lastName = $row['customer_lastName'];
            $this->customer_address = $row['customer_address'];
            $this->customer_city = $row['customer_city'];
            $this->customer_province = $row['customer_province'];
            $this->customer_postalCode = $row['customer_postalCode'];            
            $this->customer_username = $row['customer_username'];
            $this->customer_password = $row['customer_password'];          
            //echo "Im here3";
            return true;
        }
        
        return false;       
    }
    public function checkPassword($p_username,$p_password)
    {
        global $connection;
        global $LoginMessage;
        echo "<br> I am on the check Password";
        //$encryptedPassword = password_hash($p_password, PASSWORD_DEFAULT);
        
        #call the stored procedure
        $SQLQuery = "CALL customers_select_password(:customer_username);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":customer_username", $p_username);
        $PDOStatement->execute();
        
        #check if you loaded something
        if($row = $PDOStatement->fetch())
        {
            #since it comes from the database, we can trust the information is already validated
            //$this->customer_firstName = $row['customer_firstName'];
            //$this->customer_lastName = $row['customer_lastName'];
            //$this->customer_address = $row['customer_address'];
            //$this->customer_city = $row['customer_city'];
            //$this->customer_province = $row['customer_province'];
            //$this->customer_postalCode = $row['customer_postalCode'];            
           // $this->customer_username = $row['customer_username'];
            $this->customer_password = $row['customer_password'];
            echo "<br>Password: " . $this->customer_password;
            echo "<br>Encryption: " . $p_password;
            #Customer exist and has the same password
            if(password_verify($p_password, $this->customer_password))
            {
                //$errorPassword = "";
                //return true;
                
                return "";
                
            }
            #Customer exist but has an incorret password
            else
            {
                //$errorPassword = "Username and password do not exist or do not match.";
                return "Username and password do not exist or do not match.";
            }
        }
        
        return false;          
    }
    public function save()
    {
        global $connection;
        echo "Im on the customers ->save()";
        
        
        //if($this->customer_id == "")
        //{
            #set error handler
            #set exception handler
            #call stored procedures
            $SQLQuery = "CALL customers_insert("
                                            . ":customer_firstName,"
                                            . ":customer_lastName,"
                                            . ":customer_address,"
                                            . ":customer_city,"
                                            . ":customer_province,"
                                            . ":customer_postalCode,"
                                            . ":customer_username,"
                                            . ":customer_password);";
            $PDOStatement = $connection->prepare($SQLQuery);
            $PDOStatement->bindParam(":customer_firstName", $this->customer_firstName);
            $PDOStatement->bindParam(":customer_lastName", $this->customer_lastName);
            $PDOStatement->bindParam(":customer_address", $this->customer_address);
            $PDOStatement->bindParam(":customer_city", $this->customer_city);
            $PDOStatement->bindParam(":customer_province", $this->customer_province);
            $PDOStatement->bindParam(":customer_postalCode", $this->customer_postalCode);
            $PDOStatement->bindParam(":customer_username", $this->customer_username);            
            $PDOStatement->bindParam(":customer_password", $this->customer_password);
            $PDOStatement->execute();

            
        //}
    }
    function update()
    {
        global $connection;
        echo "Im on the customers ->update()";

        //else
        //{
            #set_error_handler
            #set_exception_handler
            #call the stored procedure
            //$SQLQuery = "UPDATE customers SET "
            //                        . "customer_firstName = :customer_firstName, "
            //                        . "customer_lastName = :customer_lastName, "
            //                        . "customer_address = :customer_address, "
            //                        . "customer_city = :customer_city, "
            //                        . "customer_province = :customer_province, "
            //                        . "customer_postalCode = :customer_postalCode, "
            //                        . "customer_username = :customer_username, "
            //                        . "customer_password = :customer_password "                   
            //        .               " WHERE customer_username = :customer_username;";
            $SQLQuery = "CALL customers_update("
                                            . ":customer_firstName,"
                                            . ":customer_lastName,"
                                            . ":customer_address,"
                                            . ":customer_city,"
                                            . ":customer_province,"
                                            . ":customer_postalCode,"
                                            . ":customer_username,"
                                            . ":customer_password);";        
            $PDOStatement = $connection->prepare($SQLQuery);
            $PDOStatement->bindParam(":customer_firstName", $this->customer_firstName);
            $PDOStatement->bindParam(":customer_lastName", $this->customer_lastName);
            $PDOStatement->bindParam(":customer_address", $this->customer_address);
            $PDOStatement->bindParam(":customer_city", $this->customer_city);
            $PDOStatement->bindParam(":customer_province", $this->customer_province);
            $PDOStatement->bindParam(":customer_postalCode", $this->customer_postalCode);
            $PDOStatement->bindParam(":customer_username", $this->customer_username);            
            $PDOStatement->bindParam(":customer_password", $this->customer_password);
            $PDOStatement->execute();
            

        //}
    }  
    
    function delete()
    {
        global $connection;
        echo "Im on the customers ->delete()";

        //else
        //{
            #set_error_handler
            #set_exception_handler
            #call the stored procedure
            //$SQLQuery = "DELETE FROM customers "                
            //        .               " WHERE customer_username = :customer_username;";
            $SQLQuery = "CALL customers_delete("
                                            . ":customer_username);";
            $PDOStatement = $connection->prepare($SQLQuery);
            $PDOStatement->bindParam(":customer_username", $this->customer_username);            
            $PDOStatement->execute(); 
    }
    
    
    
    
    
}