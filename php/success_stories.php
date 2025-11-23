<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Stories - Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/hero.css">
    <link rel="stylesheet" href="../css/pets.css">
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

    <!-- Success Stories Section -->
    <section style="padding: 8rem 2rem 4rem; position: relative; z-index: 1; background: white;">
        <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 10;">
            <h1 style="font-size: 3rem; color: #1f2937; margin-bottom: 1rem; text-align: center;">Success Stories</h1>
            <div style="width: 100px; height: 4px; background: linear-gradient(to right, #8b5cf6, #ec4899); margin: 0 auto 1rem;"></div>
            <p style="text-align: center; color: #6b7280; font-size: 1.2rem; margin-bottom: 3rem;">
                Heartwarming tales of our adopted pets finding their forever homes
            </p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                <!-- Story 1 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #ddd6fe, #c4b5fd); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐕
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Max & The Miller Family</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"Best decision ever!"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "We adopted Max three months ago, and he's already become such an important part of our family. 
                            He loves playing with our kids and has brought so much joy into our home. Thank you for this wonderful companion!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- Sarah Miller, Vienna</p>
                    </div>
                </div>

                <!-- Story 2 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #e9d5ff, #ddd6fe); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐱
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Luna's New Life</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"She's purr-fect!"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "Luna was shy at first, but with patience and love, she's blossomed into the most affectionate cat. 
                            She greets me at the door every day and loves cuddling on the couch. I can't imagine life without her!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- Michael Schmidt, Graz</p>
                    </div>
                </div>

                <!-- Story 3 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #c4b5fd, #a78bfa); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐶
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Bella's Second Chance</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"Love at first sight!"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "Bella was a senior dog who needed a quiet home. At 10 years old, she's still full of love and energy. 
                            Adopting a senior pet was the best choice - she's calm, trained, and incredibly grateful. Senior pets deserve love too!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- Anna Weber, Salzburg</p>
                    </div>
                </div>

                <!-- Story 4 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #fae8ff, #e9d5ff); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐰
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Nibbles' Happy Home</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"A gentle soul"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "We wanted something different, and Nibbles the rabbit was perfect for us. He's litter-trained, 
                            loves fresh veggies, and binkies around the living room when he's happy. Such a sweet addition to our home!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- Thomas & Lisa Bauer, Linz</p>
                    </div>
                </div>

                <!-- Story 5 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #ddd6fe, #e9d5ff); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐕
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Rocky's Recovery</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"From rescue to family"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "Rocky had a rough start, but the shelter staff prepared him wonderfully. He's now confident, 
                            playful, and loyal. The adoption process was smooth, and the ongoing support has been fantastic!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- David Klein, Innsbruck</p>
                    </div>
                </div>

                <!-- Story 6 -->
                <div style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                    <div style="height: 250px; background: linear-gradient(135deg, #c4b5fd, #ddd6fe); display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                        🐱
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="color: #8b5cf6; font-size: 1.5rem; margin-bottom: 0.5rem;">Whiskers & Oliver</h3>
                        <p style="color: #6b7280; font-style: italic; margin-bottom: 1rem;">"Double the love"</p>
                        <p style="color: #4b5563; line-height: 1.7;">
                            "We couldn't decide between two bonded cats, so we adopted them both! Whiskers and Oliver are 
                            inseparable. They chase each other, groom each other, and keep us entertained daily. Two cats, twice the fun!"
                        </p>
                        <p style="color: #8b5cf6; font-weight: 600; margin-top: 1rem;">- Julia Hoffmann, Klagenfurt</p>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 4rem; padding: 3rem; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 1rem; color: white;">
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Ready to Write Your Own Success Story?</h2>
                <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                    Hundreds of animals are waiting for their forever homes. Will you be their happy ending?
                </p>
                <a href="../home.php" style="display: inline-block; padding: 1rem 2.5rem; background: white; color: #8b5cf6; text-decoration: none; border-radius: 2rem; font-weight: 600; font-size: 1.1rem;">
                    Browse Available Pets
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
