<?php

include "config.php";

try {
 $connection = new PDO("mysql:host=$host", $username, $password);
 $sql = file_get_contents("MVC-Blog/setup/data/init.sql");
 $connection->exec($sql);
 
 echo "Database and table users created successfully.";
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
}

?>