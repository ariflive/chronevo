// Page Loader Functionality
window.addEventListener('load', function() {
    const pageLoader = document.querySelector('.div-page-loader');
    const mainContent = document.querySelector('.div-main-content-wrapper');
    
    if (pageLoader && mainContent) {
        // Hide loader and show content after a short delay for smooth transition
        setTimeout(function() {
            pageLoader.classList.add('loader-hidden');
            mainContent.classList.add('content-loaded');
        }, 300);
    }
});

// Connect Slogan Animation
document.addEventListener('DOMContentLoaded', function() {
    const connectSlogan = document.querySelector('.span-slogan-connect');
    if (connectSlogan && !sessionStorage.getItem('connect-slogan-animated')) {
        setTimeout(function() {
            connectSlogan.classList.add('span-connect-loaded');
            sessionStorage.setItem('connect-slogan-animated', 'true');
        }, 150);
    } else if (connectSlogan) {
        connectSlogan.classList.add('span-connect-loaded');
    }
});

// Explore and Design Slogan Animation
document.addEventListener('DOMContentLoaded', function() {
    const exploreSlogan = document.querySelector('.span-slogan-explore');
    const designSlogan = document.querySelector('.span-slogan-design');
    
    if (exploreSlogan && !sessionStorage.getItem('explore-slogan-animated')) {
        setTimeout(function() {
            exploreSlogan.classList.add('span-explore-loaded');
            sessionStorage.setItem('explore-slogan-animated', 'true');
        }, 150);
    } else if (exploreSlogan) {
        exploreSlogan.classList.add('span-explore-loaded');
    }
    
    if (designSlogan && !sessionStorage.getItem('design-slogan-animated')) {
        setTimeout(function() {
            designSlogan.classList.add('span-design-loaded');
            sessionStorage.setItem('design-slogan-animated', 'true');
        }, 150);
    } else if (designSlogan) {
        designSlogan.classList.add('span-design-loaded');
    }
});

// Hero Images Animation
document.addEventListener('DOMContentLoaded', function() {
    const heroImages = document.querySelectorAll('.img-hero-animated-fade, .img-hero-animated-slide');
    
    heroImages.forEach(function(img, index) {
        // Apply fade and slide animations with slight delays
        setTimeout(function() {
            img.classList.add('img-fade-loaded');
            img.classList.add('img-slide-loaded');
        }, 300 + (index * 100));
    });
});

// Services Section Scroll Parallax
document.addEventListener('DOMContentLoaded', function() {
    const servicesSection = document.querySelector('.section-services');
    const serviceImageWrappers = document.querySelectorAll('.div-service-image-wrapper');
    
    if (servicesSection && serviceImageWrappers.length > 0) {
        function updateServicesParallax() {
            const rect = servicesSection.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const sectionTop = rect.top;
            const sectionHeight = rect.height;
            
            // Calculate scroll progress based on section visibility
            const sectionCenter = sectionTop + sectionHeight / 2;
            const viewportCenter = windowHeight / 2;
            const distanceFromCenter = Math.abs(sectionCenter - viewportCenter);
            const maxDistance = windowHeight + sectionHeight / 2;
            const scrollProgress = Math.max(0, Math.min(1, 1 - (distanceFromCenter / maxDistance)));
            
            // Apply smooth parallax movement to each image wrapper
            serviceImageWrappers.forEach(function(wrapper, index) {
                // Skip if wrapper is being hovered - don't override hover transform
                if (wrapper.dataset.isHovered === 'true') {
                    return;
                }
                
                const childImage = wrapper.querySelector('img');
                if (childImage && childImage.dataset.isHovered === 'true') {
                    return;
                }
                
                const offsetMultiplier = (index % 2 === 0 ? 1 : -1) * (index + 1) * 0.1;
                const scrollOffsetY = Math.sin(scrollProgress * Math.PI) * 25 * offsetMultiplier;
                const scrollOffsetX = Math.cos(scrollProgress * Math.PI) * 18 * offsetMultiplier;
                
                // Get base transform from CSS positioning
                let baseTransform = '';
                if (wrapper.classList.contains('div-service-image-1')) {
                    baseTransform = `translateX(calc(-50% + ${scrollOffsetX}px)) translateY(${scrollOffsetY}px)`;
                } else if (wrapper.classList.contains('div-service-image-3')) {
                    baseTransform = `translateY(calc(-50% + ${scrollOffsetY}px)) translateX(${scrollOffsetX}px)`;
                } else if (wrapper.classList.contains('div-service-image-5')) {
                    baseTransform = `translateX(calc(-50% + ${scrollOffsetX}px)) translateY(${scrollOffsetY}px)`;
                } else if (wrapper.classList.contains('div-service-image-7')) {
                    baseTransform = `translateY(calc(-50% + ${scrollOffsetY}px)) translateX(${scrollOffsetX}px)`;
                } else {
                    baseTransform = `translate(${scrollOffsetX}px, ${scrollOffsetY}px)`;
                }
                
                wrapper.style.transform = baseTransform;
            });
        }
        
        // Track hover state for each wrapper and image to prevent JS from overriding CSS hover
        serviceImageWrappers.forEach(function(wrapper) {
            const childImage = wrapper.querySelector('img');
            
            if (childImage) {
                childImage.addEventListener('mouseenter', function() {
                    childImage.dataset.isHovered = 'true';
                });
                
                childImage.addEventListener('mouseleave', function() {
                    childImage.dataset.isHovered = 'false';
                    updateServicesParallax(); // Reapply parallax when not hovering
                });
            }
            
            wrapper.addEventListener('mouseenter', function() {
                wrapper.dataset.isHovered = 'true';
            });
            
            wrapper.addEventListener('mouseleave', function() {
                wrapper.dataset.isHovered = 'false';
                updateServicesParallax(); // Reapply parallax when not hovering
            });
        });
        
        let ticking = false;
        function onScroll() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    updateServicesParallax();
                    ticking = false;
                });
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', updateServicesParallax);
        updateServicesParallax();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (typeof ph !== 'undefined') {
        ph.define();
    }
    
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
    
    const ctaButtons = document.querySelectorAll('.cta-primary, .cta-secondary');
    ctaButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
    
    // Ensure body margin and padding are always 0
    function checkBodyMarginPadding() {
        const bodyStyle = window.getComputedStyle(document.body);
        const bodyMargin = {
            top: bodyStyle.marginTop,
            right: bodyStyle.marginRight,
            bottom: bodyStyle.marginBottom,
            left: bodyStyle.marginLeft
        };
        const bodyPadding = {
            top: bodyStyle.paddingTop,
            right: bodyStyle.paddingRight,
            bottom: bodyStyle.paddingBottom,
            left: bodyStyle.paddingLeft
        };
        
        // Check if any margin or padding is not 0
        const hasMargin = parseFloat(bodyMargin.top) !== 0 || 
                         parseFloat(bodyMargin.right) !== 0 || 
                         parseFloat(bodyMargin.bottom) !== 0 || 
                         parseFloat(bodyMargin.left) !== 0;
        const hasPadding = parseFloat(bodyPadding.top) !== 0 || 
                          parseFloat(bodyPadding.right) !== 0 || 
                          parseFloat(bodyPadding.bottom) !== 0 || 
                          parseFloat(bodyPadding.left) !== 0;
        
        if (hasMargin || hasPadding) {
            // Reset body margin and padding to 0
            document.body.style.margin = '0';
            document.body.style.padding = '0';
            document.body.style.marginTop = '0';
            document.body.style.marginBottom = '0';
            document.body.style.marginLeft = '0';
            document.body.style.marginRight = '0';
            document.body.style.paddingTop = '0';
            document.body.style.paddingBottom = '0';
            document.body.style.paddingLeft = '0';
            document.body.style.paddingRight = '0';
        }
    }
    
    // Check body margin/padding on page load
    setTimeout(function() {
        checkBodyMarginPadding();
    }, 0);
    
    // Check body margin/padding on resize
    window.addEventListener('resize', checkBodyMarginPadding, { passive: true });
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset || document.documentElement.scrollTop;
        const geometricBg = document.querySelector('.geometric-bg');
        
        // Geometric background parallax effect
        if (geometricBg) {
            geometricBg.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    }, { passive: true });
    
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 1s ease-in-out';
        document.body.style.opacity = '1';
    }, 100);
    
    // Portfolio Carousel Functionality
    const portfolioCarouselTrack = document.querySelector('.div-portfolio-carousel-track');
    const portfolioCarouselContainer = document.querySelector('.div-portfolio-carousel-container');
    const portfolioPrevButton = document.querySelector('.button-portfolio-carousel-prev');
    const portfolioNextButton = document.querySelector('.button-portfolio-carousel-next');
    
    if (portfolioCarouselTrack && portfolioCarouselContainer && portfolioPrevButton && portfolioNextButton) {
        const portfolioCards = document.querySelectorAll('.div-portfolio-card');
        let portfolioCurrentIndex = 0;
        let portfolioSlidesPerView = 2;
        let isDragging = false;
        let startX = 0;
        let currentX = 0;
        let initialTranslate = 0;
        let currentTranslate = 0;
        let animationID = 0;
        
        function updatePortfolioSlidesPerView() {
            if (window.innerWidth <= 768) {
                portfolioSlidesPerView = 1;
            } else {
                portfolioSlidesPerView = 2;
            }
        }
        
        function updatePortfolioCarousel() {
            updatePortfolioSlidesPerView();
            const maxIndex = Math.max(0, portfolioCards.length - portfolioSlidesPerView);
            portfolioCurrentIndex = Math.min(portfolioCurrentIndex, maxIndex);
            
            const cardWidth = portfolioCards[0] ? portfolioCards[0].offsetWidth + 24 : 0; // 24px is gap (1.5rem)
            const translateX = -portfolioCurrentIndex * cardWidth;
            portfolioCarouselTrack.style.transform = `translateX(${translateX}px)`;
            
            // Update button states
            portfolioPrevButton.disabled = portfolioCurrentIndex === 0;
            portfolioNextButton.disabled = portfolioCurrentIndex >= maxIndex;
        }
        
        function getPositionX(event) {
            return event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
        }
        
        function setTransform(value) {
            portfolioCarouselTrack.style.transform = `translateX(${value}px)`;
            currentTranslate = value;
        }
        
        function animation() {
            setTransform(currentTranslate);
            if (isDragging) {
                requestAnimationFrame(animation);
            }
        }
        
        function dragStart(event) {
            const positionX = getPositionX(event);
            startX = positionX;
            initialTranslate = currentTranslate;
            isDragging = true;
            animationID = requestAnimationFrame(animation);
            portfolioCarouselTrack.style.cursor = 'grabbing';
            portfolioCarouselTrack.style.transition = 'none';
        }
        
        function dragMove(event) {
            if (!isDragging) return;
            const positionX = getPositionX(event);
            currentX = positionX - startX;
            currentTranslate = initialTranslate + currentX;
            setTransform(currentTranslate);
        }
        
        function dragEnd() {
            if (!isDragging) return;
            isDragging = false;
            cancelAnimationFrame(animationID);
            portfolioCarouselTrack.style.cursor = 'grab';
            portfolioCarouselTrack.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
            
            const movedBy = currentTranslate - initialTranslate;
            const cardWidth = portfolioCards[0] ? portfolioCards[0].offsetWidth + 24 : 0;
            
            if (movedBy < -cardWidth / 3 && portfolioCurrentIndex < portfolioCards.length - portfolioSlidesPerView) {
                portfolioCurrentIndex++;
            } else if (movedBy > cardWidth / 3 && portfolioCurrentIndex > 0) {
                portfolioCurrentIndex--;
            }
            
            updatePortfolioCarousel();
            currentTranslate = -portfolioCurrentIndex * cardWidth;
            setTransform(currentTranslate);
        }
        
        // Mouse events
        portfolioCarouselContainer.addEventListener('mousedown', dragStart);
        portfolioCarouselContainer.addEventListener('mousemove', dragMove);
        portfolioCarouselContainer.addEventListener('mouseup', dragEnd);
        portfolioCarouselContainer.addEventListener('mouseleave', dragEnd);
        
        // Touch events for mobile support
        portfolioCarouselContainer.addEventListener('touchstart', dragStart);
        portfolioCarouselContainer.addEventListener('touchmove', dragMove);
        portfolioCarouselContainer.addEventListener('touchend', dragEnd);
        
        // Prevent image drag
        portfolioCarouselContainer.addEventListener('dragstart', function(e) {
            e.preventDefault();
        });
        
        portfolioCarouselTrack.style.cursor = 'grab';
        portfolioCarouselTrack.style.userSelect = 'none';
        
        function portfolioNextSlide() {
            updatePortfolioSlidesPerView();
            const maxIndex = Math.max(0, portfolioCards.length - portfolioSlidesPerView);
            if (portfolioCurrentIndex < maxIndex) {
                portfolioCurrentIndex++;
                updatePortfolioCarousel();
            }
        }
        
        function portfolioPrevSlide() {
            if (portfolioCurrentIndex > 0) {
                portfolioCurrentIndex--;
                updatePortfolioCarousel();
            }
        }
        
        portfolioNextButton.addEventListener('click', portfolioNextSlide);
        portfolioPrevButton.addEventListener('click', portfolioPrevSlide);
        
        window.addEventListener('resize', function() {
            portfolioCurrentIndex = 0;
            updatePortfolioCarousel();
            currentTranslate = 0;
            setTransform(currentTranslate);
        });
        
        // Initialize carousel
        updatePortfolioCarousel();
    }
    
    // CSS-only hover functionality is now handled in main.css
    // The hover effect uses: .div-service-image-wrapper:hover { animation-play-state: paused; transform: scale(1.20); }
    // Note: The parallax script may interfere since it applies transforms via JavaScript.
    // The parallax script checks dataset.isHovered to skip hovered elements, but CSS cannot set this.
    // If parallax interference occurs, JavaScript coordination would be needed.
    
    // Popup Menu Functionality
    const menuToggleButton = document.querySelector('.button-menu-toggle');
    const menuCloseButton = document.querySelector('.button-popup-menu-close');
    const popupMenuOverlay = document.querySelector('.div-popup-menu-overlay');
    
    function openMenu() {
        if (popupMenuOverlay) {
            popupMenuOverlay.classList.add('menu-open');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeMenu() {
        if (popupMenuOverlay) {
            popupMenuOverlay.classList.remove('menu-open');
            document.body.style.overflow = '';
        }
    }
    
    if (menuToggleButton) {
        menuToggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            openMenu();
        });
    }
    
    if (menuCloseButton) {
        menuCloseButton.addEventListener('click', function(e) {
            e.preventDefault();
            closeMenu();
        });
    }
    
    // Close menu when clicking outside (on overlay)
    if (popupMenuOverlay) {
        popupMenuOverlay.addEventListener('click', function(e) {
            if (e.target === popupMenuOverlay) {
                closeMenu();
            }
        });
    }
    
    // Close menu on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && popupMenuOverlay && popupMenuOverlay.classList.contains('menu-open')) {
            closeMenu();
        }
    });
});
