<?php
require "../config.php";
if (isset($_POST['save'])) {
    $connection = new mysqli($host, $username, $password, $dbname);
    if($connection->connect_error){
      die("Connection failed:" . $connection->connect_error);
      }

$sql="INSERT INTO users (lastname, firstname, age, location) VALUES('$_POST[lastname]','$_POST[firstname]','$_POST[age]', '$_POST[location]')";
    if($connection->query($sql)===True){
    echo "User Succesfully Added";
    }
    else
    {
      echo "Error" . $sql . "<br/>" . $connection->error;
    }
    $connection->close();
    }
?>