<?php

	/**
	 * title (required): A human-readable title for the pattern.
	 * content (required): Block HTML Markup for the pattern.
	 * description (optional): A visually hidden text used to describe the pattern in the inserter. A description is optional but it is strongly encouraged when the title does not fully describe what the pattern does. The description will help users discover the pattern while searching.
	 * categories (optional): An array of registered pattern categories used to group block patterns. Block patterns can be shown on multiple categories. A category must be registered separately in order to be used here.
	 * keywords (optional): An array of aliases or keywords that help users discover the pattern while searching.
	 * viewportWidth (optional): An integer specifying the intended width of the pattern to allow for a scaled preview of the pattern in the inserter.
	 */
	register_block_pattern(
		'nublocks/stat-highlights/type-b',
		array(
			'title'       => 'Stat Highlights --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['stat-highlights'],
			'keywords'  => ['stats', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_stat_highlight\u002d\u002dis_type_b"} -->
				<div class="wp-block-group nu_pattern-is_stat_highlight--is_type_b"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>