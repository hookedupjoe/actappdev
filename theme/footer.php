<?php
/**
 * The template for displaying the footer
 * @package actappdev
 * @since 1.0.0
 */

?>


			</div><!-- row -->
		</div><!-- #primary -->		
		</div><!-- content -->	
		</div><!-- container -->	
	


<div class="page-footer">
  <div class="full-container">
<!-- Footer Start -->
<?php if ( is_active_sidebar( 'sidebar-f' ) ) {?>
	<?php dynamic_sidebar( 'sidebar-f' ); ?>
<?php }?>
<!-- Footer End -->
  </div>
</div>

	
<?php wp_footer(); ?>

</div><!-- #page -->
</body>
</html>


