<?php
/**
 * Custom output for a download via the [download] shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php //logica para listar archivos ?>
<?php $versions = $dlm_download->get_file_versions();  ?>
<?php if(!empty($versions)): ?>
	<?php if(count($versions)>1): ?>
		<?php $custom_count = 1 ?>		
		<?php foreach ($versions as $key => $version) : ?>
				<?php $counter = ' ('.$version->download_count.')'; ?>				
			    <?php $link = $dlm_download->get_the_download_link() ?>
				<?php if ($version->version!=""): ?>
					<?php
					   $separator = (parse_url($link, PHP_URL_QUERY) == NULL) ? '?' : '&';
   					   $link .= $separator . 'version='.$version->version; 
   					?>
					<?php /*<a title="Visualizar Archivo" href="<?php //echo $link; ?>" rel="nofollow" class="download-link">Visualizar <?php //echo $version->version; ?></a>*/ ?>
					<!-- <a title="Visualizar Archivo" href="<?php // echo $link; ?>" rel="nofollow" class="download-link">Visualizar <?php //echo ($custom_count); ?></a> -->
				<?php else: ?>
					<?php //sin version 					
						$separator = (parse_url($link, PHP_URL_QUERY) == NULL) ? '?' : '&';
   						$link .= $separator . 'version='.$version->version; 
   					?>
					<!-- <a title="Visualizar Archivo" href="<?php // echo $link; ?>" rel="nofollow" class="download-link">Visualizar <?php// echo ($custom_count); ?></a> -->
				<?php endif ?>		
				<?php $custom_count++; ?>		
		<?php endforeach; ?>
	<?php else: ?>	
		<?php //solo un archivo! ?>							
		<!-- <a title="Visualizar Archivo" href="<?php// $dlm_download->the_download_link(); ?>" rel="nofollow" class="download-link" >			 -->
			<?php // Usando funciones de plugins ?>
			<?php $counter = ' ('.$dlm_download->get_the_download_count().')'; ?>
			<?php //echo "Visualizar" ?>			
			<?php //echo $dlm_download->has_version_number() ? "Visualizar ".$dlm_download->get_file_version()->get_version_slug() . $counter : "Descargar Archivo" . $counter; ?>			
			<?php // Alternativa usando php solamente ?>
			<?php //echo ($versions[key($versions)]->version!="") ? "Descargar ".$versions[key($versions)]->version : "Descargar Archivo"; ?>
		</a>		
	<?php endif; ?>
<?php endif; ?>
