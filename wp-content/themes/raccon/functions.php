<?php 
register_nav_menus();
?>
<?php
add_theme_support( 'post-thumbnails' );
?>
<?php add_filter( 'show_admin_bar', '__return_false' );?>
<?php
add_action('init', 'my_custom_init');
function my_custom_init()
{
  $labels = array(
    'name' => _x('portfolio', 'post type general name'),
    'singular_name' => _x('portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'portfolio'),
    'add_new_item' => __('Add New Portfolio'),
    'edit_item' => __('Edit Portfolio'),
    'new_item' => __('New Portfolio'),
    'view_item' => __('View Portfolio'),
    'search_items' => __('Search Portfolio'),
    'not_found' =>  __('No portfolios found'),
    'not_found_in_trash' => __('No portfolios found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'portfolio'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('portfolio',$args);
}
?>
<?php
add_action('init', 'create_posttype');
function create_posttype()
{
  $labels = array(
    'name' => _x('welcome', 'post type general name'),
    'singular_name' => _x('welcome', 'post type singular name'),
    'add_new' => _x('Add New', 'welcome'),
    'add_new_item' => __('Add New Welcome'),
    'edit_item' => __('Edit Welcome'),
    'new_item' => __('New Welcome'),
    'view_item' => __('View Welcome'),
    'search_items' => __('Search Welcome'),
    'not_found' =>  __('No welcomes found'),
    'not_found_in_trash' => __('No welcomes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'welcome'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('welcome',$args);
}
?>
<?php
add_action('init', 'create_technology_posttype');
function create_technology_posttype()
{
  $labels = array(
    'name' => _x('technology', 'post type general name'),
    'singular_name' => _x('technology', 'post type singular name'),
    'add_new' => _x('Add New', 'technology'),
    'add_new_item' => __('Add New Technology'),
    'edit_item' => __('Edit Technology'),
    'new_item' => __('New Technology'),
    'view_item' => __('View Technology'),
    'search_items' => __('Search Technology'),
    'not_found' =>  __('No technologys found'),
    'not_found_in_trash' => __('No technologys found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'technology'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('technology',$args);
}
?>
<?php
add_action('init', 'create_public_posttype');
function create_public_posttype()
{
  $labels = array(
    'name' => _x('blocks', 'post type general name'),
    'singular_name' => _x('block', 'post type singular name'),
    'add_new' => _x('Add New', 'block'),
    'add_new_item' => __('Add New Block'),
    'edit_item' => __('Edit Block'),
    'new_item' => __('New Block'),
    'view_item' => __('View Block'),
    'search_items' => __('Search Block'),
    'not_found' =>  __('No Block found'),
    'not_found_in_trash' => __('No Block found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'block'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('public',$args);
}
?>
<?php
add_action('init', 'create_join_posttype');
function create_join_posttype()
{
  $labels = array(
    'name' => _x('join', 'post type general name'),
    'singular_name' => _x('join', 'post type singular name'),
    'add_new' => _x('Add New', 'join'),
    'add_new_item' => __('Add New join'),
    'edit_item' => __('Edit Join'),
    'new_item' => __('New Join'),
    'view_item' => __('View Join'),
    'search_items' => __('Search Join'),
    'not_found' =>  __('No Joins found'),
    'not_found_in_trash' => __('No JOins found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'join'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('join',$args);
}
?>
<?php
add_action('init', 'create_internet_plus_init');
function create_internet_plus_init()
{
  $labels = array(
    'name' => _x('internet_plus', 'post type general name'),
    'singular_name' => _x('internet_plus', 'post type singular name'),
    'add_new' => _x('Add New', 'internet_plus'),
    'add_new_item' => __('Add New Internet_plus'),
    'edit_item' => __('Edit Internet_plus'),
    'new_item' => __('New Internet_plus'),
    'view_item' => __('View Internet_plus'),
    'search_items' => __('Search Internet_plus'),
    'not_found' =>  __('No internet_plus found'),
    'not_found_in_trash' => __('No internet_plus found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'internet_plus'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
  ); 
  register_post_type('internet_plus',$args);
}
?>
<?php 
if (class_exists('MultiPostThumbnails')) {
new MultiPostThumbnails(array(
'label' => 'Secondary Image',
'id' => 'secondary-image',
'post_type' => 'post'
 ) );
}
?>
<?php
/** widgets */
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'First_sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Second_sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Third_sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Fourth_sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
?>