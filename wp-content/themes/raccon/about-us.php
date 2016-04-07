<?php
/*
Template Name:about-us
*/
?>
<?php get_header();?>
<body class="about">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(271,'title',true)){ ?>
	<h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('271');}?></h1> 
        <div class="banner">
            <?php
            $post_id=260;
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
                    <a href="<?php echo get_category_link(6)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
                <?php endif;?>
            </div>         
        </div>
        <div class="card">
            <div class="container">
                <div class="text page-width">
            <?php
            $post_id=285;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
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
        <div class="sidebar"></div>
        <div class="content">
            <div class="section-1 section">
                <div class="page-width">
                    <div class="container">
                        <div class="text">
                            <?php
                            $post_id=286;
                            $post_info=get_post($post_id);
                            $title=$post_info->post_title;
                            $content=$post_info->post_content;
                            $pre=get_post_meta($post_id,'pre',true);
                             ?>
                            <div class="title">
                                <h2><?php echo $title;?></h2>
                            </div>
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $args=array(
                    'post_type'=>'technology',
                    'post__in'     =>array(287,288,289),
                    'orderby'=>id,
                    'order'=>ASC,
                    'showposts'=>4,
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
                    <div class="pic pc">
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