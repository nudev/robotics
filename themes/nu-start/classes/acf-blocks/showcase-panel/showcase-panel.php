<?php

if( function_exists('acf_register_block_type') ):

	acf_register_block_type(array(
		'name' => 'showcase-panel',
		'title' => 'Showcase Panel',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory().'/acf-blocks/showcase-panel/showcase-panel.php',
		'render_callback' => '',
		'enqueue_style' => '',
		'enqueue_script' => '',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => true,
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));

	acf_register_block_type(array(
		'name' => 'showcase-panel-item',
		'title' => 'Showcase Panel Item',
		'description' => '',
		'category' => 'nu-blocks',
		'parent' => 'acf/showcase-panel',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory().'/acf-blocks/showcase-panel/showcase-panel-item.php',
		'render_callback' => '',
		'enqueue_style' => '',
		'enqueue_script' => '',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => true,
			'inserter' => false,
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));
	
	endif;

?>