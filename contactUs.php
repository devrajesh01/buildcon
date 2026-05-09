<?php
$pageTitle   = 'Contact Us - IM Buildcon';
$activePage  = 'contact';
$extraStyles = ['assets/css/video-slider.css', 'assets/css/contact-us.css'];
require 'includes/header.php';
?>

    <!-- Main Content -->
    <main class="contact-us-main">
        <!-- Banner Section -->
        <section class="contact-banner">
            <img src="assets/images/contact-us-banner-image.png" alt="Contact Us Banner" class="banner-bg-img banner-desktop">
            <img src="assets/images/Contact-mobile-banner.png" alt="Contact Us Banner" class="banner-bg-img banner-mobile">
            <div class="banner-overlay-text">
                <span class="line-bold">WE'RE HERE TO HELP YOU</span>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-header mb-5">
                    <h2 class="contact-heading">GET IN TOUCH</h2>
                    <p class="contact-subheading"><i>WHAT CAN WE ASSIST YOU WITH?</i></p>
                </div>

                <div class="contact-form-wrapper">
                    <form action="smtp/sendemail.php" method="POST" class="contact-form">
                        <input type="hidden" name="form_type" value="contact">
                        <div class="row g-4">
                            <!-- Field 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control custom-input" placeholder="Name*" required>
                                </div>
                            </div>
                            <!-- Field 2 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control custom-input" placeholder="Email ID"
                                        required>
                                </div>
                            </div>
                            <!-- Field 3 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control custom-input" placeholder="Mobile Number"
                                        required>
                                </div>
                            </div>
                            <!-- Field 4 -->
                            <div class="col-md-4">
                                <div class="form-group select-wrapper">
                                    <select name="country" class="form-control custom-input custom-select" required>
                                        <option value="" disabled selected>Select Country</option>
                                        <option value="india">India</option>
                                        <option value="us">United States</option>
                                        <option value="uk">United Kingdom</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down select-icon"></i>
                                </div>
                            </div>
                            <!-- Field 5 -->
                            <div class="col-md-4">
                                <div class="form-group select-wrapper">
                                    <select name="city" class="form-control custom-input custom-select" required>
                                        <option value="" disabled selected>Select City</option>
                                        <option value="mumbai">Mumbai</option>
                                        <option value="delhi">Delhi</option>
                                        <option value="bangalore">Bangalore</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down select-icon"></i>
                                </div>
                            </div>
                            <!-- Field 6 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="message" class="form-control custom-input" placeholder="Message" required>
                                </div>
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="form-check custom-checkbox d-flex align-items-center">
                                    <input class="form-check-input me-3" type="checkbox" id="privacyPolicyCheck"
                                        required>
                                    <label class="form-check-label privacy-text" for="privacyPolicyCheck">
                                        By checking this box, you agree to our <a href="#" class="privacy-link">Privacy
                                            Policy</a> and consent to be contacted with relevant updates.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <button type="submit" class="btn submit-btn">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php require 'includes/footer.php'; ?>
