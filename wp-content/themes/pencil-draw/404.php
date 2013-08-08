<?php
/*
Template Name: 404 Page
*/
?>
<?php get_header(); ?>
<div id="main-block">
	<div id="content">
		<div class="green-draw">
			<div class="top-green">
				<div class="bottom-green">
					<div class="transparent">
						<div class="title">		
							<h2 style="margin-top:1em">Error 404 - Page Not Found</h2>
						</div>
						<div class="entry">
							<p>The content you are looking for is not present.</p>
						</div>
						<div id="search-again">
							<h3>Use the search form for queries:</h3>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--#content-->							
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>