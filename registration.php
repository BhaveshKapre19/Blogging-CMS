<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>

<?php 
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $password = password_hash($password,PASSWORD_BCRYPT,array('cost' => 12));

    // $Qry = "select randSalt from users";
    // $exe_qry1 = mysqli_query($connection,$Qry);
    // if (!$exe_qry1) {
    //     die("Failed " . mysqli_error($connection));
    // }
    // $row = mysqli_fetch_array($exe_qry1);
    // $salt = $row['randSalt'];

    // $password = crypt($password,$salt);

    $qry = "INSERT INTO users (username,user_password,user_email,role) VALUES ('$username', '$password', '$email', 'subscriber')";
    $exe_qry = mysqli_query($connection,$qry);

    if (!$exe_qry) {
        die("Error" .mysqli_error($connection));
    }
    $message = "Your Registration Submited";
}
?>



    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
<?php if (isset($message)) {
?><h4 class="bg-success text-center"><?php echo $message; ?></h4><br><?php
} ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required="">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required="">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
