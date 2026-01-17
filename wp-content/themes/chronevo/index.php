<?php
/**
 * The main template file
 *
 * @package Chronevo
 */

get_header();
?>

<main class="ref-main-content w-full min-h-screen" id="main-content">
    <div class="ref-main-wrapper max-w-[1440px] mx-auto px-4 py-8">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article class="ref-post-article mb-8" id="post-<?php the_ID(); ?>">
                    <header class="ref-post-header mb-4">
                        <h1 class="ref-post-title text-3xl font-semibold mb-2">
                            <?php the_title(); ?>
                        </h1>
                        <?php if (get_the_date()) : ?>
                            <time class="ref-post-date text-sm opacity-75" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        <?php endif; ?>
                    </header>
                    
                    <div class="ref-post-content prose max-w-none">
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
