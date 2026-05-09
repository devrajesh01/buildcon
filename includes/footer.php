    <!-- Footer -->
    <footer class="footer pb-5">
        <div class="container">
            <!-- Top Section -->
            <div class="row align-items-center ">
                <div class="col-lg-2 col-md-12  mb-lg-0">
                    <div class="socimedia ">
                        <a target="_blank" href="https://www.facebook.com/IMBuildconOfficial"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a target="_blank" href="https://www.instagram.com/imbuildcon/"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a target="_blank" href="https://x.com/IBuildcon/"><i class="fa-brands fa-twitter"></i></a>
                        <a target="_blank" href="https://www.linkedin.com/company/im-buildcon/"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12  mb-lg-0">
                    <div class="ftr_col p-0 d-flex justify-content-lg-center justify-content-center flex-wrap gap-4">
                        <p class="m-0">
                            <a href="mailto:info@imbuildcon.in" class="d-flex align-items-center text-decoration-none">
                                <i class="fa-solid fa-envelope"></i>
                                <span>info@imbuildcon.in</span>
                            </a>
                        </p>
                        <p class="m-0">
                            <a href="tel:+919854236236" target="_blank"
                                class="d-flex align-items-center text-decoration-none">
                                <i class="fa-solid fa-phone"></i>
                                <span>+91 9854 236 236</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 text-left d-flex justify-content-center">
                    <div class="ftr_col p-0">
                        <p class="m-0" style="line-height: 1.8;">IM Buildcon Pvt. Ltd. 809-811, 8th Floor,
                            Corporate Avenue,<br>Sonawala Lane, Goregaon East, Mumbai - 400063</p>
                    </div>
                </div>
            </div>

            <hr class="my-2 border-white opacity-100">

            <!-- Bottom Section -->
            <div class="row align-items-end ">
                <div class="col-lg-9 col-md-12 text-lg-start text-center">
                    <ul class="ftr_nav d-flex flex-wrap gap-4 mb-5 justify-content-lg-start justify-content-center">
                        <li><a href="story.php">Our Story</a></li>
                        <li><a href="applaud-38.php">Our Projects</a></li>
                        <li><a href="ourImpact.php">Our Impact</a></li>
                        <li><a href="perspective.php">Perspective</a></li>
                        <li><a href="nri.php">NRI Corner</a></li>
                        <li><a href="careers.php">Careers</a></li>
                        <li><a href="contactUs.php">Contact</a></li>
                        <li><a href="https://imbuildcon.in/blogs/">Blogs</a></li>
                    </ul>
                    <div class="copyright-text text-lg-start m-0 p-0 text-start pb-2">
                        <span><i class="fa-regular fa-copyright"></i> 2026 All Rights Reserved by IM Buildcon</span>
                        <span class="mx-1 mx-sm-2">|</span> <span>Powered by <a href="https://kalakaarglobal.com/"
                                class="powered-by-text" target="_blank"><b>Kalakaar Global</b></a></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-4 mt-lg-0 d-flex justify-content-lg-end justify-content-center">
                    <div class="ftr-logo m-0">
                        <?php if (isset($activePage) && $activePage === 'projects'): ?>
                        <a href="index.php"><img src="assets/images/projects/IM-buildcon-logo-gold.png" alt="brand-logo" class="img-fluid"
                                style="max-width: 150px; opacity: 0.9;"></a>
                        <?php else: ?>
                        <a href="index.php"><img src="assets/images/logo-new.png" alt="brand-logo" class="img-fluid"
                                style="max-width: 150px; opacity: 0.9;"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php if (!empty($extraScripts)) echo $extraScripts; ?>
</body>

</html>
