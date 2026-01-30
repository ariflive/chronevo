<?php
/**
 * Template Name: About Page
 * 
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();
?>

<!-- About Hero Section -->
<section class="ref-about-hero-section section-about-hero w-full relative min-h-screen flex items-center">
    <div class="ref-about-hero-container div-about-hero-container w-full max-w-[1440px] mx-auto px-6 py-24">
        <div class="ref-about-hero-content div-about-hero-content flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            <!-- Left Column - Images -->
            <div class="ref-about-hero-image-wrapper div-about-hero-image-wrapper flex-1 w-full lg:w-1/2 relative">
                <!-- First Image - Portrait, Middle of Container -->
                <div class="ref-about-hero-image-1-wrapper div-about-hero-image-1-wrapper relative flex items-center justify-center">
                    <div class="ref-about-hero-image-1 div-about-hero-image-1 relative w-full max-w-md">
                        <img src="<?php echo esc_url($assets_url . '/images/about.jpg'); ?>" alt="About Chronevo" class="ref-about-hero-img-1 img-about-hero-1 w-full h-auto object-cover">
                    </div>
                </div>
                
                <!-- Second Image - Small, Top Right Overlay -->
                <div class="ref-about-hero-image-2-wrapper div-about-hero-image-2-wrapper absolute top-1/2 right-0 transform -translate-y-1/2 z-10">
                    <div class="ref-about-hero-image-2 div-about-hero-image-2 relative w-48 md:w-56 lg:w-64">
                        <img src="<?php echo esc_url($assets_url . '/images/about-2.jpg'); ?>" alt="About Chronevo" class="ref-about-hero-img-2 img-about-hero-2 w-full h-auto object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Content -->
            <div class="ref-about-hero-text-wrapper div-about-hero-text-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-hero-text-content div-about-hero-text-content">
                    <!-- Short Title -->
                    <div class="ref-about-short-title-wrapper div-about-short-title-wrapper mb-4">
                        <span class="ref-about-short-title span-about-short-title text-[#4F5053] font-semibold text-sm uppercase tracking-wider">Who Are We</span>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="ref-about-main-title h1-about-main-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl leading-tight mb-6 uppercase">
                        About Us
                    </h1>
                    
                    <!-- Description -->
                    <div class="ref-about-description div-about-description mb-8">
                        <p class="ref-about-description-text p-about-description-text text-[#7A7C80] text-lg leading-relaxed">
                            Chronevo is built on restraint, intention, and time. We believe true influence is never forced, it is composed. We work quietly, shaping culture with precision and care. Every decision is measured. Every detail has a purpose. We do not follow trends. We create work that endures.
                        </p>
                        <p class="ref-about-description-text p-about-description-text text-[#7A7C80] text-lg leading-relaxed mt-4">
                            Chronevo exists for brands that value permanence over excess, clarity over noise, and presence over performance. It's not what is seen first, it is what remains.
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="ref-about-social-links div-about-social-links flex flex-wrap gap-4">
                        <?php
                        // Get menu items from menu ID 5 (social media menu)
                        $about_social_menu_items = wp_get_nav_menu_items(5);
                        
                        if ($about_social_menu_items && !is_wp_error($about_social_menu_items)) {
                            foreach ($about_social_menu_items as $item) {
                                if ($item->menu_item_parent != 0) {
                                    continue;
                                }
                                
                                $url = !empty($item->url) ? $item->url : '#';
                                $target = !empty($item->target) ? $item->target : '_blank';
                                $sanitized_title = sanitize_html_class(strtolower($item->title));
                                $ref_class = 'ref-about-social-' . $sanitized_title;
                                $link_class = 'link-about-social-' . $sanitized_title;
                                
                                // Icon mapping
                                $icon_map = array(
                                    'twitter' => 'ph-twitter-logo',
                                    'instagram' => 'ph-instagram-logo',
                                    'youtube' => 'ph-youtube-logo',
                                    'pinterest' => 'ph-pinterest-logo',
                                    'linkedin' => 'ph-linkedin-logo',
                                    'facebook' => 'ph-facebook-logo',
                                    'tiktok' => 'ph-tiktok-logo',
                                    'github' => 'ph-github-logo',
                                    'dribbble' => 'ph-dribbble-logo',
                                    'behance' => 'ph-behance-logo',
                                    'vk' => 'ph-globe',
                                    'vkontakte' => 'ph-globe',
                                );
                                
                                $title_lower = strtolower($item->title);
                                $icon_class = 'ph-globe';
                                
                                foreach ($icon_map as $key => $icon) {
                                    if (strpos($title_lower, $key) !== false) {
                                        $icon_class = $icon;
                                        break;
                                    }
                                }
                                
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
                                    }
                                }
                                ?>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener noreferrer" class="<?php echo esc_attr($ref_class . ' ' . $link_class); ?> text-[#7A7C80] hover:text-[#DCAF47] transition-all duration-300 flex items-center gap-2 group">
                                    <i class="ph <?php echo esc_attr($icon_class); ?> text-xl"></i>
                                    <span class="ref-about-social-label span-about-social-label text-sm font-medium"><?php echo esc_html($item->title); ?></span>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scrolling Text Section -->
<section class="ref-about-scrolling-text section-about-scrolling-text w-full py-12 relative overflow-hidden bg-[#F6F7F8]">
    <div class="ref-about-scrolling-wrapper div-about-scrolling-wrapper flex">
        <div class="ref-about-scrolling-content div-about-scrolling-content flex items-center gap-8 whitespace-nowrap animate-taglines-scroll">
            <span class="ref-scrolling-text-item span-scrolling-text-item text-[#4F5053]/35 font-normal text-5xl md:text-6xl lg:text-7xl xl:text-8xl uppercase tracking-tight">Let's Work Together</span>
            <span class="ref-scrolling-text-separator span-scrolling-text-separator text-[#4F5053]/20 text-4xl md:text-5xl lg:text-6xl">•</span>
            <span class="ref-scrolling-text-item span-scrolling-text-item text-[#4F5053]/35 font-normal text-5xl md:text-6xl lg:text-7xl xl:text-8xl uppercase tracking-tight">Let's Work Together</span>
            <span class="ref-scrolling-text-separator span-scrolling-text-separator text-[#4F5053]/20 text-4xl md:text-5xl lg:text-6xl">•</span>
            <span class="ref-scrolling-text-item span-scrolling-text-item text-[#4F5053]/35 font-normal text-5xl md:text-6xl lg:text-7xl xl:text-8xl uppercase tracking-tight">Let's Work Together</span>
            <span class="ref-scrolling-text-separator span-scrolling-text-separator text-[#4F5053]/20 text-4xl md:text-5xl lg:text-6xl">•</span>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="ref-about-video section-about-video w-full relative overflow-hidden">
    <div class="ref-about-video-wrapper div-about-video-wrapper w-full relative">
        <!-- YouTube Video Container -->
        <div class="ref-about-video-container div-about-video-container w-full relative bg-black">
            <!-- YouTube iframe (hidden initially, shown after click) -->
            <iframe 
                id="ref-about-video-iframe" 
                class="ref-about-video-iframe iframe-about-video w-full h-full absolute inset-0 hidden" 
                src="" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen
                style="width: 100%; height: 100%;"
            ></iframe>
            
            <!-- Video Cover/Thumbnail -->
            <div class="ref-about-video-cover div-about-video-cover w-full h-full absolute inset-0 bg-black flex items-center justify-center cursor-none overflow-hidden">
                <?php
                // YouTube video ID
                $youtube_video_id = 'KfIaXTb45tI';
                // Use hqdefault.jpg as specified
                $thumbnail_url = 'https://img.youtube.com/vi/' . $youtube_video_id . '/hqdefault.jpg';
                ?>
                <img 
                    src="<?php echo esc_url($thumbnail_url); ?>" 
                    alt="Video Thumbnail" 
                    class="ref-about-video-thumbnail img-about-video-thumbnail w-full h-full object-cover"
                >
            </div>
            
            <!-- Play Button Circle (follows mouse) -->
            <div class="ref-about-video-play-button div-about-video-play-button absolute z-20 pointer-events-none">
                <div class="ref-about-video-play-circle div-about-video-play-circle w-16 h-16 rounded-full bg-[#DCAF47] flex items-center justify-center group-hover:bg-[#B89438] transition-colors duration-200">
                    <span class="ref-about-video-play-text span-about-video-play-text text-[#4F5053] font-semibold text-sm uppercase">Play</span>
                </div>
            </div>
            
            <!-- Video Loader (shown while video is loading) -->
            <div class="ref-about-video-loader div-about-video-loader absolute inset-0 flex items-center justify-center z-30 pointer-events-none hidden">
                <div class="ref-about-video-loader-spinner div-about-video-loader-spinner w-8 h-8 border-2 border-[#BCBDC0] border-t-[#DCAF47] rounded-full animate-spin"></div>
            </div>
        </div>
    </div>
</section>

<!-- Awards Section -->
<section class="ref-about-awards section-about-awards w-full py-24 bg-[#F6F7F8]">
    <div class="ref-about-awards-container div-about-awards-container w-full max-w-[1440px] mx-auto px-6">
        <div class="ref-about-awards-content div-about-awards-content flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            <!-- Left Column - Content -->
            <div class="ref-about-awards-text-wrapper div-about-awards-text-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-awards-text-content div-about-awards-text-content">
                    <!-- Short Title -->
                    <div class="ref-about-awards-short-title-wrapper div-about-awards-short-title-wrapper mb-4">
                        <span class="ref-about-awards-short-title span-about-awards-short-title text-[#4F5053] font-semibold text-sm uppercase tracking-wider">Huge Honor</span>
                    </div>
                    
                    <!-- Main Title -->
                    <h2 class="ref-about-awards-title h2-about-awards-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl leading-tight mb-6 uppercase">
                        Prestigious awards for design
                    </h2>
                    
                    <!-- Description -->
                    <div class="ref-about-awards-description div-about-awards-description mb-8">
                        <p class="ref-about-awards-description-text p-about-awards-description-text text-[#7A7C80] text-lg leading-relaxed">
                            Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur. Dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.
                        </p>
                    </div>
                    
                    <!-- CTA Button -->
                    <a href="<?php echo esc_url(home_url('/faqs')); ?>" class="ref-about-awards-cta link-about-awards-cta inline-flex items-center gap-2 text-[#4F5053] font-semibold uppercase tracking-tight hover:text-[#DCAF47] transition-colors duration-200 group">
                        <span class="ref-about-awards-cta-text span-about-awards-cta-text">Learn More</span>
                    </a>
                </div>
            </div>
            
            <!-- Right Column - Image or Video -->
            <div class="ref-about-awards-media-wrapper div-about-awards-media-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-awards-media div-about-awards-media relative aspect-[4/3] bg-[#E1E2E4] flex items-center justify-center overflow-hidden group cursor-pointer">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Awards" class="ref-about-awards-img img-about-awards w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
