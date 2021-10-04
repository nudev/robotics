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
		'nublocks/dev-helpers/pattern-demo-intro',
		array(
			'title'       => 'Dev Helpers --- Pattern Demo Intro',
			'description' => 'Lorem description ipsum',
			'categories'  => ['dev-helpers'],
			'keywords'  => ['dev', 'dev-helpers', 'helpers', 'helper', 'nustart'],
			'content'     => '
				<!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading -->
				<h2>Feature - "Type A"</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>This pattern does (please don\'t make me write all of these)</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>