<?php
/**
 * Privacy Policy (page slug: privacy)
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="ref-main-legal ref-main-content w-full min-h-screen" id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'legal-document');
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
