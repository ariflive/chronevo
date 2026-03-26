<?php
/**
 * Reusable client highlight card (Supercarbaldie block).
 *
 * @package Chronevo
 *
 * Expected $args (from get_template_part third argument):
 * - ref_page        string 'about'|'portfolio' — first segment of ref-* classes.
 * - acf_post_id     int    Page/post ID where ACF fields about_client_* are stored.
 * - layout          string 'standalone'|'embedded' — standalone = full-width section; embedded = inside clients strip.
 * - show_eyebrow    bool   Show small "Clients" label above the card.
 * - heading_id      string Unique id for h3 (aria-labelledby on section).
 */

if (!defined('ABSPATH')) {
    exit;
}

$defaults = array(
    'ref_page' => 'about',
    'acf_post_id' => 0,
    'layout' => 'standalone',
    'show_eyebrow' => true,
    'heading_id' => '',
);

$cfg = isset($args) && is_array($args) ? wp_parse_args($args, $defaults) : $defaults;

$allowed_ref = array('about', 'portfolio');
$ref_page = in_array($cfg['ref_page'], $allowed_ref, true) ? $cfg['ref_page'] : 'about';

$acf_post_id = (int) $cfg['acf_post_id'];
if ($acf_post_id < 1 && is_singular()) {
    $acf_post_id = (int) get_queried_object_id();
}

$heading_id = is_string($cfg['heading_id']) && $cfg['heading_id'] !== ''
    ? $cfg['heading_id']
    : $ref_page . '-supercarbaldie-title';

$is_embedded = ($cfg['layout'] === 'embedded');

$client_title = 'Supercarbaldie';
$client_image_url = home_url('/media/yeRYAvoIoz2cTWcP.png');
if (function_exists('get_field')) {
    $acf_title = get_field('about_client_title', $acf_post_id);
    if (is_string($acf_title) && trim($acf_title) !== '') {
        $client_title = trim($acf_title);
    }

    $image_raw = get_field('about_client_image', $acf_post_id);
    $resolved_img = '';
    if (is_numeric($image_raw) && (int) $image_raw > 0) {
        $tmp_url = wp_get_attachment_image_url((int) $image_raw, 'large');
        $resolved_img = is_string($tmp_url) ? $tmp_url : '';
    } elseif (is_array($image_raw) && !empty($image_raw['url'])) {
        $resolved_img = is_string($image_raw['url']) ? trim($image_raw['url']) : '';
    } elseif (is_string($image_raw) && trim($image_raw) !== '') {
        $resolved_img = trim($image_raw);
    }
    if ($resolved_img !== '') {
        $valid = filter_var($resolved_img, FILTER_VALIDATE_URL) !== false
            || strpos($resolved_img, '/') === 0;
        if ($valid) {
            $client_image_url = $resolved_img;
        }
    }
}

$description_html = '';
if (function_exists('get_field')) {
    $desc_raw = get_field('about_client_description', $acf_post_id);
    if (is_string($desc_raw) && trim($desc_raw) !== '') {
        $description_html = apply_filters('the_content', $desc_raw);
    }
}

$external_url = 'https://supercarbaldie.com';

$section_tw = $is_embedded
    ? 'w-full border-0 pt-12 md:pt-16 mt-8 md:mt-12 bg-transparent'
    : 'w-full py-12 md:py-16 bg-[#F6F7F8] border-t border-[#E1E2E4]';

$show_eyebrow = !empty($cfg['show_eyebrow']);
?>
<section class="ref-<?php echo esc_attr($ref_page); ?>-clients-supercarbaldie-section section-client-highlight-supercarbaldie <?php echo $is_embedded ? 'section-client-highlight-supercarbaldie--embedded' : ''; ?> <?php echo esc_attr($section_tw); ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
    <a href="<?php echo esc_url($external_url); ?>" class="ref-<?php echo esc_attr($ref_page); ?>-clients-supercarbaldie-container div-client-highlight-supercarbaldie-container link-client-highlight-supercarbaldie-container group block no-underline text-inherit w-full max-w-[960px] mx-auto px-6 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#DCAF47]/40 focus-visible:ring-offset-2 focus-visible:ring-offset-[#F6F7F8] rounded-sm" target="_blank" rel="noopener noreferrer">
        <?php if ($show_eyebrow) : ?>
        <p class="ref-<?php echo esc_attr($ref_page); ?>-clients-eyebrow p-client-highlight-eyebrow text-[#7A7C80] text-xs font-semibold uppercase tracking-[0.2em] mb-4">Clients</p>
        <?php endif; ?>
        <div class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-card-inner div-client-highlight-supercarbaldie-card-inner div-client-highlight-supercarbaldie-card-pass ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-card div-client-highlight-supercarbaldie-card flex flex-col sm:flex-row gap-6 sm:gap-8 items-stretch bg-white border border-[#E1E2E4] p-5 sm:p-6 transition-[box-shadow,transform,border-color] duration-200 ease-out group-hover:shadow-md group-hover:border-[#BCBDC0] group-hover:-translate-y-0.5">
            <div class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-image-wrap div-client-highlight-supercarbaldie-image-wrap shrink-0 w-full sm:w-[200px] md:w-[220px]">
                <div class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-image-inner div-client-highlight-supercarbaldie-image-inner w-full aspect-[4/3] sm:aspect-square overflow-hidden">
                    <img src="<?php echo esc_url($client_image_url); ?>" alt="<?php echo esc_attr($client_title); ?>" width="440" height="440" class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-img img-client-highlight-supercarbaldie w-full h-full object-cover transition-transform duration-200 ease-out group-hover:scale-[1.02]">
                </div>
            </div>
            <div class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-text-wrap div-client-highlight-supercarbaldie-text-wrap flex-1 flex flex-col justify-center min-w-0 text-left">
                <h3 id="<?php echo esc_attr($heading_id); ?>" class="ref-<?php echo esc_attr($ref_page); ?>-supercarbaldie-title h3-client-highlight-supercarbaldie-title text-[#4F5053] font-semibold text-lg md:text-xl tracking-tight mb-3"><?php echo esc_html($client_title); ?></h3>
                <?php if ($description_html !== '') : ?>
                <div class="ref-<?php echo esc_attr($ref_page); ?>-client-description div-client-highlight-description">
                    <?php echo $description_html; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</section>
