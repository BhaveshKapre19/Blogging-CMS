<div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form> <!-- form search --> 
                    <!-- /.input-group -->
                </div>


                <!-- Blog login Well -->
                <div class="well">
                    <h4>Blog Login</h4>
                    <form method="post" action="include/login.php">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="UserName">
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit</button>
                            </span>
                        </div>
                    </form> <!-- form login --> 
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                                  $query = "select * from categories";
                                  $sel_all_cat_qry_sidebar = mysqli_query($connection,$query);
                                  while ($row = mysqli_fetch_assoc($sel_all_cat_qry_sidebar))
                                  {
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    ?>
                                    <li><a href='category.php?cat_id=<?php echo $cat_id; ?>'><?php echo $cat_title ?></a></li>
                                    <?php
                                  }
                                   
                                ?>
                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'widget.php'; ?>

            </div>