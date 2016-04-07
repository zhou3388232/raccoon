<?php
/*
Template Name:business
*/
?>
<?php get_header();?>
<body class="business">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(267,'title',true)){ ?>
	<h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
        <h1><?php the_title('267');}?></h1>
        <div class="banner">
            <?php
              $post_id=248;
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
                <?php endif;?>
            </div>
        </div>
    
        <div class="card">
            <div class="page-width">
                <?php
                  $post_id=251;
                  $post_info=get_post($post_id);
                  $title=$post_info->post_title;
                  $content=$post_info->post_content;
                  $excerpt=$post_info->post_excerpt;
                  $pre=get_post_meta($post_id,'pre',true);
                ?>
                <div class="title">
                  <h2><?php echo $title;?></h2>
                </div>
                <?php echo $content;?>
                <div class="btn">
                    <a href="<?php echo get_page_link(269)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="section-2 section">
                <div class="container page-width">
                    <div class="text">
                        <?php
                          $post_id=246;
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
                    <div class="pic">
                        <?php 
                          $args=array(
                            'post_type'=>'portfolio',
                            'meta_key'=>sort,
                            'orderby'=>meta_value_num,
                            'order'=>'ASC',
                            'showposts'=>10,
			    'post__not_in'=>array(246),
                            );
                          query_posts($args);
                          while(have_posts()):the_post();
                        ?>
                        <div class="pic-img">
                            <a href="<?php echo get_post_custom_values('url', get_the_ID())[0]; ?>"><span><?php the_excerpt();?></span></a>
                            <img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0];?>">
                        </div>
                        <?php endwhile;wp_reset_query();?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        <?php get_sidebar();?>
        <?php get_footer();?>