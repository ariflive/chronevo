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
$chr_rp = chronevo_ref_page();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'html', 'document')); ?>">
<head class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'head', 'main')); ?>">
    <meta charset="<?php bloginfo('charset'); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'meta', 'charset')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'meta', 'viewport')); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'profile')); ?>">
    <link rel="icon" type="image/png" href="<?php echo esc_url(home_url('/assets/favicon/favicon-96x96.png')); ?>" sizes="96x96" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'favicon-png')); ?>">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(home_url('/assets/favicon/favicon.svg')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'favicon-svg')); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(home_url('/assets/favicon/favicon.ico')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'favicon-ico')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(home_url('/assets/favicon/apple-touch-icon.png')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'apple-touch-icon')); ?>">
    <link rel="manifest" href="<?php echo esc_url(home_url('/assets/favicon/site.webmanifest')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'link', 'manifest')); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(array(
    chronevo_ref_class($chr_rp, 'shell', 'body', 'main'),
    'body-main',
    'font-body',
    'bg-gradient-to-br',
    'from-[#000000]',
    'via-[#1a1a1a]',
    'to-[#2a2a2a]',
    'min-h-screen',
    'relative',
)); ?>>
    <?php wp_body_open(); ?>

<!-- Page Loader -->
<div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'div', 'page-loader')); ?> div-page-loader">
    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'div', 'loader-spinner')); ?> div-loader-spinner"></div>
</div>

<!-- Main Content Wrapper -->
<div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'div', 'content-wrapper')); ?> div-main-content-wrapper">
    <!-- Header -->
    <header class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'header', 'sticky')); ?> header-sticky z-50 duration-200 ease-out backdrop-blur-md" id="chronevo-site-header">
        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'container')); ?> div-header-container max-w-[1440px] mx-auto py-2 px-3 md:py-6 md:px-6">
            <!-- Mobile header: centered logo, home (left), menu (right) — compressed height; md and up hidden -->
            <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'mobile-bar')); ?> div-header-mobile grid grid-cols-3 items-center gap-1 md:hidden min-h-0 py-0">
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'mobile-left')); ?> div-header-mobile-left flex justify-start items-center min-h-11">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'a', 'mobile-home')); ?> link-header-mobile-home text-white/75 hover:text-[#DCAF47] transition-all duration-200 ease-out p-1.5 -ml-1 min-w-11 min-h-11 inline-flex items-center justify-center" aria-label="<?php esc_attr_e('Home', 'chronevo'); ?>">
                        <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'i', 'mobile-home-icon')); ?> ph ph-house text-xl"></i>
                    </a>
                </div>
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'mobile-center')); ?> div-header-mobile-center flex justify-center items-center min-w-0 min-h-11">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'a', 'mobile-logo-home')); ?> link-header-mobile-logo-home flex justify-center items-center py-0.5">
                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'mobile-logo-wrap')); ?> div-header-mobile-logo-wrap leading-none">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="<?php esc_attr_e('Chronevo Logo', 'chronevo'); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'img', 'mobile-logo')); ?> img-header-mobile-logo h-9 w-auto max-w-[min(168px,48vw)] object-contain object-center mx-auto block">
                        </div>
                    </a>
                </div>
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'mobile-right')); ?> div-header-mobile-right flex justify-end items-center min-h-11">
                    <button type="button" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'button', 'menu-toggle-mobile')); ?> button-menu-toggle text-white/60 hover:text-white transition-all duration-200 ease-out p-1.5 -mr-1 min-w-11 min-h-11 inline-flex items-center justify-center" aria-label="<?php esc_attr_e('Open menu', 'chronevo'); ?>">
                        <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'i', 'menu-toggle-mobile-icon')); ?> ph ph-list text-xl"></i>
                    </button>
                </div>
            </div>
            <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'content')); ?> div-header-content hidden md:flex items-center justify-between">
                <!-- Left Column - Logo and Navigation -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'left')); ?> div-header-left flex items-center gap-8">
                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'a', 'logo-home')); ?> link-logo-home">
                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'logo-wrapper')); ?> div-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="Chronevo Logo" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'img', 'logo')); ?> img-logo h-16 w-auto">
                        </div>
                    </a>
                    
                    <!-- Navigation -->
                    <nav class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'nav', 'primary')); ?> nav-floating">
                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'nav-inner')); ?> div-nav-container flex gap-8">
                            <?php
                            // Get menu items from menu ID 3
                            $menu_items = wp_get_nav_menu_items(3);
                            
                            if ($menu_items && !is_wp_error($menu_items)) {
                                foreach ($menu_items as $item) {
                                    // Skip child items (only show top-level items)
                                    if ($item->menu_item_parent != 0) {
                                        continue;
                                    }
                                    
                                    $link_class = 'link-nav-' . sanitize_html_class(strtolower($item->title));
                                    
                                    // Get the URL
                                    $url = !empty($item->url) ? $item->url : '#';
                                    
                                    // Check if current page matches menu item
                                    $is_current = ($item->object_id == get_queried_object_id()) ? true : false;
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'a', 'nav-item', (int) $item->ID) . ' ' . $link_class); ?> text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'span', 'nav-label', (int) $item->ID)); ?> span-nav-text"><?php echo esc_html($item->title); ?></span>
                                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'nav-underline', (int) $item->ID)); ?> div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                                    </a>
                                    <?php
                                }
                            } else {
                                // Fallback if menu doesn't exist or has no items
                                ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'a', 'nav-fallback-home')); ?> link-nav-home text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                    <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'span', 'nav-fallback-label')); ?> span-nav-text">Home</span>
                                    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'nav-fallback-underline')); ?> div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </nav>
                </div>
                
                <!-- Right Column - Menu Icon -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'div', 'right')); ?> div-header-right flex items-center gap-6">
                    <!-- Menu Icon Button -->
                    <button type="button" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'button', 'menu-toggle')); ?> button-menu-toggle text-white/60 hover:text-white transition-all duration-300" aria-label="Open menu">
                        <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'header', 'i', 'menu-toggle-icon')); ?> ph ph-list text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Popup Menu -->
    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'overlay')); ?> div-popup-menu-overlay">
        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'panel')); ?> div-popup-menu">
            <!-- Menu Header -->
            <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'header')); ?> div-popup-menu-header">
                <!-- Logo -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'logo-block')); ?> div-popup-menu-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'a', 'logo-home')); ?> link-popup-menu-logo-home">
                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'logo-wrapper')); ?> div-popup-menu-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="<?php esc_attr_e('Chronevo Logo', 'chronevo'); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'img', 'logo')); ?> img-popup-menu-logo h-7 w-auto md:h-10">
                        </div>
                    </a>
                </div>
                <!-- Close Icon -->
                <button type="button" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'button', 'close')); ?> button-popup-menu-close text-[#000000] hover:text-[#DCAF47] transition-colors duration-200 ease-out min-w-11 min-h-11 shrink-0 md:min-w-0 md:min-h-0" aria-label="<?php esc_attr_e('Close menu', 'chronevo'); ?>">
                    <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'i', 'close-icon')); ?> ph ph-x text-lg md:text-2xl" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Menu Content -->
            <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'content')); ?> div-popup-menu-content">
                <?php
                $popup_menu_items = wp_get_nav_menu_items(3);
                if ($popup_menu_items && !is_wp_error($popup_menu_items)) {
                    $items_by_parent = array();
                    foreach ($popup_menu_items as $pm_item) {
                        $p = (int) $pm_item->menu_item_parent;
                        if (!isset($items_by_parent[ $p ])) {
                            $items_by_parent[ $p ] = array();
                        }
                        $items_by_parent[ $p ][] = $pm_item;
                    }
                    foreach ($items_by_parent as &$grp) {
                        usort(
                            $grp,
                            static function ($a, $b) {
                                return (int) $a->menu_order <=> (int) $b->menu_order;
                            }
                        );
                    }
                    unset($grp);
                    ?>
                <nav class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'nav', 'primary-mobile')); ?> nav-popup-primary-mobile md:hidden w-full border-b border-black/10 pb-6 mb-6" aria-label="<?php esc_attr_e('Primary navigation', 'chronevo'); ?>">
                    <ul class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'ul', 'primary-mobile-root')); ?> ul-popup-primary-mobile flex flex-col gap-1 list-none p-0 m-0">
                        <?php
                        $top_popup = isset($items_by_parent[0]) ? $items_by_parent[0] : array();
                        foreach ($top_popup as $top_item) {
                            $top_url = !empty($top_item->url) ? $top_item->url : '#';
                            $top_class = 'link-popup-nav-' . sanitize_html_class(strtolower($top_item->title));
                            $kid_items = isset($items_by_parent[ (int) $top_item->ID ]) ? $items_by_parent[ (int) $top_item->ID ] : array();
                            ?>
                        <li class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'li', 'primary-mobile', (int) $top_item->ID)); ?> li-popup-primary-mobile">
                            <a href="<?php echo esc_url($top_url); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'a', 'primary-mobile-top', (int) $top_item->ID) . ' ' . $top_class); ?> flex items-center py-3 text-[#4F5053] hover:text-[#DCAF47] font-semibold text-sm uppercase tracking-tight transition-colors duration-200 ease-out">
                                <?php echo esc_html($top_item->title); ?>
                            </a>
                            <?php if (!empty($kid_items)) { ?>
                            <ul class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'ul', 'primary-mobile-sub', (int) $top_item->ID)); ?> ul-popup-primary-mobile-sub mt-1 mb-2 pl-0 list-none border-l-2 border-[#E1E2E4] ml-1 space-y-0">
                                <?php foreach ($kid_items as $sub_item) {
                                    $sub_url = !empty($sub_item->url) ? $sub_item->url : '#';
                                    $sub_class = 'link-popup-nav-sub-' . sanitize_html_class(strtolower($sub_item->title));
                                    ?>
                                <li class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'li', 'primary-mobile-sub', (int) $sub_item->ID)); ?> li-popup-primary-mobile-sub">
                                    <a href="<?php echo esc_url($sub_url); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'a', 'primary-mobile-sub', (int) $sub_item->ID) . ' ' . $sub_class); ?> flex items-center gap-3 py-2.5 pr-1 text-[#7A7C80] hover:text-[#DCAF47] text-sm font-medium transition-colors duration-200 ease-out">
                                        <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'i', 'primary-mobile-sub-left', (int) $sub_item->ID)); ?> ph ph-caret-left text-base text-[#7A7C80] shrink-0" aria-hidden="true"></i>
                                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'span', 'primary-mobile-sub-label', (int) $sub_item->ID)); ?> flex-1 text-center"><?php echo esc_html($sub_item->title); ?></span>
                                        <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'i', 'primary-mobile-sub-right', (int) $sub_item->ID)); ?> ph ph-caret-right text-base text-[#7A7C80] shrink-0" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
                    <?php
                }
                ?>
                <!-- Social Media Links -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'div', 'social-links')); ?> div-popup-menu-social-media-links">
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
                            
                            $link_class = 'link-popup-menu-social-' . sanitize_html_class(strtolower($item->title));
                            
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
                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener noreferrer" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'a', 'social', (int) $item->ID) . ' ' . $link_class); ?> text-[#000000] hover:text-[#DCAF47] transition-all duration-300 group">
                                <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'i', 'social-icon', (int) $item->ID)); ?> ph <?php echo esc_attr($icon_class); ?> text-2xl"></i>
                                <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'popup', 'span', 'social-label', (int) $item->ID)); ?> span-popup-menu-social-label"><?php echo esc_html($item->title); ?></span>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
