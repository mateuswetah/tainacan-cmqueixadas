<?php
/**
 * The template for displaying all single Tainacan items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BlocksyTainacan
 */

$prefix = '';

do_action( 'tainacan-cmqueixadas-single-item-top' ); 

do_action( 'tainacan-cmqueixadas-single-item-after-title' );

$page_structure_type = get_theme_mod( $prefix . '_page_structure_type', 'type-dam');
$template_columns_style = '';

if ($page_structure_type == 'type-gm' || $page_structure_type == 'type-mg') {
    $column_documents_attachments_width = 60;
    $column_metadata_width = 40;

    $column_documents_attachments_width = intval(substr(get_theme_mod( $prefix . '_document_attachments_columns', '60%'), 0, -1));
    $column_metadata_width = 100 - $column_documents_attachments_width;

    if ($page_structure_type == 'type-gm') {
        $template_columns_style = 'grid-template-columns: ' . $column_documents_attachments_width . '% calc(' . $column_metadata_width . '% - 48px)';
    } else {
        $template_columns_style = 'grid-template-columns: ' . $column_metadata_width . '% calc(' . $column_documents_attachments_width . '% - 48px)';
    }
}
?>

<div class="<?php echo 'tainacan-item-single tainacan-item-single--layout-'. $page_structure_type ?>" style="<?php echo $template_columns_style ?>">
<?php
    include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-document.php' );
    do_action( 'tainacan-cmqueixadas-single-item-after-document' );  

    include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' );
    do_action( 'tainacan-cmqueixadas-single-item-after-attachments' );
    
    include(TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-metadata.php' );
    do_action( 'tainacan-cmqueixadas-single-item-after-metadata' );
?>
</div>

<div class="tainacan-item-single">
<?php
    // Edit item button
    if ( function_exists('tainacan_the_item_edit_link') ) {
        echo '<span class="tainacan-edit-item-collection">';
            tainacan_the_item_edit_link();
        echo '</span>';
    }
?>
</div>

<?php do_action( 'tainacan-cmqueixadas-single-item-bottom' ); ?>
