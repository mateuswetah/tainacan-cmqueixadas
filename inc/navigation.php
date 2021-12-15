<?php 

/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 */
if ( !function_exists('tainacan_cfbm_get_adjacent_item_links') ) {
	function tainacan_cfbm_get_adjacent_item_links() {
		
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
				$next_thumb = $adjacent_items['next']['thumbnail']['tainacan-small'][0];
			}
			if ($adjacent_items['previous']) {
				$previous_thumb = $adjacent_items['previous']['thumbnail']['tainacan-small'][0];
			}
		} else {
			//Get the thumnail url of the previous and next post
			$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'tainacan-small' );
			$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'tainacan-small' );
		}

		$previous_post_image_output = isset($previous_thumb) ? $previous_thumb : '';
		$next_post_image_output = isset($next_thumb) ? $next_thumb : '';

		// Creates the links
		$previous = $previous_link_url === false ? '' : (
			'<a 
					class="btPrevNext btPrev"
					href="'. $previous_link_url . '">
				' . (!empty($previous_post_image_output) ? ('<div class="btPrevNextImage" style="background-image:url(\'' . $previous_post_image_output  .'\');"></div>') : '') . '	
				<div class="btPrevNextItem">
					<div class="btPrevNextDir">' . __('Anterior', 'tainacan-cfbm') . '</div>
					' . (!empty( $previous_title ) ? ('<div class="btPrevNextTitle">' . $previous_title . '</div>') : '' ) . '
				</div>
			</a>');

		$next = $next_link_url === false ? '' : (
			'<a 
					class="btPrevNext btNext ' . (!empty($next_post_image_output) ? 'with-image' : '') . '"
					href="'. $next_link_url . '">
				' . (!empty($next_post_image_output) ? ('<div class="btPrevNextImage" style="background-image:url(\'' . $next_post_image_output  .'\');"></div>') : '') . '
				<div class="btPrevNextItem">
					<div class="btPrevNextDir">' . __('Próximo', 'tainacan-cfbm') . '</div>
					' . (!empty( $next_title ) ? ('<div class="btPrevNextTitle">' . $next_title . '</div>') : '' ) . '
				</div>
			</a>'
		);

		return ['next' => $next, 'previous' => $previous];
	}
}

/**
 * Outputs Tainacan custom logic for items navigation
 */
if ( !function_exists('tainacan_cfbm_item_navigation') ) {
	function tainacan_cfbm_item_navigation() {
		$next = '';
		$previous = '';
			
		$adjacent_links = [
			'next' => '',
			'previous' => ''
		];
		
		$adjacent_links = tainacan_cfbm_get_adjacent_item_links();
	
		$previous = $adjacent_links['previous'];
		$next = $adjacent_links['next'];
		
		?>
			<?php if ($previous !== '' || $next !== '') : ?>
			<section class="gutter btPrevNextNav">
				<div class="port">
					<div class="btPrevNextNav">
					<?php
						if ( $previous !== '' ) {
							echo $previous;
						}

						if ( $next !== '' ) {
							echo $next;
						}
					?>
					</div>
				</div>
			</section>
			<?php endif; ?>
		<?
	}
}
?>