<?php
/**
 * @package Omega
 */
?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<header class="entry-header">

		<?php do_atomic( 'entry_header' ); // omega_entry_header ?>

	</header><!-- .entry-header -->

	<?php do_atomic( 'before_entry' ); // omega_before_entry ?>

	<div class="entry-content">

		<?php do_atomic( 'entry' ); // omega_entry ?>

	</div><!-- .entry-content -->

	<?php do_atomic( 'after_entry' ); // omega_after_entry ?>

</article><!-- #post-## -->