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

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog template-single-blog '>

				<main class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>

                    <article class=" <?php echo implode( ' ', get_post_class( 'post-entry')) ?>" <?php avia_markup_helper( array( 'context' => 'entry' ) ) ?> >
		
                        <div class='entry-content-wrapper clearfix {$post_format}-content'>
                            <header class="entry-content-header">
                                <?php echo "<h1 class='post-title entry-title'>" . $title . "</h1>"; ?>
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
            </div>
        </div>

<?php get_footer(); ?>

