<?php
/**
 * Template Name: Blog Page
 * Used for Page with slug "blog" - displays blog article list
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();
?>

<!-- Blog Section -->
<section class="ref-blog-category-section section-blog-category w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-blog-category-container div-blog-category-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-blog-category-title-wrapper div-blog-category-title-wrapper text-center mb-6">
            <h1 class="ref-blog-category-title h1-blog-category-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                Blog
            </h1>
        </div>
        
        <!-- Breadcrumb -->
        <div class="ref-blog-category-breadcrumb-wrapper div-blog-category-breadcrumb-wrapper text-center mb-12">
            <nav class="ref-blog-category-breadcrumb nav-blog-category-breadcrumb">
                <ol class="ref-blog-category-breadcrumb-list ol-blog-category-breadcrumb-list flex items-center justify-center gap-2">
                    <li class="ref-blog-category-breadcrumb-item li-blog-category-breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-blog-category-breadcrumb-home link-blog-category-breadcrumb-home text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li class="ref-blog-category-breadcrumb-separator li-blog-category-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-blog-category-breadcrumb-current li-blog-category-breadcrumb-current text-[#7A7C80]">
                        Blog
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Two Column Layout -->
        <div class="ref-blog-category-content-wrapper div-blog-category-content-wrapper flex flex-col lg:flex-row gap-8 lg:gap-12">
        <!-- Left Column - Article List (category slug "blog", 3 per page, ordered by recently updated) -->
        <div class="ref-blog-category-content div-blog-category-content w-full lg:w-[65%]">
            <?php
            $blog_paged = get_query_var('paged') ? (int) get_query_var('paged') : (isset($_GET['paged']) ? max(1, (int) $_GET['paged']) : 1);
            $blog_query = new WP_Query(array(
                'category_name'       => 'blog',
                'posts_per_page'      => 3,
                'orderby'             => 'modified',
                'order'               => 'DESC',
                'post_status'         => 'publish',
                'paged'               => $blog_paged,
            ));
            $blog_fallback_img = $assets_url . '/images/hero-1.jpg';

            if ($blog_query->have_posts()) :
                $index = 0;
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                    $art_id = get_the_ID();
                    $art_link = get_permalink($art_id);
                    $art_title = mb_strtoupper(get_the_title());
                    $art_img = get_the_post_thumbnail_url($art_id, 'large');
                    if (empty($art_img)) {
                        $art_img = $blog_fallback_img;
                    }
                    $art_excerpt = wp_trim_words(wp_strip_all_tags(get_the_excerpt()), 15);
                    if (empty($art_excerpt)) {
                        $art_excerpt = mb_strtoupper(get_the_title());
                    }
                    $index++;
            ?>
            <!-- Article Card -->
            <article class="ref-blog-article-card ref-blog-article-card-<?php echo esc_attr((string) $index); ?> div-blog-article-card mb-12">
                <a href="<?php echo esc_url($art_link); ?>" class="ref-blog-article-link link-blog-article block group">
                    <div class="ref-blog-article-image-wrapper div-blog-article-image-wrapper w-full aspect-[16/9] overflow-hidden mb-4">
                        <img
                            src="<?php echo esc_url($art_img); ?>"
                            alt="<?php echo esc_attr($art_title); ?>"
                            class="ref-blog-article-image img-blog-article-image w-full h-full object-cover"
                        >
                    </div>
                    <h2 class="ref-blog-article-title h2-blog-article-title text-[#4F5053] font-semibold text-2xl md:text-3xl leading-tight uppercase group-hover:text-[#DCAF47] transition-colors duration-200">
                        <?php echo esc_html($art_title); ?>
                    </h2>
                    <p class="ref-blog-article-description p-blog-article-description text-[#7A7C80] text-sm line-clamp-1">
                        <?php echo esc_html($art_excerpt); ?>
                    </p>
                    <span class="ref-blog-article-read-more span-blog-article-read-more inline-flex items-center gap-2 text-[#7A7C80] group-hover:text-[#4F5053] transition-colors duration-200 text-sm font-medium uppercase tracking-wide">
                        Read more
                        <i class="ph ph-arrow-right"></i>
                    </span>
                </a>
            </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <?php
            $blog_total = $blog_query->found_posts;
            $blog_max_pages = (int) $blog_query->max_num_pages;
            $show_pagination = $blog_total > 3 && $blog_max_pages > 1;
            $blog_base = get_permalink();
            ?>
            <?php if ($show_pagination) : ?>
            <nav class="ref-blog-category-pagination nav-blog-category-pagination div-blog-category-pagination flex justify-center items-center gap-2 mt-12 pt-8 border-t border-[#E1E2E4]">
                <?php
                $prev_url = $blog_paged > 1 ? add_query_arg('paged', $blog_paged - 1, $blog_base) : '';
                $next_url = $blog_paged < $blog_max_pages ? add_query_arg('paged', $blog_paged + 1, $blog_base) : '';
                ?>
                <?php if ($prev_url) : ?>
                <a href="<?php echo esc_url($prev_url); ?>" class="ref-blog-pagination-prev link-blog-pagination-prev px-4 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                    ← Previous
                </a>
                <?php else : ?>
                <span class="ref-blog-pagination-prev span-blog-pagination-prev px-4 py-2 text-[#BCBDC0] cursor-not-allowed text-sm font-medium">← Previous</span>
                <?php endif; ?>
                <span class="ref-blog-pagination-pages span-blog-pagination-pages flex gap-1">
                    <?php
                    for ($p = 1; $p <= $blog_max_pages; $p++) {
                        $is_current = (int) $p === (int) $blog_paged;
                        $page_url = $p === 1 ? $blog_base : add_query_arg('paged', $p, $blog_base);
                        $link_class = 'ref-blog-pagination-page link-blog-pagination-page px-3 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium';
                        if ($is_current) {
                            $link_class = 'ref-blog-pagination-page ref-blog-pagination-page-current link-blog-pagination-page link-blog-pagination-page-current px-3 py-2 text-sm font-medium';
                        }
                        if ($is_current) {
                            echo '<span class="' . esc_attr($link_class) . '">' . (int) $p . '</span>';
                        } else {
                            echo '<a href="' . esc_url($page_url) . '" class="' . esc_attr($link_class) . '">' . (int) $p . '</a>';
                        }
                    }
                    ?>
                </span>
                <?php if ($next_url) : ?>
                <a href="<?php echo esc_url($next_url); ?>" class="ref-blog-pagination-next link-blog-pagination-next px-4 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                    Next →
                </a>
                <?php else : ?>
                <span class="ref-blog-pagination-next span-blog-pagination-next px-4 py-2 text-[#BCBDC0] cursor-not-allowed text-sm font-medium">Next →</span>
                <?php endif; ?>
            </nav>
            <?php endif; ?>
        </div>
        
        <!-- Right Column - Recent Posts -->
        <div class="ref-blog-category-sidebar div-blog-category-sidebar w-full lg:w-[35%]">
            <div class="ref-blog-recent-posts-wrapper div-blog-recent-posts-wrapper">
                <h3 class="ref-blog-recent-posts-title h3-blog-recent-posts-title text-[#4F5053] font-semibold text-lg uppercase mb-4">
                    Recent Posts
                </h3>
                <ul class="ref-blog-recent-posts-list ul-blog-recent-posts-list list-none p-0 m-0">
                    <?php
                    $recent_posts = array(
                        array('title' => 'The Future of Minimalist Design', 'description' => 'Exploring restraint and intention in digital spaces.', 'image' => 'hero-1.jpg', 'link' => home_url('/blog/article')),
                        array('title' => 'Brand Identity Beyond the Logo', 'description' => 'How consistency and clarity build lasting recognition.', 'image' => 'about.jpg', 'link' => home_url('/blog/article')),
                        array('title' => 'Crafting Editorial Narratives', 'description' => 'Typography as storytelling through editorial experiences.', 'image' => 'hero-3.jpg', 'link' => home_url('/blog/article')),
                    );
                    foreach ($recent_posts as $index => $post) :
                    ?>
                    <li class="ref-blog-recent-post-item li-blog-recent-post-item mb-6">
                        <a href="<?php echo esc_url($post['link']); ?>" class="ref-blog-recent-post-link link-blog-recent-post-link div-blog-recent-post-card block group">
                            <div class="ref-blog-recent-post-card-inner div-blog-recent-post-card-inner flex gap-4">
                                <div class="ref-blog-recent-post-image-wrapper div-blog-recent-post-image-wrapper w-20 h-20 flex-shrink-0 overflow-hidden bg-[#E1E2E4]">
                                    <img src="<?php echo esc_url($assets_url . '/images/' . $post['image']); ?>" alt="<?php echo esc_attr($post['title']); ?>" class="ref-blog-recent-post-image img-blog-recent-post-image w-full h-full object-cover">
                                </div>
                                <div class="ref-blog-recent-post-content div-blog-recent-post-content flex-1 min-w-0">
                                    <h4 class="ref-blog-recent-post-title h4-blog-recent-post-title text-[#4F5053] font-semibold text-sm leading-tight mb-1 group-hover:text-[#DCAF47] transition-colors duration-200 line-clamp-2">
                                        <?php echo esc_html($post['title']); ?>
                                    </h4>
                                    <p class="ref-blog-recent-post-description p-blog-recent-post-description text-[#7A7C80] text-xs leading-relaxed line-clamp-2">
                                        <?php echo esc_html($post['description']); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
