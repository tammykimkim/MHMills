<?php
/**
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

header( 'Content-type: text/css;' );
	
$url = dirname( __FILE__ );
$strpos = strpos( $url, 'wp-content' );
$base = substr( $url, 0, $strpos );

require_once( $base .'wp-load.php' );
?>

/********************** Backgrounds **********************/

	

/************************ Colors ************************/

/* Content font */
	body {
		color: <?php mfn_opts_show( 'color-text', '#787e87' ) ?>;
	}
	
/* Links color */
	a {
		color: <?php mfn_opts_show( 'color-a', '#f94c3f' ) ?>;
	}
	a:hover {
		color: <?php mfn_opts_show( 'color-a-hover', '#ac3d35' ) ?>;
	}
	
/* Selections */
	*::-moz-selection {
		background-color: <?php mfn_opts_show( 'color-a', '#f94c3f' ) ?>;
	}
	*::selection {
		background-color: <?php mfn_opts_show( 'color-a', '#f94c3f' ) ?>;		
	}

/* Grey notes */
	.latest_posts_wrapper .desc .date, .icon_links h6, blockquote .author a, .progress_bars .bars_list li h6 .label,
	.post_meta > div span, .post_meta > div.comments a, .post_meta .category a, .post_meta .tags a, .pager a.page, .post_navigation a.post_control,
	.wp-caption .wp-caption-text, .Recent_posts ul li .desc p {
		color: <?php mfn_opts_show( 'color-note', '#a5a5a5' ) ?>;
	}
	
/* Strong */
	.contact_box ul li i, .contact_box ul li.address,
	.team .desc p.subtitle, .pager a.page.active, .comment-author .fn, .widget > h3 {
		color: <?php mfn_opts_show( 'color-note-bold', '#733f3c' ) ?>;
	}

/* Text hightlight, dropcap */
	.highlight, .dropcap {
		background: <?php mfn_opts_show( 'background-highlight', '#f94c3f' ) ?>;
		color: <?php mfn_opts_show( 'color-highlight', '#ffffff' ) ?>;
	}

/* Buttons */
	a.button, input[type="reset"], input[type="button"] {
		background-color: <?php mfn_opts_show( 'background-button', '#f94c3f' ) ?>;
		color: <?php mfn_opts_show( 'color-button', '#ffffff' ) ?>;
	}
	a.button:after, a.tp-button:after, button:after, input[type="submit"]:after, input[type="reset"]:after, input[type="button"]:after {
		background: <?php mfn_opts_show( 'background-button', '#f94c3f' ) ?>;
	}
	
/* Submit */
	input[type="submit"] {
		background-color: <?php mfn_opts_show( 'background-button-submit', '#53302e' ) ?>;
		color: <?php mfn_opts_show( 'color-button-submit', '#ffffff' ) ?>;
	}

/* Photo border */
	.latest_posts_wrapper .photo, .Recent_posts ul li .photo, .post_photo .photo_wrapper, .gallery .gallery-item .gallery-icon {
		background: <?php mfn_opts_show( 'border-photo', '#ffffbe' ) ?>;
	}
	
/* Headings font */
	h1, h1 a, h1 a:hover { color: <?php mfn_opts_show( 'color-h1', '#39464e' ) ?>; }
	h2, h2 a, h2 a:hover { color: <?php mfn_opts_show( 'color-h2', '#39464e' ) ?>; }
	h3, h3 a, h3 a:hover { color: <?php mfn_opts_show( 'color-h3', '#39464e' ) ?>; }
	h4, h4 a, h4 a:hover { color: <?php mfn_opts_show( 'color-h4', '#37414e' ) ?>; }
	h5, h5 a, h5 a:hover { color: <?php mfn_opts_show( 'color-h5', '#37414e' ) ?>; }
	h6, h6 a, h6 a:hover { color: <?php mfn_opts_show( 'color-h6', '#37414e' ) ?>; }	

/* Addons */
	#Header .addons, #Header .language > a {
		color: <?php mfn_opts_show( 'color-addons', '#aaa' ) ?>;
	}
	
/* Social & Search */
	.social {
		background-color: <?php mfn_opts_show( 'background-social', '#53302e' ) ?>;
	}
	.social li a {
		color: <?php mfn_opts_show( 'color-social', '#c0736f' ) ?> !important;
	}
	.social li a:hover {
		color: <?php mfn_opts_show( 'color-social-hover', '#fff' ) ?> !important;
	}
	
/* Subheader */
	#Subheader {
		background-color: <?php mfn_opts_show( 'background-subheader', '#f7f9f9' ) ?>;
	}
	#Subheader .title {
		color: <?php mfn_opts_show( 'color-subheader-title', '#39464e' ) ?>;
	}
	#Subheader ul.breadcrumbs li, #Subheader ul.breadcrumbs li a { 
		color: <?php mfn_opts_show( 'color-subheader-breadcrumbs', '#B2B3BA' ) ?>;
	}
	
/* Menu */
	#Header #menu {
		background-color: <?php mfn_opts_show( 'background-menu', '#f94c3f' ) ?>;
	}
	#Header .menu > li > a {
		color: <?php mfn_opts_show( 'color-menu-a', '#fff' ) ?>;
	}
	
	#Header .menu > li.current-menu-item > a,
	#Header .menu > li.current_page_item > a,
	#Header .menu > li.current-menu-ancestor > a,
	#Header .menu > li.current_page_ancestor > a {
		background: <?php mfn_opts_show( 'background-menu', '#f94c3f' ) ?>;
		color: <?php mfn_opts_show( 'color-menu-a', '#fff' ) ?> !important;
	}

	#Header .menu > li > a:hover,
	#Header .menu > li.hover > a {
		background: <?php mfn_opts_show( 'background-menu-a-hover', '#53302e' ) ?>;
		color: <?php mfn_opts_show( 'color-menu-a-hover', '#fff' ) ?> !important;
	}
	
	#Header .menu > li ul {
		background: <?php mfn_opts_show( 'background-sumbenu', '#fff' ) ?>;
	}
	
	#Header .menu > li ul li a {
		color: <?php mfn_opts_show( 'color-sumbenu-a', '#5f5f5f' ) ?>;
	}

	#Header .menu > li ul li a:hover, #Header .menu > li ul li.hover > a {
		color: <?php mfn_opts_show( 'color-sumbenu-a-hover', '#2e2e2e' ) ?>;
	}	
			
/* Faq & Accordion & Tabs */
	.accordion .question h5, .faq .question h5 {
		color: <?php mfn_opts_show( 'color-accordion-title', '#23384e' ) ?>;
	}
	.faq .active h5, .accordion .active h5 {
		color: <?php mfn_opts_show( 'color-accordion-title-active', '#f94c3f' ) ?>;
	}
	.accordion .active, .faq .active {
		border-color: <?php mfn_opts_show( 'color-accordion-title-active', '#f94c3f' ) ?>;
		color: <?php mfn_opts_show( 'color-accordion-content-active', '#4C6580' ) ?>;
	}
	
/* Tabs */
	.ui-tabs .ui-tabs-nav li a {
		color: <?php mfn_opts_show( 'color-tabs-title', '#767676' ) ?>;
	}
	
	.ui-tabs .ui-tabs-nav li.ui-state-active a {
		color: <?php mfn_opts_show( 'color-tabs-title-active', '#52302e' ) ?>; 
	}
	
	.ui-tabs .ui-tabs-nav li.ui-state-active { 
		border-color: <?php mfn_opts_show( 'border-tabs-title-active', '#fb5d51' ) ?>;
	}
	
/* Info box */	
	.info_box {
		background: <?php mfn_opts_show( 'background-info-box', '#ffffff' ) ?>;
	}

/* Latest posts */		
	.latest_posts_wrapper .desc h6 a {
		color: <?php mfn_opts_show( 'color-latest-post-a', '#53302e' ) ?>;
	}

/* Progress bar */
	.progress_bars .bars_list li .bar .progress {
		background-color: <?php mfn_opts_show( 'background-progress-bar', '#f94c3f' ) ?>;
	}
	
/* Testimonials & Blockquote */
	.testimonials_wrapper, .blockquote:before, .blockquote:after {
		border-color: <?php mfn_opts_show( 'border-testimonials', '#F94C3F' ) ?>;
	}
	
/* Testimonials pagination */
	.owl-pagination .owl-page.active span {
		background: <?php mfn_opts_show( 'background-testimonials-pager-active', '#53302e' ) ?> !important;
	}
	
/* Fancy header */
	.fancy_heading .fancy_heading_wrapper:after, .fancy_heading_wrapper.has_icon:before {
		border-color: <?php mfn_opts_show( 'border-fancy-heading', '#F94C3F' ) ?>;
	}
	.fancy_heading i {
		color: <?php mfn_opts_show( 'color-fancy-heading-icon', '#733f3c' ) ?>;
	}
	
/* Offer */
	.offer .offer_wrapper .owl-controls .owl-pagination-wrapper {
		background-color: <?php mfn_opts_show( 'background-offer-pager', '#53302e' ) ?>;
	}
	.offer .offer_wrapper .owl-controls .owl-page.active:after {
		border-left-color: <?php mfn_opts_show( 'background-offer-pager', '#53302e' ) ?>;
	}
	@media only screen and (max-width: 959px) {
		.offer .offer_wrapper .owl-controls .owl-page.active {
			background: <?php mfn_opts_show( 'background-testimonials-pager-active', '#53302e' ) ?> !important;
		}
	}
	
/* Quick fact */
	.quick_fact_wrapper .number {
		color: <?php mfn_opts_show( 'color-quick-fact-number', '#F94C3F' ) ?>;
	}
	.quick_fact_wrapper .title {
		color: <?php mfn_opts_show( 'color-quick-fact-title', '#53302e' ) ?>;
	}
	
/* Call to action */
	.call_to_action .inner-padding {
		background-color: <?php hex2rgba( mfn_opts_get( 'background-call-to-action', '#53302E' ), 0.8, true ) ?>;
	}
	.call_to_action_wrapper {
		border-color: <?php mfn_opts_show( 'border-call-to-action', '#764441' ) ?>;
	}
	.call_to_action h4 {
		color: <?php mfn_opts_show( 'color-call-to-action-title', '#ffffff' ) ?>;
	} 
	.call_to_action h4 span {
		color: <?php mfn_opts_show( 'color-call-to-action-highlight', '#FFCDC9' ) ?>;
	}

/* Pricing box */
	.pricing-box .plan-header .price {
		color: <?php mfn_opts_show( 'color-pricing-price', '#733f3c' ) ?>;
	}
	.pricing-box {
		border-color: <?php mfn_opts_show( 'border-pricing', '#F4F4F4' ) ?>;
	}
	.pricing-box-featured {
		border-color: <?php mfn_opts_show( 'border-pricing-featured', '#D6EEFC' ) ?>;
		background: <?php mfn_opts_show( 'background-pricing-featured', '#F6FBFE' ) ?>;	
	}	
	
/* Portfolio page */
	.Projects_header .categories ul li.current-cat a, .Projects_header .categories ul li a:hover {
		color: <?php mfn_opts_show( 'color-a', '#f94c3f' ) ?>;
	}

/* Mfn-slider */
	#mfn-slider .swiper-controls .swiper-pagination-switch {
		background: <?php mfn_opts_show( 'background-vertical-slider-pager', '#fff' ) ?>;
	}
	#mfn-slider .swiper-controls .swiper-active-switch { 
		background: <?php mfn_opts_show( 'background-vertical-slider-pager-active', '#53302E' ) ?>;
	}	
	
/* Sidebar  ***********************************************/
	.widget_mfn_menu ul li a {
		color: <?php mfn_opts_show( 'color-mfn-menu-a', '#737373' ) ?>;
	}
	.widget_mfn_menu ul li a:hover {
		color: <?php mfn_opts_show( 'color-mfn-menu-a-hover', '#444' ) ?>;
	}
	
/* Footer  ***********************************************/
	.footer_line .container {
		background: <?php mfn_opts_show( 'border-footer-line', '#f94c3f' ) ?>;
	}
	.widgets_wrapper {
		color: <?php mfn_opts_show( 'color-footer-text', '#797b7f' ) ?>;
	}
	.widgets_wrapper a {
		color: <?php mfn_opts_show( 'color-footer-a', '#f94c3f' ) ?>;
	}
	.widgets_wrapper a:hover {
		color: <?php mfn_opts_show( 'color-footer-a-hover', '#ac3d35' ) ?>;
	}
	.widgets_wrapper h1, .widgets_wrapper h1 a, .widgets_wrapper h1 a:hover,
	.widgets_wrapper h2, .widgets_wrapper h2 a, .widgets_wrapper h2 a:hover,
	.widgets_wrapper h3, .widgets_wrapper h3 a, .widgets_wrapper h3 a:hover,
	.widgets_wrapper h4, .widgets_wrapper h4 a, .widgets_wrapper h4 a:hover,
	.widgets_wrapper h5, .widgets_wrapper h5 a, .widgets_wrapper h5 a:hover,
	.widgets_wrapper h6, .widgets_wrapper h6 a, .widgets_wrapper h6 a:hover,
	.company_box p.copy strong, .widgets_wrapper .Recent_comments ul li p a {
		color: <?php mfn_opts_show( 'color-footer-heading', '#53302e' ) ?>;
	}
	.widgets_wrapper aside > h4 {
		color: <?php mfn_opts_show( 'color-footer-widget-title', '#767676' ) ?>;
	}
	
	/* Icons */
	.widgets_wrapper i {
		color: <?php mfn_opts_show( 'color-footer-icon', '#937a79' ) ?>;
	}
	
	/* Grey notes */
	.footer_menu ul li a, .widgets_wrapper .Recent_posts ul li p, .widgets_wrapper .Recent_comments ul li p, .copyright, .copyright a {
		color: <?php mfn_opts_show( 'color-footer-note', '#98a3ab' ) ?>;
	}
	
	/* Photo border */
	.widgets_wrapper .Recent_posts ul li .photo {
		background: <?php mfn_opts_show( 'color-footer-photo-border', '#ffffbe' ) ?>;
	}	
