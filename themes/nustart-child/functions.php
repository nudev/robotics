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


// tweaks to the styling for the login page
function my_custom_login(){ ?>
  <style type="text/css">

    body.login{
      background: rgba(0, 0, 0, 1.0) !important;
    }

    body.login div#login h1 a{
      background-image: url('https://brand.northeastern.edu/global/assets/logos/northeastern/svg/northeastern-logo.svg');
      width:315px;
      background-size: 315px 85px;
      height: 85px;
    }
    body.login #login_error, .login .message{
      border-left: 4px solid rgba(224, 39, 47, 1.0) !important;
    }
    body.login #backtoblog a, .login #nav a{
      color:rgba(255,255,255,1.0) !important;
    }
    body.login #backtoblog a:hover, .login #nav a:hover{
      color: rgba(224, 39, 47, 1.0) !important;
      text-decoration: underline;
    }
    .wp-core-ui .button-primary{
      background:rgba(224, 39, 47, 1.0) !important;
      border-color: none !important;
      border-radius: 0 !important;
      text-shadow: none !important;
      box-shadow: none !important;
      border: none;
      min-width: 100px;
    }
    body.login label{
      color:rgba(51, 62, 71, 1.0) !important;
    }

    p#backtoblog{
      display: none;
    }
  </style>
<?php }


// set the remember option to be automatically checked for easier use
function login_checked_remember_me(){
  add_filter('login_footer','rememberme_checked');
}

function rememberme_checked(){
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}


// change the url that the logo on the login page links to
function my_login_logo_url(){
  return get_bloginfo('url');
}


// change the tooltip value of the logo on the login page
function my_login_logo_url_title(){
  return get_bloginfo('name');
}


// override the default error message
function login_error_override(){
  return 'Invalid login.';
}


// remove the shake on error for the login panel
function my_login_head(){
  remove_action('login_head', 'wp_shake_js', 12);
}




add_action('login_head', 'my_custom_login');
add_filter( 'login_headerurl', 'my_login_logo_url' );
// add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter( 'login_headertext', 'my_login_logo_url_title' );
add_filter('login_errors', 'login_error_override');
add_action('login_head', 'my_login_head');
add_action( 'init', 'login_checked_remember_me' );
add_action('admin_head', 'htx_custom_logo');




//REMOVE THIS ONCE WE LAUNCH SITE
//Disable SSL verification within your testing site. You can do this by adding this line into the file
add_filter('https_ssl_verify', '__return_false');

?>
