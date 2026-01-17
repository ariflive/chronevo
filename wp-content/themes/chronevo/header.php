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
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-nav-home link-nav-home text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="ref-nav-text span-nav-text">Home</span>
                                <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                            </a>
                            <a href="#" class="ref-nav-about link-nav-about text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="ref-nav-text span-nav-text">About</span>
                                <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                            </a>
                            <a href="#" class="ref-nav-portfolio link-nav-portfolio text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="ref-nav-text span-nav-text">Portfolio</span>
                                <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                            </a>
                            <a href="#" class="ref-nav-blog link-nav-blog text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="ref-nav-text span-nav-text">Blog</span>
                                <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                            </a>
                            <a href="#" class="ref-nav-contact link-nav-contact text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="ref-nav-text span-nav-text">Contact</span>
                                <div class="ref-nav-underline div-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                            </a>
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
                <button type="button" class="ref-popup-menu-close button-popup-menu-close text-[#000000] hover:text-[#92f6f8] transition-all duration-300" aria-label="Close menu">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>
            <!-- Menu Content -->
            <div class="ref-popup-menu-content div-popup-menu-content">
                <!-- Social Media Links -->
                <div class="ref-popup-menu-social-media-links div-popup-menu-social-media-links">
                    <a href="https://twitter.com/supercarbaldie" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-twitter link-popup-menu-social-twitter text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-twitter-logo text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">Twitter</span>
                    </a>
                    <a href="https://www.instagram.com/supercarbaldie_official/" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-instagram link-popup-menu-social-instagram text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-instagram-logo text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">Instagram</span>
                    </a>
                    <a href="https://www.youtube.com/channel/UCTq_oZyS8rJ__Cs3XyyU5yw" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-youtube link-popup-menu-social-youtube text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-youtube-logo text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">YouTube</span>
                    </a>
                    <a href="https://www.pinterest.com/ChronEvo/" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-pinterest link-popup-menu-social-pinterest text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-pinterest-logo text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">Pinterest</span>
                    </a>
                    <a href="https://www.linkedin.com/feed/update/urn:li:activity:6972423859396325377" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-linkedin link-popup-menu-social-linkedin text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-linkedin-logo text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">LinkedIn</span>
                    </a>
                    <a href="https://vk.com/connect_explore_design" target="_blank" rel="noopener noreferrer" class="ref-popup-menu-social-vk link-popup-menu-social-vk text-[#000000] hover:text-[#92f6f8] transition-all duration-300 group">
                        <i class="ph ph-globe text-2xl"></i>
                        <span class="ref-popup-menu-social-label span-popup-menu-social-label">VK</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
