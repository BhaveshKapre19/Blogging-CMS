<?php
if (isset($_GET['p_id'])) {
	$the_post_id=$_GET['p_id'];
}

$query = "select * from posts where post_id = {$the_post_id}";
$sel_all_posts_qry = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($sel_all_posts_qry))
{
    $post_id = $row['post_id'];
	$post_content = $row['post_content'];
	$post_author=$row['post_author'];
	$post_title=$row['post_title'];
	$post_category_id=$row['post_category_id'];
	$post_status=$row['post_status'];
	$post_image=$row['post_image'];
	$post_tags=$row['post_tags'];
	$post_comment_count=$row['post_comment_count'];
	$post_date=$row['post_date'];
}

if (isset($_POST['update_post'])) {
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];


	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_coment_count = 2;

	$qry_update ="UPDATE posts SET post_category_id ='$post_category_id', post_title='$post_title',post_author= '$post_author',post_date=now(),post_image='$post_image',post_content='$post_content', post_tags='$post_tags',post_comment_count='$post_coment_count',post_status='$post_status' WHERE post_id  = 3;";

    $qry_update_1 = mysqli_query($connection,$qry_update);


	move_uploaded_file($post_image_temp, "../image/".$post_image);
}
?>




<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="post_title" class="form-control" value="<?php echo $post_title; ?>">
	</div>
	<div class="form-group">
		<label for="post_category_id">Post Category</label>
		<select name="post_category_id" id="post_category">
			<?php
			 $query = "select * from categories";
			 $sel_all_cat_qry = mysqli_query($connection,$query);
			 confirm($sel_all_cat_qry);
			 while ($row = mysqli_fetch_assoc($sel_all_cat_qry))
			 {
			 	$cat_id = $row['cat_id'];
			   	$cat_title=$row['cat_title'];
			   	?>
			   	<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
			   	<?php
			 } 
			?>
		</select>
	</div>
	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" name="post_author" class="form-control" value="<?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status </label>
		<input type="text" name="post_status" class="form-control" value="<?php echo $post_status; ?>">
	</div>
	<div class="form-group">
		<img src="../image/<?php echo $post_image; ?>" alt="" width="100">
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags; ?>">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_tags; ?>
			
		</textarea>
	</div>
	<div class="form-group">
		<input type="submit" value="Update Post" name="update_post" class=" btn btn-primary">
	</div>
</form>