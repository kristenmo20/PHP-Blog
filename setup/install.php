<?php

require "config.php";
echo("");

try {
 $connection = new PDO("mysql:host=$host", $username, $password);
 $sql = file_get_contents("data/init.sql");
 $connection->exec($sql);
 
 echo "Database and table users created successfully.";
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
}

?>