<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$TopDir = substr( home_url(), 0, strrpos( home_url(), '/')+1);

if (is_single()) :
	$HeaderBackground = wp_get_attachment_url(get_post_thumbnail_id());
	$HeaderClass = "banner-blog-single";
  $PageTitle = get_the_title();
else :
	$HeaderClass = "banner-blog-index";
  $PageTitle = "Blog";
  $cat_id = get_query_var('cat');
  if (isset($cat_id)) $PageTitle = get_cat_name($cat_id);
endif;

include "../header.php";
?>

<div class="banner banner-blog<?php echo " " . $HeaderClass; ?>"<?php if ($HeaderBackground != "") echo ' style="background-image: url(' . $HeaderBackground . ');"'; ?>></div>
