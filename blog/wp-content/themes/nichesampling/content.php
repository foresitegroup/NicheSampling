<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( is_single() ) { ?>
	<div class="site-width blog-content">
		<h2><?php the_title(); ?></h2>
		<div class="date"><?php echo get_the_date(); ?></div>

	  <?php
	  the_content();

	  // Previous/next post navigation.
		// FG_post_pagination(array(
		// 	'next_text' => __('NEXT POST'),
		// 	'prev_text' => __('PREVIOUS POST')
		// ));
		?>
	</div>
<?php } else { ?>
	<div class="blog-content-index">
		<div class="site-width">
			<h2><?php the_title(); ?></h2>

			<div class="date"><?php echo get_the_date(); ?></div>

			<?php echo wp_trim_excerpt(); ?><br>

			<a href="<?php the_permalink(); ?>" class="readmore">READ MORE</a>
		</div>
	</div>
<?php } ?>