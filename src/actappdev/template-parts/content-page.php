<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ActAppDev
 */

?>

<div class="col-sm-12 col-md-9">  

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="ui header blue large">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article>


</div>

