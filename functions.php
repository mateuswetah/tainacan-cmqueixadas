<?php
/*
Plugin Name: Tainacan CMQueixadas
Plugin URI: https://tainacan.org/
Description: Suporte do Tainacan para o tema usado pelo CMQueixadas - IMPORTANTE - Não desativar
Author: wetah
Version: 0.1.0
Text Domain: tainacan-cmqueixadas
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if (! defined('WP_DEBUG') ) {
	die( 'Direct access forbidden.' );
}

/** Plugin version */
const TAINACAN_CMQUEIXADAS_VERSION = '0.1.0';

$plugin_root_url = plugin_dir_url(__FILE__);
define('TAINACAN_CMQUEIXADAS_PLUGIN_URL_PATH', $plugin_root_url);

$plugin_root_dir = plugin_dir_path(__FILE__);
define('TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH', $plugin_root_dir);

/* Basic styles and script enqueues */
require TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'inc/enqueues.php';

/* Requires several settings, functions and helpers */
require TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'inc/plugin.php';
require TAINACAN_CMQUEIXADAS_PLUGIN_DIR_PATH . 'inc/navigation.php';

