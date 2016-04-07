<?php get_header();?>
<body class="index">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="clear"></div>
    <div class="main">
        <div class="banner">
            <?php
            $post_id=247;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $excerpt=$post_info->post_excerpt;
             ?>
            <div class="text page-width">
                <h2><?php echo $title;?></h2>
                <p><?php echo $content;?></p>
                <div class="btn">
                    <span style="display: inline-block;">想为您的企业打造独一无二的电商网站？</span><a href="<?php echo get_page_link(269)?>" class="btn-set"><?php echo $excerpt;?>123</a>
                </div>
            </div>
        
        </div>    
        <div class="card">
            <?php
            $post_id=296;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $excerpt=$post_info->post_excerpt;
            $ID=$post_info->ID;
             ?>
            <div class="page-width">
                <div class="photo"><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full');
echo $thumbnail_image_url[0];
?>"></div>
                <?php echo $content;?>
                <span><?php echo $title;?></span>
                <div class="btn">
                     <a href="<?php echo get_page_link(271)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
            </div>
            
        </div>
        <div class="sidebar"></div>
        <div class="content">
            <?php 
            $args=array(
                'post_type'=>'technology',
                'numberposts' =>2,
                'include'     =>array(262,265),
                'orderby'     =>'ID',
                'order'       =>'ASC',    
                );
            $post_array=get_posts($args);
            foreach($post_array as $post):
            ?>
            <div class="section-3 section">
                <div class="page-width">
                    <div class="container">
                    <div class="text">
                        <div class="title">
                            <h3><?php the_title();?></h3>
                        </div>
                        <p><?php echo $post->post_content;?><p>
                        <a href="<?php echo get_page_link(271)?>" class="more"><?php echo $post->post_excerpt;?></a>
                    </div>
                    <div class="pic pc">
                        <a href="<?php echo get_page_link(271)?>"><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $thumbnail_image_url[0];
?>"></a>
                    </div>
                    </div>
                </div>
            </div>
<?php endforeach;?>
          <div class="section-4 section">
                <div class="page-width">
                    <div class="container">
                        <?php
                           $post_id=339;
                           $post_info=get_post($post_id);
                           $title=$post_info->post_title;
                           $content=$post_info->post_content;
                        ?>
                        <div class="title">
                            <h3><?php echo $title;?></h3>
                        </div>
                        <div class="list">
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
       <?php get_sidebar();?>
       <?php get_footer();?>