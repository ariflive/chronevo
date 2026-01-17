<?php
/**
 * The footer template file
 *
 * @package Chronevo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$assets_url = home_url('/assets');
?>
    
    <!-- Footer Section -->
    <footer class="ref-footer-section section-footer w-full relative">
        <div class="ref-footer-container div-footer-container max-w-[1440px] mx-auto px-6">
            <div class="ref-footer-content div-footer-content flex flex-col items-center">
                <!-- Logo - Top -->
                <div class="ref-footer-logo-section div-footer-logo-section">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-footer-logo-home link-footer-logo-home">
                        <div class="ref-footer-logo-wrapper div-footer-logo-wrapper">
                            <img src="<?php echo esc_url($assets_url . '/images/chronevo.png'); ?>" alt="Chronevo Logo" class="ref-footer-logo img-footer-logo h-10 w-auto">
                        </div>
                    </a>
                </div>
                
                <!-- Navigation - Middle -->
                <nav class="ref-footer-nav nav-footer">
                    <div class="ref-footer-nav-container div-footer-nav-container flex gap-8">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="ref-footer-nav-home link-footer-nav-home text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                            <span class="ref-footer-nav-text span-footer-nav-text">Home</span>
                            <div class="ref-footer-nav-underline div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                        </a>
                        <a href="#" class="ref-footer-nav-about link-footer-nav-about text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                            <span class="ref-footer-nav-text span-footer-nav-text">About</span>
                            <div class="ref-footer-nav-underline div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                        </a>
                        <a href="#" class="ref-footer-nav-portfolio link-footer-nav-portfolio text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                            <span class="ref-footer-nav-text span-footer-nav-text">Portfolio</span>
                            <div class="ref-footer-nav-underline div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                        </a>
                        <a href="#" class="ref-footer-nav-blog link-footer-nav-blog text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                            <span class="ref-footer-nav-text span-footer-nav-text">Blog</span>
                            <div class="ref-footer-nav-underline div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                        </a>
                        <a href="#" class="ref-footer-nav-contact link-footer-nav-contact text-white/75 hover:text-white transition-all duration-300 font-semibold text-sm uppercase tracking-tight relative group">
                            <span class="ref-footer-nav-text span-footer-nav-text">Contact</span>
                            <div class="ref-footer-nav-underline div-footer-nav-underline absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 group-hover:bg-[#92f6f8] transition-all duration-300"></div>
                        </a>
                    </div>
                </nav>
                
                <!-- Social Media Links - Bottom -->
                <div class="ref-footer-social-section div-footer-social-section">
                    <div class="ref-footer-social-media-links div-footer-social-media-links flex items-center gap-4">
                        <a href="https://twitter.com/supercarbaldie" target="_blank" rel="noopener noreferrer" class="ref-footer-social-twitter link-footer-social-twitter text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-twitter-logo text-xl"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://www.instagram.com/supercarbaldie_official/" target="_blank" rel="noopener noreferrer" class="ref-footer-social-instagram link-footer-social-instagram text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-instagram-logo text-xl"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/channel/UCTq_oZyS8rJ__Cs3XyyU5yw" target="_blank" rel="noopener noreferrer" class="ref-footer-social-youtube link-footer-social-youtube text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-youtube-logo text-xl"></i>
                            <span class="sr-only">YouTube</span>
                        </a>
                        <a href="https://www.pinterest.com/ChronEvo/" target="_blank" rel="noopener noreferrer" class="ref-footer-social-pinterest link-footer-social-pinterest text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-pinterest-logo text-xl"></i>
                            <span class="sr-only">Pinterest</span>
                        </a>
                        <a href="https://www.linkedin.com/feed/update/urn:li:activity:6972423859396325377" target="_blank" rel="noopener noreferrer" class="ref-footer-social-linkedin link-footer-social-linkedin text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-linkedin-logo text-xl"></i>
                            <span class="sr-only">LinkedIn</span>
                        </a>
                        <a href="https://vk.com/connect_explore_design" target="_blank" rel="noopener noreferrer" class="ref-footer-social-vk link-footer-social-vk text-white/60 hover:text-white transition-all duration-300 group">
                            <i class="ph ph-globe text-xl"></i>
                            <span class="sr-only">VK</span>
                        </a>
                    </div>
                </div>
                
                <!-- Copyright Message -->
                <div class="ref-footer-copyright-section div-footer-copyright-section">
                    <p class="ref-footer-copyright-text p-footer-copyright-text">
                        <span class="ref-footer-copyright-symbol span-footer-copyright-symbol">&copy;</span>
                        <span class="ref-footer-copyright-year span-footer-copyright-year"><?php echo esc_html(date('Y')); ?></span>
                        <span class="ref-footer-copyright-name span-footer-copyright-name">ChronEvo</span>
                        <span class="ref-footer-copyright-rights span-footer-copyright-rights">All rights reserved.</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Background Pattern Overlay -->
    <div class="ref-background-pattern div-background-pattern absolute inset-0 opacity-10"></div>
    
    <!-- Geometric Background Elements -->
    <div class="ref-geometric-background div-geometric-background absolute inset-0">
    </div>

</div>
<!-- End Main Content Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
