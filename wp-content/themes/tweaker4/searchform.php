<?php

global $next_id; ++$next_id; ?>

<div class="search">
	
	<form method="get" class="searchform" id="searchform<?php if ( $next_id ) echo '-' . $next_id; ?>" action="<?php echo home_url(); ?>/">
		
		<div>
			<input class="searchtext" type="text" name="s" id="searchtext<?php if ( $next_id)  echo '-' . $next_id; ?>" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else _e( 'Search this site...', 'tweaker4' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
			<input class="searchsubmit" name="submit" type="submit" id="searchsubmit<?php if ( $next_id ) echo '-' . $next_id; ?>" value="<?php _e( 'Search', 'tweaker4' ); ?>" />
		</div>
	
	</form>

</div><!-- close .search-->