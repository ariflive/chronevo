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
 * Reference-only class name: ref-{page}-{section}-{element}-{name}[-{uid}]
 * Per README: identification only; do not use for CSS or JS selectors.
 *
 * @param string       $page    Page slug, e.g. home (front) or inner (other routes).
 * @param string       $section Logical block, e.g. hero, header, shell.
 * @param string       $element HTML element: section, div, span, a, img, i, button, nav, p, h1, etc.
 * @param string       $name    Semantic name within the block.
 * @param string|int   $uid     Optional suffix for loops/listings (menu item ID, post ID, index).
 */
function chronevo_ref_class($page, $section, $element, $name, $uid = '') {
    $segments = array('ref', $page, $section, $element, $name);
    $base = implode('-', array_map('sanitize_html_class', $segments));
    if ($uid !== '' && $uid !== null) {
        $base .= '-' . sanitize_html_class((string) $uid);
    }
    return $base;
}

/**
 * Page slug for shared templates: home on front page, inner elsewhere.
 */
function chronevo_ref_page() {
    return is_front_page() ? 'home' : 'inner';
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
        'contactAction' => 'chronevo_contact',
        'contactSending' => __('Sending…', 'chronevo'),
        'contactSuccess' => __('Thank you. Your message has been sent.', 'chronevo'),
        'contactError' => __('Something went wrong. Please try again.', 'chronevo'),
        'contactErrorNetwork' => __('Network error. Please check your connection.', 'chronevo'),
        'contactErrorRate' => __('Too many requests. Please try again later.', 'chronevo'),
        'contactFeedbackSuccessTitle' => __('Message sent', 'chronevo'),
        'contactFeedbackErrorTitle' => __('Could not send', 'chronevo'),
    ));
}
add_action('wp_enqueue_scripts', 'chronevo_scripts');

/**
 * Google Analytics 4 (gtag.js) — public front-end only.
 * Uses wp_enqueue_script + async strategy + wp_add_inline_script (WordPress script API).
 *
 * Filter `chronevo_ga4_measurement_id` to change or empty-disable the tag (e.g. per environment).
 */
function chronevo_enqueue_ga4_gtag() {
    if (is_admin()) {
        return;
    }
    $measurement_id = apply_filters('chronevo_ga4_measurement_id', 'G-0P2STRT581');
    if (!is_string($measurement_id) || '' === trim($measurement_id)) {
        return;
    }
    $handle = 'chronevo-google-gtag';
    $src = 'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode($measurement_id);

    wp_register_script($handle, $src, array(), null, false);
    if (version_compare(get_bloginfo('version'), '6.3', '>=')) {
        wp_script_add_data($handle, 'strategy', 'async');
    }
    wp_enqueue_script($handle);

    $inline = sprintf(
        'window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("js",new Date());gtag("config",%s);',
        wp_json_encode($measurement_id, JSON_UNESCAPED_UNICODE)
    );
    wp_add_inline_script($handle, $inline, 'after');
}
add_action('wp_enqueue_scripts', 'chronevo_enqueue_ga4_gtag', 1);

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
    add_action('wp_ajax_chronevo_contact', 'chronevo_ajax_contact');
    add_action('wp_ajax_nopriv_chronevo_contact', 'chronevo_ajax_contact');
}
add_action('init', 'chronevo_register_ajax_handlers');

/**
 * Build HTML body for contact enquiry notification (admin).
 *
 * @param string $name     Sanitized name.
 * @param string $email    Sanitized email.
 * @param string $subject  Sanitized subject (may be empty).
 * @param string $message  Sanitized message.
 * @param string $submitted_gmt Submitted datetime string (UTC).
 * @param string $ip       Sanitized IP or empty.
 * @return string
 */
function chronevo_contact_enquiry_html($name, $email, $subject, $message, $submitted_gmt, $ip) {
    $subject_line = $subject !== '' ? $subject : __('(No subject line)', 'chronevo');
    $rows = array(
        array(__('Name', 'chronevo'), $name),
        array(__('Email', 'chronevo'), $email),
        array(__('Subject', 'chronevo'), $subject_line),
    );
    $row_html = '';
    foreach ($rows as $row) {
        $row_html .= '<tr><td style="padding:10px 16px;border-bottom:1px solid #E1E2E4;color:#7A7C80;font-size:13px;width:140px;vertical-align:top;font-family:Inter,Helvetica Neue,Arial,sans-serif;">'
            . esc_html($row[0]) . '</td><td style="padding:10px 16px;border-bottom:1px solid #E1E2E4;color:#4F5053;font-size:15px;vertical-align:top;font-family:Inter,Helvetica Neue,Arial,sans-serif;">'
            . esc_html($row[1]) . '</td></tr>';
    }
    $message_block = nl2br(esc_html($message), false);
    $meta_parts = array(__('Submitted (UTC)', 'chronevo') . ': ' . $submitted_gmt);
    if ($ip !== '') {
        $meta_parts[] = __('IP', 'chronevo') . ': ' . $ip;
    }
    $meta = esc_html(implode(' · ', $meta_parts));

    return '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>'
        . esc_html__('Website enquiry', 'chronevo')
        . '</title></head><body style="margin:0;padding:0;background-color:#F6F7F8;">'
        . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#F6F7F8;padding:24px 16px;">'
        . '<tr><td align="center">'
        . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:560px;background-color:#ffffff;border:1px solid #E1E2E4;border-radius:2px;overflow:hidden;">'
        . '<tr><td style="height:4px;background-color:#DCAF47;line-height:4px;font-size:0;">&nbsp;</td></tr>'
        . '<tr><td style="padding:24px 24px 8px;font-family:Inter,Helvetica Neue,Arial,sans-serif;">'
        . '<p style="margin:0 0 4px;font-size:11px;letter-spacing:0.12em;text-transform:uppercase;color:#7A7C80;">' . esc_html__('Chronevo', 'chronevo') . '</p>'
        . '<h1 style="margin:0;font-size:22px;font-weight:600;color:#4F5053;line-height:1.3;">' . esc_html__('New website enquiry', 'chronevo') . '</h1>'
        . '</td></tr>'
        . '<tr><td style="padding:0 8px 8px;"><table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;">'
        . $row_html
        . '</table></td></tr>'
        . '<tr><td style="padding:8px 24px 24px;font-family:Inter,Helvetica Neue,Arial,sans-serif;">'
        . '<p style="margin:0 0 8px;font-size:13px;font-weight:600;color:#4F5053;">' . esc_html__('Message', 'chronevo') . '</p>'
        . '<div style="background-color:#F6F7F8;border:1px solid #E1E2E4;border-radius:2px;padding:16px;font-size:15px;line-height:1.6;color:#4F5053;">' . $message_block . '</div>'
        . '<p style="margin:16px 0 0;font-size:12px;line-height:1.5;color:#7A7C80;">' . $meta . '</p>'
        . '</td></tr></table></td></tr></table></body></html>';
}

/**
 * Contact form: validate input and email enquiry to site admin.
 */
function chronevo_ajax_contact() {
    check_ajax_referer('chronevo_nonce', 'nonce');

    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '';
    $ip_hash = md5($ip !== '' ? $ip : 'unknown');
    $hammer_key = 'chronevo_contact_hammer_' . $ip_hash;
    $hammer = (int) get_transient($hammer_key);
    if ($hammer >= 30) {
        wp_send_json_error(
            array('message' => __('Too many requests. Please try again later.', 'chronevo')),
            429
        );
    }
    set_transient($hammer_key, $hammer + 1, 10 * MINUTE_IN_SECONDS);

    $name = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email_raw = isset($_POST['contact_email']) ? wp_unslash($_POST['contact_email']) : '';
    $email = sanitize_email($email_raw);
    $subject = isset($_POST['contact_subject']) ? sanitize_text_field(wp_unslash($_POST['contact_subject'])) : '';
    $message = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';

    if ($name === '' || mb_strlen($name) > 200) {
        wp_send_json_error(array('message' => __('Please enter your name (max 200 characters).', 'chronevo')));
    }
    if ($email === '' || ! is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'chronevo')));
    }
    if (mb_strlen($subject) > 300) {
        wp_send_json_error(array('message' => __('Subject is too long.', 'chronevo')));
    }
    if ($message === '' || mb_strlen($message) > 10000) {
        wp_send_json_error(array('message' => __('Please enter a message (max 10,000 characters).', 'chronevo')));
    }

    $sent_key = 'chronevo_contact_sent_' . $ip_hash;
    $sent_count = (int) get_transient($sent_key);
    if ($sent_count >= 5) {
        wp_send_json_error(
            array('message' => __('Too many messages sent. Please try again later.', 'chronevo')),
            429
        );
    }

    $recipient = apply_filters('chronevo_contact_enquiry_recipient', 'james@chronevo.com');
    if (! is_string($recipient) || ! is_email($recipient)) {
        $recipient = 'james@chronevo.com';
    }

    $site_name = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);
    $email_subject = '[' . $site_name . '] ';
    $email_subject .= $subject !== '' ? $subject : __('Website enquiry', 'chronevo');
    $email_subject = wp_strip_all_tags($email_subject);
    if (function_exists('mb_substr')) {
        $email_subject = mb_substr($email_subject, 0, 200);
    } else {
        $email_subject = substr($email_subject, 0, 200);
    }

    $submitted_gmt = gmdate('Y-m-d H:i:s') . ' UTC';
    $body = chronevo_contact_enquiry_html($name, $email, $subject, $message, $submitted_gmt, $ip);

    $from = apply_filters('chronevo_contact_mail_from', 'Chronevo <james@chronevo.com>');
    if (! is_string($from) || '' === trim($from)) {
        $from = 'Chronevo <james@chronevo.com>';
    }

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $from,
        'Reply-To: ' . $email,
    );

    $sent = wp_mail($recipient, $email_subject, $body, $headers);

    if (! $sent) {
        wp_send_json_error(array('message' => __('Could not send your message. Please try again later.', 'chronevo')));
    }

    set_transient($sent_key, $sent_count + 1, HOUR_IN_SECONDS);

    wp_send_json_success(array('message' => __('Thank you. Your message has been sent.', 'chronevo')));
}

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

/**
 * Use single-service.php for single posts in the Services category (ID 9 or slug "services").
 * Applies to URLs like /services/{slug}.
 */
function chronevo_single_service_template($template) {
    if (!is_singular('post')) {
        return $template;
    }
    $post_id = get_queried_object_id();
    if (!$post_id) {
        return $template;
    }
    $is_services = in_category(9, $post_id) || in_category('services', $post_id);
    if (!$is_services) {
        $categories = get_the_category($post_id);
        if (!empty($categories)) {
            foreach ($categories as $cat) {
                if (isset($cat->slug) && $cat->slug === 'services') {
                    $is_services = true;
                    break;
                }
            }
        }
    }
    if ($is_services) {
        $service_template = get_stylesheet_directory() . '/single-service.php';
        if (file_exists($service_template)) {
            return $service_template;
        }
    }
    return $template;
}
add_filter('template_include', 'chronevo_single_service_template', 20);

/**
 * Render the Supercarbaldie client highlight card (shared on About and Portfolio).
 *
 * @param array $args {
 *     @type string $ref_page     'about' or 'portfolio' — ref-* prefix segment.
 *     @type int    $acf_post_id  Post ID for ACF fields (about_client_*). Defaults to queried object if 0.
 *     @type string $layout       'standalone' (default) or 'embedded' (inside clients section).
 *     @type bool   $show_eyebrow Whether to show the small "Clients" label (default true).
 *     @type string $heading_id   Optional unique id for the card title (for aria-labelledby).
 * }
 */
function chronevo_render_client_highlight_supercarbaldie(array $args = array()) {
    $defaults = array(
        'ref_page' => 'about',
        'acf_post_id' => 0,
        'layout' => 'standalone',
        'show_eyebrow' => true,
        'heading_id' => '',
    );
    $args = wp_parse_args($args, $defaults);
    get_template_part('template-parts/client-highlight-supercarbaldie', null, $args);
}
