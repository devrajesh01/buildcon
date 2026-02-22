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
        slidesPerView: 1.2, // Mobile default: 1 full + peeking
        spaceBetween: 10,
        loop: true,
        centeredSlides: true,
        slidesPerGroup: 1, // Always move 1 by 1
        speed: 1000,
        grabCursor: true,
        loopedSlides: 6, // Match total slides (6) for perfectly symmetric loop cloning
        loopAdditionalSlides: 2,
        watchSlidesProgress: true,
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
                slidesPerView: 3.8, // Desktop: 3 full + 2 peeking (~40% each)
                spaceBetween: 40
            }
        }
    });
});
