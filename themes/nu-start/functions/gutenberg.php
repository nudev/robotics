<?php
/* 

*/

// register our acf blocks
include_once( get_template_directory() . '/acf-blocks/register-acf-blocks.php' );

// register our block styles (core+custom)
include_once( get_template_directory() . '/block-styles/register-block-styles.php' );

// register our block patterns
include_once( get_template_directory() . '/block-patterns/register-block-patterns.php' );


// add/remove block categories
add_filter( 'block_categories_all', 'nu__manage_block_categories', 10, 2 );
if( !function_exists('nu__manage_block_categories') ){
	function nu__manage_block_categories( $block_categories, $block_editor_context  ) {
	
		// create the nu-blocks category
		return array_merge(
			$block_categories,
			array(
				array(
					'slug' => 'nu-blocks',
					'title' => __( 'NU Blocks', 'nu-start' ),
					'icon'  => 'f131',
				),
				array(
					'slug' => 'nublocks',
					'title' => __( 'NU Blocks Plugin', 'nublocks' ),
					'icon'  => 'f131',
				),
			)
		);
	}
}





// restrict allowed blocks for certain post types
// add_filter('allowed_block_types_all', 'nu__manage_allowed_blocks', 10, 2);

// add reusable blocks to the main menu
add_action( 'admin_menu', 'nu__reusable_blocks_in_admin_menu' );

// ? really big hammer for adjusting blocks w/o recovery error in cms
// add_filter( 'render_block', 'nu__customize_rendering_blocks', 10, 2 );

/**
 * Registers all block patterns, initially referencing kernl-ui
 *
 * @return void
 */


function nu__customize_rendering_blocks( $block_content, $block ) {

    if ( $block['blockName'] === 'core/columns' ) {


		error_log(print_r($block, true));
		
    }


    return $block_content;
}

if( !function_exists( 'nu__register_block_types' ) ){
	function nu__manage_allowed_blocks($allowed_block_types, $block_editor_context) {

		// ? restrict allowed blocks on the faces post type
		if( isset($block_editor_context->post->ID) && $block_editor_context->post->post_type === "nu_faces" ){
			$allowed_block_types = [
				'core/block',
				'core/cover',
				'core/buttons',
				'core/button',
				'core/columns',
				'core/column',
				'core/paragraph',
				'core/heading',
				'core/image',
				'acf/breadcrumbs',
			];
		}

		// ? restrict allowed blocks on the faces post type
		if( isset($block_editor_context->post->ID) && $block_editor_context->post->post_type === "page" ){
			$allowed_block_types = [
				'core/block',
				'core/cover',
				'core/buttons',
				'core/button',
				'core/columns',
				'core/column',
				'core/row',
				'core/paragraph',
				'core/heading',
				'core/image',
				'core/gallery',
				'core/cover',
				'core/media-text',
				'core/video',
				'core/video',
				'core/list',
				'core/quote',
				'core/post-title',
				'core/group',
				'core/pullquote',
				'core/table',
				'core/embed',
				'core/wpforms',
				'eedee/block-gutenslider',
				'acf/breadcrumbs',
				'acf/carousel',
				'acf/nav-menu',
				'acf/posts-grid',
				'acf/datetime-range',
				'acf/breadcrumbs',
			];
		}


		return $allowed_block_types;
		
	}
}













/**
 * 		this function is registered as the enqueue_assets callback for the carousel block
 */
if( !function_exists('nu__enqueueCarouselAssets') ){
	function nu__enqueueCarouselAssets(){
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick-theme-min.css' );
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick.css' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick.js', array('jquery'), '', true );
		wp_enqueue_script( 'carousel-editor', get_template_directory_uri() . '/acf-blocks/carousel/carousel-editor-min.js', array('jquery'), '', true );
	}
}

/**
 *
 *		Add the "Manage Reusable Blocks" page to the main menu
 *
 */
if( !function_exists('nu__reusable_blocks_in_admin_menu') ){
	function nu__reusable_blocks_in_admin_menu() {
	
		add_menu_page(
			'Reusable Blocks',
			'Reusable Blocks',
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-editor-table',
			'3.1'
		);
	
	}
}



// 
?>