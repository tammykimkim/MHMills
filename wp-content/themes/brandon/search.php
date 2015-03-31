<?php
/**
 * The search template file.
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();
?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group" style="width:100% !important;">
		
			<div class="section">
				<div class="section_wrapper clearfix">
				
					<div class="posts_wrapper clearfix">	
						<?php
							while ( have_posts() )
							{
								the_post();
								?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(array('column','no-photo','one')); ?>>
									<div class="post_wrapper" style="width:100%;">
										<div class="desc">
											<h4 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<?php the_excerpt(); ?>
											<?php if( $blog_readmore = mfn_opts_get( 'blog-readmore' ) ) echo '<a href="'. get_permalink() .'" class="more">'. __( $blog_readmore,'brandon' ) .'<i class="fa-angle-right"></i></a>'; ?>
										</div>
									</div>
								</div>
								<?php
							}
						?>
					</div>
					
					<?php	
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

	</div>
</div>

<?php get_footer(); ?>