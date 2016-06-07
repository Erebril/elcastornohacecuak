<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// https://codex.wordpress.org/Class_Reference/WP_Admin_Bar/add_menu

function change_toolbar($wp_toolbar) {
        global $current_user;
        $menus = get_admin_url() . 'nav-menus.php';
        $curso = get_admin_url() . 'edit.php?post_type=cursos';
        $linea = get_admin_url() . 'edit.php?post_type=linea-apoyo';
        $licita = get_admin_url() . 'edit.php?post_type=licitaciones';

        // $wp_toolbar->remove_node('wp-logo');
        $wp_toolbar->remove_node('comments');
        // $wp_toolbar->remove_node('new-content');
        // $wp_toolbar->remove_node('site-name');
        $wp_toolbar->remove_node('updates');

        $wp_toolbar->add_node(array(
            'id' => 'mymenu',
            'title' => '<span class="dashicons dashicons-welcome-widgets-menus"></span> <span class="ab-label">Menús</span>',
            'href' => $menus,
            'meta' => array('target' => '_self')
        ));
        $wp_toolbar->add_node(array(
            'id' => 'mycourse',
            'title' => '<span class="dashicons dashicons-welcome-learn-more"></span> <span class="ab-label">Cursos</span>',
            'href' => $curso,
            'meta' => array('target' => '_self')
        ));
        $wp_toolbar->add_node(array(
            'id' => 'mylines',
            'title' => '<span class="dashicons dashicons-before dashicons-awards"></span> <span class="ab-label">Líneas de Apoyo</span>',
            'href' => $linea,
            'meta' => array('target' => '_self')
        ));
        $wp_toolbar->add_node(array(
            'id' => 'mylicites',
            'title' => '<span class="dashicons dashicons-media-spreadsheet"></span> <span class="ab-label">Licitaciones</span>',
            'href' => $licita,
            'meta' => array('target' => '_self')
        ));

    }
    add_action('admin_bar_menu', 'change_toolbar', 999);