$(document).ready(function () {
    const $header = $('.main-header');
    const $hamburger = $('#hamburgerBtn');
    const $mobileNav = $('#mobileNav');
    const $overlay = $('#mobileNavOverlay');
    const $closeBtn = $('#mobileNavClose');

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
    $('.mobile-nav-links a').on('click', function () {
        closeMobileNav();
    });

    // Close on ESC key
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMobileNav();
        }
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
                slidesPerView: 4,   // ✅ 3 full + 50% each side
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
        pagination: {
            el: '.hero-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.hero-nav-next',
            prevEl: '.hero-nav-prev',
        },
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

    // Testimonial Video Logic
    const videoWrapper = document.getElementById('testimonialVideoWrapper');
    const video = document.getElementById('testimonialVideo');

    if (videoWrapper && video) {
        videoWrapper.addEventListener('click', function () {
            if (video.paused) {
                video.play();
                video.setAttribute('controls', 'true');
            }
        });

        // Reset if video ends
        video.addEventListener('ended', function () {
            video.removeAttribute('controls');
            video.load(); // Reset to poster image
        });
    }
});
