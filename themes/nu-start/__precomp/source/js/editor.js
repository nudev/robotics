/* 

*/

// todo: update this stuff to above syntax; but fix linting first?
// ? this is all es5 native quick work
wp.domReady(function () {
	wp.blocks.unregisterBlockStyle("core/pullquote", "solid-color");
	wp.blocks.unregisterBlockStyle("core/quote", "large");
	wp.blocks.unregisterBlockType("bcn/breadcrumb-trail");

	// * disable certain core blocks
	wp.blocks.unregisterBlockType("core/verse");
	wp.blocks.unregisterBlockType("core/freeform");
	wp.blocks.unregisterBlockType("core/html");
	wp.blocks.unregisterBlockType("core/code");
	wp.blocks.unregisterBlockType("core/preformatted");
	// ? media category
	wp.blocks.unregisterBlockType("core/file");
	wp.blocks.unregisterBlockType("core/audio");

	// ? embed has an index file here to disable all
	var embed_variations = [
		"amazon-kindle",
		"animoto",
		"cloudup",
		"collegehumor",
		"crowdsignal",
		"dailymotion",
		"facebook",
		"flickr",
		"imgur",
		"instagram",
		"issuu",
		"kickstarter",
		"meetup-com",
		"mixcloud",
		"reddit",
		"reverbnation",
		"screencast",
		"scribd",
		"slideshare",
		"smugmug",
		"soundcloud",
		"speaker-deck",
		"spotify",
		"ted",
		"tiktok",
		"tumblr",
		"twitter",
		"videopress",
		//'vimeo'
		"wordpress",
		"wordpress-tv",
		//'youtube'
	];

	for (var i = embed_variations.length - 1; i >= 0; i--) {
		wp.blocks.unregisterBlockVariation("core/embed", embed_variations[i]);
	}

	// ? widgets do NOT have that index and are listed below
	wp.blocks.unregisterBlockType("core/archives");
	wp.blocks.unregisterBlockType("core/latest-comments");
	wp.blocks.unregisterBlockType("core/latest-posts");
	wp.blocks.unregisterBlockType("core/categories");
	wp.blocks.unregisterBlockType("core/rss");
	wp.blocks.unregisterBlockType("core/calendar");
	wp.blocks.unregisterBlockType("core/tag-cloud");
	wp.blocks.unregisterBlockType("core/search");

});
