<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response To</th>
			<th>Date</th>
			<th>Approve</th>
			<th>Unapprove</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "select * from comments";
			$sel_all_comments_qry = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($sel_all_comments_qry))
			{
				$comment_id = $row['comment_id'];
				$comment_author=$row['comment_author'];
				$comment_post_id=$row['comment_post_id'];
				$comment_email=$row['comment_email'];
				$comment_status=$row['comment_status'];
				$comment_content=$row['comment_content'];
				$comment_date=$row['comment_date'];

				// $cat_id_qry = "select * from categories where cat_id = '$comment_category_id'";
				// $sel_cat_qry = mysqli_query($connection,$cat_id_qry);
				// while ($cat_catch = mysqli_fetch_assoc($sel_cat_qry)) {
				//     $cat_catch_id = $cat_catch['cat_id'];
				//     $cat_catch_title = $cat_catch['cat_title'];
				// }
		?>
			<tr>
				<td><?php echo $comment_id; ?></td>
				<td><?php echo $comment_author; ?></td>
				<td><?php echo $comment_content; ?></td>
				<td><?php echo $comment_email; ?></td>
				<td><?php echo $comment_status; ?></td>
				<td><?php echo $comment_post_id; ?></td>
				<td><?php echo $comment_date; ?></td>
				<td><a href="comments.php?source=edit_comment&comment_id=<?php echo $comment_id; ?>" class="text-primary">Approved</a></td>
				<td><a href="comments.php?delete=<?php echo $comment_id; ?>" class="text-danger">Unapproved</a></td>
				<!-- <td><a href="comments.php?source=edit_comment&p_id=<?php echo $comment_id; ?>" class="text-primary">EDIT</a></td> -->
				<td><a href="comments.php?delete=<?php echo $comment_id; ?>" class="text-danger">DELETE</a></td>
			</tr>
		<?php
		}

		if (isset($_GET['delete'])) {
			$delete_comment_id = $_GET['delete'];

			$delete_query = "delete from comments where comment_id = {$delete_comment_id}";
			$execute_qry = mysqli_query($connection,$delete_query);
			header("location:comments.php");
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