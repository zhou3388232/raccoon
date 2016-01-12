<?php get_header();?>
<body class="work">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="clear"></div>
    <div class="main">
        <div class="banner">
            <?php
            $post_id=13;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $excerpt=$post_info->post_excerpt;
             ?>
            <div class="text page-width">
                <h2><?php echo $title;?></h2>
                <p><?php echo $content;?></p>
                <div class="btn">
                    <a href="<?php echo get_category_link(6)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
            </div>
           
        </div>
        <div class="card">
            <div class="container">
                <div class="text">
            <?php
            $post_id=115;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $pre=get_post_meta($post_id,'pre',true);
             ?>
            <div class="title">
                <h2><?php echo $pre;?><span><?php echo $title;?></span><h2>
            </div>
            <?php echo $content;?>
        </div>
    </div>
        </div>
        <div class="sidebar"></div>
        <div class="content">
            <div class="section-1 section">
                <div class="page-width">
                    <div class="container">
                        <div class="text">
                            <?php
                            $post_id=117;
                            $post_info=get_post($post_id);
                            $title=$post_info->post_title;
                            $content=$post_info->post_content;
                            $pre=get_post_meta($post_id,'pre',true);
                             ?>
                            <div class="title">
                                <h3><?php echo $title;?></h3>
                            </div>
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $args=array(
                    'category__and'=>array(17),
                    'orderby'=>id,
                    'order'=>ASC,
                    'showposts'=>9,
                    'paged'=>$paged
                    );
                query_posts($args);
                while(have_posts()):the_post();
                ?>
            <div class="section-3 section">
                <div class="page-width">
                    <div class="container">
                    <div class="text">
                        <div class="title">
                            <h3><?php the_title();?></h3>
                        </div>
                        <?php the_content();?>
                    </div>
                    <div class="pic">
                        <a href=""><img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0];?>"></a>
                    </div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="clear"></div>
        <?php get_sidebar();?>
        <?php get_footer();?>