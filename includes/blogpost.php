<?php

$posts = $obj->display_post();

?>

<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">

            <?php while ($post_data = mysqli_fetch_assoc($posts)) { ?>



                <div class="col-lg-12">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="upload/<?php echo $post_data['post_img'] ?>">
                        </div>
                        <div class="down-content">
                            <span><?php echo $post_data['cat_name']; ?> </span>
                            <a href="post-details.html">
                                <h4><?php echo $post_data['post_title']; ?></h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#"><?php echo $post_data['post_author']; ?></a></li>
                                <li><a href="#"><?php echo $post_data['post_date']; ?></a></li>
                                <li><a href="#"><?php echo $post_data['post_comment_count']; ?></a></li>
                            </ul>
                            <p> <?php echo $post_data['post_summery']; ?> </p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-6">
                                        <?php echo $post_data['post_tag']; ?>
                                    </div>
                                    <div class="col-6">
                                        <ul class="post-share">
                                            <li><i class="fa fa-share-alt"></i></li>
                                            <li><a href="#">Facebook</a>,</li>
                                            <li><a href="#"> Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php  }  ?>


        </div>
    </div>
</div>