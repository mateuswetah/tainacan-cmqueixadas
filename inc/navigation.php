<?php 

/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 */
if ( !function_exists('tainacan_cmqueixadas_get_adjacent_item_links') ) {
	function tainacan_cmqueixadas_get_adjacent_item_links() {
		
		// We use Tainacan own method for obtaining previous and next item objects
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

		$previous_post_image_output = isset($previous_thumb) ? $previous_thumb : '';
		$next_post_image_output = isset($next_thumb) ? $next_thumb : '';

		// Creates the links
		$previous = $previous_link_url === false ? '' : (
			'<a 
					class="avia-post-nav avia-post-prev ' . (!empty($previous_post_image_output) ? 'with-image' : '') . '"
					href="'. $previous_link_url . '">
				<span 
						class="label iconfont"
						aria-hidden="true"
						data-av_icon=""
						data-av_iconfont="entypo-fontello">
				</span>
				<span class="entry-info-wrap">
					<span class="entry-info">
						<span class="entry-title">' . (!empty( $previous_title ) ? $previous_title : '') .'</span>
						<span class="entry-image">
							<img 
									src="' . $previous_post_image_output . '"
									class="attachment-thumbnail size-thumbnail wp-post-image"
									alt=""
									loading="lazy"
									width="80"
									height="80">
						</span>
					</span>
				</span>
			</a>');

		$next = $next_link_url === false ? '' : (
			'<a 
					class="avia-post-nav avia-post-next ' . (!empty($next_post_image_output) ? 'with-image' : '') . '"
					href="'. $next_link_url . '">
				<span 
						class="label iconfont"
						aria-hidden="true"
						data-av_icon=""
						data-av_iconfont="entypo-fontello">
				</span>
				<span class="entry-info-wrap">
					<span class="entry-info">
						<span class="entry-image">
							<img 
									src="' . $next_post_image_output . '"
									class="attachment-thumbnail size-thumbnail wp-post-image"
									alt=""
									loading="lazy"
									width="80"
									height="80">
						</span>
						<span class="entry-title">' . (!empty( $next_title ) ? $next_title : '') .'</span>
					</span>
				</span>
			</a>'
		);

		return ['next' => $next, 'previous' => $previous];
	}
}

/**
 * Outputs Tainacan custom logic for items navigation
 */
if ( !function_exists('tainacan_cmqueixadas_item_navigation') ) {
	function tainacan_cmqueixadas_item_navigation() {
		$next = '';
		$previous = '';
			
		$adjacent_links = [
			'next' => '',
			'previous' => ''
		];
		
		$adjacent_links = tainacan_cmqueixadas_get_adjacent_item_links();
	
		$previous = $adjacent_links['previous'];
		$next = $adjacent_links['next'];
		
		?>
			<?php if ($previous !== '' || $next !== '') : ?>
			<nav class="tainacan-single-item__post-navigation">
			<?php
				if ( $previous !== '' ) {
					echo $previous;
				}

				if ( $next !== '' ) {
					echo $next;
				}
				?>
			</nav>
			<?php endif; ?>
		<?
	}
}
?>