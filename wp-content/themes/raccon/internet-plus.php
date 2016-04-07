<?php
/*
Template Name:internet plus
*/
?>
<?php get_header();?>
<body class="internet-plus">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
	<div class="banner">
            <?php
                $post_id=820;
                $post_info=get_post($post_id);
            ?>
            <h2><?php echo $post_info->post_title; ?></h2>
        </div>
	<div class="card">
            <?php
                $post_id=828;
                $post_info=get_post($post_id);
            ?>
	    <div class="title">
		<h3><?php echo $post_info->post_title; ?></h3>
	    </div>
	    	<div class="text"><?php echo $post_info->post_content; ?>
	    </div>
            <div class="btn">
                <a href="<?php echo get_post_meta($post_id, 'url', true); ?>"><?php echo $post_info->post_excerpt;?></a>
            </div>
        </div>
	<div class="content">
            <?php
                  $args=array(
                    'post_type'=>'internet_plus',
                    'meta_key'=>sort,
                    'orderby'=>meta_value_num,
                    'order'=>'ASC',
                  );
                  query_posts($args);
                  while(have_posts()):the_post();
            ?>
            <div class="section-5">
                <div class="page-width">
                    <div class="container text fl">
                        <h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
                        <div class="btn fl">
                             <a href="<?php echo get_post_meta(get_the_ID(),'url',true); ?>" class="btn-set"><?php the_excerpt(); ?></a>
                        </div>
                    </div>
		    <div class="pic fr">
                   	<?php the_post_thumbnail(); ?>
                    </div>
		    <div class="clear"></div>
                </div>
            </div>
            <?php endwhile; wp_reset_query();?>
        </div>
       <?php get_sidebar();?>
       <?php get_footer();?>