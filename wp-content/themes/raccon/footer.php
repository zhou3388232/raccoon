<div class="mainbottom">
    <?php
        $post_id=281;
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
         <a href="<?php echo get_page_link(269)?>" class="btn-set"><?php echo $excerpt;?></a>
    </div>
</div>
</div>
<div class="footer">
    <?php
        $post_id=282;
        $post_info=get_post($post_id);        
        $content=$post_info->post_content;
         ?>
    <div class="copyright"><?php echo $content;?></div>
</div>
<?php wp_footer();?>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/utility.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ver.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72009259-2', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>