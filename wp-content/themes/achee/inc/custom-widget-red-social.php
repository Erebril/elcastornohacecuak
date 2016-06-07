<?php

   class add_social_network_widget extends WP_Widget {
      function add_social_network_widget() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-rs',
            'description' => 'Widget que permite crear un link a la red social con el respectivo icono'
         );
         $this->WP_Widget('add_social_network_widget', 'AChEE agregar una Red Social', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(
            // 'texto' => 'Síguenos en',
            'icono' => 'Ingrese nombre de clase del icono',
            'nombre'=> 'Ingrese el nombre de la red social',
            'link' => 'Ingrese la url del perfil'
         );
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);
         // Cogemos los valores
         // $texto = $instance['texto'];
         $icono = $instance['icono'];
         $nombre = $instance['nombre'];
         $link = $instance['link'];
         // Mostramos el formulario
         ?>
         <p>
            Nombre de la red social:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('nombre');?>"
            value="<?php echo esc_attr($nombre);?>"/>
         </p>
         <p>
            Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>):
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('icono');?>"
            value="<?php echo esc_attr($icono);?>"/>
         </p>
         <!-- <p>
            Leyenda:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('texto');?>"
            value="<?php echo esc_attr($texto);?>"/>
         </p> -->
         <p>
            Vinculo a la red social:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('link');?>"
            value="<?php echo esc_attr($link);?>"/>
         </p>
         </br>
         <?php
      }

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         // $instance['texto'] = sanitize_text_field($new_instance['texto']);
         $instance['icono'] = sanitize_text_field($new_instance['icono']);
         $instance['nombre'] = sanitize_text_field($new_instance['nombre']);
         $instance['link'] = sanitize_text_field($new_instance['link']);

         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         // Extraemos los argumentos del area de widgets
         extract($args);

         // $texto = $instance['texto'];
         $icono = $instance['icono'];
         $nombre = $instance['nombre'];
         $link = $instance['link'];

         echo $before_widget;
         // echo '<div class="row">';
         // echo '<div class="col s4">';
         // echo '<a href="' . $link . '" target="_blank">';
         // echo '<i class="rs-icon ' . $icono . '"></i>';
         // echo '</a>';
         // echo '</div>';
         // echo '<div class="col s8">';
         // echo '<small class="left grey-text text-darken-4">' . $texto . '</small>';
         // echo '<a href="' . $link . '" target="_blank">';
         // echo '<small class="left white-text">' . $nombre . '</small>';
         // echo '</a>';
         // echo '</div>';
         // echo '</div>';
         echo '<small class="left grey-text">' . $nombre . '</small>';
         echo '<a href="' . $link . '" target="_blank">';
         echo '<span class="fa-stack fa-lg">';
         //echo '<i class="fa fa-circle fa-stack-2x"></i>';
         echo '<i class="social-icon ' . $icono . ' fa-stack-1x fa-inverse"></i></span>';
         echo '</a>';
         echo $after_widget;
      }
   }

?>