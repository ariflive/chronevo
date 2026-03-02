<?php
/**
 * Single Service Template
 * Used for single posts in the Services category (e.g. /services/{slug}).
 * Structure and layout aligned with blog/post single (single-post.php). No breadcrumb, no back, no video.
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$service_post_id = get_the_ID();
$show_image = (function_exists('get_field')) ? get_field('show_image', $service_post_id) : false;
$show_image = ($show_image === true || $show_image === '1');
$has_thumbnail = has_post_thumbnail($service_post_id);
$featured_img_url = $has_thumbnail ? get_the_post_thumbnail_url($service_post_id, 'large') : '';
$display_featured_image = $show_image && $has_thumbnail && !empty($featured_img_url);
?>

<!-- Single Service Section (structure aligned with single-post / blog) -->
<section class="ref-single-service-section section-single-post w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-single-service-container div-single-post-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-single-service-title-wrapper div-single-post-title-wrapper text-center mb-6">
            <h1 class="ref-single-service-title h1-single-post-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                <?php the_title(); ?>
            </h1>
        </div>

        <!-- Row-by-row content layout -->
        <div class="ref-single-service-content-wrapper div-single-post-content-wrapper w-full max-w-3xl mx-auto flex flex-col gap-8">
            <?php if ($display_featured_image) : ?>
            <div class="ref-single-service-row ref-single-post-featured-image-wrapper div-single-post-featured-image-wrapper w-full relative overflow-hidden aspect-[1/1]">
                <img
                    src="<?php echo esc_url($featured_img_url); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>"
                    class="ref-single-post-featured-image img-single-post-featured w-full h-full object-cover"
                >
            </div>
            <?php endif; ?>

            <div class="ref-single-service-row ref-single-service-main div-single-post-main div-single-post-description div-single-article-main w-full">
                <div class="ref-single-post-dummy div-single-post-dummy-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="ref-single-service-row ref-single-service-contact-block div-single-service-contact-block w-full pt-10 pb-2 border-t border-[#E1E2E4]">
                <h2 class="ref-single-service-contact-heading h2-single-service-contact-heading">
                    <?php esc_html_e('Get in touch', 'chronevo'); ?>
                </h2>
                <p class="ref-single-service-contact-intro p-single-service-contact-intro">
                    <?php esc_html_e('Interested in working together? Get in touch or explore our portfolio.', 'chronevo'); ?>
                </p>
                <div class="ref-single-service-cta-wrapper div-single-service-cta-wrapper">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="ref-single-service-contact-cta link-single-service-contact-cta">
                        <?php esc_html_e('Contact us', 'chronevo'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="ref-single-service-portfolio-link link-single-service-portfolio-cta">
                        <?php esc_html_e('View Portfolio', 'chronevo'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
