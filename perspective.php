<?php
$pageTitle   = 'Perspective | IM Buildcon';
$activePage  = 'perspective';
$extraStyles = ['assets/css/video-slider.css', 'assets/css/perspective.css'];
require 'includes/header.php';
?>

    <!-- Main Content -->
    <main class="perspective-main">
        <!-- Banner Section -->
        <section class="perspective-banner position-relative d-flex align-items-center">
            <img src="assets/images/perpective/Web-Banner-perspective.png" alt="Perspective Banner"
                class="banner-bg-img banner-bg-desktop w-100 object-fit-cover">
            <img src="assets/images/perpective/Perspective-mobile-banner.png" alt="Perspective Banner"
                class="banner-bg-img banner-bg-mobile w-100 object-fit-cover">
            <div class="banner-logo-overlay position-absolute top-50 translate-middle-y text-end" style="right: 17%;">
                <img src="assets/images/perpective/The-perspective-logo.PNG" alt="The Perspective Logo"
                    class="banner-logo img-fluid">
            </div>
        </section>

        <!-- Intro Section -->
        <section class="perspective-intro section-bg-light">
            <div class="container py-lg-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-end">
                        <img src="assets/images/perpective/SM-Mockup-2-removebg-preview.png" alt="Mockup"
                            class="img-fluid mockup-img">
                    </div>
                    <div class="col-lg-6">
                        <div class="intro-content ps-lg-5">
                            <p class="intro-text mb-4">
                                Perspective is a platform that extends<br class="d-none d-md-block">
                                IM Buildcon's philosophy beyond real estate.<br class="d-none d-md-block">
                                It explores ideas across design,<br class="d-none d-md-block">
                                architecture, luxury, and contemporary thought,<br class="d-none d-md-block">
                                encouraging dialogue around how spaces influence<br class="d-none d-md-block">
                                perception, lifestyle, and experience.
                            </p>
                            <p class="intro-text mb-5">
                                Led by Hafsa Khan, the platform examines<br class="d-none d-md-block">
                                diverse topics and challenges conventional viewpoints<br class="d-none d-md-block">
                                while creating meaningful conversations across<br class="d-none d-md-block">
                                design and culture.
                            </p>

                            <div class="connect-links mt-4">
                                <h5 class="connect-title mb-3">Connect With Us</h5>
                                <div class="social-icons d-flex gap-3">
                                    <a target="_blank" href="https://www.facebook.com/profile.php?id=61577881065528"
                                        class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a target="_blank"
                                        href="https://www.instagram.com/theperspective1.0?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw%3D%3D"
                                        class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                                    <a target="_blank" href="https://www.youtube.com/@ThePerspective-c4h"
                                        class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                                    <a target="_blank" href="https://www.linkedin.com/in/hafsa-imran-211683137/"
                                        class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Youtube Video Section -->
        <section class="perspective-video section-bg-light position-relative">
            <div class="container ">
                <h3 class="section-title text-center text-uppercase mb-md-5" style="letter-spacing: 2px;">Tap To Watch</h3>

                <div class="swiper perspectiveSwiper">
                    <div class="swiper-wrapper">
                        <!-- Single Slide -->
                        <div class="swiper-slide text-center">
                            <a href="#" class="video-link d-inline-block position-relative" data-bs-toggle="modal"
                                data-bs-target="#videoModal" data-video="https://www.youtube.com/watch?v=-fVVJb-tgqU">
                                <img src="assets/images/perpective/youtube-image.png" alt="Youtube Video"
                                    class="img-fluid video-thumbnail border-0 shadow-sm"
                                    style="max-height: 500px; width: 100%; object-fit: cover; object-position: center;">
                            </a>
                        </div>

                        <!-- Extra slide just to demonstrate sliding if needed -->
                        <div class="swiper-slide text-center">
                            <a href="#" class="video-link d-inline-block position-relative" data-bs-toggle="modal"
                                data-bs-target="#videoModal" data-video="https://www.youtube.com/watch?v=nDbRouZHJMY">
                                <img src="assets/images/thubmnail-2.jpeg" alt="Youtube Video"
                                    class="img-fluid video-thumbnail border-0 shadow-sm"
                                    style="max-height: 500px; width: 100%; object-fit: cover; object-position: center;">
                            </a>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="#" class="video-link d-inline-block position-relative" data-bs-toggle="modal"
                                data-bs-target="#videoModal" data-video="https://www.youtube.com/watch?v=DLmILGnGXQs">
                                <img src="assets/images/thubmnail-3.jpeg" alt="Youtube Video"
                                    class="img-fluid video-thumbnail border-0 shadow-sm"
                                    style="max-height: 500px; width: 100%; object-fit: cover; object-position: center;">
                            </a>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="#" class="video-link d-inline-block position-relative" data-bs-toggle="modal"
                                data-bs-target="#videoModal" data-video="https://www.youtube.com/watch?v=AmKBDlQzLXs">
                                <img src="assets/images/thubmnail-4.jpeg" alt="Youtube Video"
                                    class="img-fluid video-thumbnail border-0 shadow-sm"
                                    style="max-height: 500px; width: 100%; object-fit: cover; object-position: center;">
                            </a>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="#" class="video-link d-inline-block position-relative" data-bs-toggle="modal"
                                data-bs-target="#videoModal" data-video="https://www.youtube.com/watch?v=r1xYNS_6gic">
                                <img src="assets/images/thubmnail-5.jpeg" alt="Youtube Video"
                                    class="img-fluid video-thumbnail border-0 shadow-sm"
                                    style="max-height: 500px; width: 100%; object-fit: cover; object-position: center;">
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next perspective-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div class="swiper-button-prev perspective-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-header border-0 pb-2 justify-content-end">
                        <button type="button" class="btn-close btn-close-white fs-4" data-bs-dismiss="modal"
                            aria-label="Close" style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe id="youtubeVideo" src="" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php
$extraScripts = <<<'HTML'
    <!-- Perspective specific scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var perspectiveSwiper = new Swiper('.perspectiveSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: '.perspective-next',
                    prevEl: '.perspective-prev',
                },
                breakpoints: {
                    768: { slidesPerView: 1, spaceBetween: 30 },
                    1024: { slidesPerView: 1, spaceBetween: 40 },
                }
            });

            var videoModal = document.getElementById('videoModal');
            var youtubeVideo = document.getElementById('youtubeVideo');

            videoModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var videoSrc = button.getAttribute('data-video');
                youtubeVideo.setAttribute('src', videoSrc);
            });

            videoModal.addEventListener('hide.bs.modal', function (event) {
                youtubeVideo.setAttribute('src', '');
            });
        });
    </script>
HTML;
require 'includes/footer.php';
?>
