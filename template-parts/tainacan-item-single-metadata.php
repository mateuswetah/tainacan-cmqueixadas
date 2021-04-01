<section class="tainacan-item-section tainacan-item-section--metadata">
    <!-- <h2 class="tainacan-single-item-section" id="tainacan-item-metadata-label">
        <!-- <?php echo __( 'Informações', 'tainacan-cmqueixadas' ); ?> -->
    <!-- </h2> -->
    <div class="tainacan-item-section__metadata">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="tainacan-item-section__metadata-thumbnail">
                <h3 class="tainacan-metadata-label"><?php _e( 'Miniatura', 'tainacan-cmqueixadas' ); ?></h3>
                <p class="tainacan-metadata-value"><?php the_post_thumbnail('tainacan-medium-full'); ?></p>
            </div>
        <?php endif; ?>
        <?php do_action( 'tainacan-cmqueixadas-single-item-metadata-begin' ); ?>
        <?php
            $args = array(
                'display_slug_as_class' => true,
                'before_title' => '<h3 class="tainacan-metadata-label">',
                'after_title' => '</h3>',
                'before_value' => '<p class="tainacan-metadata-value">',
                'after_value' => '</p>',
                'exclude_title' => true
            );
            tainacan_the_metadata( $args );
        ?>
        <?php do_action( 'tainacan-cmqueixadas-single-item-metadata-end' ); ?>
    </div>
</section>
