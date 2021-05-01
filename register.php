<?php 
#Revision History
#Matheus Emidio (1931358) 2021-04-30 Create register page and worked on saving a customer




//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Register");

    //Calling and writing space
        //loginForm("index");
        $customer = new customer();
        //global $registerMessage;
        //echo "Im here -1";
        //echo $registerMessage;
        if(isset($_POST["register"]))
        
        {
            //echo "im here 0";
            //Getting input from the user
            $firstname = htmlspecialchars(trim($_POST["firstNameForm"]));
            $errorFirstName = "";
            
            $lastname = htmlspecialchars(trim($_POST["lastNameForm"]));
            $errorLastName = "";
            
            $address = htmlspecialchars(trim($_POST["address"]));
            $errorAddress = "";
            
            $city = htmlspecialchars(trim($_POST["city"]));
            $errorCity = "";
            
            $province = htmlspecialchars(trim($_POST["province"]));
            $errorProvince = "";
            
            $postalCode = htmlspecialchars(trim($_POST["postalCode"]));
            $errorPostalCode = "";
            
            $username = htmlspecialchars(trim($_POST["usernameForm"]));
            $errorUsername = "";
            
            $password = htmlspecialchars(trim($_POST["password"]));
            $errorPassword = "";
            
            //Change to this
            $errorFirstName = $customer->setFirstName($firstname);
            //$customer->setFirstName($firstname);
            
            $errorLastName = $customer->setLastName($lastname);
            //$customer->setLastName($lastname);
            
            $errorAddress = $customer->setAddress($address);
            //$customer->setAddress($address);
            
            $errorCity = $customer->setCity($city);
            //$customer->setCity($city);
            
            $errorProvince = $customer->setProvince($province);
            //$customer->setProvince($province);
            
            $errorPostalCode = $customer->setPostalCode($postalCode);
            //$customer->setPostalCode($postalCode);
            
            $errorUsername = $customer->setUsername($username);
            //$customer->setUsername($username);
            
            //Encrypting password before saving
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
            $errorPassword = $customer->setPassword($encryptedPassword);
            //$customer->setPassword($password);
            
            //echo "Im here1";

            if(($errorFirstName == "") && ($errorLastName == "") && ($errorProductCode == "") && ($errorCity == "") && ($errorPostalCode == "") && ($errorUsername == "") && ($errorPassword == ""))
            {
                //echo "Im here2";
                $errorGeneral = "";
                //$customer->save();
                
                //Seeing if the username is unique and displaying a message before saving it
                //Username is available
                if($customer->load($username) == false)
                {
                    //Logging in
                    $_SESSION["username"] = $username;
                    $customer->save();
                    
                    //$registerMessage = "User was sucessfully created";
                    header("Location: update.php");
                    //die();
                }
                //Username already exists
                else{
                    echo "The username already exists. Please use a different one.";
                    //header("Location: register.php");

                    //$registerMessage = "";
                }
                
            }
            

            
        }
        register();
        
        //Function that will call the register or update function, depending if the user is logged in or not
        //registerOrupdate();
        //echo $customer->getFirstName();
      
    //End of writing space


//End of the HTML
generateFooter();


