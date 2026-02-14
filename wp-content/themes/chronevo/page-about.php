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
                <!-- First Image - Portrait, Middle of Container (ACF image_back, aspect 3/4) -->
                <?php
                $image_back = get_field('image_back', get_queried_object_id());
                $image_back_url = is_string($image_back) ? $image_back : (is_array($image_back) && !empty($image_back['url']) ? $image_back['url'] : '');
                $about_hero_img_1_src = $image_back_url !== '' ? $image_back_url : $assets_url . '/images/about.jpg';
                ?>
                <div class="ref-about-hero-image-1-wrapper div-about-hero-image-1-wrapper relative flex items-center justify-center">
                    <div class="ref-about-hero-image-1 div-about-hero-image-1 relative w-full max-w-md aspect-[3/4] overflow-hidden">
                        <img src="<?php echo esc_url($about_hero_img_1_src); ?>" alt="About Chronevo" class="ref-about-hero-img-1 img-about-hero-1 w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Second Image - Small, Top Right Overlay (ACF image_front, aspect 3/4) -->
                <?php
                $image_front = get_field('image_front', get_queried_object_id());
                $image_front_url = is_string($image_front) ? $image_front : (is_array($image_front) && !empty($image_front['url']) ? $image_front['url'] : '');
                $about_hero_img_2_src = $image_front_url !== '' ? $image_front_url : $assets_url . '/images/about-2.jpg';
                ?>
                <div class="ref-about-hero-image-2-wrapper div-about-hero-image-2-wrapper absolute top-1/2 right-0 transform -translate-y-1/2 z-10">
                    <div class="ref-about-hero-image-2 div-about-hero-image-2 relative w-48 md:w-56 lg:w-64 aspect-[3/4] overflow-hidden">
                        <img src="<?php echo esc_url($about_hero_img_2_src); ?>" alt="About Chronevo" class="ref-about-hero-img-2 img-about-hero-2 w-full h-full object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Content -->
            <div class="ref-about-hero-text-wrapper div-about-hero-text-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-hero-text-content div-about-hero-text-content">
                    <!-- Short Title -->
                    <div class="ref-about-short-title-wrapper div-about-short-title-wrapper mb-4">
                        <span class="ref-about-short-title span-about-short-title text-[#4F5053] font-semibold text-sm uppercase tracking-wider"><?php echo esc_html(mb_strtoupper((string) get_field('tagline', get_queried_object_id()))); ?></span>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="ref-about-main-title h1-about-main-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl leading-tight mb-6 uppercase">
                        <?php echo esc_html(mb_strtoupper(get_the_title(get_queried_object_id()))); ?>
                    </h1>
                    
                    <!-- Description (page content) -->
                    <div class="ref-about-description div-about-description mb-8 text-[#7A7C80] text-lg leading-relaxed [&_p]:mb-4 [&_p:last-child]:mb-0">
                        <?php
                        $about_page_content = get_post_field('post_content', get_queried_object_id());
                        echo apply_filters('the_content', $about_page_content);
                        ?>
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

<!-- Scrolling Text Section (items from ACF tagline_1, tagline_2, tagline_3) -->
<?php
$about_tagline_1 = get_field('tagline_1', get_queried_object_id());
$about_tagline_2 = get_field('tagline_2', get_queried_object_id());
$about_tagline_3 = get_field('tagline_3', get_queried_object_id());
$about_scrolling_items = array(
    is_string($about_tagline_1) ? $about_tagline_1 : "Let's Work Together",
    is_string($about_tagline_2) ? $about_tagline_2 : "Let's Work Together",
    is_string($about_tagline_3) ? $about_tagline_3 : "Let's Work Together",
);
$about_scrolling_item_class = 'ref-scrolling-text-item span-scrolling-text-item text-[#4F5053]/35 font-normal text-5xl md:text-6xl lg:text-7xl xl:text-8xl uppercase tracking-tight';
$about_scrolling_sep_class = 'ref-scrolling-text-separator span-scrolling-text-separator text-[#4F5053]/20 text-4xl md:text-5xl lg:text-6xl';
?>
<section class="ref-about-scrolling-text section-about-scrolling-text w-full py-12 relative overflow-hidden bg-[#F6F7F8]">
    <div class="ref-about-scrolling-wrapper div-about-scrolling-wrapper flex">
        <div class="ref-about-scrolling-content div-about-scrolling-content flex items-center gap-8 whitespace-nowrap animate-taglines-scroll">
            <?php
            foreach (array($about_scrolling_items, $about_scrolling_items) as $round) {
                foreach ($round as $about_text) {
                    ?>
            <span class="<?php echo esc_attr($about_scrolling_item_class); ?>"><?php echo esc_html($about_text); ?></span>
            <span class="<?php echo esc_attr($about_scrolling_sep_class); ?>">•</span>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Video Section (YouTube ID from ACF "youtube"; section hidden when field is empty) -->
<?php
$youtube_video_id = get_field('youtube', get_queried_object_id());
$youtube_video_id = is_string($youtube_video_id) ? trim($youtube_video_id) : '';
if ($youtube_video_id !== '') {
    $youtube_thumbnail_url = 'https://img.youtube.com/vi/' . $youtube_video_id . '/hqdefault.jpg';
    ?>
<section class="ref-about-video section-about-video w-full relative overflow-hidden">
    <div class="ref-about-video-wrapper div-about-video-wrapper w-full relative">
        <!-- YouTube Video Container -->
        <div class="ref-about-video-container div-about-video-container w-full relative bg-black" data-youtube-id="<?php echo esc_attr($youtube_video_id); ?>">
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
                <img 
                    src="<?php echo esc_url($youtube_thumbnail_url); ?>" 
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
<?php
}
?>

<!-- Awards Section (display only when ACF "show" is checked) -->
<?php if (get_field('show', get_queried_object_id())) : ?>
<section class="ref-about-awards section-about-awards w-full py-24 bg-[#F6F7F8]">
    <div class="ref-about-awards-container div-about-awards-container w-full max-w-[1440px] mx-auto px-6">
        <div class="ref-about-awards-content div-about-awards-content flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            <!-- Left Column - Content -->
            <div class="ref-about-awards-text-wrapper div-about-awards-text-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-awards-text-content div-about-awards-text-content">
                    <!-- Short Title -->
                    <div class="ref-about-awards-short-title-wrapper div-about-awards-short-title-wrapper mb-4">
                        <span class="ref-about-awards-short-title span-about-awards-short-title text-[#4F5053] font-semibold text-sm uppercase tracking-wider"><?php echo esc_html(mb_strtoupper((string) get_field('award_tagline', get_queried_object_id()))); ?></span>
                    </div>
                    
                    <!-- Main Title -->
                    <h2 class="ref-about-awards-title h2-about-awards-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl leading-tight mb-6 uppercase">
                        <?php echo esc_html(mb_strtoupper((string) get_field('title', get_queried_object_id()))); ?>
                    </h2>
                    
                    <!-- Description -->
                    <div class="ref-about-awards-description div-about-awards-description mb-8 text-[#7A7C80] text-lg leading-relaxed [&_p]:mb-4 [&_p:last-child]:mb-0">
                        <?php
                        $awards_description = get_field('description', get_queried_object_id());
                        echo apply_filters('the_content', (string) $awards_description);
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Image (ACF image, aspect 1/1) -->
            <?php
            $awards_image = get_field('image', get_queried_object_id());
            $awards_image_url = is_string($awards_image) ? $awards_image : (is_array($awards_image) && !empty($awards_image['url']) ? $awards_image['url'] : '');
            $awards_img_src = $awards_image_url !== '' ? $awards_image_url : $assets_url . '/images/hero-2.jpg';
            ?>
            <div class="ref-about-awards-media-wrapper div-about-awards-media-wrapper flex-1 w-full lg:w-1/2">
                <div class="ref-about-awards-media div-about-awards-media relative aspect-square overflow-hidden bg-[#E1E2E4] flex items-center justify-center group cursor-pointer">
                    <img src="<?php echo esc_url($awards_img_src); ?>" alt="Awards" class="ref-about-awards-img img-about-awards w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
