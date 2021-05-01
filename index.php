<?php 
#Revision History
#Matheus Emidio (1931358) 2021-02-20 Inserted advertising function and verified its functionality without content.



//Getting access functions file
define("FOLDER_PHP", "PHP/");
define("FILE_PHP_FUNCTIONS",FOLDER_PHP. "PHP-functions.php");


require_once FILE_PHP_FUNCTIONS;


//Beginning of the HTML 
generateHeader("Home");

    //Calling and writing space
        //loginForm("index");

        displayAbout();
        showAdvertisingPicture();

      $customer = new customer(); 
      $customers = new customers();
      $Acustomer = new customer();



      //foreach ($customers->items as $Acustomer)
      //{
      //    echo $Acustomer->getId();
      //    if($customer->getUsername() == $Acustomer->getUsername())
      //    {
      //         echo "<br>Same customer </br>";
      //        //Check password
      //        if($customer->getPassword() == $Acustomer->getPassword())
      //        {
      //            echo "<br>Same password </br>";
      //            echo $customer->getPassword();
      //            echo $Acustomer->getPassword();
      //        }
      //        else{
      //              echo "<br>Wrong password </br>";
      //              echo $customer->getPassword();
      //              echo $Acustomer->getPassword();
      //        }
      //    }
      //}
      
    //End of writing space


//End of the HTML
generateFooter();


