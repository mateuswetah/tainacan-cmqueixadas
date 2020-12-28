<?php 
    $prefix = blocksy_manager()->screen->get_prefix();
?>
<?php if ( tainacan_has_document() && get_theme_mod($prefix . '_gallery_mode', 'no') != 'yes') : ?>
    <div>
        <?php if ( get_theme_mod($prefix . '_display_section_labels', 'yes') == 'yes' && get_theme_mod($prefix . '_section_document_label', __( 'Document', 'blocksy-tainacan' )) != '' ) : ?>
            <h2 class="title-content-items" id="single-item-document-label">
                <?php echo esc_html( get_theme_mod($prefix . '_section_document_label', __( 'Document', 'blocksy-tainacan' ) ) ); ?>
            </h2>
        <?php endif; ?>
        <section class="tainacan-content single-item-collection">
            <div class="single-item-collection--document">
                <?php 
                    tainacan_the_document(); 
                    if ( get_theme_mod( $prefix . '_hide_download_button', 'no' ) == 'no' && function_exists('tainacan_the_item_document_download_link') && tainacan_the_item_document_download_link() != '' ) {
                        echo '<span class="tainacan-item-file-download">' . tainacan_the_item_document_download_link() . '</span>';
                    } 
                ?>
            </div>
        </section>
    </div>
<?php endif; ?>