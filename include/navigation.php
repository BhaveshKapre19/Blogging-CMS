
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/blogger">Home Page</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php 
                     $query = "select * from categories";
                     $sel_all_cat_qry = mysqli_query($connection,$query);
                     while ($row = mysqli_fetch_assoc($sel_all_cat_qry)) {
                        $cat_title=$row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                     }

                     if (isset($_SESSION['user_role'])) {
                       if (isset($_GET['post_id'])) {
                         $post_id_A = $_GET['post_id'];?>
                         <li><a href='admin/posts.php?source=edit_post&p_id=<?php echo $post_id_A; ?>'>Edit Post</a></li>
                         <?php
                       }
                      }
                    ?>
                    <?php if(isset($_SESSION['user'])) { ?>
                        <li><a href="http://localhost/blogger/registration.php">Register</a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>