<?php
$pageTitle   = 'Buildcon';
$activePage  = 'home';
$extraStyles = ['assets/css/video-slider.css'];
require 'includes/header.php';
?>

    <section class="hero-section">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <video autoplay muted loop playsinline class="hero-video js-hero-video" data-desktop-src="assets/videos/newvd-1.mp4" data-mobile-src="assets/videos/mobilebanner-video1.mp4">
                        <source src="assets/videos/newvd-1.mp4" type="video/mp4">
                    </video>

                </div>
                <div class="swiper-slide">
                    <video autoplay muted loop playsinline class="hero-video js-hero-video" data-desktop-src="assets/videos/home2.mp4" data-mobile-src="assets/videos/mobilebanner-video2.mp4">
                        <source src="assets/videos/home2.mp4" type="video/mp4">
                    </video>

                </div>



            </div>
            <!-- Navigation -->
            <div class="hero-nav-prev"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="hero-nav-next"><i class="fa-solid fa-chevron-right"></i></div>
            <!-- Pagination -->
            <!-- <div class="hero-pagination"></div> -->
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-top">
                <h3 class="section-heading">Building With Purpose</h3>
                <p>A Mumbai-based real estate company shaped by integrity, intention, and
                    enduring design. Since 2011, ImBuildcon has been creating residential and commercial spaces
                    that balance thoughtful architecture with everyday comfort homes built to last, and
                    relationships built on trust.</p>
            </div>

        </div>
    </section>
    <section class="we-stand">
        <div class="sec-image"><img src="assets/images/banner-image-girl.png" alt="Terrace View"></div>
        <div class="container">
            <div class="we-stand-content">
                <h4 class="section-heading">We Stand Where Few Stood</h4>
                <p>Our tagline reflects the courage to build with conviction choosing
                    integrity over shortcuts, purpose over pace, and long-term value over momentary gain. It is
                    a reminder that progress is meaningful when it is principled.</p>
            </div>
        </div>
    </section>

    <!-- Pillars Section -->
    <section class="pillars-section">
        <div class="container">
            <div class="section-title">
                <h3 class="section-heading">The Principles That Endure</h3>
            </div>
        </div>
        <div class="pillars-slider-wrap">
            <div class="swiper pillars-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">Integrity</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images/Integrity.png" alt="Integrity">
                            </div>
                            <div class="pillar-footer">
                                <p>Every decision is guided by transparency and ethics that stand the test of time.</p>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">Commitment</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images/Commitment.png" alt="Commitment">
                            </div>
                            <div class="pillar-footer">
                                <p>Our word is our bond, honoured through consistency, care, and long-term
                                    accountability.</p>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">Thoughtful Design</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images/Thoughtful design.png" alt="Thoughtful Design">
                            </div>
                            <div class="pillar-footer">
                                <p>Design that balances beauty, function, and the quiet rhythms of living.</p>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">Quiet Luxury</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images//Quiet Luxury.png" alt="Quiet Luxury">
                            </div>
                            <div class="pillar-footer">
                                <p>Refinement lives in the details subtle finishes, calm aesthetics, and timeless
                                    elegance.</p>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">People First</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images/people first.png" alt="People First">
                            </div>
                            <div class="pillar-footer">
                                <p>We listen closely, build responsibly, and design spaces that grow with the people who
                                    call them home.</p>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pillar-card">
                            <div class="pillar-header">
                                <h4 class="pillar-title">Evolving Vision</h4>
                            </div>
                            <div class="pillar-image">
                                <img src="assets/images/Evolving VIsion.png" alt="Evolving Vision">
                            </div>
                            <div class="pillar-footer">
                                <p>As we expand, our focus remains on sustainability, relevance, and creating lasting
                                    value for communities.</p>

                            </div>
                        </div>
                    </div>

                    <!-- DUPLICATE SET FOR GAP-FREE LOOP -->


                </div>
            </div>
            <div class="pillars-nav">
                <button class="pillars-prev"><i class="fa-solid fa-chevron-left"></i></button>
                <div class="pillars-pagination"></div>
                <button class="pillars-next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <section class="video-section">
        <div class="container">
            <div class="section-title">
                <h3 class="section-heading">What Our People Feel </h3>
            </div>
            <div class="maincontent">
                <div class="video-wrapper" id="testimonialVideoWrapper">
                    <video id="testimonialVideo" poster="assets/images/testimonilas-video.jpeg">
                        <source src="assets/videos/testimonilas-video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>

<?php
$extraScripts = <<<'HTML'
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const isPhone = window.matchMedia('(max-width: 767px)').matches;
        document.querySelectorAll('.js-hero-video').forEach(function (video) {
            const source = video.querySelector('source');
            if (!source) return;
            const targetSrc = isPhone ? video.dataset.mobileSrc : video.dataset.desktopSrc;
            if (targetSrc && source.getAttribute('src') !== targetSrc) {
                source.setAttribute('src', targetSrc);
                video.load();
            }
        });
    });
</script>
HTML;
require 'includes/footer.php';
?>
