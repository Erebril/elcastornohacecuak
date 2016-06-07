<?php

   class info_piepag_widget extends WP_Widget {
      function info_piepag_widget() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-piepagina',
            'description' => 'Widget que muestra la Información de la AChEE al pie de página del footer'
         );
         $this->WP_Widget('info_piepag_widget', 'AChEE Información al pie de página', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(
            'icono' => 'Ingrese nombre de clase del icono',
            'text' => '',
            'correo'=> '',
            'fono' => ''
         );
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);
         // Cogemos los valores
         $icono = $instance['icono'];
         $text = $instance['text'];
         $correo = $instance['correo'];
         $fono = $instance['fono'];
         // Mostramos el formulario
         ?>
         <p>
            Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>)
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('icono');?>"
            value="<?php echo esc_attr($icono);?>"/>
         </p>
         <p>
            Text para pie de página:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('text');?>"
            value="<?php echo esc_attr($text);?>"/>
         </p>
         <p>
            Correo Electrónico:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('correo');?>"
            value="<?php echo esc_attr($correo);?>"/>
         </p>
         <p>
            Teléfono:
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('fono');?>"
            value="<?php echo esc_attr($fono);?>"/>
         </p>
         </br>
         <?php
      }

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         $instance['fono'] = sanitize_text_field($new_instance['fono']);
         $instance['icono'] = sanitize_text_field($new_instance['icono']);
         $instance['correo'] = sanitize_text_field($new_instance['correo']);
         $instance['text'] = sanitize_text_field($new_instance['text']);

         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         // Extraemos los argumentos del area de widgets
         extract($args);

         $fono = $instance['fono'];
         $icono = $instance['icono'];
         $correo = $instance['correo'];
         $text = $instance['text'];

         echo $before_widget;
         ?>
            <div class="col s12 m12 valign-wrapper">
               <!-- Direccion -->
               <div class="col m4 s12">
                  <div class="textwrap valign center" style="float: none;">
                     <p><i class="<?php echo $icono ?>" aria-hidden="true"></i>
                     <?php echo $text ?></p>
                  </div>
               </div>
               <!-- Mail -->
               <div class="col m4 s12">
                  <div class="textwrap valign center" style="float: none;">
                     <p><i class="fa fa-envelope-o" aria-hidden="true"></i>
                     Email: <a href="https://mail.google.com/mail/u/0/?view=cm&amp;fs=1&amp;to=<?php echo $correo ?>" target="_blank"><?php echo $correo ?></a></p>
                  </div>
               </div>           
               <!-- Telefono -->
               <div class="col m4 s12">
                  <div class="textwrap valign center" style="float: none;">
                     <p><i class="fa fa-phone" aria-hidden="true"></i>
                     Teléfono: <a href="tel:<?php echo $fono ?>"><?php echo $fono ?></a></p>
                  </div>
               </div>
               <!-- Redes Sociales -->
<!--                <div class="col m4 s12">
                  <div class="textwrap valign">
                     <a href="https://www.facebook.com/AChEEnergetica" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-facebook-square fa-stack-2x fa-inverse"></i></span></a>
                     <a href="https://twitter.com/AgenciAChEE" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-twitter-square fa-stack-2x fa-inverse"></i></span></a>
                     <a href="https://www.linkedin.com/company/agencia-chilena-de-eficiencia-energ-tica" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-linkedin-square fa-stack-2x fa-inverse"></i></span></a>
                     <a href="https://www.youtube.com/user/AChEEAgencia" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-youtube-play fa-stack-2x fa-inverse"></i></span></a>
                  </div>
               </div> 
            </div> -->
      <!--       <div class="col s12 m4 icoWrap valign-wrapper">
               <div class="ico-bco valign"></div>
            </div> -->
         <?php
         echo $after_widget;
      }
   }

?>