<?php

/**
 * Uses Template redirect for setting the proper template to items
 * archives on Tainacan pages
 */
if ( !function_exists('tainacan_cmqueixadas_archive_templates_redirects') ) {
    function tainacan_cmqueixadas_archive_templates_redirects() {
        global $wp_query;
        
        if (is_post_type_archive()) {
            
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
            $current_post_type = get_post_type();

            if (in_array($current_post_type, $collections_post_types)) {
                
                if (is_post_type_archive()) { 			
                    include( TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'tainacan/archive-items.php' );
                    exit;
                } 
            }
        } else if ( is_tax() ) {
            $term = get_queried_object();
                
            if ( isset($term->taxonomy) && \Tainacan\Theme_Helper::get_instance()->is_taxonomy_a_tainacan_tax($term->taxonomy)) {
                $tax_id = \Tainacan\Repositories\Taxonomies::get_instance()->get_id_by_db_identifier($term->taxonomy);
                $tax = \Tainacan\Repositories\Taxonomies::get_instance()->fetch($tax_id);
                
                include( TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'tainacan/archive-taxonomy.php' );
                exit;
            }
        } else if ( $wp_query->get( 'tainacan_repository_archive' ) == 1 ) {
            
            include( TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'tainacan/archive-items.php' );
            exit;
        } else if ( is_single() && is_singular() && is_main_query() ) {
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
			$post_type = get_post_type();

			// Check if we're inside the main loop in a single Post.
			if ( in_array($post_type, $collections_post_types)  ) {
                include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'tainacan/item-single-page.php' );
                exit;
			}
        }
        
    }
}
add_action('template_redirect', 'tainacan_cmqueixadas_archive_templates_redirects');
