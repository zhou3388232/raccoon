<?php
/*
**Template Name:menu
*/
?>
<header>
    <div class="page-width">
        <div class="logo fl">
            <h1>深圳洛酷信息科技有限公司</h1>
            <a href="index.php"><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(61), 'full');
echo $thumbnail_image_url[0];
?>"></a>
        </div>
        <div class="topnav fr">
            <div class="navtoggle">
                <span class="open"><i class="fa fa-navicon"></i></span>
                <span class="close" ><i class="fa fa-close"></i></span>
            </div>
            <?php 
                wp_nav_menu(array('menu'=>'ra'));
            ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</header>