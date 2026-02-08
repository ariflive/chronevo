<?php
/**
 * Single Post Template - Blog Article
 * Template for single blog post articles
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();

// Get post data
$categories = get_the_category();
$category_name = !empty($categories) ? $categories[0]->name : 'Blog';
$category_link = !empty($categories) ? get_category_link($categories[0]->term_id) : home_url('/blog');
$next_post = get_next_post();
?>

<!-- Single Article Section -->
<section class="ref-single-article-section section-single-post w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-single-article-container div-single-post-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-single-article-title-wrapper div-single-post-title-wrapper text-center mb-6">
            <h1 class="ref-single-article-title h1-single-post-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                <?php the_title(); ?>
            </h1>
        </div>
        
        <!-- Breadcrumb -->
        <div class="ref-single-article-breadcrumb-wrapper div-single-post-breadcrumb-wrapper text-center mb-12">
            <nav class="ref-single-article-breadcrumb nav-single-post-breadcrumb">
                <ol class="ref-single-article-breadcrumb-list ol-single-post-breadcrumb-list flex items-center justify-center gap-2">
                    <li class="ref-single-article-breadcrumb-item li-single-post-breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-single-article-breadcrumb-home link-single-post-breadcrumb-home text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li class="ref-single-article-breadcrumb-separator li-single-post-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-single-article-breadcrumb-category li-single-post-breadcrumb-category">
                        <a href="<?php echo esc_url($category_link); ?>" class="ref-single-article-breadcrumb-category-link link-single-post-breadcrumb-category text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            <?php echo esc_html($category_name); ?>
                        </a>
                    </li>
                    <li class="ref-single-article-breadcrumb-separator li-single-post-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-single-article-breadcrumb-current li-single-post-breadcrumb-current text-[#7A7C80]">
                        <?php the_title(); ?>
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Single Centered Layout -->
        <div class="ref-single-article-content-wrapper div-single-article-content-wrapper w-full max-w-3xl mx-auto">
            <?php
            $featured_videos = array(
                $assets_url . '/videos/1.mp4',
                $assets_url . '/videos/2.mp4',
                $assets_url . '/videos/3.mp4',
            );
            ?>
            <div class="ref-single-article-featured-image-wrapper div-single-post-featured-image-wrapper mb-8 relative overflow-hidden" data-videos="<?php echo esc_attr(wp_json_encode($featured_videos)); ?>">
                <img 
                    src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" 
                    alt="<?php echo esc_attr(get_the_title()); ?>" 
                    class="ref-single-article-featured-image img-single-post-featured w-full h-auto object-cover"
                >
                <div class="ref-single-article-featured-video-overlay div-single-post-featured-video-overlay absolute inset-0 w-full h-full opacity-0 pointer-events-none" aria-hidden="true">
                    <video class="ref-single-article-featured-video img-single-post-featured-video w-full h-full object-cover" muted playsinline></video>
                    <div class="ref-single-article-featured-dots div-single-post-featured-dots absolute bottom-0 left-0 right-0 flex justify-center gap-2 pb-4" aria-label="Slideshow navigation"></div>
                </div>
            </div>
            
            <!-- Main Article Content Container -->
                <div class="ref-single-article-main div-single-post-description div-single-article-main">
                    <?php
                    $content = get_the_content();
                    if (!empty($content)) {
                        the_content();
                    } else {
                        ?>
                        <!-- Dummy Article Contents -->
                        <div class="ref-single-article-dummy div-single-post-dummy-content">
                            <p class="ref-single-article-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                Design trends are constantly evolving, shaping the way we interact with digital and physical spaces. In recent years, we have seen a significant shift towards minimalism, sustainability, and user-centric design approaches.
                            </p>
                            
                            <h2 class="ref-single-article-h2 h2-single-post-dummy-heading text-[#4F5053] font-semibold text-2xl mb-4 mt-8 uppercase">
                                Exploring Modern Design Trends
                            </h2>
                            
                            <p class="ref-single-article-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                The integration of <a href="#" class="ref-single-article-link link-single-post-dummy text-[#4F5053] hover:text-[#DCAF47] transition-colors duration-200 underline">artificial intelligence</a> and machine learning in design tools has opened new possibilities for creative expression. Designers can now leverage these technologies to create more personalized and adaptive interfaces.
                            </p>
                            
                            <h3 class="ref-single-article-h3 h3-single-post-dummy-subheading text-[#4F5053] font-semibold text-xl mb-4 mt-6 uppercase">
                                Key Design Principles
                            </h3>
                            
                            <p class="ref-single-article-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                Understanding the fundamental principles of design is crucial for creating effective visual communication. These principles include balance, contrast, emphasis, movement, pattern, rhythm, and unity.
                            </p>
                            
                            <ul class="ref-single-article-list ul-single-post-dummy-list list-disc list-inside mb-6 space-y-2">
                                <li class="ref-single-article-list-item li-single-post-dummy-list-item text-[#7A7C80]">Minimalist aesthetics with clean lines</li>
                                <li class="ref-single-article-list-item li-single-post-dummy-list-item text-[#7A7C80]">Sustainable and eco-friendly materials</li>
                                <li class="ref-single-article-list-item li-single-post-dummy-list-item text-[#7A7C80]">Accessibility-first design approach</li>
                            </ul>
                            
                            <blockquote class="ref-single-article-blockquote border-l-4 border-[#DCAF47] pl-6 py-2 my-6 text-[#7A7C80] italic">
                                The future of design lies in creating solutions that are not only beautiful but also functional, sustainable, and inclusive.
                            </blockquote>
                            
                            <h4 class="ref-single-article-h4 h4-single-article text-[#4F5053] font-semibold text-lg mb-4 mt-6 uppercase">
                                Conclusion
                            </h4>
                            
                            <p class="ref-single-article-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-8">
                                As we move forward, designers must continue to adapt and evolve their practices to meet the changing needs of users and the environment. Every decision is measured. Every detail has a purpose.
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            
            <!-- Share -->
            <div class="ref-single-article-share div-single-article-share text-center mt-8 pt-8 border-t border-[#E1E2E4]">
                <h3 class="ref-single-article-share-title h3-single-article-share-title text-[#4F5053] font-semibold text-sm uppercase mb-4">
                    Share
                </h3>
                <div class="ref-single-article-social-icons div-single-post-social-icons flex justify-center gap-4">
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-article-social-twitter link-single-post-social-twitter text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                        <i class="ph ph-twitter-logo"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-article-social-facebook link-single-post-social-facebook text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                        <i class="ph ph-facebook-logo"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-article-social-linkedin link-single-post-social-linkedin text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                        <i class="ph ph-linkedin-logo"></i>
                    </a>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&description=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-article-social-pinterest link-single-post-social-pinterest text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                        <i class="ph ph-pinterest-logo"></i>
                    </a>
                </div>
            </div>
            
            <!-- Back to Blog Link -->
            <div class="ref-single-article-back-wrapper div-single-post-next-link-wrapper mt-8 text-center">
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="ref-single-article-back-link link-single-post-next text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200 text-sm">
                    ← Back to Blog
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
