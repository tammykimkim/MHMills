<?php
/**
 * Theme functions.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */
if ( function_exists( 'add_theme_support' ) ) {
	if( false ) add_editor_style( '/css/style-editor.css' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
}


/* ---------------------------------------------------------------------------
 * Post Thumbnails
 * --------------------------------------------------------------------------- */
if ( function_exists( 'add_theme_support' ) ) {
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 			260,  146, false ); 	// admin - featured image
	add_image_size( '50x50', 			50,   50,  false ); 	// admin - lists
	
	add_image_size( 'portfolio-list', 	600,  400, true ); 		// portfolio - list
	add_image_size( 'portfolio-fs', 	815,  543, true ); 		// portfolio - full screen
// 	add_image_size( 'portfolio-single', 1180, 535, true ); 		// portfolio - single
	add_image_size( 'portfolio-slider', 380,  380, true ); 		// portfolio - slider
	
	add_image_size( 'blog', 			564,  341, true ); 		// blog
	add_image_size( 'blog-single', 		1176, 445, true ); 		// blog - single
	add_image_size( 'blog-item', 		504,  224, true ); 		// blog - item
	add_image_size( 'blog-widget', 		80,   60,  true ); 		// blog - widget

	add_image_size( 'features', 		90,   90,  true );		// features
	add_image_size( 'clients-slider', 	155,  80,  false );		// clients
	
	add_image_size( 'offer-slider', 	776,  438, true );		// offer - slider
	add_image_size( 'offer-slider-pg', 	42,   42,  true );		// offer - slider pager
}


/* ---------------------------------------------------------------------------
 * Excerpt length
 * --------------------------------------------------------------------------- */
function mfn_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'mfn_excerpt_length', 999 );


/* ---------------------------------------------------------------------------
 * Excerpt
 * --------------------------------------------------------------------------- */
function mfn_excerpt($post, $length = 55, $tags_to_keep = '<a><b><strong>', $extra = ' [...]') {
		
	if(is_int($post)) {
		$post = get_post($post);
	} elseif(!is_object($post)) {
		return false;
	}

	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		return apply_filters('the_content', $the_excerpt);
	} else {
		$the_excerpt = $post->post_content;
	}
	
	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt, $tags_to_keep));
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
	if( $excerpt_waste ) $the_excerpt .= $extra;
	
	return apply_filters('the_content', $the_excerpt);
}


/* ---------------------------------------------------------------------------
 * Get Real Post ID
 * --------------------------------------------------------------------------- */
function mfn_ID(){
	global $post;
	$postID = false;
	
	if( ! is_404() ){
		if( is_tax() ){
			// taxonomy-portfolio-types.php
			$postID = mfn_opts_get( 'portfolio-page' );
		} elseif( get_post_type()=='post' && ! is_singular() ){
			// index.php
			if( get_option( 'page_for_posts' ) ){
				$postID = get_option( 'page_for_posts' );	// Setings / Reading
			} elseif( mfn_opts_get( 'blog-page' ) ){
				$postID = mfn_opts_get( 'blog-page' );		// Theme Options / Getting Started / Blog
			}
		} else {
			$postID = get_the_ID();
		}
	}
	
	return $postID;
}


/* ---------------------------------------------------------------------------
 * Get Comment Excerpt
 * --------------------------------------------------------------------------- */
function mfn_get_comment_excerpt($comment_ID = 0, $num_words = 20) {
	$comment = get_comment( $comment_ID );
	$comment_text = strip_tags($comment->comment_content);
	$blah = explode(' ', $comment_text);
	if (count($blah) > $num_words) {
		$k = $num_words;
		$use_dotdotdot = 1;
	} else {
		$k = count($blah);
		$use_dotdotdot = 0;
	}
	$excerpt = '';
	for ($i=0; $i<$k; $i++) {
		$excerpt .= $blah[$i] . ' ';
	}
	$excerpt .= ($use_dotdotdot) ? '[...]' : '';
	return apply_filters('get_comment_excerpt', $excerpt);
}


/* ---------------------------------------------------------------------------
 * Pagination for Blog and Portfolio
 * --------------------------------------------------------------------------- */
function mfn_pagination( $query = false ){
	global $paged, $wp_query;

	// default $wp_query
	if( ! $query ) $query = $wp_query;
	
	$translate['next'] = mfn_opts_get('translate') ? mfn_opts_get('translate-next','Next page &rsaquo;') : __('Next page &rsaquo;','brandon');
	$translate['prev'] = mfn_opts_get('translate') ? mfn_opts_get('translate-prev','&lsaquo; Prev page') : __('&lsaquo; Prev page','brandon');
	
	$query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;  
	
	if( empty( $paged ) ) $paged = 1;
	$prev = $paged - 1;							
	$next = $paged + 1;
	
	$end_size = 1;
	$mid_size = 2;
	$show_all = mfn_opts_get('pagination-show-all');
	$dots = false;	

	if( ! $total = $query->max_num_pages ) $total = 1;
	
	if( $total > 1 )
	{
		echo '<div class="column one pager_wrapper">';
			echo '<div class="pager">';
				
				if( $paged >1 ){
					echo '<a class="prev_page" href="'. previous_posts(false) .'">'. $translate['prev'] .'</a>';
				}
		
				for( $i=1; $i <= $total; $i++ ){
					if ( $i == $current ){
						echo '<a href="'. get_pagenum_link($i) .'" class="page active">'. $i .'</a>';
						$dots = true;
					} else {
						if ( $show_all || ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total - $end_size ) ){
							echo '<a href="'. get_pagenum_link($i) .'" class="page">'. $i .'</a>';
							$dots = true;
						} elseif ( $dots && ! $show_all ) {
							echo '<span class="page">...</span>';
							$dots = false;
						}
					}
				}
				
				if( $paged < $total ){
					echo '<a class="next_page" href="'. next_posts(0,false) .'">'. $translate['next'] .'</a>';
				}
				
			echo '</div>';
		echo '</div>'."\n";
	}
}


/* ---------------------------------------------------------------------------
 * No sidebar message for themes with sidebar 
 * --------------------------------------------------------------------------- */
function mfn_nosidebar(){
	echo 'This template supports the sidebar\'s widgets. <a href="'. home_url() .'/wp-admin/widgets.php">Add one</a> or use Full Width layout.';	
}


/* ---------------------------------------------------------------------------
 * New Walker Category for categories menu
 * --------------------------------------------------------------------------- */
class New_Walker_Category extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);

		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		
		$link = '<a href="' . esc_attr( get_term_link($category) ) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->description) )
			$link .= 'title="' . esc_attr( sprintf(__('View all posts filed under %s','brandon'), $cat_name) ) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		$link .= '>';
		$link .= $cat_name;

		if ( !empty($show_count) )
			$link .= ' <span>(' . intval($category->count) . ')</span>';
			
		$link .= '</a>';

		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link\n";
		}
	}
}


/* ---------------------------------------------------------------------------
 * Current page URL
 * --------------------------------------------------------------------------- */
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


/* ---------------------------------------------------------------------------
 * Breadcrumbs
 * --------------------------------------------------------------------------- */
function mfn_breadcrumbs() {
	global $post;
	$homeLink = home_url();
	
	$translate['home'] = mfn_opts_get('translate') ? mfn_opts_get('translate-home','Home') : __('Home','brandon');
	$translate['you-are-here'] = mfn_opts_get('translate') ? mfn_opts_get('translate-you-are-here','You are here:') : __('You are here:','brandon');

	echo '<ul class="breadcrumbs">';
// 	echo '<li>'. $translate['you-are-here'] .'</li>';
	echo '<li class="home"><i class="fa-home"></i> <a href="'. $homeLink .'">'. $translate['home'] .'</a> <span>/</span></li>';

	// Blog Category
	if ( is_category() ) {
		echo '<li><a href="'. curPageURL() .'">' . __('Archive by category','brandon').' "' . single_cat_title('', false) . '"</a></li>';

	// Blog Day
	} elseif ( is_day() ) {
		echo '<li><a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a> <span>/</span></li>';
		echo '<li><a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a> <span>/</span></li>';
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('d') .'</a></li>';

	// Blog Month
	} elseif ( is_month() ) {
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span>/</span></li>';
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('F') .'</a></li>';

	// Blog Year
	} elseif ( is_year() ) {
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('Y') .'</a></li>';

	// Single Post
	} elseif ( is_single() && !is_attachment() ) {
		
		// Custom post type
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			
			if( $slug['slug'] == mfn_opts_get('portfolio-slug','portfolio-item') && $portfolio_page_id = mfn_opts_get('portfolio-page') )
			{
				echo '<li><a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span>/</span></li>';
			} else {
				echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> <span>/</span></li>';
			}
			echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
			
		// Blog post	
		} else {
			$cat = get_the_category(); 
			$cat = $cat[0];
			echo '<li>';
				echo get_category_parents($cat, TRUE, ' <span>/</span>');
			echo '</li>';
			echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
		}

	// Taxonomy
	} elseif( get_post_taxonomies() ) {
		
		$post_type = get_post_type_object(get_post_type());
		if( $post_type->name == 'portfolio' && $portfolio_page_id = mfn_opts_get('portfolio-page') ) {
			echo '<li><a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span>/</span></li>';
		}
		
		if( $post_type->name == 'portfolio' ){
			echo '<li><a href="' . curPageURL() . '">'. single_cat_title('', false) .'</a></li>';
		} else {
			echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
		}
		
	// Page with parent
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> <span>/</span></li>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo $crumb;
		
		echo '<li><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';

	// Default
	} else {
		echo '<li><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';
	}

	echo '</ul>';
}


/* ---------------------------------------------------------------------------
 * Hex 2 rgba
 * --------------------------------------------------------------------------- */
function hex2rgba( $hex, $alpha = 1, $echo = false ) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	
	$rgba = 'rgba('. $r.', '. $g .', '. $b .', '. $alpha .')';

	if( $echo ){
		echo $rgba;
		return true;
	}
	
	return $rgba;
}


/* ---------------------------------------------------------------------------
 * Post types
 * --------------------------------------------------------------------------- */
function mfn_post_type( $postID, $icon = false ){
	
	if( get_post_meta( $postID, 'mfn-post-slider', true ) ){
		$post_type = 'slider';
		$post_icon = 'fa-arrows-h';
	} elseif( get_post_meta( $postID, 'mfn-post-vimeo', true ) || get_post_meta( $postID, 'mfn-post-youtube', true ) ){
		$post_type = 'video';
		$post_icon = 'fa-play';
	} elseif( has_post_thumbnail( $postID ) ){
		$post_type = 'image';
		$post_icon = 'fa-picture-o';
	} else {
		$post_type = 'text';
		$post_icon = 'fa-bars';
	}
	
	if( $icon ){
		return $post_icon;
	} else {
		return $post_type;
	}
}


/* ---------------------------------------------------------------------------
 * Post Thumbnails
 * --------------------------------------------------------------------------- */
function mfn_post_thumbnail( $postID, $zoom = false, $exists = false ){
	
	if( $exists ){
		if( get_post_meta( $postID, 'mfn-post-slider', true ) || get_post_meta( $postID, 'mfn-post-vimeo', true ) || get_post_meta( $postID, 'mfn-post-youtube', true ) || has_post_thumbnail() ){
			return true;
		} else {
			return false;
		}
	}
	
	if( $blog_slider = get_post_meta( $postID, 'mfn-post-slider', true ) ){
		
		// Revolution Slider
		putRevSlider( $blog_slider );
		
	} elseif( $video = get_post_meta( $postID, 'mfn-post-vimeo', true ) ){
		
		// Video - Vimeo
		echo '<iframe class="scale-with-grid" src="http://player.vimeo.com/video/'. $video .'" allowFullScreen></iframe>'."\n";
	
	} elseif( $video = get_post_meta( $postID, 'mfn-post-youtube', true ) ){
		
		// Video - YouTube
		echo '<iframe class="scale-with-grid" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" allowfullscreen></iframe>'."\n";
	
	} elseif( has_post_thumbnail() ){
			
		// link to fancybox image or post page
		if( $zoom ){
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'full');
			$link = $large_image_url[0];
			$rel = ' rel="prettyPhoto"';
		} else {
			$link = get_permalink( $postID );
			$rel = false;
		}
		
		// Image
		echo '<a href="'. $link .'" '. $rel .'>';
			if( is_single( $postID ) ){
				the_post_thumbnail( 'blog-single', array( 'class' => 'scale-with-grid' ) );
				echo '<span class="ico"><i class="fa-eye"></i></span>';
			} else {
				the_post_thumbnail( 'blog', array( 'class' => 'scale-with-grid' ) );
				echo '<span class="ico"><i class="fa-bars"></i></span>';
			}		
		echo '</a>';
		
	}
}


function mfn_portfolio_details( $postID ){
	
	$translate['category'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-category','Category:') : __('Category:','brandon');
	$translate['client'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-client','Client:') : __('Client:','brandon');
	$translate['date'] 				= mfn_opts_get('translate') ? mfn_opts_get('translate-date','Date:') : __('Date:','brandon');
	$translate['task'] 				= mfn_opts_get('translate') ? mfn_opts_get('translate-task','Task:') : __('Task:','brandon');
	$translate['visit-online'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-visit-online','Visit online &rarr;') : __('Visit online &rarr;','brandon');
	$translate['website'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-website','Website:') : __('Website:','brandon');
	
	$terms = get_the_terms(get_the_ID(),'portfolio-types');
	$categories = '';
	if( is_array( $terms ) ){	
		foreach( $terms as $term ){
			$categories .= '<a href="'. site_url() .'/portfolio-types/'. $term->slug .'">'. $term->name .'</a>, ';
		}
		$categories = substr( $categories , 0, -2 );
	}
	
?>	
	<ul class="project_details">
	
		<li class="date">
			<span class="label"><?php echo $translate['date']; ?></span>
			<p><i class="fa-calendar"></i>&nbsp;<?php echo get_the_date(); ?></p>
		</li>
		
		<?php if( $client = get_post_meta(get_the_ID(), 'mfn-post-client', true) ): ?>
			<li class="clients">
				<span class="label"><?php echo $translate['client']; ?></span>
				<p><i class="fa-user"></i>&nbsp;<?php echo $client; ?></p>
			</li>
		<?php endif; ?>
		
		<?php if( $task = get_post_meta(get_the_ID(), 'mfn-post-task', true) ): ?>
			<li class="task">
				<span class="label"><?php echo $translate['task']; ?></span>
				<p><i class="fa-tasks"></i>&nbsp;<?php echo $task; ?></p>
			</li>
		<?php endif; ?>
		
		<?php if( $categories && get_post_meta(get_the_ID(), 'mfn-post-categories', true) ): ?>
			<li class="categories">
				<span class="label"><?php echo $translate['category']; ?></span>
				<p><i class="fa-folder-o"></i>&nbsp;<?php echo $categories; ?></p>
			</li>
		<?php endif; ?>
		
		<?php if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ): ?>
			<li class="url">
				<span class="label"><?php echo $translate['website']; ?></span>
				<p><i class=" fa-external-link"></i>&nbsp;<a href="<?php echo $link; ?>" target="_blank"><?php echo $translate['visit-online']; ?></a></p>
			</li>
		<?php endif; ?>
		
	</ul>
<?php
}


/* ---------------------------------------------------------------------------
 * Posts per page & pagination fix
 * --------------------------------------------------------------------------- */
function mfn_option_posts_per_page( $value ) {
	if ( is_tax( 'portfolio-types' ) ) {
        $posts_per_page = mfn_opts_get( 'portfolio-posts', 6, true );
    } else {
        $posts_per_page = mfn_opts_get( 'blog-posts', 5, true );
    }
    return $posts_per_page;
}

function mfn_posts_per_page() {
    add_filter( 'option_posts_per_page', 'mfn_option_posts_per_page' ); 
}
add_action( 'init', 'mfn_posts_per_page', 0 );


/* ---------------------------------------------------------------------------
 *	Comments number with text
 * --------------------------------------------------------------------------- */
function mfn_comments_number() {
	$translate['comment'] = mfn_opts_get('translate') ? mfn_opts_get('translate-comment','comment') : __('comment','brandon');
	$translate['comments'] = mfn_opts_get('translate') ? mfn_opts_get('translate-comments','comments') : __('comments','brandon');
	$translate['comments-off'] = mfn_opts_get('translate') ? mfn_opts_get('translate-comments-off','comments off') : __('comments off','brandon');
	

	$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
	
	if ( comments_open() ) {
		if ( $num_comments != 1 ) {
			$comments = '<a href="' . get_comments_link() .'">'. $num_comments.'</a> '. $translate['comments'];
		} else {
			$comments = '<a href="' . get_comments_link() .'">1</a> '. $translate['comment'];
		}
	} else {
		$comments = $translate['comments-off'];
	}
	return $comments;
}


/* ---------------------------------------------------------------------------
 *	Menu title in selected location
 * --------------------------------------------------------------------------- */
function mfn_get_menu_name($location){
	
	if( ! has_nav_menu($location) ){
		return false;
	}
	
	$menus = get_nav_menu_locations();
	$menu_title = wp_get_nav_menu_object($menus[$location])->name;
	
	return $menu_title;
}


/* ---------------------------------------------------------------------------
 *	Set Max Content Width
 * --------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 1200;


/* ---------------------------------------------------------------------------
 *	WPML - Date Format
* --------------------------------------------------------------------------- */
function translate_date_format($format) {
	if (function_exists('icl_translate'))
		$format = icl_translate('Formats', $format, $format);
return $format;
}
add_filter('option_date_format', 'translate_date_format');


/* ---------------------------------------------------------------------------
 *	WooCommerce - Products per line/page
 * --------------------------------------------------------------------------- */
add_filter( 'loop_shop_columns', create_function( false, 'return 3;' ) );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


/* ---------------------------------------------------------------------------
 *	TGM Plugin Activation
 * --------------------------------------------------------------------------- */
add_action( 'tgmpa_register', 'mfn_register_required_plugins' );
function mfn_register_required_plugins() {

	$plugins = array(

		// required -----------------------------
	
		array(
			'name'     				=> 'Slider Revolution', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> THEME_DIR .'/plugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
	
		),
		
		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'required' 				=> true,
			'external_url'			=> 'http://wordpress.org/plugins/contact-form-7/',
		),
			
		// recommended -----------------------------
		
		array(
			'name'     				=> 'Recent Tweets',
			'slug'     				=> 'recent-tweets-widget',
			'required' 				=> false,
			'external_url'			=> 'https://wordpress.org/plugins/recent-tweets-widget/',
		),
		
	);

	// Change this to your theme text domain, used for internationalising strings
	$config = array(
		'domain'       		=> 'brandon',         			// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'brandon' ),
			'menu_title'                       			=> __( 'Install Plugins', 'brandon' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'brandon' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'brandon' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'brandon' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'brandon' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'brandon' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa( $plugins, $config );
}

?>