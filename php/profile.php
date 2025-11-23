<?php
session_start();
require_once '../config/db-connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$user_id = $_SESSION['user_id'];

$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'pet_adoption'");
$adoptions = false;

if ($table_check && mysqli_num_rows($table_check) > 0) {
    // Get user's adoption history
    $sql = "SELECT a.*, pa.adoption_date, pa.adoption_status 
            FROM pet_adoption pa 
            JOIN animals a ON pa.pet_id = a.ID 
            WHERE pa.user_id = $user_id 
            ORDER BY pa.adoption_date DESC";
    $adoptions = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Adopt a Pet</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <?php if (isset($user['role']) && $user['role'] === 'admin'): ?>
                    <a href="dashboard.php" class="nav-link">Admin Dashboard</a>
                <?php endif; ?>
                <a href="profile.php" class="nav-link active">Profile</a>
                <a href="logout.php" class="nav-link">Logout</a>
                <span class="nav-link" style="color:#8b5cf6;font-weight:600;">👋 Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</span>
            </div>
        </nav>
    </header>

    <!-- Profile Section -->
    <section class="dashboard-section">
        <div class="dashboard-container">
            <h1 class="dashboard-title">My Profile</h1>
            
            <div class="animal-form" style="display:block;">
                <div style="display:flex;align-items:center;gap:2rem;margin-bottom:2rem;">
                    <?php if (!empty($user['picture'])): ?>
                        <img src="<?php echo htmlspecialchars($user['picture']); ?>" alt="Profile" style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid #8b5cf6;">
                    <?php else: ?>
                        <div style="width:100px;height:100px;border-radius:50%;background:linear-gradient(135deg,#e9d5ff,#c4b5fd);display:flex;align-items:center;justify-content:center;font-size:2.5rem;">
                            👤
                        </div>
                    <?php endif; ?>
                    
                    <div>
                        <h2 style="color:#4a5568;margin-bottom:0.5rem;"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
                        <p style="color:#8b5cf6;font-weight:600;margin-bottom:0.3rem;">📧 <?php echo htmlspecialchars($user['email']); ?></p>
                        <?php if (!empty($user['phone_number'])): ?>
                            <p style="color:#718096;">📞 <?php echo htmlspecialchars($user['phone_number']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if (!empty($user['address'])): ?>
                    <div style="margin-bottom:1rem;">
                        <strong style="color:#4a5568;">Address:</strong>
                        <p style="color:#718096;margin-top:0.3rem;"><?php echo nl2br(htmlspecialchars($user['address'])); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="dashboard-table">
                <h2 class="table-heading">My Adoption Requests</h2>
                
                <?php if ($adoptions && mysqli_num_rows($adoptions) > 0): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Pet Name</th>
                                <th>Breed</th>
                                <th>Age</th>
                                <th>Adoption Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($adoption = mysqli_fetch_assoc($adoptions)): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($adoption['name']); ?></td>
                                    <td><?php echo htmlspecialchars($adoption['breed']); ?></td>
                                    <td><?php echo htmlspecialchars($adoption['age']); ?> years</td>
                                    <td><?php echo date('d.m.Y', strtotime($adoption['adoption_date'])); ?></td>
                                    <td>
                                        <?php 
                                        $status_color = $adoption['adoption_status'] === 'Approved' ? '#059669' : 
                                                       ($adoption['adoption_status'] === 'Pending' ? '#f59e0b' : '#8b5cf6');
                                        ?>
                                        <span style="background:<?php echo $status_color; ?>;color:white;padding:0.3rem 0.6rem;border-radius:5px;font-size:0.85rem;">
                                            <?php echo htmlspecialchars($adoption['adoption_status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p style="text-align:center;color:#718096;padding:2rem;">You haven't adopted any pets yet. <a href="../home.php" style="color:#8b5cf6;font-weight:600;">Browse available pets</a></p>
                <?php endif; ?>
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
                    <a href="privacy_policy.php">Privacy Policy</a>
                    <a href="terms_of_service.php">Terms of Service</a>
                    <a href="cookie_policy.php">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
