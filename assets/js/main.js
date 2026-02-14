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

// Services Section - float in CSS; very smooth scale in/out via JS (~20px bigger on hover, then back)
document.addEventListener('DOMContentLoaded', function() {
    const serviceImageWrappers = document.querySelectorAll('.div-service-image-wrapper');
    const scaleDuration = 950;
    const scaleEasing = 'cubic-bezier(0.33, 1, 0.68, 1)';
    const scaleUp = 1.0625;

    serviceImageWrappers.forEach(function(wrapper) {
        const childImage = wrapper.querySelector('img');

        function getBaseTransform() {
            return wrapper.dataset.serviceBaseTransform || '';
        }

        function setBaseTransform(value) {
            wrapper.dataset.serviceBaseTransform = value;
        }

        function applyHoverScale() {
            const base = getComputedStyle(wrapper).transform;
            setBaseTransform(base);
            wrapper.style.transition = 'transform ' + (scaleDuration / 1000) + 's ' + scaleEasing;
            wrapper.style.transform = base;
            requestAnimationFrame(function() {
                requestAnimationFrame(function() {
                    wrapper.style.transform = base + ' scale(' + scaleUp + ')';
                });
            });
        }

        function removeHoverScale() {
            const base = getBaseTransform();
            if (!base) return;
            wrapper.style.transition = 'transform ' + (scaleDuration / 1000) + 's ' + scaleEasing;
            wrapper.style.transform = base;
            wrapper.addEventListener('transitionend', function onEnd(e) {
                if (e.propertyName !== 'transform') return;
                wrapper.removeEventListener('transitionend', onEnd);
                wrapper.style.removeProperty('transform');
                wrapper.style.removeProperty('transition');
                wrapper.removeAttribute('data-service-base-transform');
            });
        }

        function onEnter() {
            applyHoverScale();
        }

        function onLeave() {
            removeHoverScale();
        }

        if (childImage) {
            childImage.addEventListener('mouseenter', onEnter);
            childImage.addEventListener('mouseleave', onLeave);
        }
        wrapper.addEventListener('mouseenter', onEnter);
        wrapper.addEventListener('mouseleave', onLeave);
    });
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
    
    // About Page Video Section - Interactive Play Button
    const aboutVideoContainer = document.querySelector('.div-about-video-container');
    const aboutVideoCover = document.querySelector('.div-about-video-cover');
    const aboutVideoIframe = document.querySelector('#ref-about-video-iframe');
    const aboutVideoPlayButton = document.querySelector('.div-about-video-play-button');
    const aboutVideoLoader = document.querySelector('.div-about-video-loader');
    
    if (aboutVideoContainer && aboutVideoCover && aboutVideoIframe && aboutVideoPlayButton && aboutVideoLoader) {
        let isMouseInside = false;
        let mouseX = 0;
        let mouseY = 0;
        let playButtonX = 0;
        let playButtonY = 0;
        let animationFrame = null;
        let youtubePlayer = null;
        let isVideoPlaying = false;
        let isVideoLoading = false;
        
        // Initialize play button position (center)
        function initPlayButtonPosition() {
            const rect = aboutVideoContainer.getBoundingClientRect();
            playButtonX = rect.width / 2;
            playButtonY = rect.height / 2;
            updatePlayButtonPosition();
        }
        
        // Update play button position
        function updatePlayButtonPosition() {
            aboutVideoPlayButton.style.left = playButtonX + 'px';
            aboutVideoPlayButton.style.top = playButtonY + 'px';
        }
        
        // Smooth follow mouse animation
        function animatePlayButton() {
            if (isMouseInside) {
                // Smooth interpolation (easing)
                const easing = 0.15;
                playButtonX += (mouseX - playButtonX) * easing;
                playButtonY += (mouseY - playButtonY) * easing;
                updatePlayButtonPosition();
                animationFrame = requestAnimationFrame(animatePlayButton);
            }
        }
        
        // Mouse move handler
        aboutVideoContainer.addEventListener('mousemove', function(e) {
            const rect = aboutVideoContainer.getBoundingClientRect();
            mouseX = e.clientX - rect.left;
            mouseY = e.clientY - rect.top;
            
            if (!isMouseInside) {
                isMouseInside = true;
                animatePlayButton();
            }
        }, { passive: true });
        
        // Mouse enter handler
        aboutVideoContainer.addEventListener('mouseenter', function() {
            isMouseInside = true;
            aboutVideoContainer.style.cursor = 'none';
            initPlayButtonPosition();
            animatePlayButton();
        });
        
        // Mouse leave handler
        aboutVideoContainer.addEventListener('mouseleave', function() {
            isMouseInside = false;
            aboutVideoContainer.style.cursor = '';
            if (animationFrame) {
                cancelAnimationFrame(animationFrame);
            }
        });
        
        // Load YouTube IFrame API
        function loadYouTubeAPI(callback) {
            if (window.YT && window.YT.Player) {
                if (window.YT.loaded) {
                    callback();
                } else {
                    window.YT.ready(callback);
                }
            } else {
                if (!window.onYouTubeIframeAPIReady) {
                    window.onYouTubeIframeAPIReady = function() {
                        callback();
                    };
                    
                    const tag = document.createElement('script');
                    tag.src = 'https://www.youtube.com/iframe_api';
                    tag.onerror = function() {
                        // If API fails to load, use direct iframe approach
                        callback();
                    };
                    const firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                } else {
                    const originalCallback = window.onYouTubeIframeAPIReady;
                    window.onYouTubeIframeAPIReady = function() {
                        if (originalCallback) originalCallback();
                        callback();
                    };
                }
            }
        }
        
        // Function to play video
        function playVideo() {
            // Prevent multiple simultaneous loads
            if (isVideoLoading) return;
            
            // If video is already playing and player exists, don't restart
            if (isVideoPlaying && youtubePlayer) return;
            
            isVideoLoading = true;
            
            // Extract video ID
            const videoId = aboutVideoContainer.getAttribute('data-youtube-id') || 'KfIaXTb45tI';
            
            // Hide cover and play button first
            aboutVideoCover.classList.add('hidden');
            aboutVideoCover.style.display = 'none';
            aboutVideoCover.style.pointerEvents = 'none';
            aboutVideoCover.style.zIndex = '0';
            
            aboutVideoPlayButton.style.display = 'none';
            aboutVideoPlayButton.style.pointerEvents = 'none';
            
            // Show iframe
            aboutVideoIframe.classList.remove('hidden');
            aboutVideoIframe.classList.add('show');
            aboutVideoIframe.style.display = 'block';
            aboutVideoIframe.style.zIndex = '15';
            aboutVideoIframe.style.pointerEvents = 'auto';
            
            // Show loader
            aboutVideoLoader.classList.remove('hidden');
            aboutVideoLoader.style.display = 'flex';
            
            // Use direct iframe approach (most reliable for user-initiated playback)
            // This works because user interaction allows autoplay
            useDirectIframe(videoId);
            
            // Optionally try to load YouTube API for better control (but don't wait for it)
            loadYouTubeAPI(function() {
                // If API loads successfully, we can use it for future interactions
                if (window.YT && window.YT.Player && !youtubePlayer) {
                    try {
                        youtubePlayer = new YT.Player('ref-about-video-iframe', {
                            videoId: videoId,
                            playerVars: {
                                'autoplay': 1,
                                'mute': 0,
                                'controls': 1,
                                'modestbranding': 1,
                                'rel': 0,
                                'showinfo': 0,
                                'iv_load_policy': 3,
                                'playsinline': 1,
                                'enablejsapi': 1
                            },
                            events: {
                                'onStateChange': function(event) {
                                    if (event.data === YT.PlayerState.PLAYING) {
                                        isVideoLoading = false;
                                        isVideoPlaying = true;
                                        aboutVideoLoader.classList.add('hidden');
                                        aboutVideoLoader.style.display = 'none';
                                        try {
                                            if (youtubePlayer.isMuted()) {
                                                youtubePlayer.unMute();
                                            }
                                        } catch(e) {}
                                    }
                                }
                            }
                        });
                    } catch(e) {
                        // API player creation failed, direct iframe already set
                    }
                }
            });
        }
        
        // Fallback function to use direct iframe src
        function useDirectIframe(videoId) {
            const embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&mute=0&controls=1&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3&playsinline=1&enablejsapi=1';
            
            // Set src
            aboutVideoIframe.src = embedUrl;
            isVideoPlaying = true;
            isVideoLoading = false;
            
            // Try to detect when video starts playing using postMessage
            let loaderHidden = false;
            function hideLoader() {
                if (!loaderHidden) {
                    loaderHidden = true;
                    aboutVideoLoader.classList.add('hidden');
                    aboutVideoLoader.style.display = 'none';
                }
            }
            
            // Listen for YouTube postMessage events
            window.addEventListener('message', function(event) {
                if (event.origin !== 'https://www.youtube.com') return;
                try {
                    const data = JSON.parse(event.data);
                    if (data && data.event === 'onStateChange' && data.info === 1) {
                        // State 1 = PLAYING
                        hideLoader();
                    }
                } catch(e) {
                    // Not JSON, ignore
                }
            });
            
            // Hide loader after iframe loads
            aboutVideoIframe.addEventListener('load', function() {
                setTimeout(hideLoader, 1000);
            }, { once: true });
            
            // Fallback timeout to hide loader (in case events don't fire)
            setTimeout(hideLoader, 3000);
        }
        
        // Click handler on container
        aboutVideoContainer.addEventListener('click', function(e) {
            playVideo();
        });
        
        // Click handler on cover (in case container click doesn't fire)
        aboutVideoCover.addEventListener('click', function(e) {
            e.stopPropagation();
            playVideo();
        });
        
        // Initialize play button position on load
        initPlayButtonPosition();
    }
});

// Single article featured image: hover to show video slideshow (continues after mouse out)
document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.ref-single-article-featured-image-wrapper');
    if (!wrapper) return;
    const dataVideos = wrapper.getAttribute('data-videos');
    if (!dataVideos) return;
    let videos = [];
    try {
        videos = JSON.parse(dataVideos);
    } catch (e) {
        return;
    }
    if (videos.length === 0) return;
    const overlay = wrapper.querySelector('.ref-single-article-featured-video-overlay');
    const videoEl = wrapper.querySelector('.ref-single-article-featured-video');
    const dotsContainer = wrapper.querySelector('.ref-single-article-featured-dots');
    if (!overlay || !videoEl) return;

    let currentIndex = 0;
    let dots = [];

    function updateDotsActive() {
        dots.forEach(function(dot, i) {
            dot.classList.toggle('is-active', i === currentIndex);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        videoEl.classList.remove('is-playing');
        videoEl.src = videos[currentIndex];
        videoEl.load();
        videoEl.play().catch(function() {});
        updateDotsActive();
    }

    function playNext() {
        goToSlide((currentIndex + 1) % videos.length);
    }

    function startSlideshow() {
        if (wrapper.classList.contains('is-hover-video')) return;
        wrapper.classList.add('is-hover-video');
        goToSlide(0);
    }

    videoEl.addEventListener('playing', function() {
        videoEl.classList.add('is-playing');
    });

    videoEl.addEventListener('ended', function() {
        playNext();
    });

    if (dotsContainer && videos.length > 1) {
        videos.forEach(function(_, i) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'ref-single-article-featured-dot div-single-post-featured-dot';
            dot.setAttribute('aria-label', 'Go to video ' + (i + 1));
            dot.dataset.index = String(i);
            dot.addEventListener('click', function() {
                goToSlide(i);
            });
            dotsContainer.appendChild(dot);
            dots.push(dot);
        });
    }

    wrapper.addEventListener('mouseenter', function() {
        startSlideshow();
    });
});
