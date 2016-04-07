<?php
/*
Template Name:contact-us
*/
?>
<?php get_header();?>
<body class="contact">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(get_post_meta(269,'title',true)){ ?>
	<h1><?php echo get_post_meta($post->ID,'title',true);?></h1>
        <?php }else{?>
         <h1><?php the_title('269');}?></h1>
        <div class="banner">
            <?php
            $post_id=259;
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
                    
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="card">
            <div class="page-width">
                <div class="title">
                    <h2>您的需求</h2>
                </div>
                
                <div class="form">
                    <?php echo do_shortcode( '[contact-form-7 id="128" title="联系表单 1"]' ); ?>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="section-1 section">
                <div class="page-width">
                    <div class="container">
                        <div class="text">
                            <div class="title">
                                <?php
                                $post_id=283;
                                $post_info=get_post($post_id);
                                $title=$post_info->post_title;
                                $content=$post_info->post_content;
                                $excerpt=$post_info->post_excerpt;
                                 ?>
                                <h2><?php echo $title;?></h2>
                            </div>
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mapbar"></div>
            <div class="section-3 section map-section">
                <div class="page-width">
                    <div class="container">
                    <?php
                    $post_id=284;
                    $post_info=get_post($post_id);
                    $title=$post_info->post_title;
                    $content=$post_info->post_content;
                    $excerpt=$post_info->post_excerpt;
                    $ID=$post_info->ID;
                     ?>
                    <div class="text">
                        <div class="title">
                            <h3><?php echo $title;?></h3>
                        </div>
                        <?php echo $content;?>
                    </div>
                       <div class="pic" id="map" style="width:500px;height:300px;border:#ccc solid 1px;font-size:12px">   
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=2uDGqaXUozVKOTDOuhvt3YFY"></script>   	
        <?php get_sidebar();?>
        <?php get_footer();?>
        