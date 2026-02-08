<?php
/**
 * Chronevo Theme Functions
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function chronevo_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'chronevo'),
        'footer' => __('Footer Menu', 'chronevo'),
    ));
}
add_action('after_setup_theme', 'chronevo_setup');

/**
 * Add Tailwind CSS CDN to head
 */
function chronevo_add_tailwind_cdn() {
    echo '<script src="https://cdn.tailwindcss.com"></script>' . "\n";
}
add_action('wp_head', 'chronevo_add_tailwind_cdn', 1);

/**
 * Check if running on localhost
 */
function chronevo_is_localhost() {
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    $is_localhost = (
        strpos($host, 'localhost') !== false ||
        strpos($host, '127.0.0.1') !== false ||
        strpos($host, '::1') !== false ||
        strpos($host, '.local') !== false ||
        strpos($host, '.test') !== false ||
        (defined('WP_DEBUG') && WP_DEBUG)
    );
    return $is_localhost;
}

/**
 * Get cache buster version for assets (all environments)
 * Uses file modification time so each deploy/change loads fresh CSS/JS
 */
function chronevo_get_cache_buster($file_path) {
    $full_path = ABSPATH . ltrim($file_path, '/');
    if (file_exists($full_path)) {
        return (string) filemtime($full_path);
    }
    return '1.0.0';
}

/**
 * Enqueue Scripts and Styles
 */
function chronevo_scripts() {
    // Inter Font from Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap', array(), null);
    
    // Phosphor Icons
    wp_enqueue_script('phosphor-icons', 'https://unpkg.com/@phosphor-icons/web', array(), null, true);
    
    // Custom CSS (only if Tailwind fails) - from root ./assets/
    $css_version = chronevo_get_cache_buster('assets/css/main.css');
    wp_enqueue_style('chronevo-main-css', home_url('/assets/css/main.css'), array(), $css_version);
    
    // Custom JavaScript - from root ./assets/
    $js_version = chronevo_get_cache_buster('assets/js/main.js');
    wp_enqueue_script('chronevo-main-js', home_url('/assets/js/main.js'), array(), $js_version, true);
    
    // Localize script for AJAX
    wp_localize_script('chronevo-main-js', 'chronevoAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('chronevo_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'chronevo_scripts');

/**
 * Remove Admin Bar from Front-End
 */
function chronevo_remove_admin_bar() {
    if (!is_admin()) {
        show_admin_bar(false);
    }
}
add_filter('show_admin_bar', '__return_false');
add_action('init', 'chronevo_remove_admin_bar');

/**
 * Register AJAX handlers
 */
function chronevo_register_ajax_handlers() {
    // Example AJAX handler structure
    // Add specific handlers as needed
}
add_action('init', 'chronevo_register_ajax_handlers');
