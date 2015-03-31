<?php
/**
 * Theme Options - fields and args
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

require_once( dirname( __FILE__ ) . '/fonts.php' );
require_once( dirname( __FILE__ ) . '/options.php' );


/**
 * Options Page fields and args
 */
function mfn_opts_setup(){
	
	// Navigation elements
	$menu = array(	
	
		// General --------------------------------------------
		'general' => array(
			'title' => __('Getting started', 'mfn-opts'),
			'sections' => array( 'general', 'sidebars', 'blog', 'portfolio' ),
		),
		
		// Layout --------------------------------------------
		'elements' => array(
			'title' => __('Layout', 'mfn-opts'),
			'sections' => array( 'layout-general', 'layout-header', 'social', 'custom-css' ),
		),
		
		// Colors --------------------------------------------
		'colors' => array(
			'title' => __('Colors', 'mfn-opts'),
			'sections' => array( 'colors-general', 'menu', 'colors-header', 'content', 'colors-footer', 'colors-accordion', 'headings', 'colors-shortcodes'),
		),
		
		// Fonts --------------------------------------------
		'font' => array(
			'title' => __('Fonts', 'mfn-opts'),
			'sections' => array( 'font-family', 'font-size' ),
		),
		
		// Translate --------------------------------------------
		'translate' => array(
			'title' => __('Translate', 'mfn-opts'),
			'sections' => array( 'translate-general', 'translate-blog', 'translate-portfolio', 'translate-404' ),
		),
		
	);

	$sections = array();

	// General ----------------------------------------------------------------------------------------
	
	// General -------------------------------------------
	$sections['general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'responsive',
				'type' => 'switch',
				'title' => __('Responsive', 'mfn-opts'), 
				'desc' => __('<b>Notice:</b> Responsive menu is working only with WordPress custom menu, please add one in Appearance > Menus and select it for Theme Locations section. <a href="http://en.support.wordpress.com/menus/" target="_blank">http://en.support.wordpress.com/menus/</a>', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'mfn-seo',
				'type' => 'switch',
				'title' => __('Use built-in SEO fields', 'mfn-opts'), 
				'desc' => __('Turn it OFF if you want to use external SEO plugin.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'meta-description',
				'type' => 'text',
				'title' => __('Meta Description', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
				'std' => get_bloginfo( 'description' ),
			),
			
			array(
				'id' => 'meta-keywords',
				'type' => 'text',
				'title' => __('Meta Keywords', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
			),
			
			array(
				'id' => 'google-analytics',
				'type' => 'textarea',
				'title' => __('Google Analytics', 'mfn-opts'), 
				'sub_desc' => __('Paste your Google Analytics code here.', 'mfn-opts'),
			),
			
		),
	);
	
	// Sidebars --------------------------------------------
	$sections['sidebars'] = array(
		'title' => __('Sidebars', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' => 'sidebars',
				'type' => 'multi_text',
				'title' => __('Sidebars', 'mfn-opts'),
				'sub_desc' => __('Manage custom sidebars', 'mfn-opts'),
				'desc' => __('Sidebars can be used on pages, blog and portfolio', 'mfn-opts')
			),
				
			array(
				'id' => 'single-layout',
				'type' => 'radio_img',
				'title' => __('Single Post Layout', 'mfn-opts'),
				'sub_desc' => __('Use this option to force layout for all posts', 'mfn-opts'),
				'desc' => __('This option can <strong>not</strong> be overriden and it is usefull for people who already have many posts and want to standardize their appearance.', 'mfn-opts'),
				'options' => array(
					'' 				=> array('title' => 'Use Post Meta', 'img' => MFN_OPTIONS_URI.'img/question.png'),
					'no-sidebar' 	=> array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
					'left-sidebar'	=> array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
					'right-sidebar'	=> array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png')
				),
			),
			
			array(
				'id' => 'single-sidebar',
				'type' => 'text',
				'title' => __('Single Post Sidebar', 'mfn-opts'),
				'sub_desc' => __('Use this option to force sidebar for all posts', 'mfn-opts'),
				'desc' => __('Paste the name of one of the sidebars that you added in the "Sidebars" section.', 'mfn-opts'),
				'class' => 'small-text',
			),
				
		),
	);
	
	// Blog --------------------------------------------
	$sections['blog'] = array(
		'title' => __('Blog', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'blog-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of posts per page', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '4',
			),
				
			array(
				'id' => 'blog-layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'),
				'sub_desc' => __('Layout for Blog Page', 'mfn-opts'),
				'options' => array(
					'one'			=> array('title' => 'List', 'img' => MFN_OPTIONS_URI.'img/list.png'),
					'one-second'	=> array('title' => 'Grid Two columns', 'img' => MFN_OPTIONS_URI.'img/one-second.png'),
					'one-third'		=> array('title' => 'Grid Three columns', 'img' => MFN_OPTIONS_URI.'img/one-third.png'),
					'one-fourth'	=> array('title' => 'Grid Four columns', 'img' => MFN_OPTIONS_URI.'img/one-fourth.png'),
// 					'timeline'		=> array('title' => 'Timeline', 'img' => MFN_OPTIONS_URI.'img/timeline.png'),
				),
				'std' => 'one'
			),

			array(
				'id' => 'blog-readmore',
				'type' => 'text',
				'title' => __('Read more', 'mfn-opts'),
				'sub_desc' => __('Read more link text', 'mfn-opts'),
				'desc' => __('Leave blank if you don`t want the link on blog page.', 'mfn-opts'),
				'std' => 'Read more',
			),
			
			array(
				'id' => 'blog-meta',
				'type' => 'switch',
				'title' => __('Show Post Meta', 'mfn-opts'),
				'sub_desc' => __('Show Categories, Comments Number, Date, etc.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-author',
				'type' => 'switch',
				'title' => __('Show Author Box', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-related',
				'type' => 'switch',
				'title' => __('Show Related Posts', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'pagination-show-all',
				'type' => 'switch',
				'title' => __('All pages in pagination', 'mfn-opts'),
				'desc' => __('Show all of the pages instead of a short list of the pages near the current page.', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-page',
				'type' => 'pages_select',
				'title' => __('Blog Page', 'mfn-opts'),
				'sub_desc' => __('Assign page for blog', 'mfn-opts'),
				'desc' => __('Use this option if you set <strong>Front page displays: Your latest posts</strong> in Settings > Reading', 'mfn-opts'),
				'args' => array()
			),
				
		),
	);
	
	// Portfolio --------------------------------------------
	$sections['portfolio'] = array(
		'title' => __('Portfolio', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'portfolio-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of portfolio posts per page.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '8',
			),
			
			array(
				'id' => 'portfolio-layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'), 
				'sub_desc' => __('Layout for portfolio items list.', 'mfn-opts'),
				'options' => array(
					'one'			=> array('title' => 'List', 'img' => MFN_OPTIONS_URI.'img/list.png'),
					'one-second'	=> array('title' => 'Two columns', 'img' => MFN_OPTIONS_URI.'img/one-second.png'),
					'one-third'		=> array('title' => 'Three columns', 'img' => MFN_OPTIONS_URI.'img/one-third.png'),
					'one-fourth'	=> array('title' => 'Four columns', 'img' => MFN_OPTIONS_URI.'img/one-fourth.png'),
				),
				'std' => 'one-fourth'																		
			),
			
			array(
				'id' => 'portfolio-page',
				'type' => 'pages_select',
				'title' => __('Portfolio Page', 'mfn-opts'), 
				'sub_desc' => __('Assign page for portfolio.', 'mfn-opts'),
				'args' => array()
			),
			
			array(
				'id' => 'portfolio-slug',
				'type' => 'text',
				'title' => __('Single item slug', 'mfn-opts'),
				'sub_desc' => __('Link to single item.', 'mfn-opts'),
				'desc' => __('<b>Important:</b> Do not use characters not allowed in links. <br /><br />Must be different from the Portfolio site title chosen above, eg. "portfolio-item". After change please go to "Settings > Permalinks" and click "Save changes" button.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => 'portfolio-item',
			),
			
			array(
				'id' => 'portfolio-orderby',
				'type' => 'select',
				'title' => __('Order by', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order by column.', 'mfn-opts'),
				'options' => array('date'=>'Date', 'menu_order' => 'Menu order', 'title'=>'Title'),
				'std' => 'menu_order'
			),
			
			array(
				'id' => 'portfolio-order',
				'type' => 'select',
				'title' => __('Order', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order.', 'mfn-opts'),
				'options' => array('ASC' => 'Ascending', 'DESC' => 'Descending'),
				'std' => 'ASC'
			),
			
			array(
				'id' => 'portfolio-isotope',
				'type' => 'switch',
				'title' => __('jQuery filtering', 'mfn-opts'),
				'desc' => __('When this option is enabled, portfolio looks great with all projects on single site, so please set "Posts per page" option to bigger number', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
		),
	);
	
	// Layout ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['layout-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'grid960',
				'type' => 'switch',
				'title' => __('Use 960px grid', 'mfn-opts'),
				'desc' => __('Turn it ON if you prefer narrow 960px grid.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '0'
			),
		
			array(
				'id' => 'layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'),
				'sub_desc' => __('Layout type', 'mfn-opts'),
				'options' => array(
					'boxed' => array('title' => 'Boxed', 'img' => MFN_OPTIONS_URI.'img/boxed.png'),
					'full-width' => array('title' => 'Full width', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
				),
				'std' => 'boxed'
			),
				
			array(
				'id' => 'img-page-bg',
				'type' => 'upload',
				'title' => __('Background Image', 'mfn-opts'),
				'desc' => __('This option can be used <strong>only</strong> with Layout: Boxed.', 'mfn-opts'),	
			),
					
			array(
				'id' => 'position-page-bg',
				'type' => 'select',
				'title' => __('Background Image position', 'mfn-opts'),
				'desc' => __('This option can be used only with your custom image selected above.', 'mfn-opts'),
				'options' => array(
					'no-repeat;center top;;' => 'Center Top No-Repeat',
					'repeat;center top;;' => 'Center Top Repeat',
					'no-repeat;center;;' => 'Center No-Repeat',
					'repeat;center;;' => 'Center Repeat',
					'no-repeat;left top;;' => 'Left Top No-Repeat',
					'repeat;left top;;' => 'Left Top Repeat',
					'no-repeat;center top;fixed;' => 'Center No-Repeat Fixed',
					'no-repeat;center;fixed;cover' => 'Center No-Repeat Fixed Cover',
				),
				'std' => 'center top no-repeat',
			),
			
			array(
				'id' => 'favicon-img',
				'type' => 'upload',
				'title' => __('Custom Favicon', 'mfn-opts'),
				'sub_desc' => __('Site favicon', 'mfn-opts'),
				'desc' => __('Please use ICO format only.', 'mfn-opts')
			),
			
			array(
				'id' => 'footer-copy',
				'type' => 'text',
				'title' => __('Footer Copyright Text', 'mfn-opts'),
				'desc' => __('Leave this field blank to show a default copyright.', 'mfn-opts'),
			),

		),
	);
	
	// Header --------------------------------------------
	$sections['layout-header'] = array(
		'title' => __('Header', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'sticky-header',
				'type' => 'switch',
				'title' => __('Sticky Header', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
			array(
				'id' => 'menu-clean',
				'type' => 'switch',
				'title' => __('Clean Menu Style', 'mfn-opts'),
				'desc' => __('Please remember to change the Menu Link color if you are using Custom Theme Skin.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '0'
			),
				
			array(
				'id' => 'logo-img',
				'type' => 'upload',
				'title' => __('Custom Logo', 'mfn-opts'),
				'sub_desc' => __('Custom logo image', 'mfn-opts'),
			),
	
			array(
				'id' => 'retina-logo-img',
				'type' => 'upload',
				'title' => __('Retina Logo', 'mfn-opts'),
				'sub_desc' => __('2x larger logo image', 'mfn-opts'),
				'desc' => __('Retina Logo should be 2x larger than Custom Logo (field is optional).', 'mfn-opts'),
			),

			array(
				'id' => 'header-contact-text',
				'type' => 'text',
				'title' => __('Header Contact Text', 'mfn-opts'),
				'class' => 'small-text',
			),
			
			array(
				'id' => 'header-phone',
				'type' => 'text',
				'title' => __('Header Phone number', 'mfn-opts'),
				'class' => 'small-text',
			),
			
			array(
				'id' => 'header-email',
				'type' => 'text',
				'title' => __('Header E-mail', 'mfn-opts'),
				'class' => 'small-text',
			),
			
			array(
				'id' => 'slider-vertical-auto',
				'type' => 'text',
				'title' => __('Muffin Slider - Timeout', 'mfn-opts'),
				'sub_desc' => __('Milliseconds between slide transitions', 'mfn-opts'),
				'desc' => __('<strong>0 to disable auto</strong> advance.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '0',
			),
	
		),
	);
	
	// Social Icons --------------------------------------------
	$sections['social'] = array(
		'title' => __('Social Icons', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'social-facebook',
				'type' => 'text',
				'title' => __('Facebook', 'mfn-opts'),
				'sub_desc' => __('Type your Facebook link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-googleplus',
				'type' => 'text',
				'title' => __('Google +', 'mfn-opts'),
				'sub_desc' => __('Type your Google + link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-twitter',
				'type' => 'text',
				'title' => __('Twitter', 'mfn-opts'),
				'sub_desc' => __('Type your Twitter link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-vimeo',
				'type' => 'text',
				'title' => __('Vimeo', 'mfn-opts'),
				'sub_desc' => __('Type your Vimeo link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-youtube',
				'type' => 'text',
				'title' => __('YouTube', 'mfn-opts'),
				'sub_desc' => __('Type your YouTube link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-flickr',
				'type' => 'text',
				'title' => __('Flickr', 'mfn-opts'),
				'sub_desc' => __('Type your Flickr link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-linkedin',
				'type' => 'text',
				'title' => __('LinkedIn', 'mfn-opts'),
				'sub_desc' => __('Type your LinkedIn link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-pinterest',
				'type' => 'text',
				'title' => __('Pinterest', 'mfn-opts'),
				'sub_desc' => __('Type your Pinterest link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-dribbble',
				'type' => 'text',
				'title' => __('Dribbble', 'mfn-opts'),
				'sub_desc' => __('Type your Dribbble link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
				
		),
	);
	
	// Custom CSS --------------------------------------------
	$sections['custom-css'] = array(
		'title' => __('Custom CSS', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'custom-css',
				'type' => 'textarea',
				'title' => __('Custom CSS', 'mfn-opts'), 
				'sub_desc' => __('Paste your custom CSS code here.', 'mfn-opts'),
			),
				
		),
	);

	// Colors ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['colors-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
							
			array(
				'id' => 'skin',
				'type' => 'select',
				'title' => __('Theme Skin', 'mfn-opts'), 
				'sub_desc' => __('Choose one of the predefined styles or set your own colors.', 'mfn-opts'), 
				'desc' => __('<b>Important:</b> Color options can be used only with the Custom Skin.', 'mfn-opts'), 
				'options' => array(
			
					'custom' => 'Custom',
					'blue' => 'Blue',
					'green' => 'Green',
					'grey' => 'Grey',
					'red' => 'Red',
				),
				'std' => 'custom',
			),
			
			array(
				'id' => 'background-body',
				'type' => 'color',
				'title' => __('Body background', 'mfn-opts'), 
				'std' => '#f7f8f8',
			),
			
		),
	);
	
	// Main menu --------------------------------------------
	$sections['menu'] = array(
		'title' => __('Menus', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
			
			array(
				'id' => 'background-menu',
				'type' => 'color',
				'title' => __('Menu background', 'mfn-opts'), 
				'std' => '#f94c3f'
			),
				
			array(
				'id' => 'color-menu-a',
				'type' => 'color',
				'title' => __('Menu Link color', 'mfn-opts'), 
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'background-menu-a-hover',
				'type' => 'color',
				'title' => __('Menu Hover Link background', 'mfn-opts'), 
				'std' => '#53302e'
			),
				
			array(
				'id' => 'color-menu-a-hover',
				'type' => 'color',
				'title' => __('Menu Hover Link color', 'mfn-opts'), 
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'background-sumbenu',
				'type' => 'color',
				'title' => __('Submenu background', 'mfn-opts'), 
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'color-sumbenu-a',
				'type' => 'color',
				'title' => __('Submenu Link color', 'mfn-opts'), 
				'std' => '#5f5f5f'
			),
				
			array(
				'id' => 'color-sumbenu-a-hover',
				'type' => 'color',
				'title' => __('Submenu Hover Link color', 'mfn-opts'), 
				'std' => '#2e2e2e'
			),
				
			array(
				'id' => 'color-mfn-menu-a',
				'type' => 'color',
				'title' => __('Widget Muffin Menu Link color', 'mfn-opts'), 
				'desc' => __('To change icon please edit <strong>css/skins/.../images/links.png</strong> file.', 'mfn-opts'),
				'std' => '#737373'
			),
				
			array(
				'id' => 'color-mfn-menu-a-hover',
				'type' => 'color',
				'title' => __('Widget Muffin Menu Hover Link color', 'mfn-opts'), 
				'std' => '#444444'
			),
			
		),
	);
	
	// Header --------------------------------------------
	$sections['colors-header'] = array(
		'title' => __('Header', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
					
			array(
				'id' => 'color-addons',
				'type' => 'color',
				'title' => __('Addons text color', 'mfn-opts'),
				'desc' => __('To change icons please edit <strong>images/icons/addons/...</strong> files.', 'mfn-opts'),
				'std' => '#aaaaaa',
			),
				
			array(
				'id' => 'background-social',
				'type' => 'color',
				'title' => __('Social Icon background', 'mfn-opts'),
				'std' => '#53302e',
			),
				
			array(
				'id' => 'color-social',
				'type' => 'color',
				'title' => __('Social Icon color', 'mfn-opts'),
				'std' => '#c0736f',
			),
				
			array(
				'id' => 'color-social-hover',
				'type' => 'color',
				'title' => __('Social Icon Hover color', 'mfn-opts'),
				'std' => '#ffffff',
			),

			array(
				'id' => 'background-subheader',
				'type' => 'color',
				'title' => __('Subheader background', 'mfn-opts'),
				'desc' => __('To change overlay please edit <strong>images/bg_subheader.png</strong> file.', 'mfn-opts'),
				'std' => '#f7f9f9',
			),
			
			array(
				'id' => 'color-subheader-title',
				'type' => 'color',
				'title' => __('Page Title color', 'mfn-opts'),
				'std' => '#39464e',
			),
			
			array(
				'id' => 'color-subheader-breadcrumbs',
				'type' => 'color',
				'title' => __('Breadcrumbs color', 'mfn-opts'),
				'std' => '#B2B3BA',
			),
			
			array(
				'id' => 'background-vertical-slider-pager',
				'type' => 'color',
				'title' => __('Vertical Slider Pager', 'mfn-opts'),
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'background-vertical-slider-pager-active',
				'type' => 'color',
				'title' => __('Vertical Slider Active Pager', 'mfn-opts'),
				'std' => '#53302E',
			),

		),
	);
	
	// Content --------------------------------------------
	$sections['content'] = array(
		'title' => __('Content', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'color-text',
				'type' => 'color',
				'title' => __('Text color', 'mfn-opts'), 
				'sub_desc' => __('Content text color.', 'mfn-opts'),
				'std' => '#787e87'
			),
			
			array(
				'id' => 'color-a',
				'type' => 'color',
				'title' => __('Link color', 'mfn-opts'), 
				'std' => '#f94c3f'
			),
			
			array(
				'id' => 'color-a-hover',
				'type' => 'color',
				'title' => __('Link Hover color', 'mfn-opts'), 
				'std' => '#ac3d35'
			),
				
			array(
				'id' => 'color-note',
				'type' => 'color',
				'title' => __('Note color', 'mfn-opts'),
				'desc' => __('eg. Latest Post date, Blockquote author.', 'mfn-opts'),
				'std' => '#a5a5a5',
			),
							
			array(
				'id' => 'color-note-bold',
				'type' => 'color',
				'title' => __('Bold Note color', 'mfn-opts'), 
				'desc' => __('eg. Widget Title, Contect Box icon, Our Team subtitle.', 'mfn-opts'),
				'std' => '#733f3c',
			),
			
			array(
				'id' => 'background-highlight',
				'type' => 'color',
				'title' => __('Dropcap & Highlight background', 'mfn-opts'),
				'std' => '#f94c3f'
			),
	
			array(
				'id' => 'color-highlight',
				'type' => 'color',
				'title' => __('Dropcap & Highlight text color', 'mfn-opts'),
				'std' => '#ffffff'
			),
			
			array(
				'id' => 'background-button',
				'type' => 'color',
				'title' => __('Button background', 'mfn-opts'), 
				'desc' => __('To change arrow please edit <strong>images/arrow_right.png</strong> file.', 'mfn-opts'), 
				'std' => '#f94c3f',
			),
			
			array(
				'id' => 'color-button',
				'type' => 'color',
				'title' => __('Button text color', 'mfn-opts'), 
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'background-button-submit',
				'type' => 'color',
				'title' => __('Submit Button background', 'mfn-opts'),  
				'std' => '#53302e',
			),
			
			array(
				'id' => 'color-button-submit',
				'type' => 'color',
				'title' => __('Submit Button color', 'mfn-opts'), 
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'border-photo',
				'type' => 'color',
				'title' => __('Photo border', 'mfn-opts'), 
				'std' => '#ffffbe',
			),
	
		),
	);
	
	// Footer --------------------------------------------
	$sections['colors-footer'] = array(
		'title' => __('Footer', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'border-footer-line',
				'type' => 'color',
				'title' => __('Border Top', 'mfn-opts'),
				'sub_desc' => __('Shaded Line above the footer', 'mfn-opts'),
				'std' => '#f94c3f',
			),
				
			array(
				'id' => 'color-footer-text',
				'type' => 'color',
				'title' => __('Text color', 'mfn-opts'),
				'std' => '#797b7f',
			),
				
			array(
				'id' => 'color-footer-a',
				'type' => 'color',
				'title' => __('Link color', 'mfn-opts'),
				'std' => '#f94c3f',
			),
				
			array(
				'id' => 'color-footer-a-hover',
				'type' => 'color',
				'title' => __('Link Hover color', 'mfn-opts'),
				'std' => '#ac3d35',
			),
				
			array(
				'id' => 'color-footer-heading',
				'type' => 'color',
				'title' => __('Heading color', 'mfn-opts'),
				'std' => '#53302e',
			),
				
			array(
				'id' => 'color-footer-widget-title',
				'type' => 'color',
				'title' => __('Widget Title color', 'mfn-opts'),
				'std' => '#767676',
			),
				
			array(
				'id' => 'color-footer-icon',
				'type' => 'color',
				'title' => __('Icon color', 'mfn-opts'),
				'std' => '#937a79',
			),
				
			array(
				'id' => 'color-footer-note',
				'type' => 'color',
				'title' => __('Note color', 'mfn-opts'),
				'std' => '#98a3ab',
			),
				
			array(
				'id' => 'color-footer-photo-border',
				'type' => 'color',
				'title' => __('Photo border', 'mfn-opts'),
				'std' => '#ffffbe',
			),
	
		),
	);
	
	// Accordion --------------------------------------------
	$sections['colors-accordion'] = array(
		'title' => __('Accordion & Tabs', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' => 'color-accordion-title',
				'type' => 'color',
				'title' => __('Accordion Title color', 'mfn-opts'),
				'desc' => __('To change icon please edit <strong>css/skins/.../images/accordion_controls.png</strong> file.', 'mfn-opts'),
				'std' => '#23384e'
			),
				
			array(
				'id' => 'color-accordion-title-active',
				'type' => 'color',
				'title' => __('Accordion Active Title color', 'mfn-opts'),
				'desc' => __('This is also Active Border color', 'mfn-opts'),
				'std' => '#f94c3f'
			),
				
			array(
				'id' => 'color-accordion-content-active',
				'type' => 'color',
				'title' => __('Accordion Active Content color', 'mfn-opts'),
				'std' => '#4C6580'
			),
				
			array(
				'id' => 'color-tabs-title',
				'type' => 'color',
				'title' => __('Tab Title color', 'mfn-opts'),
				'std' => '#767676'
			),
			
			array(
				'id' => 'color-tabs-title-active',
				'type' => 'color',
				'title' => __('Tab Active Title color', 'mfn-opts'),
				'std' => '#52302e'
			),
			
			array(
				'id' => 'border-tabs-title-active',
				'type' => 'color',
				'title' => __('Tab Active Title border', 'mfn-opts'),
				'std' => '#fb5d51'
			),

		),
	);
	
	// Headings --------------------------------------------
	$sections['headings'] = array(
		'title' => __('Headings', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'color-h1',
				'type' => 'color',
				'title' => __('Heading H1 color', 'mfn-opts'), 
				'std' => '#39464e'
			),
			
			array(
				'id' => 'color-h2',
				'type' => 'color',
				'title' => __('Heading H2 color', 'mfn-opts'), 
				'std' => '#39464e'
			),
			
			array(
				'id' => 'color-h3',
				'type' => 'color',
				'title' => __('Heading H3 color', 'mfn-opts'), 
				'std' => '#39464e'
			),
			
			array(
				'id' => 'color-h4',
				'type' => 'color',
				'title' => __('Heading H4 color', 'mfn-opts'), 
				'std' => '#37414e'
			),
			
			array(
				'id' => 'color-h5',
				'type' => 'color',
				'title' => __('Heading H5 color', 'mfn-opts'), 
				'std' => '#37414e'
			),
			
			array(
				'id' => 'color-h6',
				'type' => 'color',
				'title' => __('Heading H6 color', 'mfn-opts'), 
				'std' => '#37414e'
			),
				
		),
	);
	
	// Shortcodes --------------------------------------------
	$sections['colors-shortcodes'] = array(
		'title' => __('Shortcodes', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'background-call-to-action',
				'type' => 'color',
				'title' => __('Call To Action overlay', 'mfn-opts'),
				'std' => '#53302E',
			),
				
			array(
				'id' => 'border-call-to-action',
				'type' => 'color',
				'title' => __('Call To Action border', 'mfn-opts'),
				'std' => '#764441',
			),
				
			array(
				'id' => 'color-call-to-action-title',
				'type' => 'color',
				'title' => __('Call To Action Title color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
			array(
				'id' => 'color-call-to-action-highlight',
				'type' => 'color',
				'title' => __('Call To Action Highlight color', 'mfn-opts'),
				'std' => '#FFCDC9',
			),

			array(
				'id' => 'border-fancy-heading',
				'type' => 'color',
				'title' => __('Fancy Heading border', 'mfn-opts'),
				'std' => '#F94C3F',
			),
				
			array(
				'id' => 'color-fancy-heading-icon',
				'type' => 'color',
				'title' => __('Fancy Heading Icon color', 'mfn-opts'),
				'std' => '#733f3c',
			),
				
			array(
				'id' => 'background-info-box',
				'type' => 'color',
				'title' => __('Info Box background', 'mfn-opts'),
				'std' => '#f3f2f0',
			),
	
			array(
				'id' => 'color-latest-post-a',
				'type' => 'color',
				'title' => __('Latest Post Title color', 'mfn-opts'),
				'std' => '#53302e',
			),
			
			array(
				'id' => 'background-offer-pager',
				'type' => 'color',
				'title' => __('Offer Pager background', 'mfn-opts'),
				'desc' => __('To change active image please edit <strong>css/skins/.../images/offer_active.png<strong> file.', 'mfn-opts'),
				'std' => '#53302e',
			),

			array(
				'id' => 'color-pricing-price',
				'type' => 'color',
				'title' => __('Pricing Table Price', 'mfn-opts'),
				'std' => '#733f3c',
			),
			
			array(
				'id' => 'border-pricing',
				'type' => 'color',
				'title' => __('Pricing Table border', 'mfn-opts'),
				'std' => '#F4F4F4',
			),
			
			array(
				'id' => 'border-pricing-featured',
				'type' => 'color',
				'title' => __('Pricing Table Featured border', 'mfn-opts'),
				'std' => '#D6EEFC',
			),
			
			array(
				'id' => 'background-pricing-featured',
				'type' => 'color',
				'title' => __('Pricing Table Featured background', 'mfn-opts'),
				'std' => '#F6FBFE',
			),

			array(
				'id' => 'background-progress-bar',
				'type' => 'color',
				'title' => __('Progress Bar color', 'mfn-opts'),
				'std' => '#f94c3f',
			),

			array(
				'id' => 'color-quick-fact-number',
				'type' => 'color',
				'title' => __('Quick Fact Number color', 'mfn-opts'),
				'std' => '#F94C3F',
			),
			
			array(
				'id' => 'color-quick-fact-title',
				'type' => 'color',
				'title' => __('Quick Fact Title color', 'mfn-opts'),
				'std' => '#53302e',
			),
	
			array(
				'id' => 'border-testimonials',
				'type' => 'color',
				'title' => __('Testimonials border', 'mfn-opts'),
				'sub_desc' => __('Testimonials & Blockquote', 'mfn-opts'),
				'desc' => __('To change icon please edit <strong>css/skins/.../images/blockquote.png<strong> file.', 'mfn-opts'),
				'std' => '#F94C3F',
			),
			
			array(
				'id' => 'background-testimonials-pager-active',
				'type' => 'color',
				'title' => __('Testimonials Active Pager color', 'mfn-opts'),
				'std' => '#53302e',
			),
				
		),
	);

	// Font Family --------------------------------------------
	$sections['font-family'] = array(
		'title' => __('Font Family', 'mfn-opts'),
		'fields' => array(
			
			array(
				'id' => 'font-content',
				'type' => 'font_select',
				'title' => __('Content Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all theme texts except headings and menu.', 'mfn-opts'), 
				'std' => 'Raleway'
			),
			
			array(
				'id' => 'font-menu',
				'type' => 'font_select',
				'title' => __('Main Menu Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for header menu.', 'mfn-opts'), 
				'std' => 'Raleway'
			),
			
			array(
				'id' => 'font-headings',
				'type' => 'font_select',
				'title' => __('Headings Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all headings.', 'mfn-opts'), 
				'std' => 'Raleway'
			),
			
			array(
				'id' => 'font-subset',
				'type' => 'text',
				'title' => __('Google Font Subset', 'mfn-opts'),				
				'sub_desc' => __('Specify which subsets should be downloaded. Multiple subsets should be separated with coma (,)', 'mfn-opts'),
				'desc' => __('Some of the fonts in the Google Font Directory support multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>.', 'mfn-opts'),
				'class' => 'small-text'
			),
				
		),
	);
	
	// Content Font Size --------------------------------------------
	$sections['font-size'] = array(
		'title' => __('Font Size', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'font-size-content',
				'type' => 'sliderbar',
				'title' => __('Content', 'mfn-opts'),
				'sub_desc' => __('This font size will be used for all theme texts.', 'mfn-opts'),
				'std' => '14',
			),
				
			array(
				'id' => 'font-size-menu',
				'type' => 'sliderbar',
				'title' => __('Main menu', 'mfn-opts'),
				'sub_desc' => __('This font size will be used for top level only.', 'mfn-opts'),
				'std' => '14',
			),
			
			array(
				'id' => 'font-size-h1',
				'type' => 'sliderbar',
				'title' => __('Heading H1', 'mfn-opts'),
				'sub_desc' => __('Subpages header title.', 'mfn-opts'),
				'std' => '43',
			),
			
			array(
				'id' => 'font-size-h2',
				'type' => 'sliderbar',
				'title' => __('Heading H2', 'mfn-opts'),
				'std' => '40',
			),
			
			array(
				'id' => 'font-size-h3',
				'type' => 'sliderbar',
				'title' => __('Heading H3', 'mfn-opts'),
				'std' => '35',
			),
			
			array(
				'id' => 'font-size-h4',
				'type' => 'sliderbar',
				'title' => __('Heading H4', 'mfn-opts'),
				'std' => '30',
			),
			
			array(
				'id' => 'font-size-h5',
				'type' => 'sliderbar',
				'title' => __('Heading H5', 'mfn-opts'),
				'std' => '23',
			),
			
			array(
				'id' => 'font-size-h6',
				'type' => 'sliderbar',
				'title' => __('Heading H6', 'mfn-opts'),
				'std' => '16',
			),
	
		),
	);
	
	// Translate / General --------------------------------------------
	$sections['translate-general'] = array(
		'title' 	=> __('General', 'mfn-opts'),
		'fields'	=> array(
	
			array(
				'id' 		=> 'translate',
				'type' 		=> 'switch',
				'title' 	=> __('Enable Translate', 'mfn-opts'), 
				'desc' 		=> __('Turn it off if you want to use .mo .po files for more complex translation.', 'mfn-opts'),
				'options' 	=> array('1' => 'On','0' => 'Off'),
				'std' 		=> '1'
			),
			
			array(
				'id' 		=> 'translate-search-placeholder',
				'type' 		=> 'text',
				'title' 	=> __('Search Placeholder', 'mfn-opts'),
				'desc' 		=> __('Widget Search', 'mfn-opts'),
				'std' 		=> 'Enter your search',
				'class' 	=> 'small-text',
			),
				
			array(
				'id' 		=> 'translate-search-results',
				'type' 		=> 'text',
				'title' 	=> __('results found for:', 'mfn-opts'),
				'desc' 		=> __('Search Results', 'mfn-opts'),
				'std' 		=> 'results found for:',
				'class' 	=> 'small-text',
			),
			
			array(
				'id' 		=> 'translate-home',
				'type' 		=> 'text',
				'title' 	=> __('Home', 'mfn-opts'),
				'desc' 		=> __('Breadcrumbs', 'mfn-opts'),
				'std' 		=> 'Home',
				'class' 	=> 'small-text',
			),

		),
	);
	
	// Translate / Blog  --------------------------------------------
	$sections['translate-blog'] = array(
		'title' => __('Blog', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'translate-comment',
				'type' => 'text',
				'title' => __('Comment', 'mfn-opts'),
				'sub_desc' => __('Text to display when there is one comment', 'mfn-opts'),
				'std' => 'Comment',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-comments',
				'type' => 'text',
				'title' => __('Comments', 'mfn-opts'),
				'sub_desc' => __('Text to display when there are more than one comments', 'mfn-opts'),
				'std' => 'Comments',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-comments-off',
				'type' => 'text',
				'title' => __('Comments off', 'mfn-opts'),
				'sub_desc' => __('Text to display when comments are disabled', 'mfn-opts'),
				'std' => 'Comments off',
				'class' => 'small-text',
			),
	
			array(
				'id' => 'translate-previous-post',
				'type' => 'text',
				'title' => __('Previous post', 'mfn-opts'),
				'std' => 'Previous post',
				'class' => 'small-text',
			),
	
			array(
				'id' => 'translate-next-post',
				'type' => 'text',
				'title' => __('Next post', 'mfn-opts'),
				'std' => 'Next post',
				'class' => 'small-text',
			),

			array(
				'id' => 'translate-related-posts',
				'type' => 'text',
				'title' => __('Related Posts', 'mfn-opts'),
				'std' => 'Related Posts',
				'class' => 'small-text',
			),

		),
	);
	
	// Translate / Portfolio  --------------------------------------------
	$sections['translate-portfolio'] = array(
		'title' => __('Portfolio', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'translate-select-category',
				'type' => 'text',
				'title' => __('Select category', 'mfn-opts'),
				'std' => 'Select category',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-all',
				'type' => 'text',
				'title' => __('All', 'mfn-opts'),
				'std' => 'All',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-details',
				'type' => 'text',
				'title' => __('Project details', 'mfn-opts'),
				'std' => 'Project details',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-category',
				'type' => 'text',
				'title' => __('Category', 'mfn-opts'),
				'std' => 'Category',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-client',
				'type' => 'text',
				'title' => __('Client', 'mfn-opts'),
				'std' => 'Client',
				'class' => 'small-text',
			),

			array(
				'id' => 'translate-date',
				'type' => 'text',
				'title' => __('Date', 'mfn-opts'),
				'std' => 'Date',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-task',
				'type' => 'text',
				'title' => __('Task', 'mfn-opts'),
				'std' => 'Task',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-website',
				'type' => 'text',
				'title' => __('Website', 'mfn-opts'),
				'std' => 'Website',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-visit-online',
				'type' => 'text',
				'title' => __('Visit online', 'mfn-opts'),
				'std' => 'Visit online',
				'class' => 'small-text',
			),
			
		),
	);
	
	// Translate Error 404 --------------------------------------------
	$sections['translate-404'] = array(
		'title' => __('Error 404', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate-404-title',
				'type' => 'text',
				'title' => __('Title', 'mfn-opts'),
				'desc' => __('Ooops... Error 404', 'mfn-opts'),
				'std' => 'Ooops... Error 404',
			),
			
			array(
				'id' => 'translate-404-subtitle',
				'type' => 'text',
				'title' => __('Subtitle', 'mfn-opts'),
				'desc' => __('We are sorry, but the page you are looking for does not exist.', 'mfn-opts'),
				'std' => 'We are sorry, but the page you are looking for does not exist.',
			),
			
			array(
				'id' => 'translate-404-text',
				'type' => 'text',
				'title' => __('Text', 'mfn-opts'),
				'desc' => __('Please check entered address and try again or', 'mfn-opts'),
				'std' => 'Please check entered address and try again or ',
			),
			
			array(
				'id' => 'translate-404-btn',
				'type' => 'text',
				'title' => __('Button', 'mfn-opts'),
				'sub_desc' => __('Go To Homepage button', 'mfn-opts'),
				'std' => 'go to homepage',
				'class' => 'small-text',
			),
	
		),
	);
								
	global $MFN_Options;
	$MFN_Options = new MFN_Options( $menu, $sections );
}
//add_action('init', 'mfn_opts_setup', 0);
mfn_opts_setup();


/**
 * This is used to return and option value from the options array
 */
function mfn_opts_get($opt_name, $default = null){
	global $MFN_Options;
	return $MFN_Options->get( $opt_name, $default );
}


/**
 * This is used to echo and option value from the options array
 */
function mfn_opts_show($opt_name, $default = null){
	global $MFN_Options;
	$option = $MFN_Options->get( $opt_name, $default );
	if( ! is_array( $option ) ){
		echo $option;
	}	
}

?>