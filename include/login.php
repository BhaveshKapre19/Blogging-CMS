<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php 
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($connection,$username);
	$password = mysqli_real_escape_string($connection,$password);

	$query = "SELECT * FROM users WHERE username = '$username'";
	$sel_qry = mysqli_query($connection,$query);
	if (!$sel_qry) {
		die("MYSQLI ERROR".mysqli_error($connection));
	}

	while ($row = mysqli_fetch_array($sel_qry)) {
	    $db_user_id = $row['user_id'];
	    $db_user_fname = $row['user_firstname'];
	    $db_user_lname = $row['user_lastname'];
	    $db_username = $row['username'];
	    $db_user_password = $row['user_password'];
	    $db_user_role = $row['role'];
	}
    $password = crypt($password,$db_user_password);

	if ($username === $db_username && $password === $db_user_password) {
		$_SESSION['username'] = $db_username;
		$_SESSION['Firstname'] = $db_user_fname;
		$_SESSION['Lastname'] = $db_user_lname;
		$_SESSION['user_role'] = $db_user_role;

		header("Location:../admin/");
	}
	else{
		header("Location:../index.php");
	}
}
?>