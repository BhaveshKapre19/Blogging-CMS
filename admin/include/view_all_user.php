<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>Role</th>
			<th>Edit</th>
			<th>Make Admin</th>
			<th>Make Subscriber</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "select * from users";
			$sel_all_users_qry = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($sel_all_users_qry))
			{
				$user_id = $row['user_id'];
				$username=$row['username'];
				$user_firstname=$row['user_firstname'];
				$user_lastname=$row['user_lastname'];
				$user_email=$row['user_email'];
				$user_role=$row['role'];

				// $post_id_qry = "select * from posts where post_id = '$user_id'";
				// $sel_post_qry = mysqli_query($connection,$post_id_qry);
				// while ($post_catch = mysqli_fetch_assoc($sel_post_qry)) {
				//     $post_catch_id = $post_catch['post_id'];
				//     $post_catch_title = $post_catch['post_title'];
				// }
		?>
			<tr>
				<td><?php echo $user_id; ?></td>
				<td><?php echo $username; ?></td>
				<td><?php echo $user_firstname; ?></td>
				<td><?php echo $user_lastname; ?></td>
				<td><?php echo $user_email; ?></td>
				<td><?php echo $user_role; ?></td>


 				<td><a href="users.php?source=edit_user&u_id=<?php echo $user_id ?>">Edit</a></td>

				<td><a href="users.php?change_admin=<?php echo $user_id; ?>" class="text-primary">Change To Admin</a></td>
				<td><a href="users.php?change_subscriber=<?php echo $user_id; ?>" class="text-danger">Changed To Subscriber</a></td>
				<td><a href="users.php?delete=<?php echo $user_id; ?>" class="text-danger">DELETE</a></td>
			</tr>
		<?php
		}

		if (isset($_GET['delete'])) {
			$delete_user_id = $_GET['delete'];

			$delete_query = "delete from users where user_id = {$delete_user_id}";
			$execute_qry = mysqli_query($connection,$delete_query);
			header("location:users.php");
		}

		if (isset($_GET['change_admin'])) {
			$user_id = $_GET['change_admin'];
			$user_role = "Admin";

			$role_qry = "UPDATE users SET role = '$user_role' WHERE user_id= $user_id;";
			$execute_qry = mysqli_query($connection,$role_qry);
			header("location:users.php");
		}

		if (isset($_GET['change_subscriber'])) {
			$user_id = $_GET['change_subscriber'];
			$user_role = "subscriber";

			$unapproved_qry = "UPDATE users SET role = '$user_role' WHERE user_id= $user_id;";
			$execute_qry = mysqli_query($connection,$unapproved_qry);
			header("location:users.php");
		}
		?>
		<!-- <tr>
				<td>10</td>
				<td>Bhavesh Kapre</td>
				<td>Python Hello</td>
				<td>Python</td>
				<td>Published</td>
				<td>image</td>
				<td>Bk,Python,bhavesh</td>
				<td>20</td>
				<td>22/11/2018</td>
		</tr> -->
	</tbody>
</table>