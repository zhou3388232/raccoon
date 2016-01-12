<?php get_header();?>
<body class="introduces">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="clear"></div>
    <div class="main">
        <div class="banner">
            <?php
            $post_id=15;
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
            <div class="page-width">
                <?php
                $post_id=71;
                $post_info=get_post($post_id);
                $title=$post_info->post_title;
                $content=$post_info->post_content;
                $excerpt=$post_info->post_excerpt;
                $pre=get_post_meta($post_id,'pre',true);
                 ?>
                <div class="title">
                    <h2><?php echo $pre;?><span><?php echo $title;?></span><h2>
                </div>
                <?php echo $content;?>
                <div class="btn">
                    <a href="<?php echo get_category_link(6)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="section-2 section">
                <div class="container page-width">
                    <div class="text">
                        <?php
                        $post_id=80;
                        $post_info=get_post($post_id);
                        $title=$post_info->post_title;
                        $content=$post_info->post_content;
                        $excerpt=$post_info->post_excerpt;
                        $pre=get_post_meta($post_id,'pre',true);
                         ?>
                        <div class="title">
                            <h2><?php echo $pre;?><span><?php echo $title;?></span><h2>
                        </div>
                        <?php echo $content;?>
                    </div>
                    <div class="pic">
                        <?php 
                        $args=array(
                            'category__and'=>array(15),
                            'orderby'=>id,
                            'order'=>ASC,
                            'showposts'=>4,
                            'paged'=>$paged
                            );
                        query_posts($args);
                        while(have_posts()):the_post();
                        ?>
                        <div class="pic-img">
                            <a href=""><span><?php the_content();?></span></a>
                            <img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0];?>">
                        </div>
                        <?php endwhile;wp_reset_query();?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        <?php get_sidebar();?>
        <?php get_footer();?>