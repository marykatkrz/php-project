<?php include "templates/header.php"; ?>
  <?php require_once 'process.php'; ?>
  <!-- Create new document -->
    <form action="" method="POST">
        <label>Last Name</label>
        <input type="text" name="lastname">
        <label>First Name</label>
        <input type="text" name="firstname">
        <label>Age</label>
        <input type="text" name="age">
        <label>Location</label>
        <input type="text" name="location">
        <button type="submit" name="save">Submit</button>
    </form>
    <a href="index.php"><i class="fas fa-home"></i></a>
    <a href="read.php"><i class="fas fa-clipboard-list"></i></a>
<?php include "templates/footer.php"; ?>