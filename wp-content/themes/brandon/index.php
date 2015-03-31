<?php
/**
 * The main template file.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();
?>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			
			<div class="section">
				<div class="section_wrapper clearfix">
					<?php
						echo '<div class="posts_wrapper clearfix">';			
							while ( have_posts() ){
								the_post();
								get_template_part( 'includes/content', get_post_type() );
							}
						echo '</div>';
						
						// pagination
						if(function_exists( 'mfn_pagination' )):
							mfn_pagination();
						else:
							?>
								<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'brandon')) ?></div>
								<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'brandon')) ?></div>
							<?php
						endif;
					?>
				</div>	
			</div>
			
		</div>	
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar( 'blog' ); ?>

	</div>
</div>

<?php get_footer(); ?>