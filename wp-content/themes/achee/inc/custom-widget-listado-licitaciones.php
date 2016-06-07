<?php

   class ultimas_licitaciones extends WP_Widget {
      function ultimas_licitaciones() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-ultimas-licitaciones',
            'description' => 'Widget muestra el listado últimas licitaciones'
         );
         $this->WP_Widget('ultimas_licitaciones', 'AChEE últimas Licitaciones', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(                     
            'titulo'=> 'Últimas Licitaciones',            
         );
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);      
         
         $titulo = $instance['titulo']; ?>

         <p>
            Título para listado:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('titulo');?>" value="<?php echo esc_attr($titulo);?>"/>
         </p>

         <?php
      } 

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         $instance['titulo'] = sanitize_text_field($new_instance['titulo']);         
         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         // Extraemos los argumentos del area de widgets
         extract($args);

         echo $before_widget; ?>

         <?php global $post; ?>
         
         <?php         
    
               $argsLicita = array(
                  'post_type' => 'licitaciones',
                  'post_status' => array('publish'),
                  'posts_per_page' => 3,
                  // orden por fecha de cierre de licitacion
                  'orderby' => 'meta_value',    
                  'meta_key' => 'close_date_licita',                 
                  'order' => 'DESC',                  
               );

               //Exclude this post!
               if(isset($post) && $post->ID!=""){
                  $argsLicita['post__not_in'] = array($post->ID);
               }
             
               $cursos = new WP_Query( $argsLicita );

         ?>

         <h2 class="widget-title"><?php echo $instance['titulo']; ?></h2>
         <ul>
         <?php while ( $cursos->have_posts() ) : $cursos->the_post(); ?>

               <?php 

                     $fecha_cierre = get_post_meta( get_the_ID(), 'close_date_licita', true);            
                     // in extras.php => include in functions.php
                     $status = get_status_by_fecha_licita($fecha_cierre,false);         

               ?>

               <li>
                  <a href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) )  ?>"><?php the_title(); ?></a>
                  <span class="badge-text"><?php echo $status; ?></span>
                  <span class="post-date"><?php echo the_time('F d,  Y'); ?></span>                  
               </li>         
               
          <?php endwhile; ?>
          </ul>    

          <div class="center-align">
             <a href="<?php echo esc_url( get_post_type_archive_link( 'licitaciones' ) ); ?>" class="waves-effect waves-light orange accent-4 white-text btn btn-small">Licitaciones anteriores</a>
          </div>          

                     
         <?php echo $after_widget;
      }
   }

?>