<?php

require "config.php";
try {
    $connection = new PDO($host, $username, $password);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database and table users created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>