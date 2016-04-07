<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package raccon
 * @subpackage ab
 * @since Raccon 1.0
 */
?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta rel="dns-prefetch" href="http://cdn.raccoon-tech.com/">
    <title><?php 
    if(is_home()){
        bloginfo('name');echo "-";$title = get_post($id)->post_title;
        echo $title; 
    }elseif(is_single()||is_page()){
        bloginfo('name');echo " - ";single_post_title();
    }elseif(is_category()){
        bloginfo('name');echo " - ";single_cat_title();
    }elseif(is_search()){
        bloginfo('name');echo " - ";echo "search result";
    }elseif(is_404()){
        echo "404 Not Found";
    }else{
        wp_title('',true);
    }
    ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/reset.css" media="all">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/main.css" media="all">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/codemirror.css" media="all">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mobile.css" media="(max-width: 768px)">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="google-site-verification" content="nZ9qbMS9cPCr3jojrNwDs9Dz7japKBPWUpGKgdkbw9o" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome/css/font-awesome.css" media="all">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /> 
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
    <!--[if lte IE 8]>
    <script src="http://cdn.bootcss.com/modernizr/2010.07.06dev/modernizr.min.js"></script>
    <![endif]-->	

    <?php wp_head();?>
</head>