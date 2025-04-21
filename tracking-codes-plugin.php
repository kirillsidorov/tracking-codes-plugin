<?php
/*
Plugin Name: Tracking Codes Plugin
Description: Add tracking codes for GA4, GTM, Facebook Ads, Google Ads, Microsoft Ads, and Ahrefs Web Analytics.
Version: 1.1
Author: Kyrylo Sidorov
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('TRACKING_CODES_PLUGIN_VERSION', '1.0');
define('TRACKING_CODES_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include necessary files
require_once TRACKING_CODES_PLUGIN_DIR . 'includes/admin-settings.php';
require_once TRACKING_CODES_PLUGIN_DIR . 'includes/tracking-scripts.php';

// Initialize plugin
function tracking_codes_plugin_init() {
    // Add admin menu
    add_action('admin_menu', 'tracking_codes_add_admin_menu');
    // Add frontend scripts
    add_action('wp_head', 'tracking_codes_insert_scripts');
}
add_action('plugins_loaded', 'tracking_codes_plugin_init');
