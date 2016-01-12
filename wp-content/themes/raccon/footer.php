<div class="mainbottom">
    <?php
        $post_id=21;
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
        <p><?php echo $content;?></p>
    </div>
    <div class="btn">
         <a href="<?php echo get_category_link(6)?>" class="btn-set"><?php echo $excerpt;?></a>
    </div>
</div>
</div>
<footer>
    <?php
        $post_id=69;
        $post_info=get_post($post_id);        
        $content=$post_info->post_content;
         ?>
    <span class="copyright"><?php echo $content;?></span>
</footer>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
</body>
</html>