<?php
/*
Template Name:blogs
*/
?>
<?php get_header();?>
<body class="blog">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(273,'title',true)){ ?>
	<h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('273');}?></h1>
        <div class="banner">
            <?php
            $post_id=261;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $excerpt=$post_info->post_excerpt;
             ?>
            <div class="text page-width">
                <h2><?php echo $title;?></h2>
                <?php echo $content;?>
                <?php if (strlen($excerpt) > 0): ?>
                <div class="btn">
                    <a href="<?php echo get_page_link(269)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
                <?php endif; ?>
            </div>
           
        </div>
        <div class="card">
            <div class="container">
                <div class="text page-width">
            <?php
                $post_id=290;
                $post_info=get_post($post_id);
                $title=$post_info->post_title;
                $content=$post_info->post_content;
                $excerpt=$post_info->post_excerpt;
                $pre=get_post_meta($post_id,'pre',true);
                 ?>
            <div class="title">
                <h2><?php echo $title;?></h2>
            </div>
            <div class="column">
            <?php echo $content;?>
            </div>
        </div>
        </div>
    </div>
        <div class="content blog-bar section">
            <div class="container page-width">
                <?php 
                $args=array(
                    'category__not_in'=>array(26),
                    'orderby'=>date,
                    'order'=>DESC,
                    'showposts'=>12,
                    'paged'=>$paged
                    );
                query_posts($args);
                while(have_posts()):the_post();
                ?>
<?php $_categories = get_the_category(); ?>
<?php $_category_ids = array_map(function($c) { return 'category-'.$c->term_id; }, $_categories); ?>
                <div class="blog-item <?php echo implode(' ', $_category_ids); ?>">
                    <img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0];?>" alt="">
                    <div class="text">
			<span class="blog-date-bg"></span>
                        <span class="blog-date"><?php the_time('m/d')?></span>
			<div class="blog-title"><h4>
			    <?php the_title();?>
			</h4></div>
                     </div>
                    <a href="<?php the_permalink();?>"></a>
                </div>
                <?php endwhile;wp_reset_query();?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="next">
            <a href="<?php echo get_page_link(275)?>" class="blog-next">下一组</a>
            <a href="<?php echo get_page_link(275)?>">显示全部</a>
        </div>
       <?php get_sidebar();?>
       <?php get_footer();?>