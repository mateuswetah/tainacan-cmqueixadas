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
        <header
                id="av_section_tainacan-taxonomy-items"
                class="avia-section main_color avia-section-default avia-no-border-styling  avia-bg-style-scroll  avia-builder-el-0  el_before_av_section avia-builder-el-first container_wrap fullsize"
                style="background-color: #b6181d;"
                data-section-bg-repeat="no-repeat">
            <div class="container">
                <div class="template-page content av-contet-full alpha units">
                    <div class="post-entry post-entry-type-page">
                        <div class="entry-content-wrapper clearfix">
                            <div class="flex_column_table av-equal-height-column-flextable-flextable">
                                <div 
                                        class="flex_column av_one_half av-animated-generic left-to-right flex_column_table_cell av-equal-height-column av-align-top av-zero-column-padding first avia-builder-el-1 el_before_av_one_half avia-builder-el-first avia_start_animation avia_start_delayed_animation"
                                        style="border-radius:0px;">
                                    <section class="av_textblock_section">
                                        <div 
                                                class="avia_textblock av_inherit_color"
                                                style="font-size:25px;color:#ffffff;"
                                                itemprop="text">
                                                <h2 style="text-align: <?php echo (!empty($current_term->get_description()) ? 'right' : 'left') ?>;">
                                                <?php echo $current_term->get_name(); ?>
                                            </h2>
                                        </div>
                                    </section>
                                </div>
                                <div class="av-flex-placeholder"></div>
                                <?php if ( !empty($current_term->get_description()) ): ?>
                                    <div
                                            class="flex_column av_one_half av-animated-generic right-to-left flex_column_table_cell av-equal-height-column av-align-top avia-builder-el-3 el_after_av_one_half el_before_av_hr avia_start_animation avia_start_delayed_animation"
                                            style="background: #080707; padding:20px; background-color:#080707; border-radius:0px;">
                                        <section class="av_textblock_section">
                                            <div
                                                    class="avia_textblock av_inherit_color"
                                                    style="font-size:20px;color:#ffffff;"
                                                    itemprop="text">
                                                <p><?php echo $current_term->get_description(); ?></p>
                                            </div>
                                        </section>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="entry-content">
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
        </main>
    </article>

<?php get_footer(); ?>