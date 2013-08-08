<?php
/*
Template Name: Footer Area
*/
?>
</div><!--#main-->
<div class="clear-both"></div>
	<div id="footer">
		<div class="top-green">
			<div class="bottom-green">
				<div class="transparent">
					<div class="float-left w520">
						<div class="float-left w300">
							<h3>Random posts</h3>
							<ul>
								<?php
								$rand_posts = get_posts('numberposts=3&orderby=rand');
								foreach($rand_posts as $post) :
								?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
							</ul>
						</div>
						<div class="float-left w220">
							<h3>Random pages</h3>
							<ul>
								<?php
								$rand_pages = get_posts('post_type=page&numberposts=3&orderby=rand');
								foreach($rand_pages as $post) :
								?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="float-right w400">
						<p id="copyright">Copyright &copy; <?php the_time('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - All rights reserved!</p>
						<p>Template designed by <a href="http://www.lostresort.biz/blog">Cristian Nistor</a> under <a href="http://www.gnu.org/licenses/gpl.html/">GPLv3-license</a></p>
						<p>Powered by <a href="http://wordpress.org">Wordpress</a> web software.</p>
						<?php wp_footer(); ?>
					</div>
					<div class="clear-both"></div>
				</div>
			</div>
		</div>
	</div>
<div class="clear-both"></div>
</body>
</html>