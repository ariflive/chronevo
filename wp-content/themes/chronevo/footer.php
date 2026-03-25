<?php
/**
 * The footer template file
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$assets_url = home_url('/assets');
$chr_rp = chronevo_ref_page();
?>
    
    <!-- Footer Section -->
    <footer class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'footer', 'root')); ?> section-footer w-full relative">
        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'container')); ?> div-footer-container max-w-[1440px] mx-auto px-6">
            <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'content')); ?> div-footer-content flex flex-col items-center">
                <!-- Logo - Top -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'logo-section')); ?> div-footer-logo-section">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'a', 'logo-home')); ?> link-footer-logo-home">
                        <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'logo-wrapper')); ?> div-footer-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="Chronevo Logo" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'img', 'logo')); ?> img-footer-logo h-10 w-auto">
                        </div>
                    </a>
                </div>
                
                <!-- Navigation - Middle -->
                <nav class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'nav', 'links')); ?> nav-footer">
                    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'nav-container')); ?> div-footer-nav-container flex gap-8">
                        <?php
                        // Get menu items from menu ID 4
                        $footer_menu_items = wp_get_nav_menu_items(4);
                        
                        if ($footer_menu_items && !is_wp_error($footer_menu_items)) {
                            foreach ($footer_menu_items as $item) {
                                // Skip child items (only show top-level items)
                                if ($item->menu_item_parent != 0) {
                                    continue;
                                }
                                
                                $link_class = 'link-footer-nav-' . sanitize_html_class(strtolower($item->title));
                                
                                // Get the URL
                                $url = !empty($item->url) ? $item->url : '#';
                                
                                // Check if current page matches menu item
                                $is_current = ($item->object_id == get_queried_object_id()) ? true : false;
                                ?>
                                <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'a', 'nav-item', (int) $item->ID) . ' ' . $link_class); ?> text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                    <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'nav-label', (int) $item->ID)); ?> span-footer-nav-text"><?php echo esc_html($item->title); ?></span>
                                    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'nav-underline', (int) $item->ID)); ?> div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                                </a>
                                <?php
                            }
                        } else {
                            // Fallback if menu doesn't exist or has no items
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'a', 'nav-fallback-home')); ?> link-footer-nav-home text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                                <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'nav-fallback-label')); ?> span-footer-nav-text">Home</span>
                                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'nav-fallback-underline')); ?> div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#DCAF47] transition-all duration-300"></div>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </nav>
                
                <!-- Social Media Links - Bottom -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'social-section')); ?> div-footer-social-section">
                    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'social-links')); ?> div-footer-social-media-links flex items-center gap-4">
                        <?php
                        // Get menu items from menu ID 5
                        $footer_social_menu_items = wp_get_nav_menu_items(5);
                        
                        if ($footer_social_menu_items && !is_wp_error($footer_social_menu_items)) {
                            foreach ($footer_social_menu_items as $item) {
                                // Skip child items (only show top-level items)
                                if ($item->menu_item_parent != 0) {
                                    continue;
                                }
                                
                                // Get the URL
                                $url = !empty($item->url) ? $item->url : '#';
                                
                                // Get target attribute (default to _blank for external links)
                                $target = !empty($item->target) ? $item->target : '_blank';
                                
                                $link_class = 'link-footer-social-' . sanitize_html_class(strtolower($item->title));
                                
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
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener noreferrer" class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'a', 'social', (int) $item->ID) . ' ' . $link_class); ?> text-white/60 hover:text-white transition-all duration-300 group">
                                    <i class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'i', 'social-icon', (int) $item->ID)); ?> ph <?php echo esc_attr($icon_class); ?> text-xl"></i>
                                    <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'social-sr-only', (int) $item->ID)); ?> sr-only"><?php echo esc_html($item->title); ?></span>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Copyright Message -->
                <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'div', 'copyright-section')); ?> div-footer-copyright-section">
                    <p class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'p', 'copyright')); ?> p-footer-copyright-text">
                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'copyright-symbol')); ?> span-footer-copyright-symbol">&copy;</span>
                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'copyright-year')); ?> span-footer-copyright-year"><?php echo esc_html(date('Y')); ?></span>
                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'copyright-name')); ?> span-footer-copyright-name">ChronEvo</span>
                        <span class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'footer', 'span', 'copyright-rights')); ?> span-footer-copyright-rights">All rights reserved.</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Background Pattern Overlay -->
    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'div', 'background-pattern')); ?> div-background-pattern absolute inset-0 opacity-10"></div>
    
    <!-- Geometric Background Elements -->
    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'shell', 'div', 'geometric-background')); ?> div-geometric-background absolute inset-0">
    </div>

</div>
<!-- End Main Content Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
