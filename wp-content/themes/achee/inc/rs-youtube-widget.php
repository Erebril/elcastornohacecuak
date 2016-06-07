<?php

   class rs_youtube_widget extends WP_Widget {
      function rs_youtube_widget() {
         $options = array('classname' => 'rsYoutube',
                           'description' => 'Widget que muestra una oferta');
         $this->WP_Widget('rs_youtube_widget', 'Youtube', $options);
      }

      function form($instance) {
         // Valores por defecto
         $defaults = array('titulo' => 'Youtube', 'descripcion'=> '', 'url' => '');
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);
         // Cogemos los valores
         $titulo = $instance['titulo'];
         $descripcion = $instance['descripcion'];
         $url = $instance['url'];
         // Mostramos el formulario
         ?>
         <p>
         Titulo
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('titulo');?>" value="<?php echo esc_attr($titulo);?>"/>
         </p>

         <p>
         Descripcion
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('descripcion');?>" value="<?php echo esc_attr($descripcion);?>"/>
         </p>

         <p>
         URL
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('url');?>" value="<?php echo esc_attr($url);?>"/>
         </p>
         <?php
      }

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         $instance['titulo'] = sanitize_text_field($new_instance['titulo']);
         $instance['descripcion'] = sanitize_text_field($new_instance['descripcion']);
         $instance['url'] = sanitize_text_field($new_instance['url']);

         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         extract($args);

         $titulo = apply_filters('widget_title', $instance['titulo']);
         $descripcion = $instance['descripcion'];
         $url = $instance['url'];

         echo $before_widget;
         echo $before_title;
         echo $titulo;
         echo $after_title;
         echo '<p>'.$descripcion.'</p>';
         echo '<p>'.$url.'</p>';
         echo $after_widget;
      }
   }

?>