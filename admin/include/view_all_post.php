<?php 
if (isset($_POST['checkBoxArray'])) {
	foreach ($_POST['checkBoxArray'] as $checkBoxValue_id) {
	 $bulkOption = $_POST['bulk_options'];
	 switch ($bulkOption) {
	 	case 'Published':
	 	 $qry_pub = "UPDATE posts SET post_status = 'Published' WHERE post_id = $checkBoxValue_id";
	 	 $update_Qry = mysqli_query($connection,$qry_pub); 
	 	 confirm($update_Qry);
	 	break;

	 	case 'Draft':
	 	 $qry_dra = "UPDATE posts SET post_status = 'Draft' WHERE post_id = $checkBoxValue_id";
	 	 $update_Qry = mysqli_query($connection,$qry_dra); 
	 	break;

	 	case 'Delete':
	 	 $qry_del = "delete from posts where post_id = $checkBoxValue_id";
	 	 $update_Qry = mysqli_query($connection,$qry_del); 
	 	break;

	 	case 'Clone':
	 	    $qry_get = "SELECT * FROM posts WHERE post_id = $checkBoxValue_id";
	 	    $exe_selall = mysqli_query($connection,$qry_get);
	 	    while ($row = mysqli_fetch_array($exe_selall)) {
	 	        $post_category_id = $row['post_category_id'];
	 	        $post_title = $row['post_title'];
	 	        $post_author = $row['post_author'];
	 	        $post_date = $row['post_date'];
	 	        $post_image = $row['post_image'];
	 	        $post_content = $row['post_content'];
	 	        $post_tags = $row['post_tags'];
	 	        $post_status = $row['post_status'];
	 	    }
	 		$qry_clone = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,`post_status`) VALUES ('$post_category_id', '$post_title','$post_author', CURRENT_DATE(), '$post_image', '$post_content', '$post_tags','$post_status');";
	 	 	$update_Qry = mysqli_query($connection,$qry_clone); 
	 	break;
	 	
	 }
	}
}
?>



<form action="" method="post">
<table class="table table-bordered table-hover">
	<div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">
		<select name="bulk_options" id="" class="form-control">
			<option value="">SELECT OPTIONS</option>
			<option value="Published">PUBLISHED</option>
			<option value="Draft">DRAFT</option>
			<option value="Clone">Clone</option>
			<option value="Delete">DELETE</option>
		</select>
	</div>
	<div class="col-xs-4">
		<input type="submit" name="submit" class="btn btn-success" value="Apply">
		<a href="posts.php?source=add" class="btn btn-primary">Add Post</a>
	</div><br><br><br>
	<thead>
		<tr>
			<th><input type="checkbox" id="selectAllBoxs"></th>
			<th>Id</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Tags</th>
			<th>Comments</th>
			<th>Date</th>
			<th>View Post</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "SELECT * FROM posts order by post_id DESC";
			$sel_all_posts_qry = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($sel_all_posts_qry))
			{
				$post_id = $row['post_id'];
				$post_author=$row['post_author'];
				$post_title=$row['post_title'];
				$post_category_id=$row['post_category_id'];
				$post_status=$row['post_status'];
				$post_image=$row['post_image'];
				$post_tags=$row['post_tags'];
				$post_comment_count=$row['post_comment_count'];
				$post_date=$row['post_date'];

				$cat_id_qry = "select * from categories where cat_id = '$post_category_id'";
				$sel_cat_qry = mysqli_query($connection,$cat_id_qry);
				while ($cat_catch = mysqli_fetch_assoc($sel_cat_qry)) {
				    $cat_catch_id = $cat_catch['cat_id'];
				    $cat_catch_title = $cat_catch['cat_title'];
				}
		?>
			<tr>
				<td><input type="checkbox" class="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
				<td><?php echo $post_id; ?></td>
				<td><?php echo $post_author; ?></td>
				<td><?php echo $post_title; ?></td>
				<td><?php echo $cat_catch_title; ?></td>
				<td><?php echo $post_status; ?></td>
				<td><img src='../image/<?php echo $post_image; ?>' alt="image" width='100'></td>
				<td><?php echo $post_tags; ?></td>
				<td><?php echo $post_comment_count; ?></td>
				<td><?php echo $post_date; ?></td>
				<td><a href="../post.php?post_id=<?php echo $post_id; ?>" class="text-primary">View Post</a></td>
				<td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id; ?>" class="text-primary">EDIT</a></td>
				<td><a onclick="javascript:return confirm('Are You Sure To Delete This Post');" href="posts.php?delete=<?php echo $post_id; ?>" class="text-danger">DELETE</a></td>
			</tr>
		<?php
		}

		if (isset($_GET['delete'])) {
			$delete_post_id = $_GET['delete'];

			$delete_query = "delete from posts where post_id = {$delete_post_id}";
			$execute_qry = mysqli_query($connection,$delete_query);
			header("location:posts.php");
		}
		?>
	</tbody>
</table>
</form>