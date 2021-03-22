<?php get_header(); ?>
    <article>
        <header 
            class="tainacan-collection-header" 
            style="background-image: 
                <?php if ( get_header_image() ) { 
                    echo 'url(' . get_header_image() . ')'; 
                } else { 
                    echo ''; 
                } ?>"
        >
            <div class="tainacan-collection-header__box">  
                <?php 

                    $thumbnail_element = '';
                    $description_element = '';

                    $is_thumbnail_enabled = false;
                    $is_description_enabled = false;

                    $hero_elements = [];
                    foreach ($hero_elements as $index => $single_hero_element) {
                        if ($single_hero_element['id'] == 'custom_thumbnail' && $single_hero_element['enabled'] && has_post_thumbnail( tainacan_get_collection_id() )) {
                            $thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                            $thumbnail_element = '
                            <div class="collection-thumbnail">
                                <img src="' . get_the_post_thumbnail_url( tainacan_get_collection_id() ) . '" alt="' . esc_attr($alt) . '">
                            </div>
                            ';
                        } else if ($single_hero_element['id'] == 'custom_description' && $single_hero_element['enabled'] && get_the_archive_description()) {
                            $description_class = 'page-description';
                            $description_class .= '';
                            $description_element = '<div class="' . $description_class . '">' . get_the_archive_description() . '</div>';
                        }
                    }

                    $elements = 
                        $thumbnail_element . 
                        '' . 
                        $description_element;
                        
                    echo $elements;
                    
                ?>
            </div>
        </header>

        <div class="entry-content">
            <?php 
                tainacan_the_faceted_search([
                    'is_forced_view_mode' => false,
                    'default_view_mode' => 'cards',
                    'hide_filters' => false,
                    'start_with_filters_hidden' => true,
                    'hide_hide_filters_button' => false,
                    'show_filters_button_inside_search_control' => true,
                    'filters_as_modal' => false,
                    'hide_search' => false,
                    'hide_advanced_search' => false,
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