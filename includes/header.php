<?php
/**
 * Shared Header Include
 * 
 * Variables to set BEFORE including this file:
 *   $pageTitle   (string)  - Browser tab title
 *   $activePage  (string)  - Active nav key: 'home' | 'story' | 'projects' | 'impact' | 'perspective' | 'nri' | 'careers' | 'contact'
 *   $extraStyles (array)   - Extra CSS files e.g. ['assets/css/story.css']
 *   $extraHeadHTML (string) - Any extra raw HTML for <head> (optional, e.g. inline <style> blocks)
 *
 * Defaults (if not set):
 */
if (!isset($pageTitle))    $pageTitle    = 'IM Buildcon';
if (!isset($activePage))   $activePage   = '';
if (!isset($extraStyles))  $extraStyles  = [];
if (!isset($extraHeadHTML)) $extraHeadHTML = '';

// Helper: returns 'active' class string if $key matches $activePage
function nav_active($key) {
    global $activePage;
    return ($activePage === $key) ? ' class="active"' : '';
}

// Helper: returns 'active' class appended if $key matches $activePage, for submenu parent
function nav_active_parent($key) {
    global $activePage;
    return ($activePage === $key) ? ' class="active"' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/main.css">
    <?php foreach ($extraStyles as $css): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css); ?>">
    <?php endforeach; ?>
    <?php echo $extraHeadHTML; ?>
</head>

<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header-left d-flex align-items-center">
                <button class="hamburger me-3" id="hamburgerBtn">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="logo">
                    <?php if ($activePage === 'projects'): ?>
                    <a href="index.php"><img src="assets/images/projects/IM-buildcon-logo-gold.png" alt="IM Buildcon Logo"></a>
                    <?php else: ?>
                    <a href="index.php"><img src="assets/images/logo-new.png" alt="IM Buildcon Logo"></a>
                    <?php endif; ?>
                </div>
            </div>
            <nav class="nav-menu">
                <ul class="d-flex list-unstyled m-0">
                    <li><a href="story.php"<?php echo nav_active('story'); ?>>Our Story</a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)" style="cursor: default;"<?php echo nav_active_parent('projects'); ?>>Our Projects <i
                                class="fa-solid fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                        <div class="submenu">
                            <ul class="submenu-list">
                                <li><a href="applaud-38.php"<?php echo ($activePage === 'projects') ? ' class="active"' : ''; ?>>APPLAUD 38 <span class="subtitle">Goregaon</span></a>
                                </li>
                                <li><a href="the-crimson.php"<?php echo ($activePage === 'projects') ? ' class="active"' : ''; ?>>THE CRIMSON <span class="subtitle">Borivali</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="ourImpact.php"<?php echo nav_active('impact'); ?>>Our Impact</a></li>
                    <li><a href="perspective.php"<?php echo nav_active('perspective'); ?>>OUR PERSPECTIVE</a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)" style="cursor: default;"<?php echo (in_array($activePage, ['nri','careers','contact'])) ? ' class="active"' : ''; ?>>More <i
                                class="fa-solid fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                        <div class="submenu">
                            <ul class="submenu-list">
                                <li><a href="nri.php"<?php echo nav_active('nri'); ?>>NRI Corner</a></li>
                                <li><a href="https://imbuildcon.in/blogs/">Blogs</a></li>
                                <li><a href="careers.php"<?php echo nav_active('careers'); ?>>Careers</a></li>
                                <li><a href="contactUs.php"<?php echo nav_active('contact'); ?>>Contact</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header-actions align-items-center">
                <a href="#" class="action-item d-flex align-items-center text-decoration-none">
                    <span>Enquire</span>
                </a>
                <a href="https://wa.me/917977563093" target="_blank"
                    class="action-item d-flex align-items-center text-decoration-none ms-4">
                    <span>Chat</span>
                </a>
                <a href="#" class="action-item d-flex align-items-center text-decoration-none ms-4">
                    <span>Search</span>
                </a>
            </div>
        </div>

        <!-- Search Overlay -->
        <div class="search-overlay-container">
            <div class="container relative">
                <form role="search" method="get" class="search-form d-flex align-items-center" action="javascript:void(0);" id="ajaxSearchForm">
                    <input type="text" name="s" id="ajaxSearchInput" placeholder="WHAT ARE YOU LOOKING ?" class="search-input w-100" autocomplete="off">
                    <div id="ajaxSearchResults" class="search-results-dropdown"></div>
                    <button type="submit" class="search-submit" aria-label="Search"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

        <!-- Enquiry Overlay -->
        <div class="enquiry-overlay-container">
            <div class="container relative">
                <h3 class="enquiry-title">REQUEST A CALL BACK</h3>
                <form class="enquiry-form" action="smtp/sendemail.php" method="POST">
                    <input type="hidden" name="form_type" value="enquiry">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 pe-md-5">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="NAME" class="enquiry-input" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="EMAIL ID" class="enquiry-input" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="CONTACT NUMBER" class="enquiry-input"
                                    required>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-md-6 ps-md-5">
                            <div class="form-group enquiry-select-wrapper">
                                <select name="country" class="enquiry-select" required>
                                    <option value="" disabled selected>SELECT COUNTRY</option>
                                    <option value="india">INDIA</option>
                                    <option value="usa">USA</option>
                                    <option value="uk">UK</option>
                                    <option value="uae">UAE</option>
                                </select>
                                <i class="fa-solid fa-chevron-down select-icon"></i>
                            </div>
                            <div class="form-group enquiry-select-wrapper">
                                <select name="city" class="enquiry-select" required>
                                    <option value="" disabled selected>SELECT CITY</option>
                                    <option value="mumbai">MUMBAI</option>
                                    <option value="delhi">DELHI</option>
                                    <option value="bangalore">BANGALORE</option>
                                    <option value="dubai">DUBAI</option>
                                </select>
                                <i class="fa-solid fa-chevron-down select-icon"></i>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="enquiry-submit-btn">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <nav class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo-new.png" alt="IM Buildcon Logo"></a>
            </div>
            <button class="mobile-nav-close" id="mobileNavClose">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="story.php"<?php echo nav_active('story'); ?>>Our Story</a></li>
            <li><a href="javascript:void(0)" class="d-flex justify-content-between align-items-center">Our Projects <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></a>
                <ul class="mobile-submenu list-unstyled ms-3">
                    <li><a href="applaud-38.php" style="font-size: 13px; opacity: 0.8;"<?php echo ($activePage === 'projects') ? ' class="active"' : ''; ?>>APPLAUD 38</a></li>
                    <li><a href="the-crimson.php" style="font-size: 13px; opacity: 0.8;"<?php echo ($activePage === 'projects') ? ' class="active"' : ''; ?>>THE CRIMSON</a></li>
                </ul>
            </li>
            <li><a href="ourImpact.php"<?php echo nav_active('impact'); ?>>Our Impact</a></li>
            <li><a href="perspective.php"<?php echo nav_active('perspective'); ?>>Perspective</a></li>
            <li><a href="javascript:void(0)" class="d-flex justify-content-between align-items-center"<?php echo (in_array($activePage, ['nri','careers','contact'])) ? ' class="active"' : ''; ?>>More <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></a>
                <ul class="mobile-submenu list-unstyled ms-3">
                    <li><a href="nri.php" style="font-size: 13px; opacity: 0.8;"<?php echo nav_active('nri'); ?>>NRI Corner</a></li>
                    <li><a href="https://imbuildcon.in/blogs/" style="font-size: 13px; opacity: 0.8;">Blogs</a></li>
                    <li><a href="careers.php" style="font-size: 13px; opacity: 0.8;"<?php echo nav_active('careers'); ?>>Careers</a></li>
                    <li><a href="contactUs.php" style="font-size: 13px; opacity: 0.8;"<?php echo nav_active('contact'); ?>>Contact</a></li>
                </ul>
            </li>
        </ul>
        <div class="mobile-nav-actions mt-4">
            <a href="#" class="mobile-action-item d-flex align-items-center text-decoration-none mb-3">
                <i class="fa-solid fa-file-signature me-3" style="color: var(--clr-gold);"></i>
                <span>Enquire</span>
            </a>
            <a href="https://wa.me/917977563093" target="_blank"
                class="mobile-action-item d-flex align-items-center text-decoration-none mb-3">
                <i class="fa-brands fa-whatsapp me-3" style="color: var(--clr-gold);"></i>
                <span>Chat Now</span>
            </a>
            <a href="#" class="mobile-action-item d-flex align-items-center text-decoration-none">
                <i class="fa-solid fa-magnifying-glass me-3" style="color: var(--clr-gold);"></i>
                <span>Search</span>
            </a>
        </div>
        <div class="mobile-nav-social">
            <a target="_blank" href="https://www.facebook.com/IMBuildconOfficial"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a target="_blank" href="https://www.instagram.com/imbuildcon/"><i class="fa-brands fa-instagram"></i></a>
            <a target="_blank" href="https://x.com/IBuildcon/"><i class="fa-brands fa-twitter"></i></a>
            <a target="_blank" href="https://www.linkedin.com/company/im-buildcon/"><i
                    class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </nav>
