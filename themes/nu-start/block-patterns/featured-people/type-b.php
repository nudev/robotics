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
		'nublocks/featured-people/type-b',
		array(
			'title'       => 'Featured People --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['featured-people'],
			'keywords'  => ['featured-people', 'featured', 'people', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_featured_people\u002d\u002dis_type_b"} -->
				<div class="wp-block-group nu_pattern-is_featured_people--is_type_b"><!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","id":51,"sizeSlug":"medium","linkDestination":"none"} -->
				<div class="wp-block-image"><figure class="aligncenter size-medium"><img src="http://nu-start.local/wp-content/uploads/profile-placeholder-max-300x300.png" alt="" class="wp-image-51"/><figcaption>The caption</figcaption></figure></div>
				<!-- /wp:image -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Placeholder - Interaction with List to Right ???</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:acf/posts-grid {"id":"block_6116c4f588f4c","name":"acf/posts-grid","data":{"options_columns":"1","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_people","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_limit_number":"5","_autoselect_posts_limit_number":"field_60c258147cc96","autoselect_posts_limit_from":"0","_autoselect_posts_limit_from":"field_6107eb0c31b46","autoselect_posts_people_category":"","_autoselect_posts_people_category":"field_60c258747cc98","autoselect_posts_people_tags":"","_autoselect_posts_people_tags":"field_60c258887cc99","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635"},"align":"","mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /--></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>