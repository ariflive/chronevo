<?php
/**
 * Single Post Template
 * 
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();

// Get post data
$post_id = get_the_ID();
$categories = get_the_category();
$category_name = !empty($categories) ? $categories[0]->name : '';
$category_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '';

// Get next post
$next_post = get_next_post();
?>

<!-- Single Post Section -->
<section class="ref-single-post-section section-single-post w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-single-post-container div-single-post-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-single-post-title-wrapper div-single-post-title-wrapper text-center mb-6">
            <h1 class="ref-single-post-title h1-single-post-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                <?php the_title(); ?>
            </h1>
        </div>
        
        <!-- Breadcrumb -->
        <div class="ref-single-post-breadcrumb-wrapper div-single-post-breadcrumb-wrapper text-center mb-12">
            <nav class="ref-single-post-breadcrumb nav-single-post-breadcrumb">
                <ol class="ref-single-post-breadcrumb-list ol-single-post-breadcrumb-list flex items-center justify-center gap-2">
                    <li class="ref-single-post-breadcrumb-item li-single-post-breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-single-post-breadcrumb-home link-single-post-breadcrumb-home text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <?php if ($category_name) : ?>
                    <li class="ref-single-post-breadcrumb-separator li-single-post-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-single-post-breadcrumb-category li-single-post-breadcrumb-category">
                        <a href="<?php echo esc_url($category_link); ?>" class="ref-single-post-breadcrumb-category-link link-single-post-breadcrumb-category text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            <?php echo esc_html($category_name); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="ref-single-post-breadcrumb-separator li-single-post-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-single-post-breadcrumb-current li-single-post-breadcrumb-current text-[#7A7C80]">
                        <?php the_title(); ?>
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Two Column Layout -->
        <div class="ref-single-post-content-wrapper div-single-post-content-wrapper flex flex-col lg:flex-row gap-8 lg:gap-12">
            <!-- Left Column (65%) -->
            <div class="ref-single-post-left-column div-single-post-left-column w-full lg:w-[65%]">
                <!-- Featured Image -->
                <div class="ref-single-post-featured-image-wrapper div-single-post-featured-image-wrapper mb-8">
                    <img 
                        src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" 
                        alt="<?php echo esc_attr(get_the_title()); ?>" 
                        class="ref-single-post-featured-image img-single-post-featured w-full h-auto object-cover"
                    >
                </div>
                
                <!-- Post Content (All content including images, headings, paragraphs, links, etc.) -->
                <div class="ref-single-post-description div-single-post-description">
                    <?php
                    // Get post content
                    $content = get_the_content();
                    
                    // If no content, show dummy content
                    if (empty($content)) {
                        ?>
                        <!-- Dummy Content -->
                        <div class="ref-single-post-dummy-content div-single-post-dummy-content">
                            <img src="<?php echo esc_url($assets_url . '/images/hero-1.jpg'); ?>" alt="Design Trends" class="ref-single-post-dummy-image img-single-post-dummy w-full h-auto object-cover mb-8">
                            
                            <h2 class="ref-single-post-dummy-heading h2-single-post-dummy-heading text-[#4F5053] font-semibold text-2xl mb-4">
                                Exploring Modern Design Trends
                            </h2>
                            
                            <p class="ref-single-post-dummy-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                Design trends are constantly evolving, shaping the way we interact with digital and physical spaces. In recent years, we've seen a significant shift towards minimalism, sustainability, and user-centric design approaches. These trends reflect broader cultural movements and technological advancements that influence how designers create meaningful experiences.
                            </p>
                            
                            <p class="ref-single-post-dummy-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                The integration of <a href="#" class="ref-single-post-dummy-link link-single-post-dummy text-[#4F5053] hover:text-[#DCAF47] transition-colors duration-200 underline">artificial intelligence</a> and machine learning in design tools has opened new possibilities for creative expression. Designers can now leverage these technologies to create more personalized and adaptive interfaces that respond to user behavior in real-time.
                            </p>
                            
                            <h3 class="ref-single-post-dummy-subheading h3-single-post-dummy-subheading text-[#4F5053] font-semibold text-xl mb-4">
                                Key Design Principles
                            </h3>
                            
                            <img src="<?php echo esc_url($assets_url . '/images/hero-2.jpg'); ?>" alt="Design Principles" class="ref-single-post-dummy-image img-single-post-dummy w-full h-auto object-cover mb-8">
                            
                            <p class="ref-single-post-dummy-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-6">
                                Understanding the fundamental principles of design is crucial for creating effective visual communication. These principles include balance, contrast, emphasis, movement, pattern, rhythm, and unity. Each principle plays a vital role in guiding the viewer's eye and creating a cohesive design experience.
                            </p>
                            
                            <ul class="ref-single-post-dummy-list ul-single-post-dummy-list list-disc list-inside mb-6 space-y-2">
                                <li class="ref-single-post-dummy-list-item li-single-post-dummy-list-item text-[#7A7C80]">Minimalist aesthetics with clean lines</li>
                                <li class="ref-single-post-dummy-list-item li-single-post-dummy-list-item text-[#7A7C80]">Sustainable and eco-friendly materials</li>
                                <li class="ref-single-post-dummy-list-item li-single-post-dummy-list-item text-[#7A7C80]">Accessibility-first design approach</li>
                            </ul>
                            
                            <p class="ref-single-post-dummy-paragraph p-single-post-dummy-paragraph text-[#7A7C80] text-base leading-relaxed mb-8">
                                As we move forward, designers must continue to adapt and evolve their practices to meet the changing needs of users and the environment. The future of design lies in creating solutions that are not only beautiful but also functional, sustainable, and inclusive.
                            </p>
                        </div>
                        <?php
                    } else {
                        // Display actual post content with all formatting
                        the_content();
                    }
                    ?>
                </div>
                
                <!-- Next Project Link -->
                <?php if ($next_post) : ?>
                <div class="ref-single-post-next-link-wrapper div-single-post-next-link-wrapper mt-8">
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="ref-single-post-next-link link-single-post-next text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200 text-sm">
                        Next Project →
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Right Column (35%) - Sticky -->
            <div class="ref-single-post-right-column div-single-post-right-column w-full lg:w-[35%]">
                <div class="ref-single-post-sidebar div-single-post-sidebar">
                    <!-- Full Caps Subtitle -->
                    <h3 class="ref-single-post-sidebar-title h3-single-post-sidebar-title text-[#4F5053] font-semibold text-lg uppercase mb-4">
                        Project Details
                    </h3>
                    
                    <!-- 2-3 Lines of Less Prominent Text -->
                    <div class="ref-single-post-sidebar-text div-single-post-sidebar-text text-[#7A7C80] text-sm leading-relaxed mb-6">
                        <p>This project showcases innovative design trends and creative solutions. It represents our commitment to excellence and attention to detail.</p>
                        <p class="mt-3">Our team worked closely to deliver outstanding results that exceed expectations.</p>
                    </div>
                    
                    <!-- Social Media Icons -->
                    <div class="ref-single-post-social div-single-post-social">
                        <p class="ref-single-post-social-label p-single-post-social-label text-[#7A7C80] text-xs uppercase mb-3">Share</p>
                        <div class="ref-single-post-social-icons div-single-post-social-icons flex gap-4">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-post-social-twitter link-single-post-social-twitter text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                                <i class="ph ph-twitter-logo"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-post-social-facebook link-single-post-social-facebook text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                                <i class="ph ph-facebook-logo"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-post-social-linkedin link-single-post-social-linkedin text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                                <i class="ph ph-linkedin-logo"></i>
                            </a>
                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&description=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="ref-single-post-social-pinterest link-single-post-social-pinterest text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                                <i class="ph ph-pinterest-logo"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
