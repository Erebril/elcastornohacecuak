<?php

   class contactos_widget extends WP_Widget {
      function contactos_widget() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-contact',
            'description' => 'Widget del menú izquierdo de la cabecera superior de página'
         );
         $this->WP_Widget('contactos_widget', 'AChEE Menú de cabecera superior', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(
            'fono' => 'Ingrese número de teléfono',
            'ico1' => 'Ingrese nombre de clase del icono',
            'correo'=> 'Ingrese el correo de contacto',
            'ico2' => 'Ingrese nombre de clase del icono',
            'texto' => 'Ingrese el texto a mostrar',
            'link' => 'Ingrese el vínculo al que debe dirigir',
            'ico3' => 'Ingrese nombre de clase del icono'
         );
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);
         // Cogemos los valores
         $fono = $instance['fono'];
         $ico1 = $instance['ico1'];
         $correo = $instance['correo'];
         $ico2 = $instance['ico2'];
         $texto = $instance['texto'];
         $link = $instance['link'];
         $ico3 = $instance['ico3'];
         // Mostramos el formulario
         ?>
         <p>
            Teléfono:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('fono');?>"
            value="<?php echo esc_attr($fono);?>"/>
         </p>
         <p>
            Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>)
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('ico1');?>"
            value="<?php echo esc_attr($ico1);?>"/>
         </p>
         </br>
         <p>
            Correo Electrónico:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('correo');?>"
            value="<?php echo esc_attr($correo);?>"/>
         </p>
         <p>
            Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>)
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('ico2');?>"
            value="<?php echo esc_attr($ico2);?>"/>
         </p>
         </br>
         <p>
            Texto:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('texto');?>"
            value="<?php echo esc_attr($texto);?>"/>
         </p>
         <p>
            Vínculo:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('link');?>"
            value="<?php echo esc_attr($link);?>"/>
         </p>
         <p>
            Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>)
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('ico3');?>"
            value="<?php echo esc_attr($ico3);?>"/>
         </p>
         </br>
         <?php
      }

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         $instance['fono'] = sanitize_text_field($new_instance['fono']);
         $instance['ico1'] = sanitize_text_field($new_instance['ico1']);
         $instance['correo'] = sanitize_text_field($new_instance['correo']);
         $instance['ico2'] = sanitize_text_field($new_instance['ico2']);
         $instance['texto'] = sanitize_text_field($new_instance['texto']);
         $instance['link'] = sanitize_text_field($new_instance['link']);
         $instance['ico3'] = sanitize_text_field($new_instance['ico3']);

         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         // Extraemos los argumentos del area de widgets
         extract($args);

         $fono = $instance['fono'];
         $ico1 = $instance['ico1'];
         $correo = $instance['correo'];
         $ico2 = $instance['ico2'];
         $texto = $instance['texto'];
         $link = $instance['link'];
         $ico3 = $instance['ico3'];

         echo $before_widget;
         echo '<ul>';
         echo '<li>';
         echo '<i class="' . $ico1 . '"></i>';
         echo '<p>Teléfono</p>';
         echo '<a href="tel:' . $fono . '">';
         echo $fono;
         echo '</a>';
         echo '</li>';
         echo '<li>';
         echo '<i class="' . $ico2 . '"></i>';
         echo '<p>Email</p>';
         echo '<a href="https://mail.google.com/mail/u/0/?view=cm&amp;fs=1&amp;to=';
         echo $correo . '" target="_blank">';
         echo $correo;
         echo '</a>';
         echo '</li>';
         echo '<li>';
         echo '<i class="' . $ico3 . '"></i>';
         echo '<a href="' . $link . '" target="_blank">';
         echo $texto;
         echo '</a>';
         echo '</ul>';
         echo $after_widget;
      }
   }

?>