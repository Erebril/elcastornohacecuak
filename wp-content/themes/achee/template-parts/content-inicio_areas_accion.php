	<?php 
		$url_ = get_permalink( get_page_by_path( 'areas-de-accion' ) );		
	?>		    			    	
    <div class="col s12 title">
		<h4><?php echo __('Líneas de desarrollo', 'achee'); ?></h4>
	</div>
	<div class="areas-action-container row">
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-edificacion' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-edificacion"><span>Edificación</span></h5>		    		   
		    	</a>
		    </div>		    
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-industria-y-mineria' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-industria"><span>Industria &amp; Minería</span></h5>		    		   
		    	</a>
		    </div>	
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-transporte' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-transporte"><span>Transporte</span></h5>		    		   
		    	</a>
		    </div>		
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-educacion' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-educacion"><span>Educación</span></h5>		    		   
		    	</a>
		    </div>		
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-medicion-y-verificacion' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-medicion"><span>Medición &amp; Verificación</span></h5>		    		   
		    	</a>
		    </div>		    
		    <div class="col area-item m4 l2">
		    	<?php $url_ = get_permalink( get_page_by_path( 'area-formacion-de-capacidades' ) ); ?>
		    	<a href="<?php echo $url_; ?>" class="link-area-action">
		    		<h5 class="icon-area-action icon-capacidad"><span>Formación de Capacidades</span></h5>		    		   
		    	</a>
		    </div>		    
	</div>	