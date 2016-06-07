<?php

   class categorias_noticias extends WP_Widget {
      function categorias_noticias() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-lista-de-categorias',
            'description' => 'Widget muestra el listado de categorías padres de noticias'
         );
         $this->WP_Widget('categorias_noticias', 'AChEE categorias noticias', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(                     
            'titulo'=> 'Categorías Noticias',            
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
                  
         <?php $categories = get_categories(array('type'=>'post','hide_empty'=>0,'hierarchical'=>0,'orderby'=>'name')) ?>

            <h2 class="widget-title"><i class="fa fa-check-circle-o"></i><?php echo $instance['titulo']; ?></h2>
            <?php //var_dump($categories) ?>
            <ul class="menu" id="menu-proyectos-emblematicos">
            <?php foreach ($categories as $key => $cat): ?>
               <li><a href="<?php echo esc_url(get_category_link( $cat->term_id )) ?>"><?php echo $cat->name; ?></a></li>      
            <?php endforeach ?>
            </ul>               
            

         <?php echo $after_widget;
      }
   }

?>