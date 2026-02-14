<?php
/**
 * Template Name: Portfolio 2 Page
 * 
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit;
}

$assets_url = home_url('/assets');
get_header();
?>

<!-- Portfolio Section -->
<section class="ref-portfolio-section section-portfolio w-full relative py-24 bg-[#F6F7F8]">
    <div class="ref-portfolio-container div-portfolio-container w-full max-w-[1440px] mx-auto px-6">
        <!-- Page Title -->
        <?php
        $portfolio_category = get_term(6, 'category');
        $portfolio_title = (!is_wp_error($portfolio_category) && isset($portfolio_category->name)) ? $portfolio_category->name : 'Portfolio';
        ?>
        <div class="ref-portfolio-title-wrapper div-portfolio-title-wrapper text-center mb-6">
            <h1 class="ref-portfolio-title h1-portfolio-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                <?php echo esc_html($portfolio_title); ?>
            </h1>
        </div>
        
        <!-- Breadcrumb -->
        <div class="ref-portfolio-breadcrumb-wrapper div-portfolio-breadcrumb-wrapper text-center mb-12">
            <nav class="ref-portfolio-breadcrumb nav-portfolio-breadcrumb">
                <ol class="ref-portfolio-breadcrumb-list ol-portfolio-breadcrumb-list flex items-center justify-center gap-2">
                    <li class="ref-portfolio-breadcrumb-item li-portfolio-breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-portfolio-breadcrumb-home link-portfolio-breadcrumb-home text-[#7A7C80] hover:text-[#4F5053] transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li class="ref-portfolio-breadcrumb-separator li-portfolio-breadcrumb-separator text-[#BCBDC0]">
                        /
                    </li>
                    <li class="ref-portfolio-breadcrumb-current li-portfolio-breadcrumb-current text-[#7A7C80]">
                        <?php echo esc_html($portfolio_title); ?>
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Portfolio Grid (posts from cat=6, order by last updated) -->
        <?php
        $portfolio_query = new WP_Query(array(
            'cat'                 => 6,
            'posts_per_page'      => -1,
            'orderby'             => 'modified',
            'order'               => 'DESC',
            'post_status'         => 'publish',
            'no_found_rows'       => true,
        ));
        ?>
        <div class="ref-portfolio-grid div-portfolio-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            if ($portfolio_query->have_posts()) :
                $card_index = 0;
                while ($portfolio_query->have_posts()) :
                    $portfolio_query->the_post();
                    $card_index++;
                    $post_id = get_the_ID();
                    $card_link = get_permalink();
                    $thumb_url = get_the_post_thumbnail_url($post_id, 'large');
                    if (empty($thumb_url)) {
                        $thumb_url = $assets_url . '/images/hero-1.jpg';
                    }
                    $portfolio_tagline = get_field('portfolio_tagline', $post_id);
                    $card_title = is_string($portfolio_tagline) ? mb_strtoupper($portfolio_tagline) : '';
                    $card_subtitle = get_the_title();
                    ?>
            <!-- Project Card -->
            <a href="<?php echo esc_url($card_link); ?>" class="ref-portfolio-card-<?php echo esc_attr((string) $card_index); ?> div-portfolio-card group relative aspect-square overflow-hidden cursor-pointer block">
                <!-- Project Image (1:1) -->
                <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper w-full h-full relative aspect-square overflow-hidden">
                    <img 
                        src="<?php echo esc_url($thumb_url); ?>" 
                        alt="<?php echo esc_attr($card_subtitle); ?>" 
                        class="ref-portfolio-card-image img-portfolio-card w-full h-full object-cover"
                    >
                </div>
                
                <!-- Project Info Box (appears on hover) -->
                <div class="ref-portfolio-card-info div-portfolio-card-info absolute bg-white px-6 py-4">
                    <h3 class="ref-portfolio-card-title h3-portfolio-card-title text-[#4F5053] font-semibold text-xl mb-1">
                        <?php echo esc_html($card_title); ?>
                    </h3>
                    <p class="ref-portfolio-card-subtitle p-portfolio-card-subtitle text-[#7A7C80] text-sm font-normal">
                        <?php echo esc_html($card_subtitle); ?>
                    </p>
                </div>
            </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Trusted By / Where We've Worked - Logo carousel (below ref-portfolio-grid) -->
<?php
$company_dir = ABSPATH . 'assets/company/';
$company_images = array();
if (is_dir($company_dir)) {
    $extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $files = array_diff(scandir($company_dir), array('.', '..'));
    foreach ($files as $file) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, $extensions, true)) {
            $company_images[] = $file;
        }
    }
    shuffle($company_images);
}
$company_base_url = home_url('/assets/company/');
if (!empty($company_images)) :
?>
<section class="ref-clients-section section-clients w-full py-16 md:py-24 bg-[#F6F7F8] border-t border-[#E1E2E4]">
    <div class="ref-clients-container div-clients-container w-full max-w-[1440px] mx-auto px-6">
        <div class="ref-clients-title-wrapper div-clients-title-wrapper text-center mb-12">
            <h2 class="ref-clients-title h2-clients-title text-[#4F5053] font-semibold text-2xl md:text-3xl lg:text-4xl uppercase tracking-tight">Trusted By</h2>
            <p class="ref-clients-subtitle p-clients-subtitle text-[#7A7C80] text-base md:text-lg mt-2">Where we've worked</p>
        </div>
        <div class="ref-clients-carousel div-clients-carousel w-full overflow-hidden">
            <div class="ref-clients-track div-clients-track flex items-center gap-12 md:gap-16 animate-clients-logo-scroll">
                <?php
                if (!empty($company_images)) {
                    foreach (array($company_images, $company_images) as $round) {
                        foreach ($round as $idx => $file) {
                            $src = $company_base_url . $file;
                            $alt = pathinfo($file, PATHINFO_FILENAME);
                            ?>
                <div class="ref-clients-logo-item div-clients-logo-item flex-shrink-0 w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 aspect-square flex items-center justify-center p-3">
                    <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>" class="ref-clients-logo-img img-clients-logo w-full h-full object-contain object-center grayscale hover:grayscale-0 transition-all duration-300">
                </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
