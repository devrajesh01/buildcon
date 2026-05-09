<?php
$pageTitle   = 'Careers | IM Buildcon';
$activePage  = 'careers';
$extraStyles = ['assets/css/careers.css'];
require 'includes/header.php';
?>

    <!-- Main Content -->
    <main class="careers-main bg-white">
        <!-- Banner Section -->
        <section class="careers-banner position-relative">
            <img src="assets/images/carrer-banner.jpg" alt="Careers Banner"
                class="banner-bg-img banner-desktop w-100 object-fit-cover shadow-sm">
            <img src="assets/images/Careers-banner-mobile.png" alt="Careers Banner"
                class="banner-bg-img banner-mobile w-100 object-fit-cover shadow-sm">
        </section>

        <!-- Intro Section -->
        <section class="careers-intro py-5 text-center">
            <div class="container py-lg-4">
                <h2 class="section-title text-uppercase fw-normal mb-4" style="color: #444; letter-spacing: 2px;">WORK
                    WITH US</h2>
                <div class="intro-text mx-auto"
                    style="max-width: 700px; color: #666; font-size: 15px; font-weight: 300; line-height: 1.8;">
                    At IMBUILDCON, we believe great spaces are built by great people.<br class="d-none d-md-block">
                    We offer an environment driven by integrity, collaboration, and long-term vision.<br
                        class="d-none d-md-block">
                    If you're passionate about creating quality spaces and growing with purpose,<br
                        class="d-none d-md-block">
                    we'd like to hear from you.
                </div>
            </div>
        </section>

        <!-- Form Section -->
        <section class="careers-form-section ">
            <div class="container pb-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="careers-form-card">
                            <form id="careersForm" action="smtp/sendemail.php" method="POST"
                                enctype="multipart/form-data" class="p-4 p-md-5">
                                <input type="hidden" name="form_type" value="careers">
                                <div class="form-group mb-4">
                                    <input type="text" name="name" class="form-control minimal-input" id="fullName"
                                        placeholder="FULL NAME" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" name="email" class="form-control minimal-input" id="email"
                                        placeholder="EMAIL ADDRESS" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="tel" name="phone" class="form-control minimal-input" id="phone"
                                        placeholder="CONTACT NUMBER" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="role" class="form-control minimal-input" id="role"
                                        placeholder="CURRENT ROLE / EXPERIENCE" required>
                                </div>

                                <div class="form-group mb-5 file-upload-group position-relative">
                                    <!-- Custom File Upload UI -->
                                    <input type="file" name="resume"
                                        class="form-control file-input position-absolute w-100 h-100 opacity-0"
                                        id="resume" accept=".pdf,.doc,.docx" required
                                        style="cursor: pointer; z-index: 2;">
                                    <div class="minimal-input d-flex align-items-center w-100">
                                        <span class="file-label">UPLOAD RESUME*</span>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-gold-submit text-uppercase rounded-1 w-100 py-3 fw-bold border-0 mt-2">Submit
                                    Application</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php
$extraScripts = <<<'HTML'
    <script>
        // Update file label text when file is selected
        document.getElementById('resume').addEventListener('change', function (e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : "UPLOAD RESUME*";
            document.querySelector('.file-label').textContent = fileName;
        });
    </script>
HTML;
require 'includes/footer.php';
?>
