<?php

   class ultimos_cursos extends WP_Widget {
      function ultimos_cursos() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-ultimos-cursos',
            'description' => 'Widget muestra el listado últimos cursos'
         );
         $this->WP_Widget('ultimos_cursos', 'AChEE últimos cursos', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(                     
            'titulo'=> 'Últimos Cursos',            
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
               $argsCurso = array(
                  'post_type' => 'cursos',
                  'posts_per_page' => 3,
                  'orderby' => 'date',              
               );

               //Exclude this post!
               if(isset($post) && $post->ID!=""){
                  $argsCurso['post__not_in'] = array($post->ID);
               }
             
               $cursos = new WP_Query( $argsCurso );

         ?>

         <h2 class="widget-title"><?php echo $instance['titulo']; ?></h2>
         <ul>
         <?php while ( $cursos->have_posts() ) : $cursos->the_post(); ?>

               <li>
                  <a href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) )  ?>"><?php the_title(); ?></a>
                  <span class="post-date"><?php echo the_time('F d,  Y'); ?></span>                  
               </li>         
               
          <?php endwhile; ?>
          </ul>    

          <div class="center-align">
             <a href="<?php echo esc_url( get_post_type_archive_link( 'cursos' ) ); ?>" class="waves-effect waves-light orange accent-4 white-text btn btn-small">Cursos anteriores</a>
          </div>          

                     
         <?php echo $after_widget;
      }
   }

?>