<?php 
if (isset($_POST['create_post'])) {
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];


	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');


    $uploade_query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,`post_status`) VALUES ('$post_category_id', '$post_title','$post_author', CURRENT_DATE(), '$post_image', '$post_content', '$post_tags','$post_status');";
    $add_Post_qry = mysqli_query($connection,$uploade_query);
    confirm($add_Post_qry);

	move_uploaded_file($post_image_temp, "../image/".$post_image);
}
?> 

<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
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
		<input type="text" name="author" class="form-control" value="Admin">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status </label>
		<input type="text" name="post_status" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" value="Publish Post" name="create_post" class=" btn btn-primary">
	</div>
</form>