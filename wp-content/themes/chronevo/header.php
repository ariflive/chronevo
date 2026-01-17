<?php
/**
 * The header template file
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$assets_url = home_url('/assets');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="ref-html-main">
<head class="ref-head-main">
    <meta charset="<?php bloginfo('charset'); ?>" class="ref-meta-charset">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" class="ref-meta-viewport">
    <link rel="profile" href="https://gmpg.org/xfn/11" class="ref-link-profile">
    <link rel="icon" type="image/png" href="<?php echo esc_url(home_url('/assets/favicon/favicon-96x96.png')); ?>" sizes="96x96" class="ref-favicon-png">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(home_url('/assets/favicon/favicon.svg')); ?>" class="ref-favicon-svg">
    <link rel="shortcut icon" href="<?php echo esc_url(home_url('/assets/favicon/favicon.ico')); ?>" class="ref-favicon-ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(home_url('/assets/favicon/apple-touch-icon.png')); ?>" class="ref-apple-touch-icon">
    <link rel="manifest" href="<?php echo esc_url(home_url('/assets/favicon/site.webmanifest')); ?>" class="ref-manifest">
    <?php wp_head(); ?>
</head>
<body <?php body_class('ref-body-main body-main font-body bg-gradient-to-br from-[#000000] via-[#1a1a1a] to-[#2a2a2a] min-h-screen relative'); ?>>
    <?php wp_body_open(); ?>

<!-- Page Loader -->
<div class="ref-page-loader div-page-loader">
    <div class="ref-loader-spinner div-loader-spinner"></div>
</div>

<!-- Main Content Wrapper -->
<div class="ref-main-content-wrapper div-main-content-wrapper">
    <!-- Header -->
    <header class="ref-header-sticky header-sticky z-50 duration-300 backdrop-blur-md" id="ref-header-sticky">
        <div class="ref-header-container div-header-container max-w-[1440px] mx-auto px-6 py-6">
            <div class="ref-header-content div-header-content flex items-center justify-between">
                <!-- Left Column - Logo and Navigation -->
                <div class="ref-header-left div-header-left flex items-center gap-8">
                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-logo-home link-logo-home">
                        <div class="ref-logo-wrapper div-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="Chronevo Logo" class="ref-logo-img img-logo h-16 w-auto">
                        </div>
                    </a>
                    
                    <!-- Navigation -->
                    <nav class="ref-nav-floating nav-floating">
                        <div class="ref-nav-container div-nav-container flex gap-8">
                            <?php
                            // Get menu items from menu ID 3
                            $menu_items = wp_get_nav_menu_items(3);
                            
                            if ($menu_items && !is_wp_error($menu_items)) {
                                foreach ($menu_items as $item) {
                                    // Skip child items (only show top-level items)
                                    if ($item->menu_item_parent != 0) {
                                        continue;
                                    }
                                    
                                    // Generate unique ref class based on menu item title
                                    $ref_class = 'ref-nav-' . sanitize_html_class(strtolower($item->title));
                                    $link_class = 'link-nav-' . sanitize_html_class(strtolower($item->title));
                                    
                                    // Get the URL
                                    $url = !empty($item->url) ? $item->url : '#';
                                    
                                    // Check if current page matches menu item
                                    $is_current = ($item->object_id == get_queried_object_id()) ? true : false;
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($ref_class . ' ' . $link_class); ?> text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                        <span class="ref-nav-text span-nav-text"><?php echo esc_html($item->title); ?></span>
                                        <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                                    </a>
                                    <?php
                                }
                            } else {
                                // Fallback if menu doesn't exist or has no items
                                ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-nav-home link-nav-home text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                    <span class="ref-nav-text span-nav-text">Home</span>
                                    <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </nav>
                </div>
                
                <!-- Right Column - Menu Icon -->
                <div class="ref-header-right div-header-right flex items-center gap-6">
                    <!-- Menu Icon Button -->
                    <button type="button" class="ref-menu-toggle button-menu-toggle text-white/60 hover:text-white transition-all duration-300" aria-label="Open menu">
                        <i class="ph ph-list text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Popup Menu -->
    <div class="ref-popup-menu-overlay div-popup-menu-overlay">
        <div class="ref-popup-menu div-popup-menu">
            <!-- Menu Header -->
            <div class="ref-popup-menu-header div-popup-menu-header">
                <!-- Logo -->
                <div class="ref-popup-menu-logo div-popup-menu-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-popup-menu-logo-home link-popup-menu-logo-home">
                        <div class="ref-popup-menu-logo-wrapper div-popup-menu-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="Chronevo Logo" class="ref-popup-menu-logo-img img-popup-menu-logo h-10 w-auto">
                        </div>
                    </a>
                </div>
                <!-- Close Icon -->
                <button type="button" class="ref-popup-menu-close button-popup-menu-close text-[#000000] hover:text-[#DCAF47] transition-all duration-300" aria-label="Close menu">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>
            <!-- Menu Content -->
            <div class="ref-popup-menu-content div-popup-menu-content">
                <!-- Social Media Links -->
                <div class="ref-popup-menu-social-media-links div-popup-menu-social-media-links">
                    <?php
                    // Get menu items from menu ID 5
                    $social_menu_items = wp_get_nav_menu_items(5);
                    
                    if ($social_menu_items && !is_wp_error($social_menu_items)) {
                        foreach ($social_menu_items as $item) {
                            // Skip child items (only show top-level items)
                            if ($item->menu_item_parent != 0) {
                                continue;
                            }
                            
                            // Get the URL
                            $url = !empty($item->url) ? $item->url : '#';
                            
                            // Get target attribute (default to _blank for external links)
                            $target = !empty($item->target) ? $item->target : '_blank';
                            
                            // Generate unique ref class based on menu item title
                            $sanitized_title = sanitize_html_class(strtolower($item->title));
                            $ref_class = 'ref-popup-menu-social-' . $sanitized_title;
                            $link_class = 'link-popup-menu-social-' . $sanitized_title;
                            
                            // Map social media names to Phosphor icon classes
                            $icon_map = array(
                                'twitter' => 'ph-twitter-logo',
                                'instagram' => 'ph-instagram-logo',
                                'youtube' => 'ph-youtube-logo',
                                'pinterest' => 'ph-pinterest-logo',
                                'linkedin' => 'ph-linkedin-logo',
                                'facebook' => 'ph-facebook-logo',
                                'tiktok' => 'ph-tiktok-logo',
                                'snapchat' => 'ph-snapchat-logo',
                                'discord' => 'ph-discord-logo',
                                'github' => 'ph-github-logo',
                                'dribbble' => 'ph-dribbble-logo',
                                'behance' => 'ph-behance-logo',
                                'vk' => 'ph-globe',
                                'vkontakte' => 'ph-globe',
                            );
                            
                            // Get icon class, default to globe if not found
                            $title_lower = strtolower($item->title);
                            $icon_class = 'ph-globe'; // Default icon
                            
                            foreach ($icon_map as $key => $icon) {
                                if (strpos($title_lower, $key) !== false) {
                                    $icon_class = $icon;
                                    break;
                                }
                            }
                            
                            // Check if URL contains social media domain for better icon detection
                            if ($icon_class === 'ph-globe') {
                                $url_lower = strtolower($url);
                                if (strpos($url_lower, 'twitter.com') !== false || strpos($url_lower, 'x.com') !== false) {
                                    $icon_class = 'ph-twitter-logo';
                                } elseif (strpos($url_lower, 'instagram.com') !== false) {
                                    $icon_class = 'ph-instagram-logo';
                                } elseif (strpos($url_lower, 'youtube.com') !== false) {
                                    $icon_class = 'ph-youtube-logo';
                                } elseif (strpos($url_lower, 'pinterest.com') !== false) {
                                    $icon_class = 'ph-pinterest-logo';
                                } elseif (strpos($url_lower, 'linkedin.com') !== false) {
                                    $icon_class = 'ph-linkedin-logo';
                                } elseif (strpos($url_lower, 'facebook.com') !== false) {
                                    $icon_class = 'ph-facebook-logo';
                                } elseif (strpos($url_lower, 'tiktok.com') !== false) {
                                    $icon_class = 'ph-tiktok-logo';
                                } elseif (strpos($url_lower, 'github.com') !== false) {
                                    $icon_class = 'ph-github-logo';
                                } elseif (strpos($url_lower, 'dribbble.com') !== false) {
                                    $icon_class = 'ph-dribbble-logo';
                                } elseif (strpos($url_lower, 'behance.net') !== false) {
                                    $icon_class = 'ph-behance-logo';
                                } elseif (strpos($url_lower, 'vk.com') !== false || strpos($url_lower, 'vkontakte') !== false) {
                                    $icon_class = 'ph-globe';
                                }
                            }
                            ?>
                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener noreferrer" class="<?php echo esc_attr($ref_class . ' ' . $link_class); ?> text-[#000000] hover:text-[#DCAF47] transition-all duration-300 group">
                                <i class="ph <?php echo esc_attr($icon_class); ?> text-2xl"></i>
                                <span class="ref-popup-menu-social-label span-popup-menu-social-label"><?php echo esc_html($item->title); ?></span>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
