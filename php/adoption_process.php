<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Process - Adopt a Pet</title>
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

    <!-- Adoption Process Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 1000px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">Adoption Process</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 1rem;"></div>
            <p style="text-align: center; color: #6b7280; font-size: 1.2rem; margin-bottom: 3rem;">
                Follow these simple steps to bring your new companion home
            </p>
            
            <!-- Step-by-Step Process -->
            <div style="display: grid; gap: 2rem; margin-bottom: 3rem;">
                <!-- Step 1 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        1
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Browse Available Pets</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            Explore our website to find pets available for adoption. You can filter by type, age, size, and location. 
                            Take your time to read each pet's profile, view photos, and learn about their personality and needs.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        2
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Create an Account</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            If you haven't already, sign up for a free account on our website. This allows you to save your favorite pets, 
                            submit adoption applications, and track your adoption journey. It only takes a minute!
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        3
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Submit Adoption Interest</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            When you find a pet you're interested in, click the "Take me home" button on their profile page. 
                            This submits your interest to our adoption team. You can express interest in multiple pets if you're undecided.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        4
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Meet & Greet</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            Our team will contact you within 48 hours to schedule a meet-and-greet at our shelter. 
                            This is your chance to spend time with the pet, ask questions, and ensure you're a good match. 
                            Bring your family members (including current pets if applicable) to the meeting.
                        </p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        5
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Complete Adoption Form</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            Fill out our adoption application with details about your home, lifestyle, and experience with pets. 
                            We may conduct a brief home visit (virtual or in-person) to ensure the environment is safe and suitable. 
                            Don't worry - we're here to help, not judge!
                        </p>
                    </div>
                </div>

                <!-- Step 6 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        6
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Pay Adoption Fee</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            Once approved, pay the adoption fee (typically €50-€200 depending on the pet). 
                            This fee covers vaccinations, spaying/neutering, microchipping, and initial medical care. 
                            We accept cash, card, and bank transfer.
                        </p>
                    </div>
                </div>

                <!-- Step 7 -->
                <div style="display: grid; grid-template-columns: 80px 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700;">
                        7
                    </div>
                    <div>
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.8rem;">Take Your Pet Home! 🎉</h3>
                        <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                            Congratulations! You'll receive all medical records, care instructions, and a welcome kit with essentials 
                            to get you started. We provide ongoing support and are always available for questions. 
                            Welcome to the Adopt a Pet family!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <div style="background: #f0f9ff; padding: 2rem; border-radius: 1rem; border-left: 4px solid #3b82f6;">
                    <h3 style="color: #1e40af; font-size: 1.3rem; margin-bottom: 1rem;">⏱️ Timeline</h3>
                    <p style="color: #475569; line-height: 1.7;">
                        The entire adoption process typically takes 1-2 weeks from initial interest to taking your pet home. 
                        We work quickly while ensuring the best match for both you and the animal.
                    </p>
                </div>
                
                <div style="background: #f0fdf4; padding: 2rem; border-radius: 1rem; border-left: 4px solid #16a34a;">
                    <h3 style="color: #166534; font-size: 1.3rem; margin-bottom: 1rem;">💚 30-Day Support</h3>
                    <p style="color: #475569; line-height: 1.7;">
                        All adoptions include a 30-day support period where our team is available for advice, training tips, 
                        and any questions you might have as you and your new pet adjust to life together.
                    </p>
                </div>
            </div>

            <div style="text-align: center; padding: 3rem; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 1rem; color: white;">
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Ready to Start Your Adoption Journey?</h2>
                <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                    Browse our available pets and find your perfect companion today!
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="../home.php" style="display: inline-block; padding: 1rem 2.5rem; background: white; color: #8b5cf6; text-decoration: none; border-radius: 2rem; font-weight: 600; font-size: 1.1rem;">
                        Browse Pets
                    </a>
                    <a href="faqs.php" style="display: inline-block; padding: 1rem 2.5rem; background: rgba(255,255,255,0.2); color: white; text-decoration: none; border-radius: 2rem; font-weight: 600; font-size: 1.1rem; border: 2px solid white;">
                        View FAQs
                    </a>
                </div>
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
