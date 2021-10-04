<?php
/**
 * nustart-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nustart-child
 */
//



// Hook the enqueue functions into the frontend and editor
add_action( 'enqueue_block_assets', 'nu__enqueue_block_scripts' );

// Hook the enqueue functions into the editor
add_action( 'enqueue_block_editor_assets', 'nu__enqueue_block_editor_scripts' );


/**
 * Enqueue frontend and editor JavaScript and CSS
 */
function nu__enqueue_block_scripts() {

    // Enqueue block editor styles
    wp_enqueue_style(
        'nustart-child-main-styles',
		get_stylesheet_directory_uri() . '/build/style-index.css',
        [],
        filemtime( get_stylesheet_directory() . '/build/style-index.css' )
    );

}


/**
 * Enqueue block JavaScript and CSS for the editor
 */
function nu__enqueue_block_editor_scripts() {

    // Enqueue block editor JS
    wp_enqueue_script(
        'nustart-child-block-editor-scripts',
        get_stylesheet_directory_uri() . '/build/index.js',
        [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ],
        filemtime( get_stylesheet_directory() . '/build/index.js' )
    );

    // Enqueue block editor styles
    wp_enqueue_style(
        'nustart-child-block-editor-styles',
        get_stylesheet_directory_uri() . '/build/index.css',
        [ 'wp-edit-blocks' ],
        filemtime( get_stylesheet_directory() . '/build/index.css' )
    );

}

//Disable SSL verification within your testing site. You can do this by adding this line into the file 
add_filter('https_ssl_verify', '__return_false');

?>
