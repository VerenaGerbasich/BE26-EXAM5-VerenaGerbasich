<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/hero.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Purple Blob Background -->
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
                <a href="../home.php" class="nav-link">Home</a>
                <a href="senior.php" class="nav-link">Senior Pets</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a href="dashboard.php" class="nav-link">Admin Dashboard</a>
                    <?php endif; ?>
                    <a href="profile.php" class="nav-link">Profile</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                    <span class="nav-link" style="color:#8b5cf6;font-weight:600;">👋 Welcome, <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>!</span>
                <?php else: ?>
                    <a href="login.php" class="nav-link">Login</a>
                    <a href="sign_up.php" class="nav-link">Sign up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- FAQs Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">Frequently Asked Questions</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 3rem;"></div>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- FAQ Item -->
                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">How do I adopt a pet?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        Browse our available pets, click on the one you're interested in, and click the "Take me home" button. 
                        You'll need to create an account if you haven't already. Our team will then contact you to complete the adoption process.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">What are the adoption fees?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        Adoption fees vary depending on the animal's age and type. Fees typically range from €50-€200 and include 
                        vaccinations, microchipping, and spaying/neutering. Contact us for specific pricing.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">Are the animals vaccinated?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        Yes! All our animals receive necessary vaccinations and health checks before adoption. Each pet's vaccination 
                        status is clearly marked on their profile page.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">Can I meet the pet before adopting?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        Absolutely! We encourage you to visit our shelter and spend time with any pet you're interested in. 
                        This helps ensure the right match for both you and the animal.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">What if I have other pets at home?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        We recommend bringing your current pets to meet the potential new family member. Our staff can help 
                        facilitate introductions and assess compatibility between animals.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">Do you offer senior pet adoptions?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        Yes! Check out our <a href="senior.php" style="color: #8b5cf6; text-decoration: underline;">Senior Pets</a> section. 
                        Senior pets make wonderful companions and often come already trained.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 style="color: #8b5cf6; font-size: 1.3rem; margin-bottom: 0.8rem;">What support do you provide after adoption?</h3>
                    <p style="color: #4b5563; line-height: 1.8;">
                        We provide ongoing support including training advice, behavioral consultations, and a 30-day health guarantee. 
                        Our team is always available to answer questions and help with the transition.
                    </p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <p style="color: #6b7280; font-size: 1.1rem; margin-bottom: 1rem;">Still have questions?</p>
                <a href="contact.php" style="display: inline-block; padding: 1rem 2.5rem; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; text-decoration: none; border-radius: 2rem; font-weight: 600; font-size: 1.1rem;">
                    Contact Us
                </a>
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
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="../home.php">Available Pets</a></li>
                        <li><a href="adoption_process.php">Adoption Process</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="footer-column">
                    <h4 class="footer-heading">Resources</h4>
                    <ul class="footer-links">
                        <li><a href="pet_care.php">Pet Care Tips</a></li>
                        <li><a href="faqs.php">FAQs</a></li>
                        <li><a href="volunteer.php">Volunteer</a></li>
                        <li><a href="donate.php">Donate</a></li>
                        <li><a href="success_stories.php">Success Stories</a></li>
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
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
