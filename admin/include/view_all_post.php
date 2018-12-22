<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Tags</th>
			<th>Comments</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "select * from posts";
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
				<td><?php echo $post_id; ?></td>
				<td><?php echo $post_author; ?></td>
				<td><?php echo $post_title; ?></td>
				<td><?php echo $cat_catch_title; ?></td>
				<td><?php echo $post_status; ?></td>
				<td><img src='../image/<?php echo $post_image; ?>' alt="image" width='100'></td>
				<td><?php echo $post_tags; ?></td>
				<td><?php echo $post_comment_count; ?></td>
				<td><?php echo $post_date; ?></td>
				<td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id; ?>" class="text-primary">EDIT</a></td>
				<td><a href="posts.php?delete=<?php echo $post_id; ?>" class="text-danger">DELETE</a></td>
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