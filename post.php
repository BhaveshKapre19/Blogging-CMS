<?php include 'include/db.php'; ?>
<?php include 'include/header.php';?>
<body>
     <!-- Navigation -->
     <?php include 'include/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 
                if (isset($_GET['post_id'])) {
                    $get_post_id = $_GET['post_id'];
                }
                $query = "select * from posts where post_id = $get_post_id";
                $sel_all_post = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($sel_all_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_comment_count = $row['post_comment_count'];
                    ?>
                            
                    <h1 class="page-header">
                        Page Heading
                    <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?post_id_to_get_the_url_by_somrthing=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="image/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>

                    <hr>
          <?php } ?>
          <!-- Blog Comments -->
                     <?php
                     if (isset($_POST['create_comment'])) {
                          $get_post_id = $_GET['post_id'];
                          $comment_author = $_POST['comment_author'];
                          $comment_email = $_POST['comment_email'];
                          $comment_content = $_POST['comment_content'];

                          $the_insert_commentQry = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES (' $get_post_id', '$comment_author', '$comment_email', '$comment_content', 'Unapproved', CURRENT_DATE());";

                          $running_the = mysqli_query($connection,$the_insert_commentQry);

                          $qry_to_inc_cc = "UPDATE posts SET post_comment_count = post_comment_count+1   WHERE post_id = $get_post_id;" ;

                          $update_comment_count = mysqli_query($connection,$qry_to_inc_cc);
                      } 
                     ?> 


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
               <!--  $get_comment_date = $row['comment_date'];
                     $get_comment_author = $row['comment_author'];
                     $get_comment_content = $row['comment_content']; -->


                <?php 
                 $qry_sel_com = "select * from comments where comment_post_id = '$get_post_id' and comment_status = 'Approved' order by comment_id desc";

                 $exe_qry = mysqli_query($connection,$qry_sel_com);


                  while ($get_comment = mysqli_fetch_array($exe_qry) ) {
                      $get_comment_date = $get_comment['comment_date'];
                      $get_comment_author = $get_comment['comment_author'];
                      $get_comment_content = $get_comment['comment_content'];
                     ?>
                      <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $get_comment_author; ?>
                            <small><?php echo $get_comment_date; ?></small>
                            </h4>
                            <?php echo $get_comment_content; ?>
                        </div>
                    </div>

                    <!-- Comment -->
                     <?php
                 }
                ?>

               
                
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'include/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include 'include/footer.php'; ?>