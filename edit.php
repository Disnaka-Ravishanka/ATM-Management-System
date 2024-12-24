<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $user_type = $_POST['user_type'];

  $sql = "UPDATE `user_form` SET `name`='$name', `email`='$email',`user_type`='$user_type' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: user-man.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>DS User Management System</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    DS User Management System
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Give <strong>Admin</strong> access to User</p>
    </div>

    <?php
    $sql = "SELECT * FROM `user_form` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name (Read Only):</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" readonly>
          </div>

        </div>

        <div class="mb-3">
          <label class="form-label">Email (Read Only):</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" readonly>
        </div>
        <div class="mb-3">
    <label class="form-label">User Type:</label>
    <select class="form-control" name="user_type">
        <option value="user" <?php if ($row['user_type'] === 'user') echo 'selected'; ?>>User</option>
        <option value="admin" <?php if ($row['user_type'] === 'admin') echo 'selected'; ?>>Admin</option>
    </select>
</div>

      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="user-man.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>