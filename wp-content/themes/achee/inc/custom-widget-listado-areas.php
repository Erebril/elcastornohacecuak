<?php

   class posts_by_areas extends WP_Widget {
      function posts_by_areas() {
         // Constructor del Widget
         $options = array(
            'classname' => 'achee-listado-mix-areas',
            'description' => 'Widget muestra el listado Licitaciones'
         );
         $this->WP_Widget('posts_by_areas', 'AChEE Licitaciones listado', $options);
      }

      function form($instance) {
         // Construye el formulario de administración
         $defaults = array(                     
            'titulo'=> 'Licitaciones',            
         );
         // Se hace un merge, en $instance quedan los valores actualizados
         $instance = wp_parse_args((array)$instance, $defaults);      
         
         $titulo = $instance['titulo']; ?>

       <!--   <p>
            Título para listado:
            <input class="widefat" type="text" name="<?php //echo $this->get_field_name('titulo');?>" value="<?php echo esc_attr($titulo);?>"/>
         </p> -->

         <?php
      } 

      function update($new_instance, $old_instance) {
         // Guarda las opciones del Widget
         $instance = $old_instance;
         // Con sanitize_text_field elimiamos HTML de los campos
         //$instance['titulo'] = sanitize_text_field($new_instance['titulo']);         
         return $instance;
      }

      function widget($args, $instance) {
         // Construye el código para mostrar el widget públicamente
         // Extraemos los argumentos del area de widgets
         extract($args);

         echo $before_widget; ?>

         <?php global $post; ?>
         
         <?php         

               $posts_per_page = get_option('posts_per_page');
               $custom_query = array(
                  //'post_type' => array('post','licitaciones','cursos','linea-apoyo'),                  
                  'post_type' => 'licitaciones',
                  'posts_per_page' => 3,
                  'orderby' => 'date',                  
               );

               // get area from title slug
               $area =  str_replace('area-','',$post->post_name);  
               $titulo = get_the_title();                
               //$area =  'edificacion';

               if(!is_null($area)){                      
                  $custom_query['meta_query'] = array(
                           // licitacion
                           //'relation' => 'OR',
                           array(
                              'key'     => '_value_key_action_area',
                              'value'   => $area,                             
                           ),
                           // // curso
                           // array(
                           //    'key'    => '_value_key_curso_act_area',
                           //    'value'  => $area
                           // ),
                           // // linea apoyo
                           // array(
                           //    'key'    => '_value_key_line_act_area',
                           //    'value'  => $area
                           // )
                        );
                  
               }
               

               //Exclude this post!
               if(isset($post) && $post->ID!=""){
                  $custom_query['post__not_in'] = array($post->ID);
               }
             
               $posts = new WP_Query( $custom_query );

         ?>


         <?php $title = 'Licitaciones en '.$titulo; ?>

         <h2 class="widget-title"><?php echo $title; ?></h2>
         <ul>
         <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
               <?php
                     $post_type_name = 'Licitación';  
                     $cierre = get_post_meta( get_the_ID(), '_value_key_close_date', true);
                     $hoy = new DateTime();
                     // Fix date to format date
                     $english = array('January','February','March','April','May','June','July','August','September','October','November','December');
                     $spanish = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octobre','Noviembre','Deciembre');
                     $date_fix = str_replace($spanish, $english, $cierre);    
                     $date_fix = str_replace(' de', '', $date_fix);                                              
                     $cierre_formato = date_create_from_format('d F Y H:i',$date_fix);                  

                     if($hoy < $cierre_formato){
                        $status = "Publicada";
                     }
                     else{
                        $status = "Terminada";
                     }

                     //$post_type = get_post_type();
                    // $post_type_name = '';
                    // if($post_type == 'cursos'){
                       // $post_type_name = 'Curso';
                    // }
                     //elseif ($post_type == 'licitaciones') {
                        //$post_type_name = 'Licitación';  
                     // } 
                     // elseif ($post_type == 'linea-apoyo') {
                    //    $post_type_name = 'Linea de Apoyo';
                     // }
               ?>

               <li>
                  <a href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) )  ?>"><?php the_title(); ?></a>
                  <span class="badge-text"><?php echo $status; ?></span>
                  <span class="post-date"><?php echo the_time('F d,  Y'); ?></span>                  
               </li>         
               
          <?php endwhile; ?>
          </ul>    
         <?php            
            //$page_ = get_page( array( 'name' => 'areas-de-accion', 'post_type'=> 'page' ) );            
            //$url_ = get_page_link($page_[0]->ID) .'?area='.$area;   
                         
            $url_ = Get_home_url().'/licitaciones?area='.$area;
          ?>
         

          <div class="center-align">
             <a href="<?php echo $url_; ?>" class="waves-effect waves-light orange accent-4 white-text btn btn-small">Más de <?php echo $titulo ?></a>
          </div>      

                     
         <?php echo $after_widget;
      }
   }

?>