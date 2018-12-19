<?php
  // Categorie Edit Code
  if (isset($_GET['edit']))
  {
    $cat_up_id = $_GET['edit'];
    $query_update = "select * from categories where cat_id = {$cat_up_id}";
    $sel_update_cat_qry = mysqli_query($connection,$query_update);
    while ($row = mysqli_fetch_assoc($sel_update_cat_qry)) {
      $cat_id_update = $row['cat_id'];
      $cat_title_update = $row['cat_title'];
      ?>
       <form action="" method="post">
          <div class="form-group">
            <label for="cat-title">Edit Categories</label>
            <input type="text" name="cat_title_update" class="form-control" value='<?php echo "$cat_title_update"; ?>'>
          </div>
          <div class="form-group">
            <input type="submit" name="update" value="Edit Categories" class="btn btn-primary">
          </div>
        </form>
      <?php
      // Categorie Edit Code
    }
    if (isset($_POST['update'])) {
      $update_title = $_POST['cat_title_update'];
      $update_cat_query = "update categories set  cat_title = '{$update_title}' where cat_id = {$cat_ID}";
      $update_cat = mysqli_query($connection,$update_cat_query);
      if (!$update_cat) {
        die("Query Faild ".mysqli_error($connection));
      }
    } 
  }
?>
<!-- Catagorie Update Form Code -->
<?php
  
?>
<!-- Catagorie Update Form Code -->