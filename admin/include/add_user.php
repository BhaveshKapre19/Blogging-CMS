<?php 
if (isset($_POST['add_user'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	$user_password = $_POST['user_password'];
	$user_role = $_POST['user_role'];


	// $user_image = $_FILES['user_image']['name'];
	// $user_image_temp = $_FILES['user_image']['tmp_name'];

	$user_email = $_POST['user_email'];

	$user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 12));


    $addUser_query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email,role) VALUES ('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email','$user_role');";
    $add_user_qry = mysqli_query($connection,$addUser_query);
    confirm($add_user_qry);

    echo '<h4>User Created : <a href="users.php">User Created</a></h4>';

	// move_uploaded_file($user_image_temp, "../image/".$user_image);
}
?> 

<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="uesr_firstname">Firstname</label>
		<input type="text" name="user_firstname" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="uesr_lastname">LastName</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_role">
			<select name="user_role" id="user_role">
				<option value="subscriber">Select user Role</option>
				<option value="Admin">Admin</option>
				<option value="subscriber">Subscriber</option>
			</select>
		</label>
	</div>
	<!-- <div class="form-group">
		<label for="user_image">userImage</label>
		<input type="file" name="user_image">
	</div> -->
	<div class="form-group">
		<label for="userEmail">Email</label>
		<input type="text" name="user_email" class="form-control">
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_content">Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" value="Add User" name="add_user" class=" btn btn-primary">
	</div>
</form>