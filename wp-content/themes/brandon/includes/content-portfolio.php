<?php
/**
 * The template for displaying content in the template-portfolio.php template
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

$layout = mfn_opts_get( 'portfolio-layout', 'one' );

$item_class = '';
$item_cats = get_the_terms($post->ID, 'portfolio-types');
if($item_cats){
	foreach($item_cats as $item_cat) {
		$item_class .= $item_cat->slug . ' ';
	}
}

// demo
if( $_GET && key_exists('mfn-p', $_GET) ){
	$layout = $_GET['mfn-p'];
	if( $layout == 'jq' ) $layout = 'one-fourth';
}

?>

<li class="portfolio_item column <?php echo $layout.' '.$item_class?>">	

	<div class="photo hover-mask">
		<a href="<?php the_permalink(); ?>" class="more">
			<?php  the_post_thumbnail( 'portfolio-list', array('class'=>'scale-with-grid' )); ?>
			<span class="ico"><i class="fa-plus"></i></span>
		</a>
	</div>
	
	<div class="desc">
		<a href="<?php the_permalink(); ?>">
			<h5><?php echo the_title(false, false); ?></h5>
		</a>
		
		<div class="list_view">
			<div class="project_info">
				<?php the_excerpt(); ?>
			</div>

			<?php 
				// portfolio item details
				mfn_portfolio_details(get_the_ID()); 
			?>
		</div>
	</div>
	
</li>

