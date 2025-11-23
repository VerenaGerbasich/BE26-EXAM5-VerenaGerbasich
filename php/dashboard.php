<?php
session_start();
require_once '../config/db-connection.php';

// Only admins can access this page
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "Please login to access this page.";
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    $_SESSION['error_message'] = "Access denied! Only administrators can access the dashboard.";
    header("Location: ../home.php");
    exit;
}

$error = '';
$success = '';

// Update Adoption Status
if (isset($_POST['update_adoption_status'])) {
    $adoption_id = (int)$_POST['adoption_id'];
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);
    
    $update_sql = "UPDATE pet_adoption SET adoption_status = '$new_status' WHERE ID = $adoption_id";
    if (mysqli_query($conn, $update_sql)) {
        $success = "Adoption status updated successfully!";
    } else {
        $error = "Failed to update adoption status.";
    }
}

// Delete an animal
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $delete_sql = "DELETE FROM animals WHERE ID = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $success = "Animal deleted successfully!";
    } else {
        $error = "Failed to delete animal.";
    }
}

// Add new or update existing animal
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    $age = (int)$_POST['age'];
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $vaccinated = isset($_POST['vaccinated']) ? mysqli_real_escape_string($conn, $_POST['vaccinated']) : 'No';
    
    // Handle image upload or use URL
    $photo = '';
    if (isset($_FILES['photo_file']) && $_FILES['photo_file']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/animals/';
        $file_extension = strtolower(pathinfo($_FILES['photo_file']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($file_extension, $allowed_extensions)) {
            $new_filename = uniqid('animal_') . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;
            
            if (move_uploaded_file($_FILES['photo_file']['tmp_name'], $upload_path)) {
                $photo = 'uploads/animals/' . $new_filename;
            }
        }
    } elseif (!empty($_POST['photo_url'])) {
        $photo = mysqli_real_escape_string($conn, $_POST['photo_url']);
    } elseif (isset($_POST['id']) && !empty($_POST['id'])) {
        // Keep old photo when updating without new image
        $id = (int)$_POST['id'];
        $existing_sql = "SELECT photo FROM animals WHERE ID = $id";
        $existing_result = mysqli_query($conn, $existing_sql);
        if ($row = mysqli_fetch_assoc($existing_result)) {
            $photo = $row['photo'];
        }
    }
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = (int)$_POST['id'];
        $sql = "UPDATE animals SET 
                name = '$name', 
                breed = '$breed', 
                age = $age, 
                size = '$size', 
                location = '$location', 
                description = '$description', 
                photo = '$photo', 
                vaccinated = '$vaccinated' 
                WHERE ID = $id";
        if (mysqli_query($conn, $sql)) {
            $success = "Animal updated successfully!";
        } else {
            $error = "Failed to update animal.";
        }
    } else {
        $sql = "INSERT INTO animals (name, breed, age, size, location, description, photo, vaccinated, status)
                VALUES ('$name', '$breed', $age, '$size', '$location', '$description', '$photo', '$vaccinated', 'Available')";
        if (mysqli_query($conn, $sql)) {
            $success = "Animal added successfully!";
        } else {
            $error = "Failed to add animal.";
        }
    }
}

// Get all animals for display
$sql = "SELECT * FROM animals ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Load animal data if editing
$edit_animal = null;
if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $edit_sql = "SELECT * FROM animals WHERE ID = $edit_id";
    $edit_result = mysqli_query($conn, $edit_sql);
    if (mysqli_num_rows($edit_result) > 0) {
        $edit_animal = mysqli_fetch_assoc($edit_result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Adopt a Pet</title>
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
                <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <a href="dashboard.php" class="nav-link active">Admin Dashboard</a>
                <?php endif; ?>
                <a href="profile.php" class="nav-link">Profile</a>
                <a href="logout.php" class="nav-link">Logout</a>
                <span class="nav-link" style="color:#8b5cf6;font-weight:600;">👋 Welcome, <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>!</span>
            </div>
        </nav>
    </header>

    <!-- Dashboard Section -->
    <section class="dashboard-section">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Admin Dashboard</h1>
            <p class="dashboard-subtitle">Manage animals in the adoption center</p>

            <?php if ($error): ?>
                <div class="error-message" style="background: #fef2f2; color: #dc2626; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="success-message" style="background: #f0fdf4; color: #16a34a; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <!-- Add New Animal Button -->
            <div class="dashboard-actions">
                <button class="add-btn" onclick="toggleForm()">+ Add New Animal</button>
            </div>

            <!-- Add/Edit Form -->
            <div id="animalForm" class="animal-form" style="display: <?php echo $edit_animal ? 'block' : 'none'; ?>;">
                <h2 class="form-heading"><?php echo $edit_animal ? 'Edit Animal' : 'Add New Animal'; ?></h2>
                <form method="POST" action="dashboard.php" class="dashboard-form" enctype="multipart/form-data">
                    <?php if ($edit_animal): ?>
                        <input type="hidden" name="id" value="<?php echo isset($edit_animal['ID']) ? $edit_animal['ID'] : $edit_animal['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" value="<?php echo $edit_animal ? htmlspecialchars($edit_animal['name']) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="breed">Breed*</label>
                            <input type="text" id="breed" name="breed" value="<?php echo $edit_animal ? htmlspecialchars($edit_animal['breed']) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="age">Age*</label>
                            <input type="number" id="age" name="age" min="0" value="<?php echo $edit_animal ? $edit_animal['age'] : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="size">Size*</label>
                            <input type="number" step="0.1" id="size" name="size" min="0" value="<?php echo $edit_animal ? $edit_animal['size'] : ''; ?>" required placeholder="Size in kg or meters">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="<?php echo $edit_animal ? htmlspecialchars($edit_animal['location']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"><?php echo $edit_animal ? htmlspecialchars($edit_animal['description']) : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo_file">Upload Image</label>
                        <input type="file" id="photo_file" name="photo_file" accept="image/*">
                        <small style="color:#718096;font-size:0.85rem;display:block;margin-top:0.3rem;">Supported: JPG, PNG, GIF, WEBP</small>
                    </div>

                    <div class="form-group">
                        <label for="photo_url">Or use Image URL</label>
                        <input type="text" id="photo_url" name="photo_url" value="<?php echo $edit_animal ? htmlspecialchars($edit_animal['photo']) : ''; ?>" placeholder="https://example.com/pet.jpg">
                    </div>

                    <div class="form-group">
                        <label>Vaccination Status</label>
                        <div style="display:flex;gap:1.5rem;align-items:center;">
                            <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                                <input type="radio" name="vaccinated" value="Yes" 
                                    <?php 
                                    if ($edit_animal) {
                                        echo ($edit_animal['vaccinated'] === 'Yes') ? 'checked' : '';
                                    }
                                    ?> required>
                                <span>Yes</span>
                            </label>
                            <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                                <input type="radio" name="vaccinated" value="No" 
                                    <?php 
                                    if ($edit_animal) {
                                        echo ($edit_animal['vaccinated'] === 'No' || empty($edit_animal['vaccinated'])) ? 'checked' : '';
                                    } else {
                                        echo 'checked';
                                    }
                                    ?> required>
                                <span>No</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="save" class="save-btn">Save Animal</button>
                        <button type="button" class="cancel-btn" onclick="window.location.href='dashboard.php'">Cancel</button>
                    </div>
                </form>
            </div>

            <!-- Animals Table -->
            <div class="dashboard-table">
                <h2 class="table-heading">All Animals</h2>
                
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Size</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($animal = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo isset($animal['ID']) ? $animal['ID'] : $animal['id']; ?></td>
                                    <td><?php echo htmlspecialchars($animal['name']); ?></td>
                                    <td><?php echo htmlspecialchars($animal['breed']); ?></td>
                                    <td><?php echo $animal['age']; ?> years</td>
                                    <td><?php echo htmlspecialchars($animal['size']); ?></td>
                                    <td><?php echo htmlspecialchars($animal['location']); ?></td>
                                    <td>
                                        <span class="badge <?php echo $animal['status'] === 'Available' ? 'badge-available' : 'badge-adopted'; ?>">
                                            <?php echo htmlspecialchars($animal['status']); ?>
                                        </span>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="dashboard.php?edit=<?php echo isset($animal['ID']) ? $animal['ID'] : $animal['id']; ?>" class="edit-btn">Edit</a>
                                        <a href="dashboard.php?delete=<?php echo isset($animal['ID']) ? $animal['ID'] : $animal['id']; ?>" 
                                           class="delete-btn" 
                                           onclick="return confirm('Are you sure you want to delete <?php echo htmlspecialchars($animal['name']); ?>?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 2rem; color: #9ca3af;">
                                    No animals in database yet. Add your first animal!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Adoption Requests Section -->
            <?php
            $adoption_sql = "SELECT pa.*, u.first_name, u.last_name, u.email, u.phone_number, a.name as pet_name, a.breed 
                            FROM pet_adoption pa 
                            LEFT JOIN users u ON pa.user_id = u.ID 
                            LEFT JOIN animals a ON pa.pet_id = a.ID 
                            ORDER BY pa.adoption_date DESC";
            $adoptions_result = mysqli_query($conn, $adoption_sql);
            ?>
            
            <?php if ($adoptions_result && mysqli_num_rows($adoptions_result) > 0): ?>
            <div class="dashboard-table" style="margin-top: 3rem;">
                <h2 class="table-heading">Adoption Requests</h2>
                
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Pet Name</th>
                            <th>Breed</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($adoption = mysqli_fetch_assoc($adoptions_result)): ?>
                            <tr>
                                <td><?php echo $adoption['ID']; ?></td>
                                <td><?php echo htmlspecialchars($adoption['pet_name']); ?></td>
                                <td><?php echo htmlspecialchars($adoption['breed']); ?></td>
                                <td><?php echo htmlspecialchars($adoption['first_name'] . ' ' . $adoption['last_name']); ?></td>
                                <td><a href="mailto:<?php echo htmlspecialchars($adoption['email']); ?>" style="color:#8b5cf6;"><?php echo htmlspecialchars($adoption['email']); ?></a></td>
                                <td><?php echo htmlspecialchars($adoption['phone_number'] ?: 'N/A'); ?></td>
                                <td><?php echo date('d.m.Y', strtotime($adoption['adoption_date'])); ?></td>
                                <td>
                                    <?php 
                                    $status_colors = [
                                        'Pending' => '#f59e0b',
                                        'Approved' => '#059669',
                                        'Rejected' => '#dc2626'
                                    ];
                                    $color = $status_colors[$adoption['adoption_status']] ?? '#8b5cf6';
                                    ?>
                                    <span class="badge" style="background:<?php echo $color; ?>;">
                                        <?php echo htmlspecialchars($adoption['adoption_status']); ?>
                                    </span>
                                </td>
                                <td class="action-buttons">
                                    <?php if ($adoption['adoption_status'] === 'Pending'): ?>
                                        <form method="POST" style="display:inline-block;margin-right:0.5rem;">
                                            <input type="hidden" name="adoption_id" value="<?php echo $adoption['ID']; ?>">
                                            <input type="hidden" name="status" value="Approved">
                                            <button type="submit" name="update_adoption_status" class="edit-btn" style="background:#059669;">Approve</button>
                                        </form>
                                        <form method="POST" style="display:inline-block;">
                                            <input type="hidden" name="adoption_id" value="<?php echo $adoption['ID']; ?>">
                                            <input type="hidden" name="status" value="Rejected">
                                            <button type="submit" name="update_adoption_status" class="delete-btn">Reject</button>
                                        </form>
                                    <?php else: ?>
                                        <span style="color:#9ca3af;">No actions</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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

    <script>
        function toggleForm() {
            const form = document.getElementById('animalForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>
