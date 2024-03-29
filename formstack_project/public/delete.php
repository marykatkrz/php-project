<?php
require "../config.php";
if (isset($_GET['id'])) {
    $connection = new mysqli($host, $username, $password, $dbname);
    if($connection->connect_error){
        die("Connection failed:" . $connection->connect_error);
        }
// Delete document
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
    $statement=mysqli_query($connection, $sql);
    if($connection->query($sql)===True){
        echo "Deleted!";
        }
        else
        {
        echo "Error" . $sql . "<br/>" . $connection->error;
        }
$connection->close();
}
?>
<!-- Updated list after deleted document -->
<?php include "templates/header.php"; ?>
  <h2>Documents</h2>
<?php 
  require "../config.php";
  $connection = new mysqli($host, $username, $password, $dbname);
  if($connection->connect_error){
      die("Connection failed:" . $connection->connect_error);
      }
  $sql = "SELECT * FROM users";
  $result = $connection->query($sql);
?>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Location</th>
      <th>Date</th>
      <th>Last Modified</th>
      <th>Last Exported</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo ($row["id"]); ?></td>
      <td><?php echo ($row["firstname"]); ?></td>
      <td><?php echo ($row["lastname"]); ?></td>
      <td><?php echo ($row["age"]); ?></td>
      <td><?php echo ($row["location"]); ?></td>
      <td><?php echo ($row["date"]); ?></td>
      <td><?php echo ($row["lastmodified"]); ?></td>
      <td><?php echo ($row["lastexported"]); ?></td>
      <td><a href="update.php?id=<?php echo ($row['id']);?>"><i class="fas fa-edit"></i></a></td> 
      <td><a name="update" href="delete.php?id=<?php echo ($row['id']);?>"><i class="fas fa-trash-alt"></i></a></td>     
      <td><a name="export" href="export.php?id=<?php echo ($row['id']);?>"><i class="fas fa-file-export"></i></a></td>     
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php"><i class="fas fa-home"></i></a>
<?php include "templates/footer.php"; ?>