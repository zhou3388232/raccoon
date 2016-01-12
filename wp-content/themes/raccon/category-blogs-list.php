<?php get_header();?>
<body class="bolg-list">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="main">
        <div class="page-width">
            <div class="container">
                <div class="title">
                    <h3>所有目录</h3>
                </div>
                <div class="list">
                    
                    <ul>
                        <?php 
                        $args=array(
                            'category__and'=>array(16),
                            'orderby'=>id,
                            'order'=>ASC,
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