<?php
/**
 * The template for displaying content in the index.php template
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

// post classes
$post_classes = array( 'column' );
if( ! mfn_opts_get( 'blog-meta' ) ) $post_classes[] = 'no-meta';
if( ! mfn_post_thumbnail( get_the_ID(), false, true ) ) $post_classes[] = 'no-photo';
if( post_password_required() ) $post_classes[] = 'no-photo';

// layout
if( $_GET && key_exists('mfn-b', $_GET) ){
	$post_classes[] = $_GET['mfn-b']; // demo
} else {
	$post_classes[] = mfn_opts_get( 'blog-layout', 'one' );
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	
	<div class="post_wrapper">
	
		<?php if( ! post_password_required() ): ?>
			<div class="post_photo">
				<div class="photo_wrapper hover-mask">
					<?php mfn_post_thumbnail( get_the_ID() ); ?>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="desc">
			<h4 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php the_excerpt(); ?>			
			<?php if( $blog_readmore = mfn_opts_get( 'blog-readmore' ) ) echo '<a href="'. get_permalink() .'" class="more">'. __( $blog_readmore,'brandon' ) .'<i class="fa-angle-right"></i></a>'; ?>
		</div>
		
	</div>
	
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
		</div>
	<?php endif; ?>
		
</div>