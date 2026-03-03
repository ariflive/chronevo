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
    
    // About Page Video Section - YouTube or MP4 with loading UX
    const aboutVideoContainer = document.querySelector('.div-about-video-container');
    const aboutVideoCover = document.querySelector('.div-about-video-cover');
    const aboutVideoPlayButton = document.querySelector('.div-about-video-play-button');
    const aboutVideoLoader = document.querySelector('.div-about-video-loader');
    const videoType = aboutVideoContainer ? aboutVideoContainer.getAttribute('data-video-type') : null;
    const aboutVideoIframe = document.querySelector('#ref-about-video-iframe');
    const aboutVideoNative = document.querySelector('#ref-about-video-native');
    
    const isYouTube = videoType === 'youtube' && aboutVideoIframe;
    const isMp4 = videoType === 'mp4' && aboutVideoNative;
    
    if (aboutVideoContainer && aboutVideoCover && aboutVideoPlayButton && aboutVideoLoader && (isYouTube || isMp4)) {
        let isMouseInside = false;
        let mouseX = 0;
        let mouseY = 0;
        let playButtonX = 0;
        let playButtonY = 0;
        let animationFrame = null;
        let youtubePlayer = null;
        let isVideoPlaying = false;
        let isVideoLoading = false;
        
        function initPlayButtonPosition() {
            const rect = aboutVideoContainer.getBoundingClientRect();
            playButtonX = rect.width / 2;
            playButtonY = rect.height / 2;
            updatePlayButtonPosition();
        }
        
        function updatePlayButtonPosition() {
            aboutVideoPlayButton.style.left = playButtonX + 'px';
            aboutVideoPlayButton.style.top = playButtonY + 'px';
        }
        
        function animatePlayButton() {
            if (isMouseInside) {
                const easing = 0.15;
                playButtonX += (mouseX - playButtonX) * easing;
                playButtonY += (mouseY - playButtonY) * easing;
                updatePlayButtonPosition();
                animationFrame = requestAnimationFrame(animatePlayButton);
            }
        }
        
        aboutVideoContainer.addEventListener('mousemove', function(e) {
            const rect = aboutVideoContainer.getBoundingClientRect();
            mouseX = e.clientX - rect.left;
            mouseY = e.clientY - rect.top;
            if (!isMouseInside) {
                isMouseInside = true;
                animatePlayButton();
            }
        }, { passive: true });
        
        aboutVideoContainer.addEventListener('mouseenter', function() {
            isMouseInside = true;
            aboutVideoContainer.style.cursor = 'none';
            initPlayButtonPosition();
            animatePlayButton();
        });
        
        aboutVideoContainer.addEventListener('mouseleave', function() {
            isMouseInside = false;
            aboutVideoContainer.style.cursor = '';
            if (animationFrame) cancelAnimationFrame(animationFrame);
        });
        
        function hideCoverAndPlayShowLoader() {
            aboutVideoCover.classList.add('hidden');
            aboutVideoCover.style.display = 'none';
            aboutVideoCover.style.pointerEvents = 'none';
            aboutVideoCover.style.zIndex = '0';
            aboutVideoPlayButton.style.display = 'none';
            aboutVideoPlayButton.style.pointerEvents = 'none';
            aboutVideoLoader.classList.remove('hidden');
            aboutVideoLoader.style.display = 'flex';
        }
        
        function hideLoader() {
            aboutVideoLoader.classList.add('hidden');
            aboutVideoLoader.style.display = 'none';
        }
        
        function playVideo() {
            if (isVideoLoading) return;
            if (isYouTube && isVideoPlaying && youtubePlayer) return;
            if (isMp4 && isVideoPlaying) return;
            
            isVideoLoading = true;
            hideCoverAndPlayShowLoader();
            
            if (isMp4) {
                const src = aboutVideoContainer.getAttribute('data-video-src');
                if (!src) {
                    isVideoLoading = false;
                    hideLoader();
                    return;
                }
                aboutVideoNative.loop = true;
                aboutVideoNative.muted = true;
                aboutVideoNative.style.display = 'block';
                aboutVideoNative.style.zIndex = '15';
                aboutVideoNative.style.pointerEvents = 'auto';
                aboutVideoNative.classList.remove('hidden');
                if (aboutVideoNative.src !== src) {
                    aboutVideoNative.src = src;
                }
                var onCanPlay = function() {
                    hideLoader();
                    isVideoLoading = false;
                    isVideoPlaying = true;
                    aboutVideoNative.removeEventListener('canplay', onCanPlay);
                    aboutVideoNative.removeEventListener('playing', onPlaying);
                };
                var onPlaying = function() {
                    hideLoader();
                    isVideoLoading = false;
                    isVideoPlaying = true;
                    aboutVideoNative.removeEventListener('canplay', onCanPlay);
                    aboutVideoNative.removeEventListener('playing', onPlaying);
                };
                aboutVideoNative.addEventListener('canplay', onCanPlay, { once: true });
                aboutVideoNative.addEventListener('playing', onPlaying, { once: true });
                setTimeout(function() {
                    hideLoader();
                    if (aboutVideoNative.readyState >= 2) {
                        isVideoLoading = false;
                        isVideoPlaying = true;
                    }
                }, 6000);
                var playPromise = aboutVideoNative.play();
                if (playPromise && typeof playPromise.then === 'function') {
                    playPromise.catch(function() {
                        hideLoader();
                        isVideoLoading = false;
                    });
                }
                return;
            }
            
            var videoId = aboutVideoContainer.getAttribute('data-youtube-id') || '';
            aboutVideoIframe.classList.remove('hidden');
            aboutVideoIframe.classList.add('show');
            aboutVideoIframe.style.display = 'block';
            aboutVideoIframe.style.zIndex = '15';
            aboutVideoIframe.style.pointerEvents = 'auto';
            
            function loadYouTubeAPI(callback) {
                if (window.YT && window.YT.Player) {
                    if (window.YT.loaded) callback();
                    else window.YT.ready(callback);
                } else {
                    if (!window.onYouTubeIframeAPIReady) {
                        window.onYouTubeIframeAPIReady = function() { callback(); };
                        var tag = document.createElement('script');
                        tag.src = 'https://www.youtube.com/iframe_api';
                        tag.onerror = function() { callback(); };
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                    } else {
                        var orig = window.onYouTubeIframeAPIReady;
                        window.onYouTubeIframeAPIReady = function() {
                            if (orig) orig();
                            callback();
                        };
                    }
                }
            }
            
            function useDirectIframe(id) {
                var embedUrl = 'https://www.youtube.com/embed/' + id + '?autoplay=1&mute=0&controls=1&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3&playsinline=1&enablejsapi=1';
                aboutVideoIframe.src = embedUrl;
                isVideoPlaying = true;
                isVideoLoading = false;
                var loaderHidden = false;
                function hide() {
                    if (!loaderHidden) {
                        loaderHidden = true;
                        hideLoader();
                    }
                }
                window.addEventListener('message', function(event) {
                    if (event.origin !== 'https://www.youtube.com') return;
                    try {
                        var data = JSON.parse(event.data);
                        if (data && data.event === 'onStateChange' && data.info === 1) hide();
                    } catch(e) {}
                });
                aboutVideoIframe.addEventListener('load', function() { setTimeout(hide, 1000); }, { once: true });
                setTimeout(hide, 3000);
            }
            
            useDirectIframe(videoId);
            loadYouTubeAPI(function() {
                if (window.YT && window.YT.Player && !youtubePlayer) {
                    try {
                        youtubePlayer = new YT.Player('ref-about-video-iframe', {
                            videoId: videoId,
                            playerVars: { autoplay: 1, mute: 0, controls: 1, modestbranding: 1, rel: 0, showinfo: 0, iv_load_policy: 3, playsinline: 1, enablejsapi: 1 },
                            events: {
                                onStateChange: function(event) {
                                    if (event.data === YT.PlayerState.PLAYING) {
                                        isVideoLoading = false;
                                        isVideoPlaying = true;
                                        hideLoader();
                                        try { if (youtubePlayer.isMuted()) youtubePlayer.unMute(); } catch(e) {}
                                    }
                                }
                            }
                        });
                    } catch(e) {}
                }
            });
        }
        
        aboutVideoContainer.addEventListener('click', function() { playVideo(); });
        aboutVideoCover.addEventListener('click', function(e) {
            e.stopPropagation();
            playVideo();
        });
        initPlayButtonPosition();
        
        if ((isYouTube || isMp4) && typeof IntersectionObserver !== 'undefined') {
            var videoAutoplayTriggered = false;
            var videoObserver = new IntersectionObserver(function(entries) {
                if (videoAutoplayTriggered) return;
                var ent = entries[0];
                if (!ent || !ent.isIntersecting) return;
                videoAutoplayTriggered = true;
                playVideo();
            }, { root: null, rootMargin: '0px', threshold: 0.5 });
            videoObserver.observe(aboutVideoContainer);
        }
    }

    // About Awards Section - ref-about-awards-media video: autoplay when in viewport, infinite loop, loading UX
    const awardsVideoContainer = document.querySelector('.div-about-awards-video-container');
    const awardsVideoNative = document.querySelector('#ref-about-awards-video-native');
    const awardsVideoCover = document.querySelector('.div-about-awards-video-cover');
    const awardsVideoLoader = document.querySelector('.div-about-awards-video-loader');
    if (awardsVideoContainer && awardsVideoNative && awardsVideoCover && awardsVideoLoader) {
        var awardsVideoSrc = awardsVideoContainer.getAttribute('data-video-src');
        if (awardsVideoContainer.getAttribute('data-video-type') === 'mp4' && awardsVideoSrc) {
            var awardsStarted = false;
            var awardsVideoPlaying = false;
            function awardsHideCoverShowLoader() {
                awardsVideoCover.classList.add('hidden');
                awardsVideoCover.style.display = 'none';
                awardsVideoCover.style.pointerEvents = 'none';
                awardsVideoCover.style.zIndex = '0';
                awardsVideoLoader.classList.remove('hidden');
                awardsVideoLoader.style.display = 'flex';
            }
            function awardsHideLoader() {
                awardsVideoLoader.classList.add('hidden');
                awardsVideoLoader.style.display = 'none';
            }
            function awardsStartVideo() {
                if (awardsStarted) return;
                awardsStarted = true;
                awardsHideCoverShowLoader();
                awardsVideoNative.loop = true;
                awardsVideoNative.muted = true;
                awardsVideoNative.style.display = 'block';
                awardsVideoNative.style.zIndex = '15';
                awardsVideoNative.classList.remove('hidden');
                if (awardsVideoNative.src !== awardsVideoSrc) awardsVideoNative.src = awardsVideoSrc;
                function onCanPlay() {
                    awardsHideLoader();
                    awardsVideoPlaying = true;
                    awardsVideoNative.removeEventListener('canplay', onCanPlay);
                    awardsVideoNative.removeEventListener('playing', onPlaying);
                }
                function onPlaying() {
                    awardsHideLoader();
                    awardsVideoPlaying = true;
                    awardsVideoNative.removeEventListener('canplay', onCanPlay);
                    awardsVideoNative.removeEventListener('playing', onPlaying);
                }
                awardsVideoNative.addEventListener('canplay', onCanPlay, { once: true });
                awardsVideoNative.addEventListener('playing', onPlaying, { once: true });
                setTimeout(function() {
                    awardsHideLoader();
                    if (awardsVideoNative.readyState >= 2) awardsVideoPlaying = true;
                }, 6000);
                var p = awardsVideoNative.play();
                if (p && typeof p.then === 'function') {
                    p.catch(function() {
                        awardsHideLoader();
                    });
                }
            }
            function awardsPauseVideo() {
                if (awardsVideoNative.src && awardsVideoPlaying) {
                    awardsVideoNative.pause();
                }
            }
            if (typeof IntersectionObserver !== 'undefined') {
                var awardsObserver = new IntersectionObserver(function(entries) {
                    var ent = entries[0];
                    if (!ent) return;
                    if (ent.isIntersecting) {
                        if (!awardsStarted) {
                            awardsStartVideo();
                        } else if (awardsVideoNative.src) {
                            awardsVideoNative.play().catch(function() {});
                        }
                    } else {
                        awardsPauseVideo();
                    }
                }, { root: null, rootMargin: '0px', threshold: 0.25 });
                awardsObserver.observe(awardsVideoContainer);
            } else {
                awardsStartVideo();
            }
        }
    }
});

// Single article featured image: hover to show video slideshow (continues after mouse out)
document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.ref-single-post-featured-image-wrapper');
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
    const overlay = wrapper.querySelector('.ref-single-post-featured-video-overlay');
    const videoEl = wrapper.querySelector('.ref-single-post-featured-video');
    const dotsContainer = wrapper.querySelector('.ref-single-post-featured-dots');
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
            dot.className = 'ref-single-post-featured-dot div-single-post-featured-dot';
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
