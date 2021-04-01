<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();

    $title 	= get_the_title();
    $t_link = get_permalink();
	
    echo avia_title(array('heading'=>'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => ''));
	
	do_action( 'ava_after_main_title' );

?>
        <header
                id="av_section_tainacan-collection-items"
                class="avia-section main_color avia-section-default avia-no-border-styling  avia-bg-style-scroll  avia-builder-el-0  el_before_av_section avia-builder-el-first container_wrap fullsize"
                style="background-color: #b6181d; background-size: cover; background-repeat: no-repeat; background-image: url(<?php echo header_image(); ?>);background-attachment: scroll; background-position: top left;"
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
                                            <h2 style="text-align: <?php echo (!empty(tainacan_get_the_collection_description()) ? 'right' : 'left') ?>;">
                                                <a href="<?php echo tainacan_get_the_collection_url() ?>">
                                                    <?php echo tainacan_the_collection_name(); ?>
                                                </a>
                                            </h2>
                                        </div>
                                    </section>
                                </div>
                                <div class="av-flex-placeholder"></div>
                                <?php if ( !empty(tainacan_get_the_collection_description()) ): ?>
                                    <div
                                            class="flex_column av_one_half av-animated-generic right-to-left flex_column_table_cell av-equal-height-column av-align-top avia-builder-el-3 el_after_av_one_half el_before_av_hr avia_start_animation avia_start_delayed_animation"
                                            style="background: #080707; padding:20px; background-color:#080707; border-radius:0px;">
                                        <section class="av_textblock_section">
                                            <div
                                                    class="avia_textblock av_inherit_color"
                                                    style="font-size:20px;color:#ffffff;"
                                                    itemprop="text">
                                                <p><?php echo tainacan_the_collection_description(); ?></p>
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

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog template-single-blog '>

				<main
                        style="padding-top: 12px;"        
                        class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>

                    <article class=" <?php echo implode( ' ', get_post_class( 'post-entry')) ?>" <?php avia_markup_helper( array( 'context' => 'entry' ) ) ?> >

                        <div class='entry-content-wrapper clearfix {$post_format}-content'>
                            <header class="entry-content-header">
                                <?php echo "<h1 class='tainacan-item-title post-title entry-title'>" . $title . "</h1>"; ?>
                            </header>
                            <div class="entry-content" <?php avia_markup_helper( array( 'context' => 'entry_content') ) ?> >
                                <div class="tainacan-item-single tainacan-item-single--layout-type-dam">
                                <?php
                                    include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' );
                                    do_action( 'tainacan-cmqueixadas-single-item-after-attachments' );
                                    
                                    include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-metadata.php' );
                                    do_action( 'tainacan-cmqueixadas-single-item-after-metadata' );
                                ?>
                                </div>
                            </div>

                        </div>
                    
                    </article>
                </main>
                <?php tainacan_cmqueixadas_item_navigation(); ?>
            </div>
        </div>

<?php get_footer(); ?>

