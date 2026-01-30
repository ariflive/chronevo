<?php
/**
 * Category Template: Blog
 * Template for Blog category archive
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
        <!-- Left Column - Article List -->
        <div class="ref-blog-category-content div-blog-category-content w-full lg:w-[65%]">
            <?php
            // Random article cards with random images and content
            $articles = array(
                array(
                    'title' => 'The Future of Minimalist Design in Digital Spaces',
                    'description' => 'Exploring how restraint and intention shape user experiences. Design that speaks through silence and purposeful omission.',
                    'image' => 'hero-1.jpg',
                    'link' => home_url('/blog/article'),
                ),
                array(
                    'title' => 'Brand Identity Beyond the Logo',
                    'description' => 'True brand presence extends far beyond visual marks. We examine how consistency and clarity build lasting recognition.',
                    'image' => 'about.jpg',
                    'link' => home_url('/blog/article'),
                ),
                array(
                    'title' => 'Crafting Editorial Narratives Through Typography',
                    'description' => 'Typography as storytelling. How type choices influence perception and guide readers through editorial experiences.',
                    'image' => 'hero-3.jpg',
                    'link' => home_url('/blog/article'),
                ),
            );
            
            foreach ($articles as $index => $article) :
            ?>
            <!-- Article Card -->
            <article class="ref-blog-article-card ref-blog-article-card-<?php echo esc_attr($index + 1); ?> div-blog-article-card mb-12">
                <a href="<?php echo esc_url($article['link']); ?>" class="ref-blog-article-link link-blog-article block group">
                    <!-- Article Image - Full length of parent container -->
                    <div class="ref-blog-article-image-wrapper div-blog-article-image-wrapper w-full overflow-hidden mb-4">
                        <img 
                            src="<?php echo esc_url($assets_url . '/images/' . $article['image']); ?>" 
                            alt="<?php echo esc_attr($article['title']); ?>" 
                            class="ref-blog-article-image img-blog-article-image w-full h-auto object-cover"
                        >
                    </div>
                    
                    <!-- Article Title - 2 lines max, prominent and big -->
                    <h2 class="ref-blog-article-title h2-blog-article-title text-[#4F5053] font-semibold text-2xl md:text-3xl leading-tight uppercase group-hover:text-[#DCAF47] transition-colors duration-200">
                        <?php echo esc_html($article['title']); ?>
                    </h2>
                    
                    <!-- Article Short Description - 3 lines max, small text -->
                    <p class="ref-blog-article-description p-blog-article-description">
                        <?php echo esc_html($article['description']); ?>
                    </p>
                    <!-- Read more -->
                    <span class="ref-blog-article-read-more span-blog-article-read-more inline-flex items-center gap-2 text-[#7A7C80] group-hover:text-[#4F5053] transition-colors duration-200 text-sm font-medium uppercase tracking-wide">
                        Read more
                        <i class="ph ph-arrow-right"></i>
                    </span>
                </a>
            </article>
            <?php endforeach; ?>
            
            <!-- Pagination -->
            <nav class="ref-blog-category-pagination nav-blog-category-pagination div-blog-category-pagination flex justify-center items-center gap-2 mt-12 pt-8 border-t border-[#E1E2E4]">
                <a href="#" class="ref-blog-pagination-prev link-blog-pagination-prev px-4 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                    ← Previous
                </a>
                <span class="ref-blog-pagination-pages span-blog-pagination-pages flex gap-1">
                    <a href="#" class="ref-blog-pagination-page ref-blog-pagination-page-current link-blog-pagination-page link-blog-pagination-page-current px-3 py-2 text-sm font-medium">
                        1
                    </a>
                    <a href="#" class="ref-blog-pagination-page link-blog-pagination-page px-3 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                        2
                    </a>
                    <a href="#" class="ref-blog-pagination-page link-blog-pagination-page px-3 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                        3
                    </a>
                </span>
                <a href="#" class="ref-blog-pagination-next link-blog-pagination-next px-4 py-2 text-[#7A7C80] hover:text-[#4F5053] hover:bg-[#E1E2E4] transition-colors duration-200 text-sm font-medium">
                    Next →
                </a>
            </nav>
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
