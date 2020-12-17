<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */


?>

<div class="site-branding">
  <div id="masthead">
    <div class="hgroup full-container ">

	<!-- ToDo: Make this a customize option -->
  <a href="<?php echo home_url( '/' ); ?>" title="<?php echo get_option( 'blogname' ); ?>" rel="home" class="logo">
  <h1 class="ui header large blue"><?php echo get_bloginfo( 'name' ); ?></h1>
        <!-- <img src="http://localhost/sae/wp-content/uploads/2020/11/SAE-Detroit.png" class="logo-height-constrain" width="250" height="80" alt="SAE Detroit Section Logo"> -->
  </a>
	  <div style="clear:both;"></div>
    </div>
  </div>  
</div>

