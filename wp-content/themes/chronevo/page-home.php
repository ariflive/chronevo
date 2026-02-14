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
            
            <!-- Floating Images (from category 6, ordered by recently updated) -->
            <?php
            $services_query = new WP_Query(array(
                'cat'                 => 6,
                'posts_per_page'      => -1,
                'orderby'             => 'modified',
                'order'               => 'DESC',
                'post_status'         => 'publish',
                'no_found_rows'       => true,
            ));
            ?>
            <div class="ref-services-images-wrapper div-services-images-wrapper absolute inset-0 w-full h-full flex items-center justify-center">
                <?php
                if ($services_query->have_posts()) :
                    $si = 0;
                    while ($services_query->have_posts()) :
                        $services_query->the_post();
                        $si++;
                        $pid = get_the_ID();
                        $thumb = get_the_post_thumbnail_url($pid, 'large');
                        if (empty($thumb)) {
                            $thumb = $assets_url . '/images/hero-1.jpg';
                        }
                        $service_title = get_the_title();
                        ?>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="ref-service-image-wrapper ref-service-image-<?php echo esc_attr((string) $si); ?> div-service-image-wrapper div-service-image-<?php echo esc_attr((string) $si); ?> absolute block">
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($service_title); ?>" class="ref-service-image-<?php echo esc_attr((string) $si); ?> img-service-image-<?php echo esc_attr((string) $si); ?> object-cover aspect-square">
                    <div class="ref-service-image-overlay div-service-image-overlay absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/50 to-transparent pointer-events-none" aria-hidden="true"></div>
                    <span class="ref-service-label ref-service-label-<?php echo esc_attr((string) $si); ?> span-service-label span-service-label-<?php echo esc_attr((string) $si); ?>"><?php echo esc_html($service_title); ?></span>
                </a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
    
    <!-- Portfolio Section (category 6: title + description) -->
    <?php
    $portfolio_cat_6 = get_term(6, 'category');
    $portfolio_short_title = (!is_wp_error($portfolio_cat_6) && isset($portfolio_cat_6->name)) ? $portfolio_cat_6->name : 'My Work';
    $portfolio_desc_text = (!is_wp_error($portfolio_cat_6) && !empty($portfolio_cat_6->description)) ? strip_tags($portfolio_cat_6->description) : "A look at some of the clients and companies I've been fortunate to work with.";
    ?>
    <section class="ref-portfolio-section section-portfolio w-full relative">
        <div class="ref-portfolio-container div-portfolio-container w-full max-w-[1440px] mx-auto px-6 py-24">
            <div class="ref-portfolio-content-wrapper div-portfolio-content-wrapper flex gap-12">
                <!-- Left Column -->
                <div class="ref-portfolio-left-column div-portfolio-left-column flex flex-col">
                    <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="ref-portfolio-short-title link-portfolio-short-title">
                        <span class="ref-portfolio-short-title-text span-portfolio-short-title-text"><?php echo esc_html($portfolio_short_title); ?></span>
                    </a>
                    <h2 class="ref-portfolio-main-title h2-portfolio-main-title">
                        <span class="ref-portfolio-main-title-text span-portfolio-main-title-text">Brands I'm Proud to Work With</span>
                    </h2>
                    <p class="ref-portfolio-description p-portfolio-description">
                        <span class="ref-portfolio-description-text span-portfolio-description-text"><?php echo esc_html($portfolio_desc_text); ?></span>
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
                    <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="ref-portfolio-cta link-portfolio-cta button-portfolio-cta">
                        <span class="ref-portfolio-cta-text span-portfolio-cta-text">Portfolio</span>
                    </a>
                </div>
                
                <!-- Right Column -->
                <div class="ref-portfolio-right-column div-portfolio-right-column">
                    <div class="ref-portfolio-carousel-wrapper div-portfolio-carousel-wrapper">
                        <div class="ref-portfolio-carousel-container div-portfolio-carousel-container">
                            <div class="ref-portfolio-carousel-track div-portfolio-carousel-track">
                                <?php
                                $home_carousel_query = new WP_Query(array(
                                    'cat'                 => 6,
                                    'posts_per_page'      => -1,
                                    'orderby'             => 'date',
                                    'order'               => 'DESC',
                                    'post_status'         => 'publish',
                                    'no_found_rows'       => true,
                                ));
                                if ($home_carousel_query->have_posts()) :
                                    while ($home_carousel_query->have_posts()) :
                                        $home_carousel_query->the_post();
                                        $cpid = get_the_ID();
                                        $cthumb = get_the_post_thumbnail_url($cpid, 'large');
                                        if (empty($cthumb)) {
                                            $cthumb = $assets_url . '/images/hero-1.jpg';
                                        }
                                        $ctitle = get_the_title();
                                        ?>
                                <div class="ref-portfolio-card div-portfolio-card group relative">
                                    <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper aspect-square overflow-hidden relative">
                                        <img src="<?php echo esc_url($cthumb); ?>" alt="<?php echo esc_attr($ctitle); ?>" class="ref-portfolio-card-image img-portfolio-card-image w-full h-full object-cover">
                                        <div class="ref-portfolio-card-overlay div-portfolio-card-overlay absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none" aria-hidden="true"></div>
                                    </div>
                                    <div class="ref-portfolio-card-title-wrapper div-portfolio-card-title-wrapper absolute bottom-4 left-0 right-0 text-center z-10 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <span class="ref-portfolio-card-title span-portfolio-card-title text-white font-semibold drop-shadow-md text-xl md:text-2xl"><?php echo esc_html($ctitle); ?></span>
                                    </div>
                                </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
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
                    <?php
                    $blog_cat_1 = get_term(1, 'category');
                    $blog_desc_text = (!is_wp_error($blog_cat_1) && !empty($blog_cat_1->description)) ? strip_tags($blog_cat_1->description) : "Discover insights, trends, and stories from our creative journey. Explore our latest thoughts and updates on design, innovation, and the creative industry. From behind-the-scenes looks at our projects to expert perspectives on emerging trends, our blog offers a window into the world of creative excellence.";
                    ?>
                    <p class="ref-blog-description p-blog-description">
                        <span class="ref-blog-description-text span-blog-description-text"><?php echo esc_html($blog_desc_text); ?></span>
                    </p>
                </div>
            </div>
            
            <!-- Blog Posts Row (cat=1, ordered by recently updated) -->
            <?php
            $blog_posts_query = new WP_Query(array(
                'cat'                 => 1,
                'posts_per_page'      => 2,
                'orderby'             => 'modified',
                'order'               => 'DESC',
                'post_status'         => 'publish',
                'no_found_rows'       => true,
            ));
            $blog_posts = $blog_posts_query->have_posts() ? array_map('get_post', $blog_posts_query->posts) : array();
            wp_reset_postdata();
            ?>
            <div class="ref-blog-posts-wrapper div-blog-posts-wrapper flex gap-12 px-6 pt-0 pb-24">
                <?php
                $blog_fallback_img = $assets_url . '/images/hero-1.jpg';
                foreach (array(0, 1) as $col_index) {
                    $post_one = isset($blog_posts[$col_index]) ? $blog_posts[$col_index] : null;
                    $col_num = $col_index + 1;
                    if ($post_one) {
                        $bpid = $post_one->ID;
                        $blink = get_permalink($bpid);
                        $bthumb = get_the_post_thumbnail_url($bpid, 'large');
                        if (empty($bthumb)) {
                            $bthumb = $col_num === 1 ? $assets_url . '/images/hero-1.jpg' : $assets_url . '/images/hero-2.jpg';
                        }
                        $btitle = mb_strtoupper(get_the_title($bpid));
                    } else {
                        $blink = '#';
                        $bthumb = $col_num === 1 ? $assets_url . '/images/hero-1.jpg' : $assets_url . '/images/hero-2.jpg';
                        $btitle = $col_num === 1 ? 'SUPERCAR EXCELLENCE' : 'AUTOMOTIVE DESIGN';
                    }
                    ?>
                <div class="ref-blog-post-column div-blog-post-column flex flex-col">
                    <a href="<?php echo esc_url($blink); ?>" class="ref-blog-post ref-blog-post-<?php echo esc_attr((string) $col_num); ?> link-blog-post link-blog-post-<?php echo esc_attr((string) $col_num); ?>">
                        <div class="ref-blog-post-card div-blog-post-card">
                            <div class="ref-blog-post-image-wrapper div-blog-post-image-wrapper aspect-[16/9] overflow-hidden">
                                <img src="<?php echo esc_url($bthumb); ?>" alt="<?php echo esc_attr($btitle); ?>" class="ref-blog-post-image img-blog-post-image w-full h-full object-cover">
                            </div>
                            <div class="ref-blog-post-title-wrapper div-blog-post-title-wrapper">
                                <h3 class="ref-blog-post-title h3-blog-post-title">
                                    <span class="ref-blog-post-title-text span-blog-post-title-text"><?php echo esc_html($btitle); ?></span>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>
