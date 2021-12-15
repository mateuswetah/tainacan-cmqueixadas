<?php
/*
Plugin Name: Tainacan CFBM
Plugin URI: https://tainacan.org/
Description: Suporte do Tainacan para o tema usado pelo CFBM - IMPORTANTE - Não desativar
Author: wetah
Version: 0.0.3
Text Domain: tainacan-cfbm
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if (! defined('WP_DEBUG') ) {
	die( 'Direct access forbidden.' );
}

/** Plugin version */
const TAINACAN_CFBM_VERSION = '0.0.3';

$plugin_root_url = plugin_dir_url(__FILE__);
define('TAINACAN_CFBM_PLUGIN_URL_PATH', $plugin_root_url);

$plugin_root_dir = plugin_dir_path(__FILE__);
define('TAINACAN_CFBM_PLUGIN_DIR_PATH', $plugin_root_dir);

/* Basic styles and script enqueues */
require TAINACAN_CFBM_PLUGIN_DIR_PATH . 'inc/enqueues.php';

/* Requires several settings, functions and helpers */
require TAINACAN_CFBM_PLUGIN_DIR_PATH . 'inc/plugin.php';
require TAINACAN_CFBM_PLUGIN_DIR_PATH . 'inc/navigation.php';

