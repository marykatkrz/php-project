<?php 
    require "../config.php";
    $connection = new mysqli($host, $username, $password, $dbname);
    if($connection->connect_error){
        die("Connection failed:" . $connection->connect_error);
        }
    $filename = "members_" . date('Y-m-d') . ".csv"; 
    $delimiter = ","; 
    $f = fopen('php://memory', 'w'); 
    $id = $_GET['id'];
    date_default_timezone_set('America/Los_Angeles');
    $exported  = $date = date('Y/m/d H:i:s');
    $sql = "UPDATE users SET lastexported='$exported' WHERE id = '$id'";
    $statement=mysqli_query($connection, $sql);
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $created=array('Created on:', $row['date'], 'Last Modified:', $row['lastmodified']);
    fputcsv($f, $created, $delimiter);
    $fields = array('Keys', 'Values'); 
    fputcsv($f, $fields, $delimiter);  
    $result = $connection->query("SELECT * FROM users WHERE id = '$id'"); 
    while($row = $result->fetch_assoc()){ 
        for($i=0; $i<count($row); $i++){
            $key=array_keys($row);
            $value=array_values($row);
            $lineData=array($key[$i], $value[$i]);
            fputcsv($f, $lineData, $delimiter); 
            }
        } 
    fseek($f, 0); 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    fpassthru($f); 
    exit();
    
    ?>
