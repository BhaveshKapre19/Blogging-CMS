<?php include 'include/header.php'; ?>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php include 'include/navigation.php'; ?>
    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Admin Panel
              <small>Author Name</small>
            </h1>
            <!-- Add Categories Form -->
            <div class="col-xs-6">
              <?php
              // add categorie Code
              insert_categories();
              // add categorie Code
              ?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat-title">Categorie Title</label>
                  <input type="text" name="cat_title" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Add Categories" class="btn btn-primary">
                </div>
              </form>
              <!-- Add categorie Form -->

              
              <!-- update cate form -->
              <?php
              if (isset($_GET['edit'])) {
                $cat_ID = $_GET['edit'];
                include 'include/update_categorie.php';
              } 
              ?>
              <!-- update cate form -->
            </div>
            
            <div class="col-xs-6">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td>Id </td>
                    <td>Categorie Title</td>
                    <td>Delete</td>
                    <td>Update</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // data display code
                    showallCategories();
                    // data display code
                    
                    // Delete Code
                    DeleteCategories();
                    // Delete Code
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <?php include 'include/footer.php'; ?>