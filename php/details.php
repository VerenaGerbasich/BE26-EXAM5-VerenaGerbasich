<?php
session_start();
require_once '../config/db-connection.php';

$error = '';
$success = '';

$is_logged_in = isset($_SESSION['user_id']);
$pet_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Redirect to login page if not logged in
if (!$is_logged_in) {
    header("Location: login_required.php?id=" . $pet_id);
    exit;
}

if ($pet_id == 0) {
    header("Location: ../home.php");
    exit;
}

// Handle adoption request
if (isset($_POST['adopt'])) {
    if (!isset($_SESSION['user_id'])) {
        $error = "Please login to adopt a pet!";
    } else {
        $user_id = $_SESSION['user_id'];
        $adoption_date = date('Y-m-d');
        
        $table_check = mysqli_query($conn, "SHOW TABLES LIKE 'pet_adoption'");
        
        if (mysqli_num_rows($table_check) > 0) {
            // Make sure user hasn't already requested this pet
            $check_sql = "SELECT * FROM pet_adoption WHERE user_id = $user_id AND pet_id = $pet_id";
            $check_result = mysqli_query($conn, $check_sql);
            
            if ($check_result && mysqli_num_rows($check_result) > 0) {
                $error = "You have already requested to adopt this pet!";
            } else {
                $adopt_sql = "INSERT INTO pet_adoption (user_id, pet_id, adoption_date, adoption_status) 
                             VALUES ($user_id, $pet_id, '$adoption_date', 'Pending')";
                
                if (mysqli_query($conn, $adopt_sql)) {
                    $update_sql = "UPDATE animals SET status = 'Adopted' WHERE ID = $pet_id";
                    mysqli_query($conn, $update_sql);
                    
                    $_SESSION['success_message'] = "🎉 Adoption request submitted successfully! We will contact you soon.";
                    header("Location: ../home.php");
                    exit;
                } else {
                    $error = "Adoption request failed. Please try again.";
                }
            }
        } else {
            // Fallback if adoption table doesn't exist
            $update_sql = "UPDATE animals SET status = 'Adopted' WHERE ID = $pet_id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success_message'] = "🎉 Adoption request submitted successfully! We will contact you soon.";
                header("Location: ../home.php");
                exit;
            } else {
                $error = "Adoption request failed. Please try again.";
            }
        }
    }
}

// Get pet details from database
$sql = "SELECT * FROM animals WHERE ID = $pet_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: ../home.php");
    exit;
}

$animal = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details - Adopt a Pet</title>
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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a href="dashboard.php" class="nav-link">Admin Dashboard</a>
                    <?php else: ?>
                        <a href="profile.php" class="nav-link">Profile</a>
                    <?php endif; ?>
                    <a href="logout.php" class="nav-link">Logout</a>
                    <span class="nav-link" style="color:#8b5cf6;font-weight:600;">👋 Welcome, <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>!</span>
                <?php else: ?>
                    <a href="login.php" class="nav-link">Login</a>
                    <a href="sign_up.php" class="nav-link">Sign up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- Pet Details Section -->
    <section class="details-section">
        <div class="details-container">
            <a href="../home.php" class="back-link">← Back to all pets</a>
            
            <?php if (!$is_logged_in): ?>
                <!-- Not Logged In Message -->
                <div class="details-card" style="text-align:center;padding:3rem 2rem;">
                    <div style="font-size:4rem;margin-bottom:1rem;">🔒</div>
                    <h1 class="details-name" style="margin-bottom:1rem;">Login Required</h1>
                    <p style="color:#718096;font-size:1.1rem;margin-bottom:2rem;line-height:1.6;">
                        To view detailed information about our pets and submit adoption requests,<br>
                        please log in to your account or create a new one.
                    </p>
                    
                    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
                        <a href="login.php" style="background:#8b5cf6;color:white;padding:0.75rem 2rem;border-radius:8px;text-decoration:none;font-weight:600;display:inline-block;transition:all 0.3s;">
                            Login
                        </a>
                        <a href="sign_up.php" style="background:#10b981;color:white;padding:0.75rem 2rem;border-radius:8px;text-decoration:none;font-weight:600;display:inline-block;transition:all 0.3s;">
                            Sign Up
                        </a>
                    </div>
                    
                    <div style="background:#e0e7ff;padding:1.5rem;border-radius:8px;margin-top:2rem;text-align:left;">
                        <h3 style="color:#4c1d95;margin-bottom:0.5rem;">Why create an account?</h3>
                        <ul style="color:#5b21b6;margin-left:1.5rem;line-height:1.8;">
                            <li>View complete pet profiles and photos</li>
                            <li>Submit adoption requests instantly</li>
                            <li>Track your adoption applications</li>
                            <li>Save your favorite pets</li>
                            <li>Receive updates about available animals</li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <!-- Logged In - Show Pet Details -->
                <?php if ($error): ?>
                    <div style="background:#fee2e2;color:#dc2626;padding:1rem;border-radius:8px;margin-bottom:1rem;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div style="background:#d1fae5;color:#059669;padding:1rem;border-radius:8px;margin-bottom:1rem;">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <div class="details-card">
                <div class="details-image">
                    <?php if (!empty($animal['photo'])): ?>
                        <img src="<?php echo htmlspecialchars($animal['photo']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                    <?php else: ?>
                        <span class="detail-placeholder">🐕</span>
                    <?php endif; ?>
                </div>
                
                <div class="details-content">
                    <h1 class="details-name"><?php echo htmlspecialchars($animal['name']); ?></h1>
                    <p class="details-breed"><?php echo htmlspecialchars($animal['breed']); ?></p>
                    
                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="detail-label">Age:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($animal['age']); ?> years <?php echo $animal['age'] > 8 ? '(Senior)' : ''; ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Size:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($animal['size']); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Location:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($animal['location']); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Vaccination Status:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($animal['vaccinated']); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Status:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($animal['status']); ?></span>
                        </div>
                    </div>
                    
                    <div class="details-description">
                        <h3>About Me</h3>
                        <p><?php echo nl2br(htmlspecialchars($animal['description'])); ?></p>
                    </div>
                    
                    <?php if ($animal['status'] === 'Available'): ?>
                        <div class="details-actions" id="adopt">
                            <form method="POST" action="">
                                <input type="hidden" name="pet_id" value="<?php echo isset($animal['ID']) ? $animal['ID'] : $animal['id']; ?>">
                                <button type="submit" name="adopt" class="adopt-btn">Take me home! ❤️</button>
                            </form>
                        </div>
                    <?php else: ?>
                        <div style="background:#fef3c7;color:#92400e;padding:1rem;border-radius:8px;text-align:center;font-weight:600;">
                            This pet has been adopted! 🎉
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
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
                    <a href="privacy_policy.php">Privacy Policy</a>
                    <a href="terms_of_service.php">Terms of Service</a>
                    <a href="cookie_policy.php">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>