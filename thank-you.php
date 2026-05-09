<?php
$pageTitle   = 'Thank You | IM Buildcon';
$activePage  = '';
$extraHeadHTML = <<<'HTML'
    <style>
        /* Ensuring basic layout for thank you page if main.css imports are slow */
        .thank-you-section {
            padding: 150px 0 100px;
            min-height: 60vh;
            display: flex;
            align-items: center;
        }
    </style>
HTML;
require 'includes/header.php';
?>

    <!-- Thank You Main Content -->
    <main>
        <section class="thank-you-section">
            <div class="container">
                <div class="thank-you-content">
                    <div class="thank-you-icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h1 class="thank-you-title">THANK YOU!</h1>
                    <p class="thank-you-text">
                        Your message has been successfully sent to IM Buildcon. We appreciate you reaching out to us.
                        Our team will review your inquiry and get back to you shortly.
                    </p>
                    <a href="index.php" class="thank-you-btn">BACK TO HOME</a>
                </div>
            </div>
        </section>
    </main>

<?php require 'includes/footer.php'; ?>
