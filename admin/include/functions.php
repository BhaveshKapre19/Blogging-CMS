<?php 
function insert_categories(){
	global $connection;
	if (isset($_POST['submit'])) {
    	$catTitle = $_POST['cat_title'];
    	if ($catTitle=="" || empty($catTitle)) {
      		echo "<h4 class='text-danger'>This Feild Should Not Be Empty</h4>";
    	}
    	else
    	{
	      $query_insert_cat="INSERT INTO categories(cat_title) VALUES ('{$catTitle}');";
	      $create_cat_qey = mysqli_query($connection,$query_insert_cat);
	      if (!$create_cat_qey) {
	      die('Insert Failed' .mysqli_error($connection));
	      }
	    }
    }
}
function showallCategories(){
	global $connection;
	$query = "select * from categories";
  $sel_all_cat_qry = mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($sel_all_cat_qry))
  {
    $cat_id = $row['cat_id'];
    $cat_title=$row['cat_title'];
  ?>
    <tr>
      <td><?php echo "{$cat_id}" ?></td>
      <td><?php echo "{$cat_title}" ?></td>
      <td>
        <?php 
          echo "<a href='http://localhost/Cms%20Blogger/admin/categories.php?delete={$cat_id}' class='text-danger'>Delete</a>"; 
        ?>
      </td>
      <td>
        <?php 
          echo "<a href='http://localhost/Cms%20Blogger/admin/categories.php?edit={$cat_id}' class='text-primary'>Edit</a>"; 
        ?>
      </td>
    </tr>
  <?php
  }
}
function DeleteCategories(){
	global $connection;
	if (isset($_GET['delete']))
    {
      $del_cat_id = $_GET['delete'];
      $qry1del = "DELETE FROM categories WHERE cat_id = {$del_cat_id}";
      $del_qry_ex = mysqli_query($connection,$qry1del);
      header("location: categories.php");
    }
}
?>