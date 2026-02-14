<?php
/**
 * Template Name: Home Page
 * 
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();
?>
    <!-- Hero Section -->
    <section class="ref-hero-section section-hero w-full relative pt-12">
        <div class="ref-hero-container div-hero-container w-[90%] mx-auto px-6 relative">
            <div class="ref-hero-images div-hero-images w-full flex items-end justify-center gap-32 relative z-0 pt-[40vh]">
                <!-- Hero Image 2 - Medium Size (aspect 3/4, image fills) - from ACF photo_left -->
                <?php
                $photo_left = get_field('photo_left', get_queried_object_id());
                $photo_left_url = is_string($photo_left) ? $photo_left : (is_array($photo_left) && !empty($photo_left['url']) ? $photo_left['url'] : '');
                $hero_img_2_src = $photo_left_url !== '' ? $photo_left_url : $assets_url . '/images/hero-2.jpg';
                ?>
                <div class="ref-hero-image-wrapper-2 div-hero-image-wrapper-2 mb-12 aspect-[3/4] overflow-hidden w-[min(375px,90vw)]">
                    <img src="<?php echo esc_url($hero_img_2_src); ?>" alt="Hero Image 2" class="ref-hero-img-2 img-hero-2 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
                
                <!-- Hero Image 1 - Bigger Size (aspect 1/1, image fills) - from ACF photo_center -->
                <?php
                $photo_center = get_field('photo_center', get_queried_object_id());
                $photo_center_url = is_string($photo_center) ? $photo_center : (is_array($photo_center) && !empty($photo_center['url']) ? $photo_center['url'] : '');
                $hero_img_1_src = $photo_center_url !== '' ? $photo_center_url : $assets_url . '/images/hero-1.jpg';
                ?>
                <div class="ref-hero-image-wrapper-1 div-hero-image-wrapper-1 relative flex-1 min-h-[600px] aspect-square overflow-hidden">
                    <img src="<?php echo esc_url($hero_img_1_src); ?>" alt="Hero Image 1" class="ref-hero-img-1 img-hero-1 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
                
                <!-- Hero Image 3 - Smaller Size (aspect 9/16, image fills) - from ACF photo_right -->
                <?php
                $photo_right = get_field('photo_right', get_queried_object_id());
                $photo_right_url = is_string($photo_right) ? $photo_right : (is_array($photo_right) && !empty($photo_right['url']) ? $photo_right['url'] : '');
                $hero_img_3_src = $photo_right_url !== '' ? $photo_right_url : $assets_url . '/images/hero-3.jpg';
                ?>
                <div class="ref-hero-image-wrapper-3 div-hero-image-wrapper-3 mb-12 aspect-[9/16] overflow-hidden w-[min(280px,90vw)]">
                    <img src="<?php echo esc_url($hero_img_3_src); ?>" alt="Hero Image 3" class="ref-hero-img-3 img-hero-3 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
            </div>
            
            <!-- Hero Slogan -->
            <section class="ref-hero-slogan section-hero-slogan absolute top-0 left-0 right-0 z-10">
                <h1 class="ref-hero-slogan-title h1-hero-slogan text-[97.2px] md:text-[129.6px] lg:text-[172.8px] font-bold uppercase leading-none">
                    <span class="ref-slogan-connect span-slogan-connect block text-left">
                        <?php
                        $tagline_1 = get_field('tagline_1', get_queried_object_id());
                        $tagline_1 = is_string($tagline_1) ? mb_strtoupper($tagline_1) : '';
                        $chars = $tagline_1 !== '' ? mb_str_split($tagline_1) : array('C', 'O', 'N', 'N', 'E', 'C', 'T');
                        foreach ($chars as $i => $char) {
                            $idx = $i + 1;
                            $ref_class = 'ref-char-item-' . $idx;
                            $span_class = 'span-char-item span-char-item-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr($ref_class . ' ' . $span_class); ?>"><?php echo esc_html($char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                    <span class="ref-slogan-explore span-slogan-explore block text-center">
                        <?php
                        $tagline_2 = get_field('tagline_2', get_queried_object_id());
                        $tagline_2 = is_string($tagline_2) ? mb_strtoupper($tagline_2) : '';
                        $explore_chars = $tagline_2 !== '' ? mb_str_split($tagline_2) : array('E', 'X', 'P', 'L', 'O', 'R', 'E');
                        foreach ($explore_chars as $j => $explore_char) {
                            $idx = $j + 1;
                            $ref_class = 'ref-explore-char--' . $idx;
                            $span_class = 'span-explore-char span-explore-char-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr($ref_class . ' ' . $span_class); ?>"><?php echo esc_html($explore_char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                    <span class="ref-slogan-design span-slogan-design block text-right">
                        <?php
                        $tagline_3 = get_field('tagline_3', get_queried_object_id());
                        $tagline_3 = is_string($tagline_3) ? mb_strtoupper($tagline_3) : '';
                        $design_chars = $tagline_3 !== '' ? mb_str_split($tagline_3) : array('D', 'E', 'S', 'I', 'G', 'N');
                        foreach ($design_chars as $k => $design_char) {
                            $idx = $k + 1;
                            $ref_class = 'ref-design-char-' . $idx;
                            $span_class = 'span-design-char span-design-char-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr($ref_class . ' ' . $span_class); ?>"><?php echo esc_html($design_char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                </h1>
            </section>
        </div>
    </section>
    
    <!-- Taglines Section (populated from category taglines, ordered by last updated) -->
    <?php
    $taglines_query = new WP_Query(array(
        'category_name' => 'taglines',
        'posts_per_page' => -1,
        'orderby'        => 'modified',
        'order'          => 'DESC',
        'post_status'    => 'publish',
        'no_found_rows'  => true,
    ));
    $tagline_posts = $taglines_query->have_posts() ? $taglines_query->posts : array();
    wp_reset_postdata();
    $tagline_fallback = array('Visuals & Storytelling', 'Art & Expression', 'Imagery & Meaning', 'Design & Dialogue', 'Picture & Prose');
    ?>
    <section class="ref-taglines-section section-taglines w-full py-12 relative">
        <div class="ref-taglines-wrapper div-taglines-wrapper flex">
            <div class="ref-taglines-content div-taglines-content flex items-center gap-8 whitespace-nowrap animate-taglines-scroll">
                <?php
                $tagline_items = array();
                if (!empty($tagline_posts)) {
                    foreach ($tagline_posts as $p) {
                        $tagline_items[] = get_the_title($p);
                    }
                } else {
                    $tagline_items = $tagline_fallback;
                }
                $tagline_item_class = 'ref-tagline-item span-tagline-item text-white/40 font-light text-5xl md:text-6xl lg:text-7xl xl:text-8xl uppercase tracking-tight';
                $separator_class = 'ref-tagline-separator span-tagline-separator text-white/10 text-4xl md:text-5xl lg:text-6xl';
                foreach (array($tagline_items, $tagline_items) as $round) {
                    foreach ($round as $idx => $text) {
                        ?>
                <span class="<?php echo esc_attr($tagline_item_class); ?>"><?php echo esc_html($text); ?></span>
                <span class="<?php echo esc_attr($separator_class); ?>">•</span>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section class="ref-services-section section-services w-full relative min-h-screen flex items-center justify-center">
        <div class="ref-services-container div-services-container relative w-full max-w-[1440px] mx-auto px-6">
            <!-- Services Title -->
            <div class="ref-services-title-wrapper div-services-title-wrapper relative text-center">
                <h2 class="ref-services-title h2-services-title text-white font-normal uppercase tracking-tight">Services</h2>
            </div>
            
            <!-- Floating Images in Oval Shape -->
            <div class="ref-services-images-wrapper div-services-images-wrapper absolute inset-0 w-full h-full flex items-center justify-center">
                <!-- Image 1 - Top Center -->
                <div class="ref-service-image-wrapper ref-service-image-1 div-service-image-wrapper div-service-image-1 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Service Image 1" class="ref-service-image-1 img-service-image-1 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-1 span-service-label span-service-label-1">PR</span>
                </div>
                
                <!-- Image 2 - Top Right -->
                <div class="ref-service-image-wrapper ref-service-image-2 div-service-image-wrapper div-service-image-2 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/post.jpg'); ?>" alt="Service Image 2" class="ref-service-image-2 img-service-image-2 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-2 span-service-label span-service-label-2">Product</span>
                </div>
                
                <!-- Image 3 - Right Middle -->
                <div class="ref-service-image-wrapper ref-service-image-3 div-service-image-wrapper div-service-image-3 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-3.jpg'); ?>" alt="Service Image 3" class="ref-service-image-3 img-service-image-3 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-3 span-service-label span-service-label-3">Media</span>
                </div>
                
                <!-- Image 4 - Bottom Right -->
                <div class="ref-service-image-wrapper ref-service-image-4 div-service-image-wrapper div-service-image-4 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/work.jpg'); ?>" alt="Service Image 4" class="ref-service-image-4 img-service-image-4 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-4 span-service-label span-service-label-4">Digital Design</span>
                </div>
                
                <!-- Image 5 - Bottom Center -->
                <div class="ref-service-image-wrapper ref-service-image-5 div-service-image-wrapper div-service-image-5 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Service Image 5" class="ref-service-image-5 img-service-image-5 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-5 span-service-label span-service-label-5">Brand Identity</span>
                </div>
                
                <!-- Image 6 - Bottom Left -->
                <div class="ref-service-image-wrapper ref-service-image-6 div-service-image-wrapper div-service-image-6 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Service Image 6" class="ref-service-image-6 img-service-image-6 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-6 span-service-label span-service-label-6">Corporate</span>
                </div>
                
                <!-- Image 7 - Left Middle -->
                <div class="ref-service-image-wrapper ref-service-image-7 div-service-image-wrapper div-service-image-7 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/post.jpg'); ?>" alt="Service Image 7" class="ref-service-image-7 img-service-image-7 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-7 span-service-label span-service-label-7">Contact</span>
                </div>
                
                <!-- Image 8 - Top Left -->
                <div class="ref-service-image-wrapper ref-service-image-8 div-service-image-wrapper div-service-image-8 absolute">
                    <img src="<?php echo esc_url($assets_url . '/images/hero-3.jpg'); ?>" alt="Service Image 8" class="ref-service-image-8 img-service-image-8 object-cover aspect-square">
                    <span class="ref-service-label ref-service-label-8 span-service-label span-service-label-8">Supercarbaldie</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Portfolio Section -->
    <section class="ref-portfolio-section section-portfolio w-full relative">
        <div class="ref-portfolio-container div-portfolio-container w-full max-w-[1440px] mx-auto px-6 py-24">
            <div class="ref-portfolio-content-wrapper div-portfolio-content-wrapper flex gap-12">
                <!-- Left Column -->
                <div class="ref-portfolio-left-column div-portfolio-left-column flex flex-col">
                    <a href="#" class="ref-portfolio-short-title link-portfolio-short-title">
                        <span class="ref-portfolio-short-title-text span-portfolio-short-title-text">My Work</span>
                    </a>
                    <h2 class="ref-portfolio-main-title h2-portfolio-main-title">
                        <span class="ref-portfolio-main-title-text span-portfolio-main-title-text">Brands I'm Proud to Work With</span>
                    </h2>
                    <p class="ref-portfolio-description p-portfolio-description">
                        <span class="ref-portfolio-description-text span-portfolio-description-text">A look at some of the clients and companies I've been fortunate to work with.</span>
                    </p>
                    
                    <!-- Carousel Navigation -->
                    <div class="ref-portfolio-carousel-navigation div-portfolio-carousel-navigation">
                        <button type="button" class="ref-portfolio-carousel-prev button-portfolio-carousel-prev" aria-label="Previous slide">
                            <i class="ph ph-arrow-left"></i>
                        </button>
                        <button type="button" class="ref-portfolio-carousel-next button-portfolio-carousel-next" aria-label="Next slide">
                            <i class="ph ph-arrow-right"></i>
                        </button>
                    </div>
                    
                    <!-- Portfolio CTA Button -->
                    <a href="#" class="ref-portfolio-cta link-portfolio-cta button-portfolio-cta">
                        <span class="ref-portfolio-cta-text span-portfolio-cta-text">Portfolio</span>
                    </a>
                </div>
                
                <!-- Right Column -->
                <div class="ref-portfolio-right-column div-portfolio-right-column">
                    <div class="ref-portfolio-carousel-wrapper div-portfolio-carousel-wrapper">
                        <div class="ref-portfolio-carousel-container div-portfolio-carousel-container">
                            <div class="ref-portfolio-carousel-track div-portfolio-carousel-track">
                                <!-- Card 1 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Brand Project 1" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">BRAND NAME ONE</span>
                                    </div>
                                </div>
                                
                                <!-- Card 2 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Brand Project 2" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">PROJECT TITLE TWO</span>
                                    </div>
                                </div>
                                
                                <!-- Card 3 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-3.jpg'); ?>" alt="Brand Project 3" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">CLIENT BRAND THREE</span>
                                    </div>
                                </div>
                                
                                <!-- Card 4 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Brand Project 4" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">BRAND FOUR</span>
                                    </div>
                                </div>
                                
                                <!-- Card 5 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Brand Project 5" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">PROJECT FIVE</span>
                                    </div>
                                </div>
                                
                                <!-- Card 6 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-3.jpg'); ?>" alt="Brand Project 6" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">BRAND SIX</span>
                                    </div>
                                </div>
                                
                                <!-- Card 7 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Brand Project 7" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">CLIENT SEVEN</span>
                                    </div>
                                </div>
                                
                                <!-- Card 8 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Brand Project 8" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">PROJECT EIGHT</span>
                                    </div>
                                </div>
                                
                                <!-- Card 9 -->
                                <div class="ref-portfolio-card div-portfolio-card">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper">
                                        <img src="<?php echo esc_url($assets_url . '/images/hero-3.jpg'); ?>" alt="Brand Project 9" class="ref-portfolio-card-image img-portfolio-card-image">
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title">BRAND NINE</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Blog Section -->
    <section class="ref-blog-section section-blog w-full relative">
        <div class="ref-blog-container div-blog-container w-full max-w-[1440px] mx-auto">
            <div class="ref-blog-content-wrapper div-blog-content-wrapper flex gap-12 px-6 pt-24 pb-12">
                <!-- Left Column -->
                <div class="ref-blog-left-column div-blog-left-column flex flex-col">
                    <div class="ref-blog-short-title-wrapper div-blog-short-title-wrapper">
                        <span class="ref-blog-short-title-text span-blog-short-title-text">Blog</span>
                    </div>
                    <h2 class="ref-blog-main-title h2-blog-main-title">
                        <span class="ref-blog-main-title-text span-blog-main-title-text">Check our recent articles</span>
                    </h2>
                </div>
                
                <!-- Right Column -->
                <div class="ref-blog-right-column div-blog-right-column flex flex-col">
                    <p class="ref-blog-description p-blog-description">
                        <span class="ref-blog-description-text span-blog-description-text">Discover insights, trends, and stories from our creative journey. Explore our latest thoughts and updates on design, innovation, and the creative industry. From behind-the-scenes looks at our projects to expert perspectives on emerging trends, our blog offers a window into the world of creative excellence.</span>
                    </p>
                </div>
            </div>
            
            <!-- Blog Posts Row -->
            <div class="ref-blog-posts-wrapper div-blog-posts-wrapper flex gap-12 px-6 pt-0 pb-24">
                <!-- Left Column - Post 1 -->
                <div class="ref-blog-post-column div-blog-post-column flex flex-col">
                    <a href="#" class="ref-blog-post ref-blog-post-1 link-blog-post link-blog-post-1">
                        <div class="ref-blog-post-card div-blog-post-card">
                            <div class="ref-blog-post-image-wrapper div-blog-post-image-wrapper">
                                <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Blog Post 1" class="ref-blog-post-image img-blog-post-image">
                            </div>
                            <div class="ref-blog-post-title-wrapper div-blog-post-title-wrapper">
                                <h3 class="ref-blog-post-title h3-blog-post-title">
                                    <span class="ref-blog-post-title-text span-blog-post-title-text">SUPERCAR EXCELLENCE</span>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Right Column - Post 2 -->
                <div class="ref-blog-post-column div-blog-post-column flex flex-col">
                    <a href="#" class="ref-blog-post ref-blog-post-2 link-blog-post link-blog-post-2">
                        <div class="ref-blog-post-card div-blog-post-card">
                            <div class="ref-blog-post-image-wrapper div-blog-post-image-wrapper">
                                <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Blog Post 2" class="ref-blog-post-image img-blog-post-image">
                            </div>
                            <div class="ref-blog-post-title-wrapper div-blog-post-title-wrapper">
                                <h3 class="ref-blog-post-title h3-blog-post-title">
                                    <span class="ref-blog-post-title-text span-blog-post-title-text">AUTOMOTIVE DESIGN</span>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>
