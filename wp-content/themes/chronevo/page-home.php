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
/** Page slug for ref-{page}-* classes (this template is only used for the site front page). */
$hr = 'home';
get_header();
?>
    <!-- Hero Section -->
    <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'section', 'root')); ?> section-hero w-full relative pt-12">
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'div', 'container')); ?> div-hero-container w-[90%] mx-auto px-6 relative">
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'div', 'images-row')); ?> div-hero-images w-full flex items-end justify-center gap-32 relative z-0 pt-[40vh]">
                <!-- Hero Image 2 - Medium Size (aspect 3/4, image fills) - from ACF photo_left -->
                <?php
                $photo_left = get_field('photo_left', get_queried_object_id());
                $photo_left_url = is_string($photo_left) ? $photo_left : (is_array($photo_left) && !empty($photo_left['url']) ? $photo_left['url'] : '');
                $hero_img_2_src = $photo_left_url !== '' ? $photo_left_url : $assets_url . '/images/hero-2.jpg';
                ?>
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'div', 'image-wrap-photo-left')); ?> div-hero-image-wrapper-2 mb-12 aspect-[3/4] overflow-hidden w-[min(375px,90vw)]">
                    <img src="<?php echo esc_url($hero_img_2_src); ?>" alt="Hero Image 2" class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'img', 'photo-left')); ?> img-hero-2 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
                
                <!-- Hero Image 1 - Bigger Size (aspect 1/1, image fills) - from ACF photo_center -->
                <?php
                $photo_center = get_field('photo_center', get_queried_object_id());
                $photo_center_url = is_string($photo_center) ? $photo_center : (is_array($photo_center) && !empty($photo_center['url']) ? $photo_center['url'] : '');
                $hero_img_1_src = $photo_center_url !== '' ? $photo_center_url : $assets_url . '/images/hero-1.jpg';
                ?>
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'div', 'image-wrap-photo-center')); ?> div-hero-image-wrapper-1 relative flex-1 min-h-[600px] aspect-square overflow-hidden">
                    <img src="<?php echo esc_url($hero_img_1_src); ?>" alt="Hero Image 1" class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'img', 'photo-center')); ?> img-hero-1 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
                
                <!-- Hero Image 3 - Smaller Size (aspect 9/16, image fills) - from ACF photo_right -->
                <?php
                $photo_right = get_field('photo_right', get_queried_object_id());
                $photo_right_url = is_string($photo_right) ? $photo_right : (is_array($photo_right) && !empty($photo_right['url']) ? $photo_right['url'] : '');
                $hero_img_3_src = $photo_right_url !== '' ? $photo_right_url : $assets_url . '/images/hero-3.jpg';
                ?>
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'div', 'image-wrap-photo-right')); ?> div-hero-image-wrapper-3 mb-12 aspect-[9/16] overflow-hidden w-[min(280px,90vw)]">
                    <img src="<?php echo esc_url($hero_img_3_src); ?>" alt="Hero Image 3" class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'img', 'photo-right')); ?> img-hero-3 img-hero-animated-fade img-hero-animated-slide w-full h-full object-cover">
                </div>
            </div>
            
            <!-- Hero Slogan -->
            <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'section', 'slogan')); ?> section-hero-slogan absolute top-0 left-0 right-0 z-10">
                <h1 class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'h1', 'slogan-title')); ?> h1-hero-slogan text-[97.2px] md:text-[129.6px] lg:text-[172.8px] font-bold uppercase leading-none">
                    <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-row-connect')); ?> span-slogan-connect block text-left">
                        <?php
                        $tagline_1 = get_field('tagline_1', get_queried_object_id());
                        $tagline_1 = is_string($tagline_1) ? mb_strtoupper($tagline_1) : '';
                        $chars = $tagline_1 !== '' ? mb_str_split($tagline_1) : array('C', 'O', 'N', 'N', 'E', 'C', 'T');
                        foreach ($chars as $i => $char) {
                            $idx = $i + 1;
                            $span_class = 'span-char-item span-char-item-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-char-connect', $idx) . ' ' . $span_class); ?>"><?php echo esc_html($char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                    <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-row-explore')); ?> span-slogan-explore block text-center">
                        <?php
                        $tagline_2 = get_field('tagline_2', get_queried_object_id());
                        $tagline_2 = is_string($tagline_2) ? mb_strtoupper($tagline_2) : '';
                        $explore_chars = $tagline_2 !== '' ? mb_str_split($tagline_2) : array('E', 'X', 'P', 'L', 'O', 'R', 'E');
                        foreach ($explore_chars as $j => $explore_char) {
                            $idx = $j + 1;
                            $span_class = 'span-explore-char span-explore-char-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-char-explore', $idx) . ' ' . $span_class); ?>"><?php echo esc_html($explore_char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                    <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-row-design')); ?> span-slogan-design block text-right">
                        <?php
                        $tagline_3 = get_field('tagline_3', get_queried_object_id());
                        $tagline_3 = is_string($tagline_3) ? mb_strtoupper($tagline_3) : '';
                        $design_chars = $tagline_3 !== '' ? mb_str_split($tagline_3) : array('D', 'E', 'S', 'I', 'G', 'N');
                        foreach ($design_chars as $k => $design_char) {
                            $idx = $k + 1;
                            $span_class = 'span-design-char span-design-char-' . $idx;
                            ?>
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'hero', 'span', 'slogan-char-design', $idx) . ' ' . $span_class); ?>"><?php echo esc_html($design_char); ?></span>
                        <?php
                        }
                        ?>
                    </span>
                </h1>
            </section>
        </div>
    </section>
    
    <!-- Taglines Section -->
    <?php
    $tagline_items = array('Where your future is treated with care, not just strategy.');
    ?>
    <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'taglines', 'section', 'root')); ?> section-taglines w-full py-12 relative">
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'taglines', 'div', 'wrapper')); ?> div-taglines-wrapper flex">
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'taglines', 'div', 'marquee-content')); ?> div-taglines-content flex items-center gap-8 whitespace-nowrap animate-taglines-scroll">
                <?php
                $tagline_item_tailwind = 'span-tagline-item text-white/40 font-light text-5xl md:text-6xl lg:text-7xl xl:text-8xl tracking-tight';
                $separator_tailwind = 'span-tagline-separator text-white/10 text-4xl md:text-5xl lg:text-6xl';
                $tagline_seq = 0;
                foreach (array($tagline_items, $tagline_items) as $round_idx => $round) {
                    foreach ($round as $idx => $text) {
                        $tagline_seq++;
                        ?>
                <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'taglines', 'span', 'marquee-item', $tagline_seq) . ' ' . $tagline_item_tailwind); ?>"><?php echo esc_html($text); ?></span>
                <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'taglines', 'span', 'marquee-separator', $tagline_seq) . ' ' . $separator_tailwind); ?>">•</span>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'section', 'root')); ?> section-services w-full relative min-h-[calc(100svh+3rem)] flex items-center justify-center pt-16 md:pt-20 pb-24 md:pb-28">
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'div', 'container')); ?> div-services-container relative w-full max-w-[1440px] mx-auto px-6">
            <!-- Services Title -->
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'div', 'title-wrap')); ?> div-services-title-wrapper relative text-center">
                <h2 class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'h2', 'title')); ?> h2-services-title text-white font-normal uppercase tracking-tight">EXPLORE</h2>
            </div>
            
            <!-- Floating Images (from category 9, ordered by recently updated) -->
            <?php
            $services_query = new WP_Query(array(
                'cat'                 => 9,
                'posts_per_page'      => -1,
                'orderby'             => 'modified',
                'order'               => 'DESC',
                'post_status'         => 'publish',
                'no_found_rows'       => true,
            ));
            ?>
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'div', 'images-wrap')); ?> div-services-images-wrapper absolute inset-0 w-full h-full flex items-center justify-center">
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
                        $external_url = (function_exists('get_field')) ? get_field('external_url', $pid) : '';
                        $has_valid_external = !empty($external_url) && is_string($external_url) && filter_var($external_url, FILTER_VALIDATE_URL);
                        $service_link = $has_valid_external ? esc_url($external_url) : esc_url(get_permalink($pid));
                        $link_target_attr = $has_valid_external ? ' target="_blank" rel="noopener noreferrer"' : '';
                        ?>
                <a href="<?php echo $service_link; ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'a', 'service', $pid) . ' div-service-image-wrapper div-service-image-' . (int) $si); ?> absolute block"<?php echo $link_target_attr; ?>>
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($service_title); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'img', 'thumb', $pid) . ' img-service-image-' . (int) $si); ?> object-cover aspect-square">
                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'div', 'image-overlay', $pid)); ?> div-service-image-overlay absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/50 to-transparent pointer-events-none" aria-hidden="true"></div>
                    <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'span', 'label', $pid) . ' span-service-label span-service-label-' . (int) $si); ?>"><?php echo esc_html($service_title); ?></span>
                </a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'div', 'cta-wrap')); ?> div-services-cta-wrapper absolute bottom-2 md:bottom-4 left-0 right-0 z-[35] flex justify-center px-6 pb-8 md:pb-12 pointer-events-none">
            <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'a', 'explore-portfolio')); ?> link-services-explore-cta pointer-events-auto inline-flex items-center justify-center min-w-[13rem] px-12 py-4 text-base md:text-lg font-semibold uppercase tracking-[0.15em] text-[#4F5053] bg-[#F6F7F8] border-2 border-[#E1E2E4] shadow-xl shadow-black/30 transition-all duration-200 ease-out hover:bg-white hover:border-[#DCAF47] hover:shadow-black/40 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#DCAF47]/40 focus-visible:ring-offset-2 focus-visible:ring-offset-[#0a0a0a]">
                <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'services', 'span', 'explore-label')); ?> span-services-explore-cta-text">EXPLORE</span>
            </a>
        </div>
    </section>
    
    <!-- Portfolio Section (category 6: title + description) -->
    <?php
    $portfolio_cat_6 = get_term(6, 'category');
    $portfolio_short_title = (!is_wp_error($portfolio_cat_6) && isset($portfolio_cat_6->name)) ? $portfolio_cat_6->name : 'My Work';
    $portfolio_desc_text = (!is_wp_error($portfolio_cat_6) && !empty($portfolio_cat_6->description)) ? strip_tags($portfolio_cat_6->description) : "A look at some of the clients and companies I've been fortunate to work with.";
    ?>
    <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'section', 'root')); ?> section-portfolio w-full relative">
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'container')); ?> div-portfolio-container w-full max-w-[1440px] mx-auto px-6 py-24">
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'content')); ?> div-portfolio-content-wrapper flex gap-12">
                <!-- Left Column -->
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'col-left')); ?> div-portfolio-left-column flex flex-col">
                    <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'a', 'category-short-title')); ?> link-portfolio-short-title">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'span', 'category-short-text')); ?> span-portfolio-short-title-text"><?php echo esc_html($portfolio_short_title); ?></span>
                    </a>
                    <h2 class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'h2', 'main-heading')); ?> h2-portfolio-main-title">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'span', 'main-heading-text')); ?> span-portfolio-main-title-text">Brands I'm Proud to Work With</span>
                    </h2>
                    <p class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'p', 'description')); ?> p-portfolio-description">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'span', 'description-text')); ?> span-portfolio-description-text"><?php echo esc_html($portfolio_desc_text); ?></span>
                    </p>
                    
                    <!-- Carousel Navigation -->
                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'carousel-nav')); ?> div-portfolio-carousel-navigation">
                        <button type="button" class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'button', 'carousel-prev')); ?> button-portfolio-carousel-prev" aria-label="Previous slide">
                            <i class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'i', 'carousel-arrow-prev')); ?> ph ph-arrow-left"></i>
                        </button>
                        <button type="button" class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'button', 'carousel-next')); ?> button-portfolio-carousel-next" aria-label="Next slide">
                            <i class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'i', 'carousel-arrow-next')); ?> ph ph-arrow-right"></i>
                        </button>
                    </div>
                    
                    <!-- Portfolio CTA Button -->
                    <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'a', 'cta-portfolio')); ?> link-portfolio-cta button-portfolio-cta">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'span', 'cta-label')); ?> span-portfolio-cta-text">Portfolio</span>
                    </a>
                </div>
                
                <!-- Right Column -->
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'col-right')); ?> div-portfolio-right-column">
                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'carousel-wrap')); ?> div-portfolio-carousel-wrapper">
                        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'carousel-viewport')); ?> div-portfolio-carousel-container">
                            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'carousel-track')); ?> div-portfolio-carousel-track">
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
                                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'card', $cpid) . ' div-portfolio-card group relative'); ?>">
                                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'card-image-wrap', $cpid) . ' div-portfolio-card-image-wrapper aspect-square overflow-hidden relative'); ?>">
                                        <img src="<?php echo esc_url($cthumb); ?>" alt="<?php echo esc_attr($ctitle); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'img', 'card-thumb', $cpid) . ' img-portfolio-card-image w-full h-full object-cover'); ?>">
                                        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'card-overlay', $cpid)); ?> div-portfolio-card-overlay absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none" aria-hidden="true"></div>
                                    </div>
                                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'div', 'card-title-wrap', $cpid)); ?> div-portfolio-card-title-wrapper absolute bottom-4 left-0 right-0 text-center z-10 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'portfolio', 'span', 'card-title', $cpid)); ?> span-portfolio-card-title text-white font-semibold drop-shadow-md text-xl md:text-2xl"><?php echo esc_html($ctitle); ?></span>
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
    <section class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'section', 'root')); ?> section-blog w-full relative">
        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'container')); ?> div-blog-container w-full max-w-[1440px] mx-auto">
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'intro-row')); ?> div-blog-content-wrapper flex gap-12 px-6 pt-24 pb-12">
                <!-- Left Column -->
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'col-left')); ?> div-blog-left-column flex flex-col">
                    <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'short-title-wrap')); ?> div-blog-short-title-wrapper">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'span', 'short-title')); ?> span-blog-short-title-text">Blog</span>
                    </div>
                    <h2 class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'h2', 'main-heading')); ?> h2-blog-main-title">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'span', 'main-heading-text')); ?> span-blog-main-title-text">Check our recent articles</span>
                    </h2>
                </div>
                
                <!-- Right Column -->
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'col-right')); ?> div-blog-right-column flex flex-col">
                    <?php
                    $blog_cat_1 = get_term(1, 'category');
                    $blog_desc_text = (!is_wp_error($blog_cat_1) && !empty($blog_cat_1->description)) ? strip_tags($blog_cat_1->description) : "Discover insights, trends, and stories from our creative journey. Explore our latest thoughts and updates on design, innovation, and the creative industry. From behind-the-scenes looks at our projects to expert perspectives on emerging trends, our blog offers a window into the world of creative excellence.";
                    ?>
                    <p class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'p', 'description')); ?> p-blog-description">
                        <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'span', 'description-text')); ?> span-blog-description-text"><?php echo esc_html($blog_desc_text); ?></span>
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
            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'posts-row')); ?> div-blog-posts-wrapper flex gap-12 px-6 pt-0 pb-24">
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
                        $blog_uid = (string) (int) $bpid;
                    } else {
                        $blink = '#';
                        $bthumb = $col_num === 1 ? $assets_url . '/images/hero-1.jpg' : $assets_url . '/images/hero-2.jpg';
                        $btitle = $col_num === 1 ? 'SUPERCAR EXCELLENCE' : 'AUTOMOTIVE DESIGN';
                        $blog_uid = 'placeholder-' . (int) $col_num;
                    }
                    ?>
                <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'post-column', $blog_uid) . ' div-blog-post-column flex flex-col'); ?>">
                    <a href="<?php echo esc_url($blink); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'a', 'post-card', $blog_uid) . ' link-blog-post link-blog-post-' . (int) $col_num); ?>">
                        <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'post-card-inner', $blog_uid) . ' div-blog-post-card'); ?>">
                            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'post-image-wrap', $blog_uid) . ' div-blog-post-image-wrapper aspect-[16/9] overflow-hidden'); ?>">
                                <img src="<?php echo esc_url($bthumb); ?>" alt="<?php echo esc_attr($btitle); ?>" class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'img', 'post-thumb', $blog_uid) . ' img-blog-post-image w-full h-full object-cover'); ?>">
                            </div>
                            <div class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'div', 'post-title-wrap', $blog_uid)); ?> div-blog-post-title-wrapper">
                                <h3 class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'h3', 'post-title', $blog_uid)); ?> h3-blog-post-title">
                                    <span class="<?php echo esc_attr(chronevo_ref_class($hr, 'blog', 'span', 'post-title-text', $blog_uid)); ?> span-blog-post-title-text"><?php echo esc_html($btitle); ?></span>
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
