<?php
/*
Template Name:blogs-list
*/
?>
<?php get_header();?>
<body class="blog-list">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(275,'title',true)){ ?>
	<h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('275');}?></h1>
        <div class="page-width">
            <div class="container">
                <div class="title">
                    <h3>所有目录</h3>
                </div>
                <div class="list">
                    
                    <ul>
                        <?php 
                        $args=array(
                            'category__or'=>array(16,19),
                            'orderby'=>date,
                            'order'=>DESC,
                            'paged'=>$paged
                            );
                        query_posts($args);
                        while(have_posts()):the_post();
                        ?>
                        <li>
                            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            <div class="profile">
                                <span class="author">作者：<?php the_author();?></span>
                                <span class="time"><?php the_time("Y.m.d");?></span>
                            </div>
                        </li>
                        <?php endwhile;wp_reset_query();?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar();?>
       <?php get_footer();?>