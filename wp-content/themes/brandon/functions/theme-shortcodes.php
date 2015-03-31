<?php
/**
 * Shortcodes.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Shortcode [one] [/one]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one' ) )
{
	function sc_one( $attr, $content = null )
	{
		$output  = '<div class="column one">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_second] [/one_second]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_second' ) )
{
	function sc_one_second( $attr, $content = null )
	{
		$output  = '<div class="column one-second">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_third] [/one_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_third' ) )
{
	function sc_one_third( $attr, $content = null )
	{
		$output  = '<div class="column one-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_third] [/two_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_third' ) )
{
	function sc_two_third( $attr, $content = null )
	{
		$output  = '<div class="column two-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_fourth] [/one_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fourth' ) )
{
	function sc_one_fourth( $attr, $content = null )
	{
		$output  = '<div class="column one-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_fourth] [/two_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_fourth' ) )
{
	function sc_two_fourth( $attr, $content = null )
	{
		$output  = '<div class="column two-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [three_fourth] [/three_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fourth' ) )
{
	function sc_three_fourth( $attr, $content = null )
	{
		$output  = '<div class="column three-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Code [code]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_code' ) )
{
	function sc_code( $attr, $content = null )
	{
		$output  = '<pre>';
			$output .= do_shortcode(htmlspecialchars($content));
		$output .= '</pre>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Article Box [feature_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_article_box' ) )
{
	function sc_article_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link_text'	=> 'View more',
			'link' 		=> '',
			'target' 	=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="article_box">';
		
			$output .= '<div class="photo">';
				$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
			$output .= '</div>';
			
			$output .= '<div class="desc">';
				$output .= '<h6>'. $slogan .'</h6>';
				$output .= '<h4>'. $title .'</h4>';
				if( $link ) $output .= '<div class="footer"><a href="'. $link .'" '. $target .'>'. $link_text .' <i class="fa-angle-right"></i></a></div>';
			$output .= '</div>';
			
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Feature Box [feature_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_feature_box' ) )
{
	function sc_feature_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'image' 	=> '',
			'link_text'	=> 'Read more',
			'link' 		=> '',
			'target' 	=> '',
			'border' 	=> '',
			'animation' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// border
		if( $border ){
			$border = ' has_border';
		} else {
			$border = false;
		}
		
		// animation
		if( $animation ){
			$animation = 'data-animation="'. $animation .'"';
		} else {
			$animation = false;
		}

		$output = '<div class="feature_box">';
			$output .= '<div class="feature_box_wrapper '. $border .'">';
				
				if( $title ) $output .= '<h3 class="title">'. $title .'</h3>';
	
				if( $image ){
					$output .= '<div class="image" '. $animation .'>';
						$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
					$output .= '</div>';
				}
				
				$output .= '<div class="desc">';
					$output .= '<p>'. do_shortcode($content) .'</p>';
					if( $link ) $output .= '<a class="button" href="'. $link .'" '. $target .'>'. $link_text .'</a>';
				$output .= '</div>';
				
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Fancy Heading [fancy_heading]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_fancy_heading' ) )
{
	function sc_fancy_heading( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'icon' 	=> '',
		), $attr));
		
		// no icon
		if( $icon ){
			$class = " has_icon";
		} else {
			$class = " no_icon";
		}	
	
		$output = '<div class="fancy_heading">';
			$output .= '<div class="fancy_heading_wrapper '. $class .'">';
				$output .= '<h2>'. $title .'</h2>';
				$output .= '<div class="inside">';
					$output .= do_shortcode($content);
				$output .= '</div>';
				if( $icon ) $output .= '<i class="'. $icon .'"></i>';		
			$output .= '</div>'."\n";
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Offer [offer]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_offer' ) )
{
	function sc_offer( $attr = false, $content = null )
	{	
		$args = array(
			'post_type'				=> 'offer',
			'posts_per_page'		=> -1,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC',
			'ignore_sticky_posts'	=> 1,
		);
		
		$offer_query = new WP_Query();
		$offer_query->query( $args );
		
		$output = '';
		if ($offer_query->have_posts())
		{			
			$output .= '<div class="offer">';		
				$output .= '<div class="offer_wrapper">';		
					$output .= '<ul class="offer-slider offer-slider-'. $offer_query->post_count .'">';
				
						while ($offer_query->have_posts())
						{
							$offer_query->the_post();
							$output .= '<li>';
								
								$output .= '<div class="image">';	
									$output .= '<div class="image_wrapper">';	
										if ( $video = get_post_meta( get_the_ID(), 'mfn-post-vimeo', true) ){
											$output .= '<iframe class="scale-with-grid" src="http://player.vimeo.com/video/'. $video .'" allowFullScreen></iframe>';
										} elseif ( $video = get_post_meta( get_the_ID(), 'mfn-post-youtube', true) ){
											$output .= '<iframe class="scale-with-grid" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" allowfullscreen></iframe>';
										} else {
											$output .= get_the_post_thumbnail( get_the_ID(), 'offer-slider', array('class'=>'scale-with-grid' ) );
										}
									$output .= '</div>';
								$output .= '</div>';
								
								$output .= '<div class="desc">';
									$output .= '<h2 class="title">'. get_the_title() .'</h2>';
									$output .= '<div class="inside">'. do_shortcode( get_the_content() ) .'</div>';
									if( $link = get_post_meta( get_the_ID(), 'mfn-post-link', true) ){
										$output .= '<a class="button" href="'. $link .'">'. get_post_meta( get_the_ID(), 'mfn-post-link_title', true) .'</a>';
									}
								$output .= '</div>';
								
								$output .= '<div class="thumbnail" style="display:none">';
									if( $thumbnail = get_post_meta( get_the_ID(), 'mfn-post-thumbnail', true) ){
										$output .= '<img src="'. $thumbnail .'" class="scale-with-grid" alt="'. get_the_title() .'" />';
									} elseif( has_post_thumbnail() ){
										$output .= get_the_post_thumbnail( get_the_ID(), 'offer-slider-pg', array('class'=>'scale-with-grid' ) );
									}
								$output .= '</div>';
								
							$output .= '</li>';
						}
						
					$output .= '</ul>';
				$output .= '</div>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Contact Box [contact_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_box' ) )
{
	function sc_contact_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'lat' 			=> '',
			'lng' 			=> '',
			'zoom' 			=> 13,
			'uid' 			=> uniqid(),
			'address' 		=> '',
			'telephone'		=> '',
			'email' 		=> '',
			'www' 			=> '',
		), $attr));
		
		$output = '<div class="contact_box">';
		
			if( $title ) $output .= '<h5 class="title">'. $title .'</h5>';
		
			if( $lat && $lng ){
				wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false', false, THEME_VERSION, true );
				$output .= '<script>';
					//<![CDATA[
						$output .= 'function google_maps_'. $uid .'(){';
							$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';
							$output .= 'var myOptions = {';
								$output .= 'zoom				: '. intval($zoom) .',';
								$output .= 'center				: latlng,';
								$output .= 'zoomControl			: true,';
								$output .= 'mapTypeControl		: false,';
								$output .= 'streetViewControl	: false,';
								$output .= 'scrollwheel			: false,';
								$output .= 'mapTypeId			: google.maps.MapTypeId.ROADMAP';
							$output .= '};';
							
							$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';
// 							$output .= 'var image = "'. THEME_URI .'/images/pin_small.png";';
							$output .= 'var marker = new google.maps.Marker({';
								$output .= 'position			: latlng,';
								$output .= 'map					: map';
// 								$output .= 'icon				: image';
							$output .= '});';
						$output .= '}';
						
						$output .= 'jQuery(document).ready(function($){';
							$output .= 'google_maps_'. $uid .'();';
						$output .= '});';
					//]]>
				$output .= '</script>'."\n";
				
				$output .= '<div class="google-map" id="google-map-area-'. $uid .'" style="width:100%; height:135px;">&nbsp;</div>'."\n";
			}
			
			$output .= '<ul>';
				if( $address ){
					$output .= '<li class="address">';
					$output .= '<p>'. $address .'</p>';
					$output .= '</li>';
				}
				if( $telephone ){
					$output .= '<li class="phone">';
					$output .= '<i class="fa-phone"></i><p><a href="tel:'. $telephone .'">'. $telephone .'</a></p>';
					$output .= '</li>';
				}
				if( $email ){
					$output .= '<li class="mail">';
					$output .= '<i class="fa-envelope"></i><p><a href="mailto:'. $email .'">'. $email .'</a></p>';
					$output .= '</li>';
				}
				if( $www ){
					$output .= '<li class="www">';
					$output .= '<i class="fa-globe"></i><p><a href="http://'. $www .'" target="_blank">'. $www .'</a></p>';
					$output .= '</li>';
				}
			$output .= '</ul>';
			
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Divider [divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_divider' ) )
{
	function sc_divider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'height' => '0',
			'line' => '',
		), $attr));
		
		$line = ( $line ) ? false : ' border:none; width:0; height:0;';		
		$output = '<hr style="margin: 0 0 '. intval($height) .'px;'. $line .'" />'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [portfolio]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio' ) )
{
	function sc_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '5',
			'category' 		=> '',
			'orderby' 		=> 'menu_order',
			'order' 		=> 'ASC',
		), $attr));

		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['portfolio-types'] = $category;

		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;

		if ($query->have_posts())
		{
			$output  = '<div class="recent-works">';
				$output .= '<ul class="recent-works-slider">';
					while ($query->have_posts())
					{
						$query->the_post();
		
						$output .= '<li>';
							$output .= '<div class="photo hover-mask">';
								$output .= '<a class="more" href="'. get_permalink() .'">';
									$output .= get_the_post_thumbnail( null, 'portfolio-list', array('class'=>'scale-with-grid' ) );
									$output .= '<span class="ico"><h5>'. get_the_title() .'</h5></span>';
								$output .= '</a>';
							$output .= '</div>';
						$output .= '</li>';
					}
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Pricing Item [pricing_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pricing_item' ) )
{
	function sc_pricing_item( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'price' => '',
			'currency' => '',
			'period' => '',
			'link_title' => '',
			'link' => '',
			'featured' => '',
		), $attr));
		
		$classes = '';
		
		// featured
		if( $featured ){
			$classes .= ' pricing-box-featured';
		}
		
		// no price
		if( ! $price ){
			$classes .= ' no-price';
		}
	
		$output = '<div class="pricing-box'. $classes .'">';
			$output .= '<div class="plan-header">';
				if( $price ) $output .= '<div class="price"><sup>'. $currency .'</sup><span>'. $price .'</span><sup class="period">'. $period .'</sup></div>';
				$output .= '<h3>'. $title .'</h3>';
			$output .= '</div>';
			$output .= '<div class="plan-inside">';
				$output .= do_shortcode($content);
			$output .= '</div>';
			if( $link ) $output .= '<div class="btn"><center><a href="'. $link .'">'. $link_title .'</a></center></div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Counter [counter]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_counter' ) )
{
	function sc_counter( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'icon' 			=> '',
			'color' 	=> '',
			'image' 		=> '',
			'number' 		=> '',
			'title' 		=> '',
		), $attr));
		
		$output = '<div class="counter animate-math '. $border .'">';
		
			$output .= '<div class="icon_image">';
				if( $image ){
					$output .= '<img src="'. $image .'" alt="'. $title .'" />';
				} elseif( $icon ){
					$output .= '<i class="'. $icon .'" style="color:'. $color .';"></i>';
				}
			$output .= '</div>';
		
			if( $number ) $output .= '<div class="number" data-to="'. $number .'">0</div>';
			if( $title ) $output .= '<h6 class="title">'. $title .'</h6>';

		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Quick Fact [quick_fact]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_quick_fact' ) )
{
	function sc_quick_fact( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'number' 	=> '',
			'title' 	=> '',
			'border' 	=> '',
		), $attr));
	
		// border
		if( $border ){
			$border = ' has_border';
		} else {
			$border = false;
		}
		
		$output = '<div class="quick_fact">';
			$output .= '<div class="quick_fact_wrapper animate-math '. $border .'">';
				if( $number ) $output .= '<div class="number" data-to="'. $number .'">0</div>';
				if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
				$output .= '<div class="desc">';
					$output .= '<p>'. do_shortcode($content) .'</p>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Quick Form [quick_form]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_quick_form' ) )
{
	function sc_quick_form( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'form' 		=> '',
		), $attr));
		
		$output = '<div class="quick_form">';
			if( $title ) $output .= '<h5 class="title">'. $title .'</h5>';
			if( $form ) $output .= do_shortcode($form);
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Ico [ico]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_ico' ) )
{
	function sc_ico( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'type' => '',
		), $attr));
		
		$output = '<i class="'. $type .'"></i>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Image [image]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_image' ) )
{
	function sc_image( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'src'			=> '',
			'alt'			=> '',
			'caption'		=> '',
			'align'			=> '',
			'link'			=> '',
			'link_image'	=> '',
			'link_type'		=> '',
			'target'		=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// align
		if( $align ) $align = ' align'. $align;
		
		// hoover icon
		if( $link_type == 'zoom' || $link_image ){
			$rel= 'prettyPhoto';
			$target = false;
		} else {
			$rel = false;
		}
		
		// link
		if( $link_image ) $link = $link_image;
		
		if( $link )
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption has-hover'. $align .'">';
				$output .= '<div class="photo hover-mask">';	
					$output .= '<a href="'. $link .'" rel="'. $rel .'" '. $target .'>';
						$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
						if( $link_type == 'zoom' || $link_image ){
							$output .= '<span class="ico"><i class="fa-eye"></i></span>';
						} else {
							$output .= '<span class="ico"><i class="fa-external-link"></i></span>';
						}
					$output .= '</a>';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
		else 
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption no-hover'. $align .'">';
				$output .= '<div class="photo">';
					$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Info Box [info_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_info_box' ) )
{
	function sc_info_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
		), $attr));

		$output = '<div class="info_box">';
			$output .= '<div class="info_box_wrapper">';
				
				if( $title )$output .= '<h5 class="title">'. $title .'</h5>';
			
				$output .= '<div class="desc">';
					$output .= do_shortcode($content);
				$output .= '</div>';
				
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Button [button]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_button' ) )
{
	function sc_button( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'size' => '',
			'color' => '',
			'title' => 'Read more',
			'link' => '',
			'target' => '',
			'class' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
							
		$output = '<a class="button button_'. $size .' button_'. $color .' '. $class .'" href="'. $link .'" '. $target .'>'. $title .'</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Highlight [highlight] [/highlight]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_highlight' ) )
{
	function sc_highlight( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
		), $attr));
		
		// style
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
							
		$output  = '<span class="highlight" '. $style .'>';
			$output .= do_shortcode($content);
		$output .= '</span>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Dropcap [dropcap] [/dropcap]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_dropcap' ) )
{
	function sc_dropcap( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
			'circle' 		=> '',
		), $attr));
		
		// circle
		if( $circle ){
			$class = ' dropcap_circle';
		} else {
			$class = false;
		}
		
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
							
		$output  = '<span class="dropcap'. $class .'" '. $style .'>';
			$output .= do_shortcode( $content );
		$output .= '</span>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tooltip [tooltip] [/tooltip]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_tooltip' ) )
{
	function sc_tooltip( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'hint' 			=> '',
		), $attr));

		$output = '';
		if( $hint ){
			$output .= '<span class="tooltip" data-tooltip="'. $hint .'" ontouchstart="this.classList.toggle(\'hover\');">';
				$output .= do_shortcode( $content );
			$output .= '</span>'."\n";
		}
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blockquote [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'photo' => '',
			'author' => '',
			'company' => '',
			'link' => '',
			'target' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// photo
		if( $photo ){
			$class = 'has_photo';
		} else {
			$class = 'no_photo';
		}
		
		$output = '<div class="blockquote">';
			$output .= '<blockquote class="'. $class .'">';
	
				$output .= '<span class="ico"></span>';
				
				$output .= '<div class="text">';
					$output .= '<div class="text_wrapper">'. do_shortcode( $content ) .'</div>';
				$output .= '</div>';
			
				$output .= '<div class="author">';
					$output .= '<div class="author_wrapper">';
						
						$output .= '<div class="photo">';
							if( $photo ){
								$output .= '<img class="scale-with-grid" src="'. $photo .'" alt="'.$author .'" />';
							} else {
								$output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. $author .'" />';
							}
						$output .= '</div>';
						
						$output .= '<div class="desc">';
							$output .= '<h6>'. $author .'</h6>';
							if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
								$output .= '<span>'. $company .'</span>';
							if( $link ) $output .= '</a>';
						$output .= '</div>';
						
					$output .= '</div>';
				$output .= '</div>';
				
			$output .= '</blockquote>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Clients [clients]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients' ) )
{
	function sc_clients( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'in_row' => 6,
		), $attr));
	
		if( ! intval( $in_row ) ) $in_row = 6;
	
		$args = array(
			'post_type' => 'client',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		);
	
		$clients_query = new WP_Query();
		$clients_query->query( $args );
	
		$output  = '<div class="clients">';
		if ($clients_query->have_posts())
		{
			$i = 1;
			$count = $clients_query->post_count;
			$width = round( (100 / $in_row), 3 );
			$full_rows = floor( ($count-1) / $in_row );
			$in_full_rows = $full_rows * $in_row;
	
			$output .= '<ul>';
			while ($clients_query->have_posts())
			{
				$class = '';
				if( ( $i % $in_row == 0 ) || $i == $count ) $class .= 'last_in_row';			// desktop - last in row
				if( $i > $in_full_rows ) $class .= ' last_row';									// desktop - last row
				if( $i == $count ) $class .= ' last_row_mobile';								// mobile - last item
				if( ( ($i+1) == $count ) && ( $count % 2 == 0 ) ) $class .= ' last_row_mobile';	// mobile - even number of rows
	
				$clients_query->the_post();
				$output .= '<li class="'. $class .'" style="width:'. $width .'%">';
					$output .= '<div class="client_wrapper">';
						$link = get_post_meta(get_the_ID(), 'mfn-post-link', true);
						if( $link ) $output .= '<a target="_blank" href="'. $link .'" title="'. the_title(false, false, false) .'">';
							$output .= get_the_post_thumbnail( null, 'clients-slider', array('class'=>'scale-with-grid') );
						if( $link ) $output .= '</a>';
					$output .= '</div>';
				$output .= '</li>';
	
				$i++;
			}
			$output .= '</ul>'."\n";
		}
		wp_reset_query();
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon Box [icon_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_box' ) )
{
	function sc_icon_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'icon'			=> '',
			'image'			=> '',
			'link_title'	=> 'Read more',
			'link'			=> '',
			'target'		=> '',
		), $attr));
	
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
	
		$output = '<div class="icon_box">';
	
			$output .= '<div class="icon_image">';
				if( $image ){
					$output .= '<img src="'. $image .'" alt="'. $title .'" />';
				} elseif( $icon ){
					$output .= '<i class="'. $icon .'"></i>';
				}
			$output .= '</div>';
		
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			if( $content ) $output .= '<p>'. do_shortcode($content) .'</p>';
		
			if( $link ) $output .= '<a class="button button_small button_grey" href="'. $link .'" '. $target .'>'. $link_title .'</a>';
	
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Our Team [our_team]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team' ) )
{
	function sc_our_team( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',	
			'title' => '',
			'subtitle' => '',
			'email' => '',
			'phone' => '',
			'facebook' => '',
			'twitter' => '',
			'linkedin' => '',
		), $attr));
		
		$output = '<div class="team" ontouchstart="this.classList.toggle(\'hover\');">';
			$output .= '<div class="flipper">';
				$output .= '<div class="flipper_wrapper"><img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" /></div>';
				$output .= '<div class="photo">';
					$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
				$output .= '</div>';
				$output .= '<div class="desc"><table><tr><td>';
					if( $title ) $output .= '<h5>'. $title .'</h5>';
					if( $subtitle ) $output .= '<p class="subtitle">'. $subtitle .'</p>';
					if( $phone ) 	$output .= '<p class="phone"><i class="fa-phone"></i> <a target="_blank" href="tel:'. $phone .'">'. $phone .'</a></p>';
					if( $email || $phone || $facebook || $twitter || $linkedin ){
						$output .= '<div class="links">';
							if( $email ) 	$output .= '<a target="_blank" class="link" href="mailto:'. $email .'"><i class="fa-envelope"></i></a>';
							if( $facebook ) $output .= '<a target="_blank" class="link" href="'. $facebook .'"><i class="fa-facebook"></i></a>';
							if( $twitter ) 	$output .= '<a target="_blank" class="link" href="'. $twitter .'"><i class="fa-twitter"></i></a>';
							if( $linkedin ) $output .= '<a target="_blank" class="link" href="'. $linkedin .'"><i class="fa-linkedin"></i></a>';
						$output .= '</div>';
					}
				$output .= '</td></tr></table></div>';
			$output .= '</div>';
		$output .= '</div>'."\n";	
	
		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Call to Action [call_to_action]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_call_to_action' ) )
{
	function sc_call_to_action( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',
			'title' => '',
			'btn_title' => '',
			'btn_link' => '',
			'class' => '',
		), $attr));
	
		// background image
		if( $image ){
			$bg = ' style="background-image:url('. $image .');"';
		} else {
			$bg = false;
		}
	
		$output = '<div class="call_to_action">';
			$output .= '<div class="call_to_action_wrapper"'. $bg .'>';
				$output .= '<div class="inner-padding">';
					$output .= '<div class="vertical-align-middle">';
						$output .= '<h4>'. $title .'</h4>';
						if( $btn_link ) $output .= '<a href="'. $btn_link .'" class="button '. $class .'">'. $btn_title .'</a>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Map [map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'lat' 		=> '',
			'lng' 		=> '',
			'height' 	=> 200,
			'zoom' 		=> 13,
			'uid' 		=> uniqid(),
		), $attr));
		
		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false', false, THEME_VERSION, true );
	
		$output = '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $uid .'(){';
				$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';
				$output .= 'var myOptions = {';
					$output .= 'zoom				: '. intval($zoom) .',';
					$output .= 'center				: latlng,';
					$output .= 'zoomControl			: true,';
					$output .= 'mapTypeControl		: false,';
					$output .= 'streetViewControl	: false,';
					$output .= 'scrollwheel			: false,';       
					$output .= 'mapTypeId			: google.maps.MapTypeId.ROADMAP';
				$output .= '};';
		
				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';
// 				$output .= 'var image = "'. THEME_URI .'/images/pin_large.png";';
				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position			: latlng,';
					$output .= 'map					: map';
// 					$output .= 'icon				: image';
				$output .= '});';
			
			$output .= '}';
		
			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $uid .'();';
			$output .= '});';	
			//]]>
		$output .= '</script>'."\n";
	
		$output .= '<div class="google-map" id="google-map-area-'. $uid .'" style="width:100%; height:'. intval($height) .'px;">&nbsp;</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Latest Posts [latest_posts]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_latest_posts' ) )
{
	function sc_latest_posts( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'count'			=> 5,
			'category'		=> '',
			'link' 			=> '',
			'link_title'	=> '',
		), $attr));

		$args = array(
			'posts_per_page'		=> intval($count),
			'no_found_rows'			=> true,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true
		);
		if( $category ) $args['category_name'] = $category;

		$r = new WP_Query( apply_filters( 'widget_posts_args', $args ) );

		$output = '<div class="latest_posts">';
			$output .= '<div class="latest_posts_wrapper">';
				
				if( $title ) $output .= '<h5 class="title">'. $title .'</h5>';
				
				$output .= '<ul class="posts-slider">';
					while ( $r->have_posts() ){
						$r->the_post();
		
						$output .= '<li>';
							if( has_post_thumbnail() ){
								$output .= '<div class="photo">';
									$output .= '<a href="'. get_permalink() .'">';
										$output .= get_the_post_thumbnail( get_the_ID(), 'blog-item', array('class'=>'scale-with-grid' ) );
									$output .= '</a>';
								$output .= '</div>';
							}
							
							$output .= '<div class="desc">';
								$output .= '<span class="date"><i class="fa-clock-o"></i> '. get_the_date() .'</span>';
								$output .= '<h6><a href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
							$output .= '</div>';
						$output .= '</li>';
					}
					wp_reset_postdata();
				$output .= '</ul>';
				
				if( $link ){
					$output .= '<div class="footer">';
						$output .= '<i class="fa-bars"></i> <a href="'. $link .'">'. $link_title .'</a>';
					$output .= '</div>';
				}
				
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tabs [tabs]
 * --------------------------------------------------------------------------- */
global $tabs_array, $tabs_count;
if( ! function_exists( 'sc_tabs' ) )
{
	function sc_tabs( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'uid'	=> 'tab-'. uniqid(),
			'tabs'	=> '',
			'type'	=> '',
		), $attr));	
		do_shortcode( $content );
		
		// content builder
		if( $tabs ){
			$tabs_array = $tabs;
		}
		
		if( is_array( $tabs_array ) )
		{
			$output  = '<div class="jq-tabs tabs_wrapper tabs_'. $type .'">';
			$output .= '<ul>';
			
			$i = 1;
			$output_tabs = '';
			foreach( $tabs_array as $tab )
			{
				$output .= '<li><a href="#'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
				$output_tabs .= '<div id="'. $uid .'-'. $i .'">'. do_shortcode( $tab['content'] ) .'</div>';
				$i++;
			}
			
			$output .= '</ul>';
			$output .= $output_tabs;
			$output .= '</div>';
			
			$tabs_array = '';
			$tabs_count = 0;
	
			return $output;
		}
	}
}


/* ---------------------------------------------------------------------------
 * _Tab [tab] _private
 * --------------------------------------------------------------------------- */
$tabs_count = 0;
if( ! function_exists( 'sc_tab' ) )
{
	function sc_tab( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'title' => 'Tab title',
		), $attr));
		
		$tabs_array[] = array(
			'title' => $title,
			'content' => do_shortcode( $content )
		);	
		$tabs_count++;
	
		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Accordion [accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		), $attr));
		
		// open 1st
		if( $open1st ){
			$class = 'open1st';
		} else {
			$class = false;
		}
		
		$output  = '';
		
		$output .= '<div class="accordion">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="mfn-acc accordion_wrapper '. $class .'">';
						
				if( is_array( $tabs ) ){
					// content builder
					foreach( $tabs as $tab ){
						$output .= '<div class="question">';
							$output .= '<h5>'. $tab['title'] .'</h5>';
							$output .= '<div class="answer">';
								$output .= do_shortcode($tab['content']);	
							$output .= '</div>';
						$output .= '</div>'."\n";
					}
				} else {
					// shortcode
					$output .= do_shortcode($content);	
				}
				
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * FAQ [faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		), $attr));
		
		// open 1st
		if( $open1st ){
			$class = 'open1st';
		} else {
			$class = false;
		}
		
		$output  = '';
		
		$output .= '<div class="faq">';
			if( $title ) $output .= '<h3>'. $title .'</h3>';
			$output .= '<div class="mfn-acc faq_wrapper '. $class .'">';
			
			if( is_array( $tabs ) ){
				// content builder
				foreach( $tabs as $tab ){
					$output .= '<div class="question">';
						$output .= '<h5>'. $tab['title'] .'</h5>';
						$output .= '<div class="answer">';
							$output .= do_shortcode($tab['content']);	
						$output .= '</div>';
					$output .= '</div>'."\n";
				}
			} else {
				// shortcode
				$output .= do_shortcode($content);	
			}
			
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Bars [progress_bars]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_bars' ) )
{
	function sc_progress_bars( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
		), $attr));
	
	
		$output = '<div class="progress_bars">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<ul class="bars_list">';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Bar [bar]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_bar' ) )
{
	function sc_bar( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'value' => 0,
		), $attr));
	
		$value = intval( $value );
	
		$output  = '<li>';
			$output .= '<h6>'. $title .'<span class="label">'. $value .'%</span></h6>';
			$output .= '<div class="bar"><span class="progress" style="width:'. $value .'%"></span></div>';
		$output .= '</li>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Timeline [timeline]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_timeline' ) )
{
	function sc_timeline( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<ul class="timeline_items">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<li>';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					if( $tab['content'] ){
						$output .= '<div class="desc">';
							$output .= do_shortcode($tab['content']);
						$output .= '</div>';
					}
				$output .= '</li>';
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);
		}
		
		$output .= '</ul>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Testimonials [testimonials]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials' ) )
{
	function sc_testimonials( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'category' 	=> '',
			'orderby' 	=> 'menu_order',
			'order' 	=> 'ASC',
			'border' 	=> '',
		), $attr));
		
		// border
		if( $border ){
			$border = 'has_border';
		} else {
			$border = 'no_border';
		}
		
		$args = array(
			'post_type' 			=> 'testimonial',
			'posts_per_page' 		=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['testimonial-types'] = $category;
		
		$query_tm_photos = new WP_Query();
		$query_tm_photos->query( $args );
		
		$output = '';
		if ($query_tm_photos->have_posts())
		{
			$output .= '<div class="testimonials_wrapper '. $border .'">';
				$output .= '<ul class="testimonials-slider">';
				
					while ($query_tm_photos->have_posts())
					{
						$query_tm_photos->the_post();
						$output .= '<li>';
						
							if( has_post_thumbnail() ){
								$output .= '<div class="client">';
									$output .= get_the_post_thumbnail( null, 'full', array('class'=>'scale-with-grid' ) );
								$output .= '</div>';
							}
							
							$output .= '<div class="desc">';
								$output .= '<blockquote>';
								
									$output .= '<div class="text"><p>'. get_the_content() .'</p></div>';
									
									$output .= '<div class="author">';
										if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
											$output .= get_post_meta(get_the_ID(), 'mfn-post-author', true);
										if( $link ) $output .= '</a>';
									$output .= '</div>';
									
								$output .= '</blockquote>';
							$output .= '</div>';
							
						$output .= '</li>';
					}
					wp_reset_query();
					
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Vimeo [vimeo]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_vimeo' ) )
{
	function sc_vimeo( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://player.vimeo.com/video/'. $video .'" allowFullScreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * YouTube [youtube]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_youtube' ) )
{
	function sc_youtube( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" allowfullscreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


// column shortcodes -----------------------
add_shortcode( 'one', 'sc_one' );
add_shortcode( 'one_second', 'sc_one_second' );
add_shortcode( 'one_third', 'sc_one_third' );
add_shortcode( 'two_third', 'sc_two_third' );
add_shortcode( 'one_fourth', 'sc_one_fourth' );
add_shortcode( 'two_fourth', 'sc_two_fourth' );
add_shortcode( 'three_fourth', 'sc_three_fourth' );

// content shortcodes ----------------------
add_shortcode( 'blockquote', 'sc_blockquote' );
add_shortcode( 'button', 'sc_button' );
add_shortcode( 'code', 'sc_code' );
add_shortcode( 'divider', 'sc_divider' );
add_shortcode( 'dropcap', 'sc_dropcap' );
add_shortcode( 'highlight', 'sc_highlight' );
add_shortcode( 'ico', 'sc_ico' );
add_shortcode( 'image', 'sc_image' );
add_shortcode( 'tooltip', 'sc_tooltip' );
add_shortcode( 'vimeo', 'sc_vimeo' );
add_shortcode( 'youtube', 'sc_youtube' );

// builder shortcodes ----------------------
add_shortcode( 'article_box', 'sc_article_box' );
add_shortcode( 'call_to_action', 'sc_call_to_action' );
add_shortcode( 'clients', 'sc_clients' );
add_shortcode( 'contact_box', 'sc_contact_box' );
add_shortcode( 'counter', 'sc_counter' );
add_shortcode( 'fancy_heading', 'sc_fancy_heading' );
add_shortcode( 'feature_box', 'sc_feature_box' );
add_shortcode( 'icon_box', 'sc_icon_box' );
add_shortcode( 'map', 'sc_map' );
add_shortcode( 'our_team', 'sc_our_team' );
add_shortcode( 'pricing_item', 'sc_pricing_item' );
add_shortcode( 'progress_bars', 'sc_progress_bars' );
add_shortcode( 'testimonials', 'sc_testimonials' );

// private shortcodes ----------------------
add_shortcode( 'bar', 'sc_bar' );

?>