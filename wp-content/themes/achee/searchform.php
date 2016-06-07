<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="search-wrapper">
		<input type="search" class="search-field" placeholder="<?php echo  __( 'Search...', 'achee' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo  __( 'Search...', 'achee' ) ?>" />
		<i class="fa fa-search"></i>
	</div>
</form>
<?php echo '<form role="search" method="get" id="search-form-responsive" class="search-form-responsive" action="'.home_url( '/' ).'"><input type="text" name="s" placeholder="'.__( 'Search...', 'achee' ).'" value="'.get_search_query().'"></form>'; ?>