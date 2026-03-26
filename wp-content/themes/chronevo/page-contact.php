<?php
/**
 * Template Name: Contact Page
 * Simple contact us page
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$contact_intro_plain = '';
$contact_page_id = get_queried_object_id();
if ($contact_page_id && is_page()) {
    $contact_page_post = get_post($contact_page_id);
    if ($contact_page_post instanceof WP_Post && $contact_page_post->post_content !== '') {
        $raw = $contact_page_post->post_content;
        $raw = strip_shortcodes($raw);
        if (function_exists('do_blocks')) {
            $raw = do_blocks($raw);
        }
        $plain = wp_strip_all_tags($raw);
        $plain = html_entity_decode($plain, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $plain = preg_replace('/\s+/u', ' ', trim($plain));
        $contact_intro_plain = $plain;
    }
}

get_header();
?>

<!-- Contact Section -->
<section class="ref-contact-section section-contact w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-contact-container div-contact-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-contact-title-wrapper div-contact-title-wrapper text-center mb-12">
            <h1 class="ref-contact-title h1-contact-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                Create with US
            </h1>
        </div>
        
        <!-- Centered Content -->
        <div class="ref-contact-content-wrapper div-contact-content-wrapper w-full max-w-2xl mx-auto">
            <?php if ($contact_intro_plain !== '') : ?>
            <p class="ref-contact-intro p-contact-intro text-[#7A7C80] text-center text-base leading-relaxed mb-8">
                <?php echo esc_html($contact_intro_plain); ?>
            </p>
            <?php endif; ?>
            
            <!-- Contact Form -->
            <form class="ref-contact-form form-contact div-contact-form-card bg-white border border-[#E1E2E4] p-8" method="post" action="#">
                <div class="ref-contact-form-row div-contact-form-row mb-6">
                    <label for="contact-name" class="ref-contact-label label-contact-name block text-[#4F5053] font-medium text-sm mb-2">
                        Name
                    </label>
                    <input type="text" id="contact-name" name="contact_name" class="ref-contact-input input-contact-name w-full px-4 py-3 border border-[#E1E2E4] bg-white text-[#4F5053] text-base" placeholder="Your name" required>
                </div>
                
                <div class="ref-contact-form-row div-contact-form-row mb-6">
                    <label for="contact-email" class="ref-contact-label label-contact-email block text-[#4F5053] font-medium text-sm mb-2">
                        Email
                    </label>
                    <input type="email" id="contact-email" name="contact_email" class="ref-contact-input input-contact-email w-full px-4 py-3 border border-[#E1E2E4] bg-white text-[#4F5053] text-base" placeholder="your@email.com" required>
                </div>
                
                <div class="ref-contact-form-row div-contact-form-row mb-6">
                    <label for="contact-subject" class="ref-contact-label label-contact-subject block text-[#4F5053] font-medium text-sm mb-2">
                        Subject
                    </label>
                    <input type="text" id="contact-subject" name="contact_subject" class="ref-contact-input input-contact-subject w-full px-4 py-3 border border-[#E1E2E4] bg-white text-[#4F5053] text-base" placeholder="Subject">
                </div>
                
                <div class="ref-contact-form-row div-contact-form-row mb-8">
                    <label for="contact-message" class="ref-contact-label label-contact-message block text-[#4F5053] font-medium text-sm mb-2">
                        Message
                    </label>
                    <textarea id="contact-message" name="contact_message" rows="5" class="ref-contact-textarea textarea-contact-message w-full px-4 py-3 border border-[#E1E2E4] bg-white text-[#4F5053] text-base resize-y" placeholder="Your message" required></textarea>
                </div>
                
                <div class="ref-contact-submit-wrapper div-contact-submit-wrapper flex flex-col sm:flex-row sm:justify-center sm:items-center pt-2 mt-6 border-t border-[#E1E2E4]">
                    <button type="submit" class="ref-contact-submit button-contact-submit w-full sm:w-auto min-w-[13rem] px-12 py-4 text-base md:text-lg font-semibold uppercase tracking-[0.15em] text-[#F6F7F8] bg-[#0a0a0a] border-2 border-[#4F5053] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#DCAF47]/40 focus-visible:ring-offset-2 focus-visible:ring-offset-[#0a0a0a] transition-all duration-200 ease-out">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
$chronevo_about_for_client_card = get_page_by_path('about', OBJECT, 'page');
$chronevo_client_acf_post_id = ($chronevo_about_for_client_card instanceof WP_Post)
    ? (int) $chronevo_about_for_client_card->ID
    : 0;
chronevo_render_client_highlight_supercarbaldie(array(
    'ref_page' => 'portfolio',
    'acf_post_id' => $chronevo_client_acf_post_id,
    'layout' => 'embedded',
    'show_eyebrow' => false,
    'heading_id' => 'portfolio-supercarbaldie-title',
));
?>

<?php get_footer(); ?>
