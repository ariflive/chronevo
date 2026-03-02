<?php
/**
 * Template part: Single Service (category 9)
 * Displays only featured image (if available) and post content. No breadcrumb, no back link, no video.
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$service_post_id = get_the_ID();
$has_thumbnail = has_post_thumbnail($service_post_id);
$featured_img_url = $has_thumbnail ? get_the_post_thumbnail_url($service_post_id, 'large') : '';
?>

<!-- Single Service Section (image + content only) -->
<section class="ref-single-service-section section-single-service w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-single-service-container div-single-service-container w-full max-w-[1440px] mx-auto px-6">
        <?php if ($has_thumbnail && !empty($featured_img_url)) : ?>
        <div class="ref-single-post-featured-image-wrapper div-single-post-featured-image-wrapper mb-8">
            <img
                src="<?php echo esc_url($featured_img_url); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>"
                class="ref-single-post-featured-image img-single-post-featured w-full h-auto object-cover"
            >
        </div>
        <?php endif; ?>

        <div class="ref-single-post-description div-single-post-description">
            <?php the_content(); ?>
        </div>

        <div class="ref-single-service-contact-block div-single-service-contact-block mt-12 pt-8 border-t border-[#E1E2E4]">
            <p class="ref-single-service-contact-text p-single-service-contact-text text-[#7A7C80] text-base leading-relaxed mb-4">
                <?php esc_html_e('Interested in working together? Get in touch or explore our portfolio.', 'chronevo'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="ref-single-service-portfolio-link link-single-service-portfolio text-[#4F5053] hover:text-[#DCAF47] transition-colors duration-200 font-medium">
                <?php esc_html_e('View Portfolio', 'chronevo'); ?>
            </a>
        </div>
    </div>
</section>
