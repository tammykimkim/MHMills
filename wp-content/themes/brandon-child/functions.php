<?php
/* Enter your custom PHP functions below */


// Code to create a child theme and enqueue parent styles
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


// Admin footer modification
 
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by Tammy Kim @ <a href="http://www.tammykimkim.com" target="_blank">tammykimkim.com</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');



// CUSTOM ADMIN LOGIN HEADER LOGO
 
function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/images/logo.png)  !important; } </style>';
}
add_action('login_head',  'my_custom_login_logo');


// CUSTOM ADMIN LOGIN LOGO LINK
 
function change_wp_login_url() 
{
    echo bloginfo('http://www.maplehosiery.com');  // OR ECHO YOUR OWN URL
}
add_filter('login_headerurl', 'change_wp_login_url');
 
// CUSTOM ADMIN LOGIN LOGO & ALT TEXT
 
function change_wp_login_title() 
{
    echo get_option('blogname'); // OR ECHO YOUR OWN ALT TEXT
}
add_filter('login_headertitle', 'change_wp_login_title');


// CUSTOM ADMIN DASHBOARD HEADER LOGO
 
function custom_admin_logo()
{
    echo '<style type="text/css">#header-logo { background-image: url(' . get_bloginfo('template_directory') . 'images/icons/smalltile.png) !important; }</style>';
}
add_action('admin_head', 'custom_admin_logo');

?>
