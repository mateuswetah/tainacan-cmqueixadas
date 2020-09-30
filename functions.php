<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

/** Theme version */
const BLOCKSY_TAINACAN_VERSION = '0.0.1';

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'blocksy-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'tainacan-blocksy-style',
		get_stylesheet_directory_uri() . '/style.min.css',
		array( 'blocksy-parent-style' )
	);
});

/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 */
function blocksy_tainacan_get_adjacent_item_links() {

    $has_thumb = get_theme_mod($prefix . '_has_post_nav_thumb', 'yes') === 'yes';

	if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
		$adjacent_items = tainacan_get_adjacent_items();

		if (isset($adjacent_items['next'])) {
			$next_link_url = $adjacent_items['next']['url'];
			$next_title = $adjacent_items['next']['title'];
		} else {
			$next_link_url = false;
		}
		if (isset($adjacent_items['previous'])) {
			$previous_link_url = $adjacent_items['previous']['url'];
			$previous_title = $adjacent_items['previous']['title'];
		} else {
			$previous_link_url = false;
		}

	} else {
		//Get the links to the Previous and Next Post
		$previous_link_url = get_permalink( get_previous_post() );
		$next_link_url = get_permalink( get_next_post() );

		//Get the title of the previous post and next post
		$previous_title = get_the_title( get_previous_post() );
		$next_title = get_the_title( get_next_post() );
	}

	$previous = '';
	$next = '';

	if ($has_thumb) {

		if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
			if ($adjacent_items['next']) {
				$next_thumb = $adjacent_items['next']['thumbnail']['tainacan-medium'][0];
			}
			if ($adjacent_items['previous']) {
				$previous_thumb = $adjacent_items['previous']['thumbnail']['tainacan-medium'][0];
			}
		} else {
			//Get the thumnail url of the previous and next post
			$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'tainacan-medium' );
			$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'tainacan-medium' );
		}

		$previous_post_image_output = blocksy_simple_image(
			$previous_thumb,
			[
				'inner_content' => '<svg width="20px" height="15px" viewBox="0 0 20 15"><polygon points="0,7.5 5.5,13 6.4,12.1 2.4,8.1 20,8.1 20,6.9 2.4,6.9 6.4,2.9 5.5,2 "/></svg>',
				'ratio' => '1/1',
				'tag_name' => 'figure'
			]
		);

		$next_post_image_output = blocksy_simple_image(
			$next_thumb,
			[
				'inner_content' => '<svg width="20px" height="15px" viewBox="0 0 20 15"><polygon points="14.5,2 13.6,2.9 17.6,6.9 0,6.9 0,8.1 17.6,8.1 13.6,12.1 14.5,13 20,7.5 "/></svg>',
				'ratio' => '1/1',
				'tag_name' => 'figure'
			]
		);
			
	} else {
		$previous = $previous_link_url === false ? '' : '<a rel="prev" href="' . $previous_link_url . '"><i class="tainacan-icon tainacan-icon-arrowleft tainacan-icon-30px"></i>&nbsp; <span>' . $previous_title . '</span></a>';
		$next = $next_link_url === false ? '' :'<a rel="next" href="' . $next_link_url . '"><span>' . $next_title . '</span> &nbsp;<i class="tainacan-icon tainacan-icon-arrowright tainacan-icon-30px"></i></a>';
	}

	// Creates the links
	$previous = $previous_link_url === false ? '' : (
		'<a href="' . $previous_link_url .'" rel="prev" class="nav-item-prev"> ' .
			($has_thumb ? $previous_post_image_output : '') .
			'<div class="item-content">' .
				'<span class="item-label">' . __( 'Previous item', 'blocksy-tainacan' )	. '</span>' .
				(!empty( $previous_title ) ? ('<span class="item-title">' . $previous_title . '</span>') : '') .
			'</div>'.
		'</a>');

	$next = $next_link_url === false ? '' : (
		'<a href="' . $next_link_url .'" rel="prev" class="nav-item-next"> ' .
			'<div class="item-content">' .
				'<span class="item-label">' . __( 'Next item', 'blocksy-tainacan') . '</span>' .
				(!empty( $next_title ) ? ('<span class="item-title">' . $next_title . '</span>') : '') .
			'</div>' .
			($has_thumb ? $next_post_image_output : '') .
		'</a>');

	return ['next' => $next, 'previous' => $previous];
}

/**
 * Retrieves the current items list source link
 */
function blocksy_tainacan_get_source_item_list_url() {
	$args = $_GET;
	if (isset($args['ref'])) {
		$ref = $_GET['ref'];
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return $ref . '?' . http_build_query(array_merge($args));
	} else {
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return tainacan_the_collection_url() . '?' . http_build_query(array_merge($args));
	}
}

/**
 * Adds extra customizer options to items single page template
 */
function blocksy_tainacan_custom_post_types_single_options( $options, $post_type, $post_type_object ) {

	if ( defined ('TAINACAN_VERSION') ) {
		$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();

		if ( in_array($post_type, $collections_post_types) ) {
			
			$options['title'] = sprintf(
				__('Item from %s', 'blocksy-tainacan'),
				$post_type_object->labels->name
			);

			$item_extra_options = blocksy_get_options(get_stylesheet_directory() . '/inc/options/posts/tainacan-item-single.php', [
				'post_type' => $post_type_object,
				'is_general_cpt' => true
			], false);

			if ( is_array($item_extra_options) ) {
				$options['options'][$post_type . '_single_section_options']['inner-options'] = array_merge(
					$options['options'][$post_type . '_single_section_options']['inner-options'],
					$item_extra_options
				);
			}
		}
			
	}

    return $options;
}
add_filter( 'blocksy:custom_post_types:single-options', 'blocksy_tainacan_custom_post_types_single_options', 10, 3 );

/**
 * Removes tainacan metadatum and filters from the custom metadata options in the customizer controller.
 */
function blocksy_tainacan_custom_post_types_supported_list( $potential_post_types ) {
	
	if ( defined ('TAINACAN_VERSION') ) {
		return array_filter( $potential_post_types, function($post_type) {
			return !in_array($post_type, [ 'tainacan-metadatum', 'tainacan-filter' ]);
		});
	}
	return $potential_post_types;
}
add_filter( 'blocksy:custom_post_types:supported_list', 'blocksy_tainacan_custom_post_types_supported_list', 10 );


/**
 * Enqueues js scripts related to swiper, only if in TainacanSingleItem pages
 */
function blocksy_tainacan_swiper_scripts() {
	if ( defined ('TAINACAN_VERSION') ) {
		$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
		$post_type = get_post_type();

		if ( in_array($post_type, $collections_post_types) ) {
			wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), BLOCKSY_TAINACAN_VERSION );
			wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), BLOCKSY_TAINACAN_VERSION, true );	
			wp_enqueue_script( 'blocksy-tainacan-scripts', get_stylesheet_directory_uri() . '/js/attachments-carousel.js', ['swiper'], BLOCKSY_TAINACAN_VERSION, true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'blocksy_tainacan_swiper_scripts' );
