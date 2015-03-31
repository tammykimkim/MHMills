<?php 
	if( mfn_opts_get('header-email') ||  mfn_opts_get('header-phone') ){
		echo '<div id="top_bar">';
			echo '<div class="container">';
				echo '<div class="column one">';
					if( $header_email = mfn_opts_get('header-email') ){
						echo '<p class="mob_phone"><i class="fa-envelope-o"></i><a href="mailto:'. $header_email .'">'. $header_email .'</a></p>';
					}
					if( $header_phone = mfn_opts_get('header-phone') ){
						echo '<p class="mob_mail"><i class="fa-phone"></i><a href="tel:'. $header_phone .'">'. $header_phone .'</a></p>';
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
?>
	
<!-- .header_placeholder 4sticky  -->
<div class="header_placeholder"></div>

<!-- #Header -->
<header id="Header">

	<div class="container">
		<div class="column one">

			<!-- .social -->
			<div class="social">
				<ul>
					<?php if( mfn_opts_get('social-facebook') ): ?><li class="facebook"><a target="_blank" href="<?php mfn_opts_show('social-facebook'); ?>" title="Facebook">F</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-googleplus') ): ?><li class="googleplus"><a target="_blank" href="<?php mfn_opts_show('social-googleplus'); ?>" title="Google+">G</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-twitter') ): ?><li class="twitter"><a target="_blank" href="<?php mfn_opts_show('social-twitter'); ?>" title="Twitter">L</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-vimeo') ): ?><li class="vimeo"><a target="_blank" href="<?php mfn_opts_show('social-vimeo'); ?>" title="Vimeo">V</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-youtube') ): ?><li class="youtube"><a target="_blank" href="<?php mfn_opts_show('social-youtube'); ?>" title="YouTube">X</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-flickr') ): ?><li class="flickr"><a target="_blank" href="<?php mfn_opts_show('social-flickr'); ?>" title="Flickr">N</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-linkedin') ): ?><li class="linked_in"><a target="_blank" href="<?php mfn_opts_show('social-linkedin'); ?>" title="LinkedIn">I</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-pinterest') ): ?><li class="pinterest"><a target="_blank" href="<?php mfn_opts_show('social-pinterest'); ?>" title="Pinterest">:</a></li><?php endif; ?>
					<?php if( mfn_opts_get('social-dribbble') ): ?><li class="dribbble"><a target="_blank" href="<?php mfn_opts_show('social-dribbble'); ?>" title="Dribbble">D</a></li><?php endif; ?>
				</ul>
			</div>
			
			<div class="addons">
				
				<?php $translate['search-placeholder'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-placeholder','Enter your search') : __('Enter your search','brandon'); ?>
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="ico"></span>
					<input type="text" class="field" name="s" id="s" placeholder="<?php echo $translate['search-placeholder']; ?>" />
					<input type="submit" class="submit" value="" style="display:none;" />
				</form>
				
				<?php if( has_nav_menu( 'lang-menu' ) ): ?>
					<div class="language">
						<a href="#"><span class="ico"></span><?php echo mfn_get_menu_name( 'lang-menu' ); ?></a>
						<div class="language_select">
							<span class="arrow"></span>
							<?php mfn_wp_lang_menu(); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="contact_details">
					<p class="text"><?php mfn_opts_show('header-contact-text')?></p>
					<?php 
						if( $header_phone = mfn_opts_get('header-phone') ){
							echo '<div class="phone expand"><span class="ico"></span> <p class="label"><a href="tel:'. $header_phone .'">'. $header_phone .'</a></p></div>';
						}
						if( $header_email = mfn_opts_get('header-email') ){
							echo '<div class="mail expand"><span class="ico"></span> <p class="label"><a href="mailto:'. $header_email .'">'. $header_email .'</a></p></div>';
						}
					?>
				</div>				

			</div>
		
			<!-- .logo -->
			<div class="logo">
				<?php if( is_front_page() ) echo '<h1>'; ?>
				<a id="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img class="scale-with-grid" src="<?php mfn_opts_show('logo-img',THEME_URI .'/images/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
				<?php if( is_front_page() ) echo '</h1>'; ?>
			</div>
			
			<!-- #menu -->
			<?php mfn_wp_nav_menu(); ?>	
			<a class="responsive-menu-toggle" href="#"><i class='fa-bars'></i></a>

		</div>		
	</div>
	
</header>