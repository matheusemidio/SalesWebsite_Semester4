<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created connection file

$connection = new PDO("mysql:host=localhost;" . DATABASE, DATABASE_USERNAME, DATABASE_PASSWORD);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);