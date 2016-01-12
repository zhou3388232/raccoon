<?php get_header();?>
<body class="blog">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="clear"></div>
    <div class="main">
        <div class="banner">
            <?php
            $post_id=11;
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
                $post_id=95;
                $post_info=get_post($post_id);
                $title=$post_info->post_title;
                $content=$post_info->post_content;
                $excerpt=$post_info->post_excerpt;
                $pre=get_post_meta($post_id,'pre',true);
                 ?>
            <div class="title">
                <h2><?php echo $pre;?><span><?php echo $title;?></span></h2>
            </div>
            <?php echo $content;?>
        </div>
        </div>
    </div>
        <div class="content blog-bar section">
            <div class="container page-width">
                <?php 
                $args=array(
                    'category__and'=>array(16),
                    'orderby'=>id,
                    'order'=>ASC,
                    'showposts'=>9,
                    'paged'=>$paged
                    );
                query_posts($args);
                while(have_posts()):the_post();
                ?>
                <div class="blog">
                    <img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0];?>" alt="">
                    <div class="text">
                        <div class="title">
                            <span class="bolg-date"><?php the_time('m月/d日');?></span>
                        </div>
                        <?php the_excerpt();?>
                    </div>
                    <a href="<?php the_permalink();?>">阅读全文</a>
                </div>
                <?php endwhile;wp_reset_query();?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="next">
            <a href="<?php echo get_category_link(18)?>" class="blog-next">下一组</a>
            <a href="<?php echo get_category_link(18)?>">显示全部</a>
        </div>
       <?php get_sidebar();?>
       <?php get_footer();?>