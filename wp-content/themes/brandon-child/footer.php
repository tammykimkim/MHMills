<?php
/**
 * The template for displaying the footer.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */
?>

</div>

<!-- #Footer -->		
<footer id="Footer" class="clearfix">

	<div class="footer_line">
		<div class="container">
			<div class="line line_1"></div>
			<div class="line line_2"></div>
			<div class="line line_3"></div>
			<div class="line line_4"></div>
		</div>
	</div>

	<div class="widgets_wrapper">
		<div class="container">
			<?php
				$sidebars_count = 0;	
				for( $i = 1; $i <= 4; $i++ ){
					if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
				}
			
				$sidebar_class = '';
				if( $sidebars_count > 0 ){
					switch( $sidebars_count ){
						case 2: $sidebar_class = 'one-second'; break; 
						case 3: $sidebar_class = 'one-third'; break; 
						case 4: $sidebar_class = 'one-fourth'; break;
						default: $sidebar_class = 'one';
					}
				}
			?>
			
			<?php 
				for( $i = 1; $i <= 4; $i++ ){
					if ( is_active_sidebar( 'footer-area-'. $i ) ){
						echo '<div class="'. $sidebar_class .' column">';
							dynamic_sidebar( 'footer-area-'. $i );
						echo '</div>';
					}
				}
			?>
	
		</div>
	</div>

	<div class="footer_menu">
		<div class="container">
		
			<?php mfn_wp_footer_menu(); ?>
			
			<div class="copyright">
				<?php 
					if( mfn_opts_get('footer-copy') ){
						mfn_opts_show('footer-copy');
					} else {
						echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. Site designed by: <a target="_blank" rel="nofollow" href="http://tammykimkim.com">tammykimkim.com</a>';
					}
				?>
			</div>
			
		</div>
	</div>
	
	<a id="back_to_top" href="#"><span></span></a>
	
</footer>
	
<!-- wp_footer() -->
<?php wp_footer(); ?>

</body>
</html>