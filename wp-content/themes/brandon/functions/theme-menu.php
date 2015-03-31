<?php
/**
 * Menu functions.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Registers a menu location to use with navigation menus.
 * --------------------------------------------------------------------------- */
register_nav_menu( 'main-menu',		__( 'Main Menu', 'mfn-opts' ) );
register_nav_menu( 'lang-menu',		__( 'Languages Menu', 'mfn-opts' ) );
register_nav_menu( 'footer-menu',	__( 'Footer Menu', 'mfn-opts' ) );


/* ---------------------------------------------------------------------------
 * Main Menu
 * --------------------------------------------------------------------------- */
function mfn_wp_nav_menu() 
{
	$args = array( 
		'container' 		=> 'nav',
		'container_id'		=> 'menu', 
		'menu_class'		=> 'menu', 
		'fallback_cb'		=> 'mfn_wp_page_menu', 
// 		'theme_location'	=> $location,
		'depth' 			=> 3,
		'walker' 			=> new Walker_Nav_Menu_Mfn,
	);
	
	// custom menu for pages
	if( $custom_menu = get_post_meta( get_the_ID(), 'mfn-post-menu', true ) ){
		$args['menu']			= $custom_menu;
	} else {
		$args['theme_location'] = 'main-menu';
	}
	
	wp_nav_menu( $args ); 
}

function mfn_wp_page_menu() 
{
	$args = array(
		'title_li' => '0',
		'sort_column' => 'menu_order',
		'depth' => 3
	);

	echo '<nav id="menu">'."\n";
		echo '<ul class="menu">'."\n";
			wp_list_pages($args); 
		echo '</ul>'."\n";
	echo '</nav>'."\n";
}


/* ---------------------------------------------------------------------------
 * Languages menu
 * --------------------------------------------------------------------------- */
function mfn_wp_lang_menu()
{
	$args = array(
		'container' 		=> false,
		'fallback_cb'		=> false,
		'menu_class'		=> '',
		'theme_location' 	=> 'lang-menu',
		'depth'				=> 1,
	);
	wp_nav_menu( $args );
}


/* ---------------------------------------------------------------------------
 * Footer menu
 * --------------------------------------------------------------------------- */
function mfn_wp_footer_menu()
{
	$args = array(
		'container' 		=> false,
		'fallback_cb'		=> false,
		'theme_location' 	=> 'footer-menu',
		'depth'				=> 1,
	);
	wp_nav_menu( $args );
}

?>