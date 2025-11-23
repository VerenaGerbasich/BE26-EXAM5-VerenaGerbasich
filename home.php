<?php
session_start();
require_once 'config/db-connection.php';

// Show any error or success messages from previous actions
$error = '';
$success = '';

if (isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

// Get all available animals from database
$sql = "SELECT * FROM animals WHERE status = 'Available' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Adopt a Pet</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/pets.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Purple Blob Background - positioned before header -->
    <div class="blob-background">
        <svg class="wavy-blob" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path fill="#e9d5ff" d="M600,0 Q650,100 600,200 T600,400 Q650,500 600,600 T600,800 Q650,900 600,1000 L1000,1000 L1000,0 Z" />
            <path fill="#ddd6fe" opacity="0.8" d="M630,0 Q680,100 630,200 T630,400 Q680,500 630,600 T630,800 Q680,900 630,1000 L1000,1000 L1000,0 Z" />
            <path fill="#c4b5fd" opacity="0.6" d="M660,0 Q710,100 660,200 T660,400 Q710,500 660,600 T660,800 Q710,900 660,1000 L1000,1000 L1000,0 Z" />
        </svg>
    </div>

    <!-- Header Navigation -->
    <header class="main-header">
        <nav class="nav-container">
            <div class="nav-links">
                <a href="home.php" class="nav-link active">Home</a>
                <a href="php/senior.php" class="nav-link">Senior Pets</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a href="php/dashboard.php" class="nav-link">Admin Dashboard</a>
                    <?php endif; ?>
                    <a href="php/profile.php" class="nav-link">Profile</a>
                    <a href="php/logout.php" class="nav-link">Logout</a>
                    <span class="nav-link" style="color:#8b5cf6;font-weight:600;">👋 Welcome, <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>!</span>
                <?php else: ?>
                    <a href="php/login.php" class="nav-link">Login</a>
                    <a href="php/sign_up.php" class="nav-link">Sign up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    FIND YOUR<br>
                    <span class="hero-subtitle">perfect companion</span>
                </h1>
                <div class="divider"></div>
                <p class="hero-text">
                    Every pet deserves a loving home. Browse our adorable<br>
                    rescue animals waiting for adoption. Whether you're looking<br>
                    for a playful puppy, a gentle cat, or a loyal friend,<br>
                    we'll help you find the perfect match for your family.<br>
                    Start your adoption journey today!
                </p>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="php/sign_up.php" class="cta-button" style="display:inline-block;text-decoration:none;">Get started!</a>
                <?php endif; ?>
            </div>
            <div class="hero-illustration">
                <div class="illustration-bg">
                    <img src="img/hero_pic.png" alt="Pet Adoption Illustration" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Available Pets Section -->
    <section class="pets-section">
        <div class="pets-container">
            <?php if ($error): ?>
                <div style="background:#fee2e2;color:#dc2626;padding:1rem;border-radius:8px;margin-bottom:1.5rem;text-align:center;font-weight:600;">
                    ⚠️ <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div style="background:#d1fae5;color:#059669;padding:1rem;border-radius:8px;margin-bottom:1.5rem;text-align:center;font-weight:600;">
                    ✓ <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>
            
            <h2 class="section-title">Available for Adoption</h2>
            <p class="section-subtitle">Find your perfect companion</p>
            
            <div class="pets-grid">
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    while($animal = mysqli_fetch_assoc($result)) {
                        $isSenior = $animal['age'] > 8 ? '<span style="background:#f59e0b;color:white;padding:0.3rem 0.6rem;border-radius:5px;font-size:0.8rem;margin-left:0.5rem;">Senior</span>' : '';
                        ?>
                        <div class="pet-card">
                            <div class="pet-image">
                                <?php if (!empty($animal['photo'])): ?>
                                    <!-- DEBUG: Photo path = <?php echo htmlspecialchars($animal['photo']); ?> -->
                                    <img src="<?php echo htmlspecialchars($animal['photo']); ?>" 
                                         alt="<?php echo htmlspecialchars($animal['name']); ?>" 
                                         style="width:100%;height:100%;object-fit:cover;"
                                         onerror="console.error('Failed to load image:', this.src); this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <span class="pet-placeholder" style="display:none;">🐕</span>
                                <?php else: ?>
                                    <span class="pet-placeholder">🐕</span>
                                <?php endif; ?>
                            </div>
                            <div class="pet-info">
                                <h3 class="pet-name"><?php echo htmlspecialchars($animal['name']); ?><?php echo $isSenior; ?></h3>
                                <p class="pet-breed"><?php echo htmlspecialchars($animal['breed']); ?></p>
                                <p class="pet-details">Age: <span class="detail-value"><?php echo htmlspecialchars($animal['age']); ?> years</span></p>
                                <p class="pet-details">Size: <span class="detail-value"><?php echo htmlspecialchars($animal['size']); ?></span></p>
                                <div style="display:flex;gap:0.5rem;flex-direction:column;">
                                    <a href="php/details.php?id=<?php echo isset($animal['ID']) ? $animal['ID'] : (isset($animal['id']) ? $animal['id'] : 0); ?>" class="pet-btn">Learn More</a>
                                    <?php if (isset($_SESSION['user_id'])): ?>
                                        <a href="php/details.php?id=<?php echo isset($animal['ID']) ? $animal['ID'] : (isset($animal['id']) ? $animal['id'] : 0); ?>#adopt" 
                                           class="pet-btn" 
                                           style="background:linear-gradient(135deg, #10b981 0%, #059669 100%);">
                                            Take me home! ❤️
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p style="text-align:center;color:#718096;grid-column:1/-1;">No animals available for adoption at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- About Section -->
                <div class="footer-column">
                    <h3 class="footer-title">Adopt a Pet</h3>
                    <p class="footer-text">
                        Helping animals find loving homes since 2024. 
                        Every pet deserves a chance at happiness.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">📘</a>
                        <a href="#" class="social-link">📷</a>
                        <a href="#" class="social-link">🐦</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-column">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="php/about.php">About Us</a></li>
                        <li><a href="home.php">Available Pets</a></li>
                        <li><a href="php/adoption_process.php">Adoption Process</a></li>
                        <li><a href="php/contact.php">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="footer-column">
                    <h4 class="footer-heading">Resources</h4>
                    <ul class="footer-links">
                        <li><a href="php/pet_care.php">Pet Care Tips</a></li>
                        <li><a href="php/faqs.php">FAQs</a></li>
                        <li><a href="php/volunteer.php">Volunteer</a></li>
                        <li><a href="php/donate.php">Donate</a></li>
                        <li><a href="php/success_stories.php">Success Stories</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-column">
                    <h4 class="footer-heading">Contact Us</h4>
                    <ul class="footer-contact">
                        <li>📧 info@adoptapet.com</li>
                        <li>📞 +43 123 456 789</li>
                        <li>📍 Vienna, Austria</li>
                        <li>🕐 Mon-Fri: 9am - 6pm</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Adopt a Pet. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="php/privacy_policy.php">Privacy Policy</a>
                    <a href="php/terms_of_service.php">Terms of Service</a>
                    <a href="php/cookie_policy.php">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>