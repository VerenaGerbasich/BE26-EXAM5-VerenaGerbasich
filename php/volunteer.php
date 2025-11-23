<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer - Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/hero.css">
    <link rel="stylesheet" href="../css/forms.css">
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

    <!-- Volunteer Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">Volunteer With Us</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 3rem;"></div>
            
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">Make a Difference</h2>
                <p style="color: #4b5563; line-height: 1.8; font-size: 1.1rem;">
                    Volunteers are the heart of our organization. Whether you have a few hours a week or a day a month, 
                    your time and skills can make a huge difference in the lives of animals waiting for their forever homes.
                </p>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">Volunteer Opportunities</h2>
                <div style="display: grid; gap: 1rem;">
                    <div style="padding: 1rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🐕 Dog Walker</h3>
                        <p style="color: #6b7280;">Take our dogs for walks and provide them with exercise and socialization.</p>
                    </div>
                    <div style="padding: 1rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🐱 Cat Socializer</h3>
                        <p style="color: #6b7280;">Spend quality time with our cats, helping them become more comfortable with people.</p>
                    </div>
                    <div style="padding: 1rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">📸 Photography</h3>
                        <p style="color: #6b7280;">Take photos of our animals to help them find homes through our website and social media.</p>
                    </div>
                    <div style="padding: 1rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🎪 Event Helper</h3>
                        <p style="color: #6b7280;">Assist with adoption events, fundraisers, and community outreach programs.</p>
                    </div>
                    <div style="padding: 1rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🧹 Facility Maintenance</h3>
                        <p style="color: #6b7280;">Help keep our shelter clean and organized for the comfort of our animals.</p>
                    </div>
                </div>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1rem;">Requirements</h2>
                <ul style="color: #4b5563; line-height: 2; font-size: 1.1rem; list-style: none; padding-left: 0;">
                    <li style="margin-bottom: 0.5rem;">✓ Must be 18 years or older (16+ with parent/guardian)</li>
                    <li style="margin-bottom: 0.5rem;">✓ Commit to at least 4 hours per month</li>
                    <li style="margin-bottom: 0.5rem;">✓ Attend a volunteer orientation session</li>
                    <li style="margin-bottom: 0.5rem;">✓ Love animals and have patience</li>
                    <li style="margin-bottom: 0.5rem;">✓ Follow all safety and care protocols</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <h2 style="color: #8b5cf6; font-size: 1.8rem; margin-bottom: 1.5rem; text-align: center;">Volunteer Application</h2>
                <form style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <input type="text" placeholder="First Name" required 
                               style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif;">
                        <input type="text" placeholder="Last Name" required 
                               style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif;">
                    </div>
                    <input type="email" placeholder="Email Address" required 
                           style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif;">
                    <input type="tel" placeholder="Phone Number" required 
                           style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif;">
                    <select required style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif;">
                        <option value="">Select Volunteer Position</option>
                        <option>Dog Walker</option>
                        <option>Cat Socializer</option>
                        <option>Photography</option>
                        <option>Event Helper</option>
                        <option>Facility Maintenance</option>
                    </select>
                    <textarea placeholder="Why do you want to volunteer? Tell us about your experience with animals..." rows="5" required 
                              style="padding: 1rem; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-size: 1rem; font-family: 'Poppins', sans-serif; resize: vertical;"></textarea>
                    <button type="submit" 
                            style="padding: 1rem 2rem; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; border: none; border-radius: 0.5rem; font-size: 1.1rem; font-weight: 600; cursor: pointer; font-family: 'Poppins', sans-serif;">
                        Submit Application
                    </button>
                </form>
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
