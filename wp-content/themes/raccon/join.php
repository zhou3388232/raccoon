<?php
/*
Template Name:join
*/
?>
<?php get_header();?>
<body class="join">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(273,'title',true)){ ?>
    <h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('273');}?></h1>
        <div class="banner">
            <?php
            $post_id=705;
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
                $post_id=574;
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
        <div class="content job-bar section">
            <div class="container page-width">
            <?php
            $post_job_info=get_post('577');
                    $content=$post_job_info->post_content;
                ?>
                <div class="title">
            	    <?php echo $content; ?>
                </div>
                <div class="job-list">
                    <ul>
                <?php 
                $args=array(
                    'post_type'=>'join'
                    );
                query_posts($args);
                while(have_posts()):the_post();
                ?>
                        <li>
                            <div class="title">
                                <h4 class="job-name"><?php the_title();?></h4>
                                <span class="job-date"><?php the_time('Y-m-d')?></span>
                            </div>
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </li>
                <?php endwhile;wp_reset_query();?>
		    </ul>
		</div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
       <?php get_sidebar();?>
       <?php get_footer();?>