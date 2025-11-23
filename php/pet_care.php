<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care Tips - Adopt a Pet</title>
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

    <!-- Pet Care Tips Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 1000px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">Pet Care Tips</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 3rem;"></div>
            
            <!-- Dogs Section -->
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 2rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    🐕 Dog Care Essentials
                </h2>
                <div style="display: grid; gap: 1.5rem;">
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Nutrition & Feeding</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • Feed high-quality dog food appropriate for their age and size<br>
                            • Provide fresh water at all times<br>
                            • Avoid human foods that are toxic (chocolate, grapes, onions)<br>
                            • Establish regular feeding times (2-3 times daily for adults)
                        </p>
                    </div>
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Exercise & Activity</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • Daily walks (30-60 minutes depending on breed)<br>
                            • Regular playtime and mental stimulation<br>
                            • Socialization with other dogs and people<br>
                            • Adjust activity level based on age and health
                        </p>
                    </div>
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Health & Grooming</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • Annual vet checkups and vaccinations<br>
                            • Regular brushing (frequency depends on coat type)<br>
                            • Nail trimming every 3-4 weeks<br>
                            • Dental care - brush teeth regularly<br>
                            • Monthly flea and tick prevention
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cats Section -->
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 2rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    🐱 Cat Care Essentials
                </h2>
                <div style="display: grid; gap: 1.5rem;">
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Nutrition & Feeding</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • Feed age-appropriate cat food (wet or dry)<br>
                            • Cats need protein - they're obligate carnivores<br>
                            • Fresh water available 24/7<br>
                            • Avoid feeding milk (many cats are lactose intolerant)
                        </p>
                    </div>
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Litter Box Care</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • One litter box per cat, plus one extra<br>
                            • Scoop daily, full clean weekly<br>
                            • Place in quiet, accessible location<br>
                            • Use unscented, clumping litter
                        </p>
                    </div>
                    <div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 0.5rem;">Enrichment & Health</h3>
                        <p style="color: #4b5563; line-height: 1.7;">
                            • Scratching posts to protect furniture<br>
                            • Interactive toys and play sessions<br>
                            • Window perches for bird watching<br>
                            • Annual vet checkups and vaccinations<br>
                            • Regular brushing to reduce hairballs
                        </p>
                    </div>
                </div>
            </div>

            <!-- General Tips Section -->
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <h2 style="color: #8b5cf6; font-size: 2rem; margin-bottom: 1.5rem;">🏠 General Pet Care Tips</h2>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🆔 Identification</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Ensure your pet has proper ID tags and consider microchipping for permanent identification.
                        </p>
                    </div>
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🏡 Safe Environment</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Pet-proof your home by removing toxic plants, securing chemicals, and eliminating small choking hazards.
                        </p>
                    </div>
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">💰 Budget Planning</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Plan for regular expenses: food, vet visits, grooming, toys, and emergency medical care.
                        </p>
                    </div>
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">🎓 Training</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Use positive reinforcement. Be patient, consistent, and reward good behavior with treats and praise.
                        </p>
                    </div>
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">❤️ Love & Attention</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Spend quality time with your pet daily. They need emotional connection and bonding as much as physical care.
                        </p>
                    </div>
                    <div style="padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border-left: 4px solid #8b5cf6;">
                        <h3 style="color: #1f2937; font-size: 1.2rem; margin-bottom: 0.5rem;">📅 Routine</h3>
                        <p style="color: #6b7280; line-height: 1.7;">
                            Establish a consistent daily routine for feeding, walks, and bedtime to help your pet feel secure.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Emergency Section -->
            <div style="background: linear-gradient(135deg, #fee2e2, #fecaca); padding: 2rem; border-radius: 1rem; border: 2px solid #dc2626; margin-bottom: 2rem;">
                <h2 style="color: #dc2626; font-size: 1.8rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    🚨 Emergency Preparedness
                </h2>
                <p style="color: #991b1b; line-height: 1.8; font-size: 1.1rem;">
                    • Keep your vet's phone number easily accessible<br>
                    • Know the location of the nearest 24-hour emergency vet clinic<br>
                    • Keep a pet first aid kit at home<br>
                    • Learn basic pet CPR and first aid<br>
                    • Have a disaster evacuation plan that includes your pets
                </p>
            </div>

            <div style="text-align: center; padding: 2rem; background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 1rem;">Need More Help?</h3>
                <p style="color: #6b7280; margin-bottom: 1.5rem;">
                    Our team is always here to support you with advice and guidance for your new companion.
                </p>
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
