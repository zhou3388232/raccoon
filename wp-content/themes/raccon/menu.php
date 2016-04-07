<?php
/*
**Template Name:menu
*/
?>
<header class="header">
    <div class="page-width">
        <div class="logo fl">
            <a href="<?php echo home_url();?>"><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(295), 'full');
echo $thumbnail_image_url[0];
?>"></a>
        </div>
        <div class="topnav fr">
            <div class="navtoggle">
                <a class="open active" href="#"><i class="fa fa-navicon fa-fw"></i></a>
                <a class="close" href="#"><i class="fa fa-close fa-fw"></i></a>
            </div>
            <?php 
                wp_nav_menu(array('menu'=>'ra'));
            ?>
	    <?php if(is_single()||is_page('275')){ ?>
            <script type=text/javascript>
                (function($) {
                    $(function(){
                        $(".menu-item-277 a").css("opacity","1");
                    });
                })(jQuery);
            </script>
            <?php }?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</header>