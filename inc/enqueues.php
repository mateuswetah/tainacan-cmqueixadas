<?php

/**
 * Enqueues styles and scripts
 * Some JS files here are only necessary for Tainacan Item pages
 */ 
function tainacan_cfbm_enqueue_scripts() {
	
	// Enqueues this plugin styles
	wp_enqueue_style( 'tainacan-cfbm-style',
		TAINACAN_CFBM_PLUGIN_URL_PATH . '/style.min.css',
		array(),
		TAINACAN_CFBM_VERSION
	);

	// This should only happen if we have Tainacan plugin installed
	if ( defined ('TAINACAN_VERSION') ) {
		$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
		$post_type = get_post_type();

		wp_enqueue_script( 'tainacan-cfbm-scripts', TAINACAN_CFBM_PLUGIN_URL_PATH . '/js/scripts.js', array(), TAINACAN_CFBM_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'tainacan_cfbm_enqueue_scripts' );

?>