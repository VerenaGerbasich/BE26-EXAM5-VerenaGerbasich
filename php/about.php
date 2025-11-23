<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Adopt a Pet</title>
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

    <!-- About Us Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">About Us</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 3rem;"></div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
                    <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">Our Mission</h2>
                    <p style="color: #4b5563; line-height: 1.8; font-size: 1rem;">
                        We are dedicated to rescuing and rehoming animals in need. Since 2024, we have been connecting loving families 
                        with wonderful pets who deserve a second chance at happiness. Every animal that comes through our doors receives 
                        proper medical care, nutrition, and lots of love while they wait for their forever home.
                    </p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
                    <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">What We Do</h2>
                    <ul style="color: #4b5563; line-height: 1.8; font-size: 1rem; list-style: none; padding-left: 0;">
                        <li style="margin-bottom: 0.5rem;">🐾 Rescue abandoned and neglected animals</li>
                        <li style="margin-bottom: 0.5rem;">🏥 Provide veterinary care and vaccinations</li>
                        <li style="margin-bottom: 0.5rem;">❤️ Match pets with loving families</li>
                        <li style="margin-bottom: 0.5rem;">📚 Educate about responsible pet ownership</li>
                        <li style="margin-bottom: 0.5rem;">🤝 Partner with local communities and shelters</li>
                    </ul>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
                    <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">Our Team</h2>
                    <p style="color: #4b5563; line-height: 1.8; font-size: 1rem;">
                        Our team consists of passionate animal lovers, experienced veterinarians, and dedicated volunteers. 
                        Together, we work tirelessly to ensure every animal receives the care and attention they deserve. 
                        We believe that every pet deserves a loving home, and we're committed to making that happen.
                    </p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="../home.php" style="display: inline-block; padding: 1rem 2.5rem; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; text-decoration: none; border-radius: 2rem; font-weight: 600; font-size: 1.1rem; transition: transform 0.3s; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);">
                    View Available Pets
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
