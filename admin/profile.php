<?php include 'include/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $qry = "select * from users where username = '$username'";
  $sel_qry = mysqli_query($connection,$qry);
  while ($row = mysqli_fetch_array($sel_qry)) {
    $user_id = $row['user_id'];
    $username=$row['username'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_email=$row['user_email'];
    $user_role=$row['role'];
    $user_password=$row['user_password'];
    $user_image=$row['user_image'];
  }
}




if (isset($_POST['update_user'])) {
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $username = $_POST['username'];
  $user_password = $_POST['user_password'];
  $user_role = $_POST['user_role'];


  // $user_image = $_FILES['user_image']['name'];
  // $user_image_temp = $_FILES['user_image']['tmp_name'];

  $user_email = $_POST['user_email'];


    $addUser_query = "UPDATE users SET username = '$username', user_password = '$user_password', user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', role = '$user_role' WHERE user_id = $user_id";
    $add_user_qry = mysqli_query($connection,$addUser_query);
    confirm($add_user_qry);

  // move_uploaded_file($user_image_temp, "../image/".$user_image);
}
?>




<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php include 'include/navigation.php'; ?>
    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
            Admin Panel
            <small>Author Name</small>
            </h1>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label for="uesr_firstname">Firstname</label>
                <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>">
              </div>
              <div class="form-group">
                <label for="uesr_lastname">LastName</label>
                <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>">
              </div>
              <div class="form-group">
                <label for="user_role">
                  <select name="user_role" id="user_role">
                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                    <?php
                    if ($user_role == 'admin') { ?>
                    <option value="subscriber">Subscriber</option><?php
                    }
                    else { ?>
                    <option value="Admin">Admin</option> <?php
                    }
                    ?>
                  </select>
                </label>
              </div>
              <!-- <div class="form-group">
                <label for="user_image">userImage</label>
                <input type="file" name="user_image">
              </div> -->
              <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="text" name="user_email" class="form-control" value="<?php echo $user_email ?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
              </div>
              <div class="form-group">
                <label for="user_content">Password</label>
                <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
              </div>
              <div class="form-group">
                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <?php include 'include/footer.php'; ?>