<?php
/**
 * Legal / policy document layout (Terms, Privacy, etc.)
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$chr_rp = chronevo_ref_page();
$page_slug = get_post_field('post_name', get_the_ID());
$eyebrow = 'Legal';
if ($page_slug === 'privacy') {
    $eyebrow = 'Privacy';
} elseif ($page_slug === 'terms') {
    $eyebrow = 'Terms';
}
$modified_ts = get_the_modified_time('U');
$modified_iso = $modified_ts ? gmdate('c', $modified_ts) : '';
?>

<section class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'section', 'page') . ' section-legal-page w-full relative py-20 md:py-28 bg-[#F6F7F8]'); ?>">
    <div class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'div', 'container') . ' div-legal-page-container w-full max-w-[1440px] mx-auto px-6'); ?>">
        <article id="post-<?php the_ID(); ?>" class="ref-post-article <?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'article', 'document') . ' div-legal-page-article'); ?>">
            <header class="ref-post-header <?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'header', 'document') . ' div-legal-page-header'); ?>">
                <p class="<?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'p', 'eyebrow') . ' p-legal-page-eyebrow'); ?>"><?php echo esc_html($eyebrow); ?></p>
                <h1 class="ref-post-title <?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'h1', 'title') . ' h1-legal-page-title'); ?>"><?php the_title(); ?></h1>
                <?php if ($modified_iso) : ?>
                    <time class="ref-post-date <?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'time', 'modified') . ' time-legal-page-modified'); ?>" datetime="<?php echo esc_attr($modified_iso); ?>">
                        <?php
                        printf(
                            /* translators: %s: formatted last modified date */
                            esc_html__('Last updated %s', 'chronevo'),
                            esc_html(get_the_modified_date())
                        );
                        ?>
                    </time>
                <?php endif; ?>
            </header>

            <div class="ref-post-content <?php echo esc_attr(chronevo_ref_class($chr_rp, 'legal', 'div', 'body') . ' div-rich-html-content div-legal-page-body'); ?>">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</section>
