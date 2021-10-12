<?php 
/**
 * 
 */
// 


add_action( 'init', 'nu__register_block_pattern_categories');

add_action( 'init', 'nu__register_block_patterns');



if( !function_exists('nu__register_block_pattern_categories') ){

	function nu__register_block_pattern_categories(){
		
		$nu_pattern_categories = [
			// 
			'nu-sites' => ['label' => __('NU Sites - Safekeeping', 'nu-start')],
			// 
			'dev-helpers' => ['label' => __('Dev Helpers', 'nu-start')],
			// 
			'design-helpers' => ['label' => __('Design Helpers', 'nu-start')],
			// 
			'heroes' => ['label' => __('Heroes', 'nu-start')],
			'partners' => ['label' => __('Partners', 'nu-start')],
			// 
			'showcase-content' => ['label' => __('Showcase Content', 'nu-start')],
			// 
			'featured-items' => ['label' => __('Features', 'nu-start')],
			'stat-highlights' => ['label' => __('Stat Highlights', 'nu-start')],
			'case-studies' => ['label' => __('Case Studies', 'nu-start')],
			'testimonials' => ['label' => __('Testimonials', 'nu-start')],
			// 
			'event-templates' => ['label' => __('Event Templates', 'nu-start')],
			'person-templates' => ['label' => __('Person Templates', 'nu-start')],
			// 
			'landing-pages' => ['label' => __('Landing Pages', 'nu-start')],
			'interior-pages' => ['label' => __('Interior Pages', 'nu-start')],
			'collection-pages' => ['label' => __('Collection Pages', 'nu-start')],

		];

		foreach( $nu_pattern_categories as $category_name => $category_properties ) {
			register_block_pattern_category( $category_name, $category_properties );
		}
		
	}
}

if( !function_exists('nu__register_block_patterns') ){

	function nu__register_block_patterns( ){
	
		// 
		include_once( get_template_directory().'/block-patterns/case-studies/type-a.php' );
		// 
		include_once( get_template_directory().'/block-patterns/dev-helpers/explainer-and-1-col-posts-grid-of-pages.php' );
		include_once( get_template_directory().'/block-patterns/dev-helpers/lipsum-component-intro.php' );
		include_once( get_template_directory().'/block-patterns/dev-helpers/pattern-demo-intro.php' );
		// 
		include_once( get_template_directory().'/block-patterns/design-helpers/showcase-color-palette.php' );
		// 
		include_once( get_template_directory().'/block-patterns/event-templates/version-1.php' );
		// 
		include_once( get_template_directory().'/block-patterns/featured-items/type-a.php' );
		include_once( get_template_directory().'/block-patterns/featured-items/type-b.php' );
		include_once( get_template_directory().'/block-patterns/featured-items/type-c.php' );
		include_once( get_template_directory().'/block-patterns/featured-items/type-d.php' );
		include_once( get_template_directory().'/block-patterns/featured-items/type-e.php' );
		// 
		include_once( get_template_directory().'/block-patterns/showcase-content/events/type-a.php' );
		// 
		include_once( get_template_directory().'/block-patterns/showcase-content/people/type-a.php' );
		// 
		include_once( get_template_directory().'/block-patterns/heroes/banner-type-a.php' );
		include_once( get_template_directory().'/block-patterns/heroes/banner-type-b.php' );
		include_once( get_template_directory().'/block-patterns/heroes/banner-type-c.php' );
		// 
		include_once( get_template_directory().'/block-patterns/heroes/type-a.php' );
		include_once( get_template_directory().'/block-patterns/heroes/type-b.php' );
		include_once( get_template_directory().'/block-patterns/heroes/type-c.php' );
		include_once( get_template_directory().'/block-patterns/heroes/type-d.php' );
		include_once( get_template_directory().'/block-patterns/heroes/type-e.php' );
		// 
		include_once( get_template_directory().'/block-patterns/person-templates/version-1.php' );
		// 
		include_once( get_template_directory().'/block-patterns/stat-highlights/type-a.php' );
		include_once( get_template_directory().'/block-patterns/stat-highlights/type-b.php' );
		include_once( get_template_directory().'/block-patterns/stat-highlights/type-c.php' );
		// 
		include_once( get_template_directory().'/block-patterns/testimonials/type-a.php' );
		include_once( get_template_directory().'/block-patterns/testimonials/type-b.php' );
		
		
		// 
		include_once( get_template_directory().'/block-patterns/__nu-sites/burnes-center/burnes-hero-type-a.php' );
		// 
		include_once( get_template_directory().'/block-patterns/block-collections/landing-pages/personal-cover-photo.php' );
		include_once( get_template_directory().'/block-patterns/block-collections/landing-pages/generic-landing-page.php' );
		// 
		include_once( get_template_directory().'/block-patterns/block-collections/interior-pages/generic-post.php' );
		include_once( get_template_directory().'/block-patterns/block-collections/interior-pages/generic-with-sidebar-nav.php' );
		// 
		include_once( get_template_directory().'/block-patterns/block-collections/collection-pages/collection-layout-a.php' );
	
	}

}	


// 
?>