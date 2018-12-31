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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $sel_qry = "select * from posts";
                            $exe_qry = mysqli_query($connection,$sel_qry);
                            $post_count = mysqli_num_rows($exe_qry); 
                        ?>
                  <div class='huge'><?php echo $post_count; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $sel_qry = "select * from comments";
                            $exe_qry = mysqli_query($connection,$sel_qry);
                            $comment_count = mysqli_num_rows($exe_qry); 
                        ?>
                     <div class='huge'><?php echo $comment_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $sel_qry = "select * from users";
                            $exe_qry = mysqli_query($connection,$sel_qry);
                            $users_count = mysqli_num_rows($exe_qry); 
                        ?>
                    <div class='huge'><?php echo  $users_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $sel_qry = "select * from categories";
                            $exe_qry = mysqli_query($connection,$sel_qry);
                            $cate_count = mysqli_num_rows($exe_qry); 
                        ?>
                        <div class='huge'><?php echo $cate_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
<?php 
$sel_qry_postp = "select * from posts where post_status = 'Published'";
$exe_qry_postp = mysqli_query($connection,$sel_qry_postp);
$post_Published_count = mysqli_num_rows($exe_qry_postp);

$sel_qry_post = "select * from posts where post_status = 'Draft'";
$exe_qry_post = mysqli_query($connection,$sel_qry_post);
$post_draft_count = mysqli_num_rows($exe_qry_post); 

$sel_qry_comment = "select * from comments where comment_status = 'Unapproved'";
$exe_qry_comment = mysqli_query($connection,$sel_qry_comment);
$comment_unapproved_count = mysqli_num_rows($exe_qry_comment); 

$sel_qry_users = "select * from users where role = 'subscriber'";
$exe_qry_users = mysqli_query($connection,$sel_qry_users);
$uses_subscribers_count = mysqli_num_rows($exe_qry_users); 
?>

<div class="row">
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Data', 'Count'],
    <?php
     $element_text = ["All Post","Active Post","Draft Post","Comments","Unapproved Comments","Users","Subscribers","Categories"]; 
     $element_counts = [$post_count,$post_Published_count,$post_draft_count,$comment_count,$comment_unapproved_count,$users_count,$uses_subscribers_count,$cate_count];
     for ($i = 0; $i < 8; $i++) {
          echo "['$element_text[$i]'" . " , " . "$element_counts[$i]],";
      } 
    ?>
    ]);
    var options = {
    chart: {
    title: '',
    subtitle: '',
    }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
</div>

            </div>
            <!-- /.container-fluid -->

       <?php include 'include/footer.php'; ?>
       