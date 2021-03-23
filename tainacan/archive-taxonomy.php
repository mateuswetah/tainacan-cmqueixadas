<?php 

// Fetches current term to obtain proper image
$current_term = tainacan_get_term();
$current_taxonomy = get_taxonomy( $current_term->taxonomy );
$current_term = \Tainacan\Repositories\Terms::get_instance()->fetch($current_term->term_id, $current_term->taxonomy);
$image = $current_term->get_header_image_id();
$src = wp_get_attachment_image_src($image, 'full');

?>

<?php get_header(); ?>
    <article>

        <header class="tainacan-collection-header">
            <div class="tainacan-collection-header__box">  
                <?php 

                $thumbnail_element = '';
                $is_thumbnail_enabled = false;
                $hero_elements = [];
                
                foreach ($hero_elements as $index => $single_hero_element) {
                    if ($single_hero_element['id'] == 'custom_thumbnail') {
                        $is_thumbnail_enabled = $single_hero_element['enabled'];
                    }
                }
                if ( $is_thumbnail_enabled && $src && $src[0] ) {
                    $thumbnail_element = '
                        <div class="collection-thumbnail">
                            <img src="' . $src[0] . '">
                        </div>
                    ';
                }
                
                $elements = $thumbnail_element . ''; 
                echo $elements;
                ?>
            </div>
        </header>

        <div class="entry-content">										
            <?php 
                tainacan_the_faceted_search([
                    'is_forced_view_mode' => true,
                    'default_view_mode' => 'cards',
                    'hide_filters' => false,
                    'start_with_filters_hidden' => true,
                    'hide_hide_filters_button' => false,
                    'show_filters_button_inside_search_control' => true,
                    'filters_as_modal' => false,
                    'hide_search' => false,
                    'hide_advanced_search' => true,
                    'hide_sorting_area' => false,
                    'hide_sort_by_button' => false,
                    'hide_displayed_metadata_dropdown' => false,
                    'show_inline_view_mode_options' => false,
                    'show_fullscreen_with_view_modes' => false,
                    'hide_exposers_button' => true,
                    'hide_pagination_area' => false,
                ]); 
            ?>
        </div>
    </article>

<?php get_footer(); ?>