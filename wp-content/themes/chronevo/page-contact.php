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

get_header();
?>

<!-- Contact Section -->
<section class="ref-contact-section section-contact w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-contact-container div-contact-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <div class="ref-contact-title-wrapper div-contact-title-wrapper text-center mb-6">
            <h1 class="ref-contact-title h1-contact-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                Contact Us
            </h1>
        </div>
        
        <!-- Breadcrumb -->
        <div class="ref-contact-breadcrumb-wrapper div-contact-breadcrumb-wrapper text-center mb-12">
            <nav class="ref-contact-breadcrumb nav-contact-breadcrumb">
                <ol class="ref-contact-breadcrumb-list ol-contact-breadcrumb-list flex items-center justify-center gap-2">
                    <li class="ref-contact-breadcrumb-item li-contact-breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-contact-breadcrumb-home link-contact-breadcrumb-home text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li class="ref-contact-breadcrumb-separator li-contact-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-contact-breadcrumb-current li-contact-breadcrumb-current text-[#7A7C80]">
                        Contact
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Centered Content -->
        <div class="ref-contact-content-wrapper div-contact-content-wrapper w-full max-w-2xl mx-auto">
            <p class="ref-contact-intro p-contact-intro text-[#7A7C80] text-center text-base leading-relaxed mb-8">
                Get in touch. We would love to hear from you.
            </p>
            
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
                    <button type="submit" class="ref-contact-submit button-contact-submit w-full sm:w-auto min-w-[200px] px-8 py-3.5 bg-[#DCAF47] text-[#4F5053] font-semibold text-sm uppercase tracking-wide rounded-sm hover:bg-[#B89438] active:bg-[#8C7325] focus:outline-none focus:ring-2 focus:ring-[#DCAF47] focus:ring-opacity-40 transition-colors duration-200 ease-out">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>
