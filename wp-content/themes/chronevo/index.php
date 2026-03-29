<?php
/**
 * The main template file
 *
 * @package Chronevo
 */

get_header();
?>

<main class="ref-main-content w-full min-h-screen bg-[#F6F7F8]" id="main-content">
    <div class="ref-main-wrapper div-default-page-shell max-w-[1440px] mx-auto px-6 py-16 md:py-20">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article class="ref-post-article div-default-page-article max-w-3xl mx-auto" id="post-<?php the_ID(); ?>">
                    <header class="ref-post-header div-default-page-header mb-8 pb-8 border-b border-[#E1E2E4]">
                        <h1 class="ref-post-title h1-default-page-title text-[#4F5053] font-semibold text-3xl md:text-4xl tracking-tight mb-3">
                            <?php the_title(); ?>
                        </h1>
                        <?php if (get_the_date()) : ?>
                            <time class="ref-post-date time-default-page-published text-sm text-[#7A7C80] font-normal" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        <?php endif; ?>
                    </header>

                    <div class="ref-post-content div-rich-html-content div-default-page-body">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <div class="ref-no-posts text-center py-12">
                <p class="ref-no-posts-text text-lg"><?php esc_html_e('No content found.', 'chronevo'); ?></p>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
