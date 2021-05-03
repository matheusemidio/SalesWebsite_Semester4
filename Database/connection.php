<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created connection file
#Matheus Emidio (1931358) 2021-04-26 Erased the alias names on database stored procedures 
#Matheus Emidio (1931358) 2021-05-02 This file will create the connection with the database. During the project, the root user was used, since the privileges for the user are lost if any modification
#                                    happens on the database, causing crashed on the code.

//Notes:
//Please Sir, read the "README" file that I included on the project. Thank you!!

//Reminder of how variables are being declared on PHP-variables
//connection
//define("DATABASE", "dbname=database-1931358");
//define("DATABASE_USERNAME", "user-1931358");
//define("DATABASE_PASSWORD", "1931358");

//User 
//$connection = new PDO("mysql:host=localhost;" . DATABASE, DATABASE_USERNAME, DATABASE_PASSWORD);
//$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Root
$connection = new PDO("mysql:host=localhost;dbname=database-1931358", "root", "matheusemidio");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

