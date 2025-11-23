<?php
session_start();
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 70vh;
            padding: 2rem;
            text-align: center;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            line-height: 1;
        }

        .error-title {
            font-size: 2rem;
            color: #1f2937;
            margin: 1rem 0;
            font-weight: 600;
        }

        .error-description {
            font-size: 1.1rem;
            color: #6b7280;
            max-width: 500px;
            margin: 1rem auto 2rem;
            line-height: 1.6;
        }

        .error-illustration {
            font-size: 6rem;
            margin: 2rem 0;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 2rem;
        }

        .error-btn {
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .error-btn-primary {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            color: white;
            border: none;
        }

        .error-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
        }

        .error-btn-secondary {
            background: white;
            color: #8b5cf6;
            border: 2px solid #8b5cf6;
        }

        .error-btn-secondary:hover {
            background: #f3f4f6;
            transform: translateY(-2px);
        }

        .suggestions {
            margin-top: 3rem;
            padding: 2rem;
            background: #f9fafb;
            border-radius: 15px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .suggestions h3 {
            color: #8b5cf6;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .suggestions ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .suggestions li {
            padding: 0.5rem 0;
            color: #4b5563;
        }

        .suggestions li::before {
            content: "🐾 ";
            margin-right: 0.5rem;
        }

        .suggestions a {
            color: #8b5cf6;
            text-decoration: none;
            font-weight: 600;
        }

        .suggestions a:hover {
            text-decoration: underline;
        }
    </style>
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

    <!-- 404 Error Section -->
    <section class="error-container">
        <div class="error-illustration">🐕‍🦺</div>
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Oops! Page Not Found</h2>
        <p class="error-description">
            Looks like this page wandered off! Even our best trackers couldn't find it. 
            But don't worry, there are plenty of other adorable pets waiting for you on our homepage.
        </p>

        <div class="error-actions">
            <a href="../home.php" class="error-btn error-btn-primary">Go to Homepage</a>
            <a href="javascript:history.back()" class="error-btn error-btn-secondary">Go Back</a>
        </div>

        <div class="suggestions">
            <h3>🐾 While you're here, check out:</h3>
            <ul>
                <li><a href="../home.php">Browse Available Pets</a></li>
                <li><a href="senior.php">Meet Our Senior Pets</a></li>
                <li><a href="adoption_process.php">Learn About Adoption Process</a></li>
                <li><a href="contact.php">Contact Us for Help</a></li>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="sign_up.php">Create an Account to Start Adopting</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3 class="footer-title">Adopt a Pet</h3>
                    <p class="footer-text">
                        Helping animals find loving homes since 2024. 
                        Every pet deserves a chance at happiness.
                    </p>
                </div>

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
