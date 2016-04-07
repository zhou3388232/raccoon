<?php
/*
**Template Name:home
*/
get_header();
?>
<body class="index">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(291,'title',true)){ ?>
            <h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('291');}?></h1>
        <div class="banner">
            <?php
        	$post_id=247;
                $post_info=get_post($post_id);
             ?>
            <div class="text page-width">
                <h2><?php echo $post_info->post_title;?></h2>
                <?php echo $post_info->post_content;?>
                <div class="btn">
                    <a href="<?php echo get_post_meta($post_id, 'url', true); ?>"><?php echo $post_info->post_excerpt;?></a>
                </div>
            </div>
        </div>    
        <div class="card">
            <?php
                $post_id=296;
                $post_info=get_post($post_id);
                $ID=$post_info->ID;
             ?>
            
                <!--<div class="photo"><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full');
echo $thumbnail_image_url[0];
?>"></div>-->
        <div class="title"><?php echo $post_info->post_title; ?></div>
                <div class="btn">
                     <a href="<?php echo get_post_meta($post_id, 'url', true); ?>" class="btn-set"><?php echo $post_info->post_excerpt;?></a>
                </div>
                <?php echo $post_info->post_content;?>
                <!--<span><?php echo $post_info->post_title;?></span>-->
          </div>
        <div class="sidebar"></div>
        <div class="content">
            <!--<?php 
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
                        <a href="<?php echo get_post_meta($post->ID,'url',true);?>" class="more"><?php echo $post->post_excerpt;?></a>
                    </div>
                    <div class="pic pc">
                        <a href="<?php echo get_post_meta($post->ID,'url',true);?>"><img src="<?php
                $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                echo $thumbnail_image_url[0];
                ?>"></a>
                    </div>
                    </div>
                </div>
            </div>
<?php endforeach;?>-->

            <div class="process">
            <?php
                $post_id=807;
                $post_info=get_post($post_id);
                
             ?>
                <div>
            <?php echo $post_info->post_content; ?>
                </div>
            </div>

        <div class="section-5">
                <?php
                    $post_id=262;
                    $post_info=get_post($post_id);
                ?>
                <div class="page-width">
                    <div class="container text">
			<div class="title">
                            <h2><?php echo $post_info->post_title; ?></h2>
			</div>
                        <?php echo $post_info->post_content; ?>
                        <div class="btn">
                             <a href="<?php echo get_post_meta($post_id, 'url', true); ?>"><?php echo $post_info->post_excerpt; ?></a>
                        </div>
			
                    </div>
                </div>
		<?php echo get_the_post_thumbnail($post_id); ?>
            </div>

            <div class="section-4">
                <div class="page-width">
                    <div class="container">
                        <?php
                           $post_id=339;
                           $post_info=get_post($post_id);
                           
                           
                        ?>
                        <div class="title">
                            <h2><?php echo $post_info->post_title;?></h2>
                        </div>
                        <div class="list">
                            <?php echo $post_info->post_content;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
       <?php get_sidebar();?>
       <?php get_footer();?>