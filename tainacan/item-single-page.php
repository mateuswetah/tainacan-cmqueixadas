<?php
	if ( !defined('ABSPATH') ){ die(); }

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();

?>

<article class="btPostSingleItemStandard gutter noPhoto post-<?php echo get_the_ID() ?> post type-post format-standard has-post-thumbnail hentry">
    <div class="entry-content" ?>
        <div class="port">
            <div class="btPostContentHolder">
                <div class="btArticleContent">
                    <div class="bt_bb_wrapper">
                        <?php
                            include(TAINACAN_CFBM_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' );
                            do_action( 'tainacan-cfbm-single-item-after-attachments' );
                            include(TAINACAN_CFBM_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-metadata.php' );
                            do_action( 'tainacan-cfbm-single-item-after-metadata' );
                        ?>
                    </div>
                </div>
                <div class="btArticleShareEtc">
                    <div class="btShareColumn">
                        <div class="bt_bb_icon btIcoFacebook bt_bb_style_filled bt_bb_size_xsmall bt_bb_shape_circle">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://cfbm.gov.br/outubro-rosa-a-nossa-saude-e-imprescindivel-e-inadiavel-cuidem-se/" target="_self" title="Share on Facebook" data-ico-fa="" class="bt_bb_icon_holder"></a>
                        </div>
                        <div class="bt_bb_icon btIcoTwitter bt_bb_style_filled bt_bb_size_xsmall bt_bb_shape_circle">
                            <a href="https://twitter.com/intent/tweet?text=https://cfbm.gov.br/outubro-rosa-a-nossa-saude-e-imprescindivel-e-inadiavel-cuidem-se/" target="_self" title="Share on Twitter" data-ico-fa="" class="bt_bb_icon_holder"></a>
                        </div>
                        <div class="bt_bb_icon btIcoLinkedin bt_bb_style_filled bt_bb_size_xsmall bt_bb_shape_circle">
                            <a href="https://www.linkedin.com/shareArticle?url=https://cfbm.gov.br/outubro-rosa-a-nossa-saude-e-imprescindivel-e-inadiavel-cuidem-se/" target="_self" title="Share on Linkedin" data-ico-fa="" class="bt_bb_icon_holder"></a>
                        </div>
                        <div class="bt_bb_icon btIcoWhatsApp bt_bb_style_filled bt_bb_size_xsmall bt_bb_shape_circle">
                            <a href="https://api.whatsapp.com/send?text=https://cfbm.gov.br/outubro-rosa-a-nossa-saude-e-imprescindivel-e-inadiavel-cuidem-se/" target="_self" title="Share on WhatsApp" data-ico-fa="" class="bt_bb_icon_holder"></a>
                        </div>
                    </div><!-- /btShareColumn -->
                </div>
            </div>
        </div>
    </div>
</article>

<?php tainacan_cfbm_item_navigation(); ?>

<?php get_footer(); ?>

