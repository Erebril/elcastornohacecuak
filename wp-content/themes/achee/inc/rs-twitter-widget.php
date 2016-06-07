<?php

   class rs_twitter_widget extends WP_Widget {
      function rs_twitter_widget() {
         $options = array('classname' => 'rsTwitter',
                           'description' => 'Widget que muestra un feedback de últimos tweets de un perfil de Twitter');
         $this->WP_Widget('rs_twitter_widget', 'AChEE Cuadro de feedback de Twitter', $options);
      }

      function form($instance) {
         $defaults = array('titulo' => 'Twitter', 'id' => '', 'url' => '');
         $instance = wp_parse_args((array)$instance, $defaults);
         $titulo = $instance['titulo'];
         $id = $instance['id'];
         $url = $instance['url'];
         ?>
         <p>
         Titulo:
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('titulo');?>" value="<?php echo esc_attr($titulo);?>"/>
         </p>
         <p>
         ID del widget <small>(Códgo de data-widget-id)</small>:
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('id');?>" value="<?php echo esc_attr($id);?>"/>
         </p>
         <p>
         URL de Perfil <small>(ejemplo: https://twitter.com/AgenciAChEE)</small>:
         <input class="widefat" type="text" name="<?php echo $this->get_field_name('url');?>" value="<?php echo esc_attr($url);?>"/>
         </p>
         <?php
      }

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         $instance['titulo'] = sanitize_text_field($new_instance['titulo']);
         $instance['id'] = sanitize_text_field($new_instance['id']);
         $instance['url'] = sanitize_text_field($new_instance['url']);

         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         extract($args);

         $titulo = apply_filters('widget_title', $instance['titulo']);
         $id = $instance['id'];
         $url = $instance['url'];

         echo $before_widget;
         echo $before_title;
         echo '<h5 class="tweet-title"><i class="fa fa-twitter"></i> ';
         echo $titulo;
         echo '</h5>';
         echo $after_title;
         echo '<a class="twitter-timeline" data-widget-id="';
         echo $id;
         echo '" href="';
         echo $url;
         echo '" data-tweet-limit="2" width="100%" height="auto" data-chrome="noheader nofooter noborder noscrollbar transparent">';
         echo '<small>Cargando Tweets..</small>';
         echo '</a>';
         //echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';         
         echo  '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";js.setAttribute("onload", "twttr.events.bind(\'rendered\',function(e) {fixWidthTimeline()});");fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
         echo $after_widget;

         //       datos de ACEE
         //       <a class="twitter-timeline"
         //       data-widget-id="655086286689148929"
         //       href="https://twitter.com/AgenciAChEE"
         //       data-chrome="noheader nofooter noborder noscrollbar transparent">
         //       Tweets de @AgenciAChEE.
         //       </a>
      }
   }

?>