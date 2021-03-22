<?php get_header(); ?>

    <article>
        <header class="tainacan-collection-header">
            <div class="tainacan-collection-header__box">  
                <?php 
                    echo __('Todos os itens do acervo', 'tainacan-cmqueixadas');
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