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
			<?php
			if ($_GET['source']){
				$source = $_GET['source'];
			}
			switch ($source) {
			 	case 'Add':
			 		// code...
			 	    include 'include/add_post.php';
			 		break;
			 	
			 	default:
			 		// code...
			 	    include 'include/view_all_post.php';
			 		break;
			 } 
			?>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <?php include 'include/footer.php'; ?>