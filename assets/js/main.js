$(document).ready(function () {
    const $header = $('.main-header');
    const $hamburger = $('#hamburgerBtn');
    const $mobileNav = $('#mobileNav');
    const $overlay = $('#mobileNavOverlay');
    const $closeBtn = $('#mobileNavClose');
    const hasActionText = ($el, text) => $el.text().trim().toLowerCase().includes(text);

    const $searchTriggers = $('.search-btn, .action-item, .mobile-action-item').filter(function () {
        const $trigger = $(this);
        return $trigger.hasClass('search-btn') || hasActionText($trigger, 'search');
    });

    const $enquiryTriggers = $('.enquiry-btn, .action-item, .mobile-action-item').filter(function () {
        const $trigger = $(this);
        return $trigger.hasClass('enquiry-btn')
            || hasActionText($trigger, 'enquire')
            || hasActionText($trigger, 'enquiry')
            || hasActionText($trigger, 'inquiry');
    });

    $searchTriggers.addClass('js-search-trigger');
    $enquiryTriggers.addClass('js-enquiry-trigger');

    // Header scroll effect
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) {
            $header.addClass('scrolled');
        } else {
            $header.removeClass('scrolled');
        }
    });

    // Open mobile nav
    $hamburger.on('click', function () {
        $mobileNav.addClass('active');
        $overlay.addClass('active');
        $('body').css('overflow', 'hidden');
    });

    // Close mobile nav
    function closeMobileNav() {
        $mobileNav.removeClass('active');
        $overlay.removeClass('active');
        $('body').css('overflow', '');
    }

    $closeBtn.on('click', closeMobileNav);
    $overlay.on('click', closeMobileNav);

    // Close on link click
    $('.mobile-nav-links a').on('click', function (e) {
        const $link = $(this);
        const $submenu = $link.siblings('.mobile-submenu');

        if ($submenu.length > 0) {
            e.preventDefault();
            $submenu.toggleClass('show');
            $link.toggleClass('open');
        } else {
            closeMobileNav();
        }
    });

    // Close on ESC key
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMobileNav();
            // Also close search/enquiry if open
            if ($('.search-overlay-container').hasClass('active')) {
                $('.search-overlay-container').removeClass('active');
            }
            if ($('.enquiry-overlay-container').hasClass('active')) {
                $('.enquiry-overlay-container').removeClass('active');
            }
        }
    });

    // Search Toggle Logic
    $searchTriggers.on('click', function (e) {
        e.preventDefault();

        // Close mobile nav if open
        if ($mobileNav.hasClass('active')) {
            closeMobileNav();
        }

        // Close enquiry if open
        if ($('.enquiry-overlay-container').hasClass('active')) {
            $('.enquiry-overlay-container').removeClass('active');
        }

        $('.search-overlay-container').toggleClass('active');
        if ($('.search-overlay-container').hasClass('active')) {
            setTimeout(function () {
                $('.search-input').focus();
            }, 100);
        }
    });

    // Enquiry Toggle Logic
    $enquiryTriggers.on('click', function (e) {
        e.preventDefault();

        // Close mobile nav if open
        if ($mobileNav.hasClass('active')) {
            closeMobileNav();
        }

        // Close search if open
        if ($('.search-overlay-container').hasClass('active')) {
            $('.search-overlay-container').removeClass('active');
        }

        $('.enquiry-overlay-container').toggleClass('active');
    });

    // Close overlays when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search-overlay-container').length &&
            !$(e.target).closest('.js-search-trigger').length) {
            $('.search-overlay-container').removeClass('active');
        }

        if (!$(e.target).closest('.enquiry-overlay-container').length &&
            !$(e.target).closest('.js-enquiry-trigger').length) {
            $('.enquiry-overlay-container').removeClass('active');
        }
    });

    // Close mobile nav when clicking Chat Now (to ensure it doesn't stay open in background)
    $('.mobile-action-item').filter(function () {
        return hasActionText($(this), 'chat');
    }).on('click', function () {
        closeMobileNav();
    });

    // Initialize Pillars Swiper
    const pillarsSwiper = new Swiper('.pillars-swiper', {
        loop: true,
        centeredSlides: true,
        speed: 900,
        grabCursor: true,
        spaceBetween: 10,

        slidesPerView: 1.2, // mobile

        navigation: {
            nextEl: '.pillars-next',
            prevEl: '.pillars-prev',
        },

        pagination: {
            el: '.pillars-pagination',
            type: 'fraction',
        },

        breakpoints: {
            1024: {
                slidesPerView: 3,   // ✅ only 3 items
                centeredSlides: true,
                spaceBetween: 40,
            }
        }
    });

    // Initialize Hero Swiper
    const heroSwiper = new Swiper('.hero-swiper', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // pagination: {
        //     el: '.hero-pagination',
        //     clickable: true,
        // },
        navigation: {
            nextEl: '.hero-nav-next',
            prevEl: '.hero-nav-prev',
        },
        on: {
            slideChange: function () {
                // Find all videos in the swiper
                const swiper = this;
                const activeSlide = swiper.slides[swiper.activeIndex];
                const videos = activeSlide.querySelectorAll('video');

                // Play video in active slide
                videos.forEach(v => {
                    v.currentTime = 0;
                    v.play();
                });
            }
        }
    });

    // Initialize Video Swiper
    console.log('Initializing Video Swiper...');
    const videoSwiper = new Swiper('.video-swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        speed: 800,
        navigation: {
            nextEl: '.video-next',
            prevEl: '.video-prev',
        },
    });





    document.addEventListener('click', function (e) {
        const link = e.target.closest('.video-link');
        if (!link) return;

        let videoURL = link.getAttribute('data-video');

        // Extract video ID safely
        let videoID = videoURL.split('v=')[1];
        if (videoID && videoID.includes('&')) {
            videoID = videoID.split('&')[0];
        }

        let embedURL = `https://www.youtube.com/embed/${videoID}?autoplay=1`;

        document.getElementById('youtubeVideo').src = embedURL;
    });

    // Stop video when modal closes
    const modal = document.getElementById('videoModal');
    if (modal) {
        modal.addEventListener('hidden.bs.modal', function () {
            document.getElementById('youtubeVideo').src = "";
        });
    }
    // Leadership Bio Modal Logic
    $('.leader-know-more').on('click', function () {
        const name = $(this).data('name');
        const role = $(this).data('role');
        const bio = $(this).data('bio');
        const img = $(this).data('img');

        $('#modalLeaderName').text(name);
        $('#modalLeaderRole').text(role);

        // Handle Read More for Modal Bio
        const $bioContainer = $('#modalLeaderBio');
        $bioContainer.attr('data-full-bio', bio); // Store full bio

        const words = bio.trim().split(/\s+/);
        if (words.length > 55) {
            const truncatedText = words.slice(0, 70).join(' ') + '... ';
            $bioContainer.html(truncatedText + '<span class="read-more-toggle" data-action="expand">Read More</span>');
        } else {
            $bioContainer.text(bio);
        }

        $('#modalLeaderImg').attr('src', img).attr('alt', name);

        const leaderModal = new bootstrap.Modal(document.getElementById('leaderBioModal'));
        leaderModal.show();
    });

    // Toggle Read More/Less Global Handler
    $(document).on('click', '.read-more-toggle', function () {
        const $btn = $(this);
        const $container = $btn.parent();
        const action = $btn.data('action');
        const fullText = $container.attr('data-full-bio');

        if (action === 'expand') {
            $container.html(fullText + ' <span class="read-more-toggle" data-action="collapse">Read Less</span>');
        } else {
            const words = fullText.trim().split(/\s+/);
            const truncatedText = words.slice(0, 55).join(' ') + '... ';
            $container.html(truncatedText + '<span class="read-more-toggle" data-action="expand">Read More</span>');
        }
    });

    // Auto-initialize Read More for elements with .js-read-more
    $('.js-read-more').each(function () {
        const $el = $(this);
        const text = $el.text().trim();
        const words = text.split(/\s+/);

        if (words.length > 55) {
            $el.attr('data-full-bio', text);
            const truncatedText = words.slice(0, 55).join(' ') + '... ';
            $el.html(truncatedText + '<span class="read-more-toggle" data-action="expand">Read More</span>');
        }
    });

    // Spacious Slider Functionality
    const spaciousSlider = {
        currentSlide: 0,
        slides: document.querySelectorAll('.spacious-slide'),
        dots: document.querySelectorAll('.spacious-dot'),
        totalSlides: 0,

        init() {
            this.totalSlides = this.slides.length;
            console.log('Spacious Slider initialized with', this.totalSlides, 'slides');
            this.setupEventListeners();
            this.updateSlide(); // Initialize slide display
        },

        setupEventListeners() {
            // Next button
            const nextBtn = document.querySelector('.spacious-next');
            const prevBtn = document.querySelector('.spacious-prev');

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    console.log('Next button clicked');
                    this.nextSlide();
                });
            }

            // Previous button
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    console.log('Previous button clicked');
                    this.prevSlide();
                });
            }

            // Dots
            this.dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    console.log('Dot', index, 'clicked');
                    this.goToSlide(index);
                });
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    this.prevSlide();
                } else if (e.key === 'ArrowRight') {
                    this.nextSlide();
                }
            });
        },

        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            console.log('Moving to slide', this.currentSlide);
            this.updateSlide();
        },

        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            console.log('Moving to slide', this.currentSlide);
            this.updateSlide();
        },

        goToSlide(index) {
            this.currentSlide = index;
            console.log('Going to slide', index);
            this.updateSlide();
        },

        updateSlide() {
            // Calculate prev and next indices
            const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            const nextIndex = (this.currentSlide + 1) % this.totalSlides;

            // Update slides
            this.slides.forEach((slide, index) => {
                slide.classList.remove('active', 'prev', 'next');

                if (index === this.currentSlide) {
                    slide.classList.add('active');
                } else if (index === prevIndex) {
                    slide.classList.add('prev');
                } else if (index === nextIndex) {
                    slide.classList.add('next');
                }
            });

            // Update dots
            this.dots.forEach((dot, index) => {
                dot.classList.remove('active');
                if (index === this.currentSlide) {
                    dot.classList.add('active');
                }
            });
        }
    };

    // Initialize slider if slides exist
    if (document.querySelector('.spacious-slide')) {
        spaciousSlider.init();
    }

    // Testimonial Video Logic
    const $videoWrapper = $('#testimonialVideoWrapper');
    const $video = $('#testimonialVideo');

    if ($videoWrapper.length && $video.length) {
        $videoWrapper.on('click', function () {
            const videoElement = $video[0];
            if (videoElement.paused) {
                videoElement.play();
                $video.attr('controls', true);
            } else {
                videoElement.pause();
            }
        });

        // Ensure controls are visible when playing starts
        $video.on('play', function () {
            $video.attr('controls', true);
        });
    }

    // AJAX Search Logic
    const searchData = [
        { title: "Home", url: "index.php" },
        { title: "Our Story", url: "story.php" },
        { title: "Applaud 38 - Goregaon", url: "applaud-38.php" },
        { title: "The Crimson - Borivali", url: "the-crimson.php" },
        { title: "Our Impact", url: "ourImpact.php" },
        { title: "Our Perspective", url: "perspective.php" },
        { title: "NRI Corner", url: "nri.php" },
        { title: "Blogs", url: "https://imbuildcon.in/blogs/" },
        { title: "Careers", url: "careers.php" },
        { title: "Contact Us", url: "contactUs.php" }
    ];

    const $searchInput = $('#ajaxSearchInput');
    const $searchResults = $('#ajaxSearchResults');

    if ($searchInput.length > 0) {
        $searchInput.on('input', function() {
            const query = $(this).val().toLowerCase().trim();
            $searchResults.empty();

            if (query.length > 0) {
                const filteredResults = searchData.filter(item => 
                    item.title.toLowerCase().includes(query)
                );

                if (filteredResults.length > 0) {
                    filteredResults.forEach(item => {
                        $searchResults.append(`
                            <a href="${item.url}" class="search-result-item">
                                <div class="search-result-title">${item.title}</div>
                            </a>
                        `);
                    });
                } else {
                    $searchResults.append('<div class="search-no-results">No results found</div>');
                }
                $searchResults.addClass('active');
            } else {
                $searchResults.removeClass('active');
            }
        });

        // Prevent form submission
        $('#ajaxSearchForm').on('submit', function(e) {
            e.preventDefault();
        });

        // Hide results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#ajaxSearchForm').length) {
                $searchResults.removeClass('active');
            }
        });
    }
});
