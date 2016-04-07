<?php get_header();?>
</head>
<body class="blog-article">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <?php if(have_posts()):the_post();?>
        <?php if(class_exists('MultiPostThumbnails')): ?>
        <div class="banner">
            <div class="banner-bg">
              <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(),'secondary-image'); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="article">
            <div class="page-width">
                <div class="container">
                    <div class="title">
                        <h1><?php the_title();?></h1>
                    </div>
                    <div class="profile">
                        <span class="author"><?php the_author();?></span>
                        <span class="time"><?php the_time("Y.m.d");?></span>
                        
                    </div>
                    <div class="content">
                        <div class="text">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        </div>
        <?php get_sidebar();?>
        <?php get_footer();?>