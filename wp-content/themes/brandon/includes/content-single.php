<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

// post classes
$post_classes = array();
if( ! mfn_opts_get( 'blog-meta' ) ) $post_classes[] = ' no-meta';
if( ! has_post_thumbnail() ) $post_classes[] = ' no-photo';
if( post_password_required() ) $post_classes[] = 'no-photo';

// prev & next post
$post_prev = get_adjacent_post(false,'',true)  ? get_permalink(get_adjacent_post(false,'',true))  : false;
$post_next = get_adjacent_post(false,'',false) ? get_permalink(get_adjacent_post(false,'',false)) : false;

$translate['previous-post'] = mfn_opts_get('translate') ? mfn_opts_get('translate-previous-post','Previous post') : __('Previous post','brandon');
$translate['next-post']		= mfn_opts_get('translate') ? mfn_opts_get('translate-next-post','Next post') : __('Next post','brandon');
$translate['related-posts']	= mfn_opts_get('translate') ? mfn_opts_get('translate-related-posts','Related Posts') : __('Related Posts','brandon');
?>

<div class="section section-post-header">
	<div class="section_wrapper clearfix">
	
		<div class="column one post_navigation">
			<?php if( $post_prev ): ?>
				<a class="prev_post post_control" href="<?php echo $post_prev; ?>"><i class="fa-angle-left"></i><?php echo $translate['previous-post']; ?></a>
			<?php endif; ?>
			<?php if( $post_next ): ?>
				<a class="next_post post_control" href="<?php echo $post_next ?>"><?php echo $translate['next-post']; ?><i class="fa-angle-right"></i></a>
			<?php endif; ?>
		</div>

		<div class="column one post_header <?php echo implode(' ', $post_classes); ?>">
			
			<?php if( mfn_opts_get( 'blog-meta' ) ): ?>
				<div class="post_meta">
					<div class="date">
						<i class="fa-calendar"></i>
						<span><?php echo get_the_date(); ?></span>
					</div>
					<div class="comments">
						<i class="fa-comments-o"></i>
						<?php echo mfn_comments_number(); ?>
					</div>
					<div class="category">
						<i class="fa-bars"></i>
						<?php echo get_the_category_list(' '); ?>
					</div>
					<?php
					if( $terms = get_the_terms( false, 'post_tag' ) ){
						echo '<div class="tags">';
						echo '<i class="fa-tags"></i> ';
						$terms_count = count( $terms );
						foreach( $terms as $term ){
							$terms_count--;
// 							$sep = ( $terms_count ) ? ',' : false;
							$sep = ' ';
							$link = get_term_link( $term, 'post_tag' );
							echo '<a href="' . esc_url( $link ) . '" rel="tag"><span>' . $term->name . $sep .'</span></a> ';
						}
						echo '</div>';
					}
					?>
				</div>
			<?php endif; ?>
			
			<?php if( ! post_password_required() ): ?>
				<div class="post_photo">
					<div class="photo_wrapper hover-mask">
						<?php mfn_post_thumbnail( get_the_ID(), true ); ?>
					</div>
				</div>
			<?php endif; ?>	
			
		</div>
		
	</div>
</div>

<div id="post-<?php the_ID(); ?>" <?php post_class( array('section','section-post-content') ); ?>>
	<?php
		// Content Builder & WordPress Editor Content
		mfn_builder_print( $post->ID );

		// List of pages		
		wp_link_pages(array(
			'before'			=> '<div class="pager-single">',
			'after'				=> '</div>',
			'link_before'		=> '<span>',
			'link_after'		=> '</span>',
			'next_or_number'	=> 'number'
		));
	?>
</div>

<div class="section section-post-about">
	<div class="section_wrapper clearfix">
	
		<?php if( mfn_opts_get( 'blog-author' ) ): ?>
		<div class="column one author-box">
			<div class="author-box-wrapper">
				<div class="avatar-wrapper">
					<?php 
						global $user;
						echo get_avatar( get_the_author_meta('email'), '64', false, get_the_author_meta('display_name', $user['ID']) );
					?>
				</div>
				<div class="desc-wrapper">
					<h6><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></h6>
					<div class="desc"><?php the_author_meta('description'); ?></div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php
			if( mfn_opts_get( 'blog-related' ) && $aCategories = wp_get_post_categories( get_the_ID() ) ){
				$args = array(
					'category__in'			=> $aCategories,
					'ignore_sticky_posts'	=> true,
					'no_found_rows'			=> true,
					'post__not_in'			=> array(get_the_ID()),
					'posts_per_page'		=> 3,
					'post_status'			=> 'publish',
				);
				$query_related_posts = new WP_Query( $args );
				
				if( $query_related_posts->have_posts() ){
					echo '<div class="column one latest_posts_wrapper related">';
						echo '<h5>'. $translate['related-posts'] .'</h5>';
						while ( $query_related_posts->have_posts() ){
							$query_related_posts->the_post();
							echo '<div class="column one-third">';	
							
								if( has_post_thumbnail() ){
									echo '<div class="photo">';
										echo '<a href="'. get_permalink() .'">';
											echo get_the_post_thumbnail( get_the_ID(), 'blog-item', array('class'=>'scale-with-grid' ) );
										echo '</a>';
									echo '</div>';
								}
							
								echo '<div class="desc">';
									echo '<span class="date"><i class="fa-clock-o"></i> '. get_the_date() .'</span>';
									echo '<h6><a href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
								echo '</div>';
								
							echo '</div>';
						}
						wp_reset_postdata();
					echo '</div>'."\n";
				}
			}	
		?>
		
	</div>
</div>

<div class="section section-post-footer">
	<div class="section_wrapper clearfix">
	
		<div class="column one comments">
			<?php comments_template( '', true ); ?>
		</div>
		
	</div>
</div>