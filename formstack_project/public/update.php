<?php include "templates/header.php"; ?>
  <h2>Update User Documents</h2>
  <?php
  require "../config.php";
  if (isset($_GET['id'])) {
      $connection = new mysqli($host, $username, $password, $dbname);
      if($connection->connect_error){
          die("Connection failed:" . $connection->connect_error);
          }
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result=mysqli_query($connection, $sql);
  $user=mysqli_fetch_assoc($result);
  $connection->close();           
  }
      
  if (isset($_POST['submit'])) {
    $connection = new mysqli($host, $username, $password, $dbname);
    $id       = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $age       = $_POST['age'];
    $location  = $_POST['location'];
    date_default_timezone_set('America/Los_Angeles');
    $modified  = $date = date('Y/m/d H:i:s');
 
    $sql = "UPDATE users SET id = '$id', firstname = '$firstname', lastname = '$lastname', age = '$age', location = '$location',  lastmodified='$modified' WHERE id = '$id'";
    $statement=mysqli_query($connection, $sql);
    $connection->close();
  
    }  
    ?>

  <?php require_once 'process.php'; ?>
    <form method="POST">
    <?php foreach ($user as $key => $value):  ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo ($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <button type="submit" name="submit">Save</button>
    </form>
    <a href="index.php"><i class="fas fa-home"></i></a>
    <a href="read.php"><i class="fas fa-clipboard-list"></i></a>
  <?php include "templates/footer.php"; ?>