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
        <div class="ref-portfolio-title-wrapper div-portfolio-title-wrapper text-center mb-6">
            <h1 class="ref-portfolio-title h1-portfolio-title text-[#4F5053] font-semibold text-4xl md:text-5xl lg:text-6xl uppercase">
                Portfolio
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
                        Portfolio
                    </li>
                </ol>
            </nav>
        </div>
        
        <!-- Portfolio Grid -->
        <div class="ref-portfolio-grid div-portfolio-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Dummy project data
            $projects = array(
                array('title' => 'Brand Identity Design', 'subtitle' => 'Visual Identity', 'image' => 'hero-1.jpg'),
                array('title' => 'Editorial Photography', 'subtitle' => 'Editorial', 'image' => 'hero-2.jpg'),
                array('title' => 'Web Design Project', 'subtitle' => 'Digital Design', 'image' => 'hero-3.jpg'),
                array('title' => 'Print Campaign', 'subtitle' => 'Advertising', 'image' => 'about.jpg'),
                array('title' => 'Product Photography', 'subtitle' => 'Photography', 'image' => 'about-2.jpg'),
                array('title' => 'Brand Strategy', 'subtitle' => 'Consulting', 'image' => 'work.jpg'),
                array('title' => 'Editorial Layout', 'subtitle' => 'Editorial', 'image' => 'post.jpg'),
                array('title' => 'Packaging Design', 'subtitle' => 'Product Design', 'image' => 'hero-1.jpg'),
                array('title' => 'Motion Graphics', 'subtitle' => 'Digital Media', 'image' => 'hero-2.jpg'),
            );
            
            foreach ($projects as $index => $project) :
            ?>
            <!-- Project Card -->
            <a href="<?php echo esc_url(home_url('/portfolio/design-trends')); ?>" class="ref-portfolio-card-<?php echo esc_attr($index + 1); ?> div-portfolio-card group relative aspect-square overflow-hidden cursor-pointer block">
                <!-- Project Image -->
                <div class="ref-portfolio-card-image-wrapper div-portfolio-card-image-wrapper w-full h-full relative">
                    <img 
                        src="<?php echo esc_url($assets_url . '/images/' . $project['image']); ?>" 
                        alt="<?php echo esc_attr($project['title']); ?>" 
                        class="ref-portfolio-card-image img-portfolio-card w-full h-full object-cover"
                    >
                </div>
                
                <!-- Project Info Box (appears on hover) -->
                <div class="ref-portfolio-card-info div-portfolio-card-info absolute bg-white px-6 py-4">
                    <h3 class="ref-portfolio-card-title h3-portfolio-card-title text-[#4F5053] font-semibold text-xl mb-1">
                        <?php echo esc_html($project['title']); ?>
                    </h3>
                    <p class="ref-portfolio-card-subtitle p-portfolio-card-subtitle text-[#7A7C80] text-sm font-normal">
                        <?php echo esc_html($project['subtitle']); ?>
                    </p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
