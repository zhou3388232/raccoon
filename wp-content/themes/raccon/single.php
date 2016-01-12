<?php get_header();?>
</head>
<body class="bolg-article">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(have_posts()):the_post();?>
        <div class="banner">
            
            <div class="banner-bg">
                <img src="<?php bloginfo('template_url');?>/images/blog/blog.png">
            </div>
        </div>
        <div class="article">
            <div class="page-width">
                <div class="container">
                    <div class="title">
                        <h3><?php the_title();?></h3>
                    </div>
                    <div class="profile">
                        <span class="time"><?php the_time("Y.m.d")?></span>
                    </div>
                    <div class="content">
                        <div class="text">
                            <?php the_content();?>
                        </div>
                        <div class="pic">
                            <img src="<?php bloginfo('template_url');?>/images/blog/blog-content-pic.png">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        </div>
        <?php get_sidebar();?>
        <?php get_footer();?>