<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../home.php");
    exit;
}

$pet_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Required - Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/details.css">
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
                <a href="login.php" class="nav-link">Login</a>
                <a href="sign_up.php" class="nav-link">Sign up</a>
            </div>
        </nav>
    </header>

    <!-- Login Required Section -->
    <section class="details-section" style="min-height:calc(100vh - 200px);display:flex;align-items:center;padding-bottom:2rem;">
        <div class="details-container">
            <a href="../home.php" class="back-link" style="margin-bottom:1.25rem;display:inline-block;">← Back to all pets</a>
            
            <!-- Not Logged In Message -->
            <div class="details-card" style="text-align:center;padding:2.5rem 2rem;background:linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);border:2px solid #e9d5ff;box-shadow:0 20px 60px rgba(139,92,246,0.15);">
                <!-- Animated Lock Icon -->
                <div style="font-size:3.5rem;margin-bottom:1rem;animation:bounce 2s infinite;">
                    🔒
                </div>
                
                <h1 style="font-size:2rem;color:#1f2937;margin-bottom:0.75rem;font-weight:700;">Login Required</h1>
                
                <div style="width:60px;height:3px;background:linear-gradient(90deg, #8b5cf6, #10b981);margin:0 auto 1.25rem;border-radius:2px;"></div>
                
                <p style="color:#4b5563;font-size:1rem;margin-bottom:1.5rem;line-height:1.6;max-width:600px;margin-left:auto;margin-right:auto;">
                    To view detailed information about our adorable pets and submit adoption requests,<br>
                    please <strong style="color:#8b5cf6;">log in</strong> to your account or <strong style="color:#10b981;">create a new one</strong>.
                </p>
                
                <!-- Action Buttons -->
                <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin:1.5rem 0;">
                    <a href="login.php<?php echo $pet_id > 0 ? '?redirect=details&id='.$pet_id : ''; ?>" 
                       style="background:linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);color:white;padding:0.85rem 2rem;border-radius:10px;text-decoration:none;font-weight:700;font-size:1rem;display:inline-flex;align-items:center;gap:0.5rem;transition:all 0.3s;box-shadow:0 6px 16px rgba(139,92,246,0.4);transform:translateY(0);"
                       onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 30px rgba(139,92,246,0.5)';"
                       onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 8px 20px rgba(139,92,246,0.4)';">
                        🔑 Login
                    </a>
                    <a href="sign_up.php<?php echo $pet_id > 0 ? '?redirect=details&id='.$pet_id : ''; ?>" 
                       style="background:linear-gradient(135deg, #10b981 0%, #059669 100%);color:white;padding:0.85rem 2rem;border-radius:10px;text-decoration:none;font-weight:700;font-size:1rem;display:inline-flex;align-items:center;gap:0.5rem;transition:all 0.3s;box-shadow:0 6px 16px rgba(16,185,129,0.4);transform:translateY(0);"
                       onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 30px rgba(16,185,129,0.5)';"
                       onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 8px 20px rgba(16,185,129,0.4)';">
                        ✨ Sign Up
                    </a>
                </div>
                
                <!-- Benefits Section -->
                <div style="background:linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%);padding:1rem 1.25rem;border-radius:12px;margin-top:1.5rem;text-align:left;border:2px solid #c4b5fd;box-shadow:0 4px 15px rgba(139,92,246,0.1);">
                    <h3 style="color:#5b21b6;margin-bottom:0.5rem;font-size:1.15rem;font-weight:700;text-align:center;">
                        🎉 Why Create an Account?
                    </h3>
                    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:0.5rem;margin-top:0.5rem;">
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">📋</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">View complete pet profiles and photos</span>
                        </div>
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">⚡</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">Submit adoption requests instantly</span>
                        </div>
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">📊</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">Track your adoption applications</span>
                        </div>
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">❤️</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">Save your favorite pets</span>
                        </div>
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">🔔</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">Receive updates about available animals</span>
                        </div>
                        <div style="display:flex;align-items:start;gap:0.4rem;">
                            <span style="font-size:1.1rem;flex-shrink:0;">🌟</span>
                            <span style="color:#6b21a8;font-size:0.9rem;line-height:1.4;">Join our community of pet lovers</span>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Message -->
                <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:2px solid #e5e7eb;">
                    <p style="color:#6b7280;font-size:0.95rem;font-weight:500;">
                        🐾 Join thousands of happy pet owners today! 🐾
                    </p>
                    <p style="color:#9ca3af;margin-top:0.4rem;font-size:0.85rem;">
                        It only takes a minute to create an account and find your perfect companion.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <style>
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>

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
                    <a href="privacy_policy.php">Privacy Policy</a>
                    <a href="terms_of_service.php">Terms of Service</a>
                    <a href="cookie_policy.php">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
