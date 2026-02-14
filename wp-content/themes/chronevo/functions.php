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

/**
 * Generate a random base62 string (0-9, a-z, A-Z).
 *
 * @param int $length Length of the string.
 * @return string
 */
function chronevo_random_base62($length = 16) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[random_int(0, $max)];
    }
    return $result;
}

/**
 * Allowed media upload extensions (forced for all uploads).
 */
function chronevo_allowed_upload_extensions() {
    return array('jpg', 'png', 'gif', 'mp4', 'mp3', 'mov');
}

/**
 * Normalize extension to an allowed one (e.g. jpeg -> jpg).
 *
 * @param string $ext Original extension.
 * @return string|null Normalized extension or null if not allowed.
 */
function chronevo_normalize_upload_extension($ext) {
    $ext = strtolower(ltrim($ext, '.'));
    $allowed = chronevo_allowed_upload_extensions();
    if (in_array($ext, $allowed, true)) {
        return $ext;
    }
    if ($ext === 'jpeg' || $ext === 'jpe') {
        return 'jpg';
    }
    return null;
}

/**
 * Rename upload to random_base62(16).{ext} and enforce allowed extensions only.
 *
 * @param array $file Reference to single element from $_FILES.
 * @return array
 */
function chronevo_upload_prefilter($file) {
    if (empty($file['name']) || isset($file['error']) && $file['error'] !== UPLOAD_ERR_OK) {
        return $file;
    }
    $name = $file['name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $normalized = chronevo_normalize_upload_extension($ext);
    if ($normalized === null) {
        $file['error'] = __('Only these file types are allowed: jpg, png, gif, mp4, mp3, mov.', 'chronevo');
        return $file;
    }
    $file['name'] = chronevo_random_base62(16) . '.' . $normalized;
    return $file;
}

add_filter('wp_handle_upload_prefilter', 'chronevo_upload_prefilter');
add_filter('wp_handle_sideload_prefilter', 'chronevo_upload_prefilter');

/**
 * Restrict upload MIME types to allowed extensions only (by force for all media uploads).
 *
 * @param array $mimes Existing mimes.
 * @return array
 */
function chronevo_restrict_upload_mimes($mimes) {
    return array(
        'jpg|jpeg' => 'image/jpeg',
        'png'      => 'image/png',
        'gif'      => 'image/gif',
        'mp4'      => 'video/mp4',
        'mp3'      => 'audio/mpeg',
        'mov'      => 'video/quicktime',
    );
}

add_filter('upload_mimes', 'chronevo_restrict_upload_mimes', 999);

/**
 * Completely disable the WordPress comment system.
 * - Removes comment/trackback support from all post types.
 * - Closes comments and pings on the front-end.
 * - Hides existing comments from display.
 * - Removes Comments from admin menu and admin bar.
 * - Redirects comment feed and blocks comment page access in admin.
 */
function chronevo_disable_comment_support() {
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'chronevo_disable_comment_support', 1);

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

function chronevo_remove_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'chronevo_remove_comments_admin_menu');

function chronevo_remove_comments_admin_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'chronevo_remove_comments_admin_bar', 999);

function chronevo_redirect_comments_admin_page() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'chronevo_redirect_comments_admin_page', 1);

function chronevo_remove_dashboard_recent_comments() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'chronevo_remove_dashboard_recent_comments');

function chronevo_disable_comment_feed() {
    if (is_comment_feed()) {
        wp_redirect(home_url(), 302);
        exit;
    }
}
add_action('template_redirect', 'chronevo_disable_comment_feed', 9);

/**
 * Completely disable the WordPress revision system.
 * - Prevents new revisions from being saved for any post type.
 * - Uses wp_revisions_to_keep filter (0 = keep no revisions).
 */
function chronevo_disable_revisions($num, $post) {
    return 0;
}
add_filter('wp_revisions_to_keep', 'chronevo_disable_revisions', 10, 2);
