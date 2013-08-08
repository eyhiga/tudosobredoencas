<?php

//Hero Widget
class Tuned_Hero_Widget extends WP_Widget {

	function tuned_Hero_Widget() {
		parent::__construct( false, __( 'Hero Widget', 'tuned' ), array( 'description' => __( 'This widget displays the Hero Unit', 'tuned' ) ) );
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'hero-heading' => '', 'hero-tagline' => '', 'hero-button' => '', 'hero-button-link' => '' ) );
		$hero_heading = $instance['hero-heading'];
		$hero_tagline = $instance['hero-tagline'];
		$hero_button = $instance['hero-button'];
		$hero_button_link = $instance['hero-button-link'];
	?>	
		<p><label for="<?php echo $this->get_field_id('hero-heading'); ?>"><?php _e('Heading', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('hero-heading'); ?>" name="<?php echo $this->get_field_name('hero-heading'); ?>" 
		value="<?php echo esc_attr($hero_heading); ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('hero-tagline'); ?>"><?php _e('Tagline', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('hero-tagline'); ?>" name="<?php echo $this->get_field_name('hero-tagline'); ?>" 
		value="<?php echo esc_attr($hero_tagline); ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('hero-button'); ?>"><?php _e('Button', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('hero-button'); ?>" name="<?php echo $this->get_field_name('hero-button'); ?>" 
		value="<?php echo esc_attr($hero_button); ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('hero-button-link'); ?>"><?php _e('Link', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('hero-button-link'); ?>" name="<?php echo $this->get_field_name('hero-button-link'); ?>" 
		value="<?php echo esc_attr($hero_button_link); ?>" /></label></p>
		
	<?php
	}
	
	function update($args, $old_instance) {
		$instance = $old_instance;
		$instance['hero-heading'] = $args['hero-heading'];
		$instance['hero-tagline'] = $args['hero-tagline'];
		$instance['hero-button'] = $args['hero-button'];
		$instance['hero-button-link'] = $args['hero-button-link'];
		return $instance;
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);	
		
		echo $before_widget;
		
		$hero_heading = empty($instance['hero-heading']) ? 'Heading' : $instance['hero-heading'];
		$hero_tagline = empty($instance['hero-tagline']) ? 'Tagline' : $instance['hero-tagline'];
		$hero_button = $instance['hero-button'];
		$hero_button_link = $instance['hero-button-link'];
		?>
		
		<div class="hero-unit">
			<h1><?php echo $hero_heading; ?></h1>
			<p><?php echo $hero_tagline; ?></p>
			<?php if( !empty($hero_button) ) : ?>
			<a href="<?php echo esc_url( $hero_button_link ); ?>" class="btn-hero">
					<?php echo $hero_button; ?>			
			</a>
			<?php endif; ?>
		</div>
		
		<?php
		echo $after_widget;
	}
}


//Category Widget
class Tuned_Category_Widget extends WP_Widget {		
	
	function tuned_category_widget() {
		parent::__construct( false, __( 'Category Posts Widget', 'tuned' ), array( 'description' => __( 'This widget displays posts from a category.', 'tuned' ) ) );
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'category-slug' => '' ) );
		$category_slug = $instance['category-slug'];		
	?>	
		<p><?php _e( 'Usage: Add Posts with featured image to a Category, then add the Slug of Category to this Widget. If you want to display post\'s featured image ONLY IN THE WIDGET, rename your image to _icon(eg. yourimage_icon.png)', 'tuned' ); ?></p>
		<p><label for="<?php echo $this->get_field_id('category-slug'); ?>"><?php _e('Slug of the Category', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('category-slug'); ?>" name="<?php echo $this->get_field_name('category-slug'); ?>" 
		value="<?php echo esc_attr($category_slug); ?>" /></label></p>				
		
	<?php
	}
	
	function update($args, $old_instance) {
		$instance = $old_instance;
		$instance['category-slug'] = $args['category-slug'];		
		return $instance;
	}
	
	function widget($args, $instance) {
	
		global $more;		
		extract($args, EXTR_SKIP);				
		
		echo $before_widget;
		
		$category_slug = empty($instance['category-slug']) ? 'Heading' : $instance['category-slug'];
		$category_by_slug = new WP_Query( array('category_name' => $category_slug, 'posts_per_page' => -1, 'orderby' => 'post_date', 'order' => 'ASC') );
		?>
				
			<?php while( $category_by_slug->have_posts() ) : $category_by_slug->the_post(); ?>
				<div class="grid-1 grid-3">
				<?php $more = 0; ?>	
				<h1><?php the_title(); ?></h1>				
				<?php the_post_thumbnail(); ?>
				<?php the_content( __( 'Read more', 'tuned' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'tuned' ), '<span class="edit-link">', '</span>' ); ?>
				<div style="clear: both"></div>
				</div>
			<?php endwhile; ?>
				
		<?php
		echo $after_widget;
	}
}


//Carousel Widget
class Tuned_Carousel_Widget extends WP_Widget {

	function tuned_carousel_widget() {
		parent::__construct( false, __( 'Carousel Widget', 'tuned' ), array( 'description' => __( 'Carousel widget displays posts with featured images from a category.(Image slider with text.)', 'tuned' ) ) );
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'category-slug' => '' ) );
		$category_slug = $instance['category-slug'];		
	?>	
	
		<p><?php _e( 'Usage: Add Posts with featured image to a Category, then add the Slug of Category to this Widget. If you want to display post\'s featured image ONLY IN THE WIDGET, rename your image to _icon(eg. yourimage_icon.png)', 'tuned' ); ?></p>
		<p><label for="<?php echo $this->get_field_id('category-slug'); ?>"><?php _e('Slug of the Category', 'tuned') ?>: <input class="widefat" 
		id="<?php echo $this->get_field_id('category-slug'); ?>" name="<?php echo $this->get_field_name('category-slug'); ?>" 
		value="<?php echo esc_attr($category_slug); ?>" /></label></p>				
		
	<?php
	}
	
	function update($args, $old_instance) {
		$instance = $old_instance;
		$instance['category-slug'] = $args['category-slug'];		
		return $instance;
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);				
		global $more;
		echo $before_widget;
		
		$category_slug = empty($instance['category-slug']) ? 'Heading' : $instance['category-slug'];
		$category_by_slug = new WP_Query( array('category_name' => $category_slug, 'posts_per_page' => -1, 'orderby' => 'post_date', 'order' => 'ASC') );
		?>			
			<?php while( $category_by_slug->have_posts() ) : $category_by_slug->the_post(); ?>
				<li>
				<?php the_post_thumbnail(); ?>
				<div class="flex-caption">
					<?php $more = 0; ?>					
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php the_content( __( 'Read more', 'tuned' ) ); ?>
				</div>
				</li>
			<?php endwhile; ?>			
		<?php
		echo $after_widget;
	}
}