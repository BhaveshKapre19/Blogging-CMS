<?php 
if (isset($_GET['u_id'])) {
	$the_user_id=$_GET['u_id'];
}

$query = "select * from users where user_id = {$the_user_id}";
$sel_all_user_qry = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($sel_all_user_qry))
{
    $user_firstname = $row['user_firstname'];
	$user_lastname = $row['user_lastname'];
	$username = $row['username'];
	$user_password = $row['user_password'];
	$user_role = $row['role'];


	// $user_image = $_FILES['user_image']['name'];
	// $user_image_temp = $_FILES['user_image']['tmp_name'];

	$user_email = $row['user_email'];

}



if (isset($_POST['edit_user'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	$user_password = $_POST['user_password'];
	$user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];

	// $user_image = $_FILES['user_image']['name'];
	// $user_image_temp = $_FILES['user_image']['tmp_name'];
    // $query_salt = "select randSalt from users";
    // $exe_qry = mysqli_query($connection,$query_salt);
    // $row = mysqli_fetch_array($exe_qry);
    // $salt = $row['randSalt'];

    $hashed_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 12));
	


    $addUser_query = "UPDATE users SET username = '$username', user_password = '$hashed_password', user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', role = '$user_role' WHERE user_id = $the_user_id";
    $add_user_qry = mysqli_query($connection,$addUser_query);
    confirm($add_user_qry);

	// move_uploaded_file($user_image_temp, "../image/".$user_image);
}
?> 

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
		<input type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" value="Edit User" name="edit_user" class="btn btn-primary">
	</div>
</form>