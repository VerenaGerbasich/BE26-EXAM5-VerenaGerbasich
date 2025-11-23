<?php
session_start();
require_once '../config/db-connection.php';

echo "<h2>Login Debug Test</h2>";

if ($conn) {
    echo "✅ Database connected<br>";
} else {
    echo "❌ Database connection failed<br>";
    exit;
}

$sql = "SELECT * FROM users LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result) {
    $user_count = mysqli_num_rows($result);
    echo "✅ Users table exists. Found $user_count user(s)<br>";
    
    if ($user_count > 0) {
        $test_user = mysqli_fetch_assoc($result);
        echo "📧 Test user email: " . htmlspecialchars($test_user['email']) . "<br>";
        echo "🔑 Password hash exists: " . (isset($test_user['password']) ? 'Yes' : 'No') . "<br>";
        echo "📝 Password hash length: " . strlen($test_user['password']) . " characters<br>";
        
        echo "<h3>Test Login</h3>";
        echo "<form method='POST'>";
        echo "Email: <input type='email' name='test_email' value='" . htmlspecialchars($test_user['email']) . "'><br>";
        echo "Password: <input type='password' name='test_password'><br>";
        echo "<input type='submit' name='test_login' value='Test Login'>";
        echo "</form>";
        
        if (isset($_POST['test_login'])) {
            $email = $_POST['test_email'];
            $password = $_POST['test_password'];
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                echo "User found in database<br>";
                
                if (password_verify($password, $user['password'])) {
                    echo "✅ <strong style='color:green'>Password verification SUCCESS!</strong><br>";
                    echo "<strong>Available columns in users table:</strong><br>";
                    echo "<pre>" . implode(', ', array_keys($user)) . "</pre>";
                    
                    // Find ID column (different databases use different names)
                    if (isset($user['ID'])) {
                        $user_id = $user['ID'];
                    } elseif (isset($user['id'])) {
                        $user_id = $user['id'];
                    } elseif (isset($user['user_id'])) {
                        $user_id = $user['user_id'];
                    } else {
                        $user_id = 'NO_ID_FOUND';
                    }
                    
                    echo "User ID: " . $user_id . "<br>";
                    echo "Name: " . htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) . "<br>";
                    
                    $_SESSION['user'] = $user;
                    $_SESSION['user_id'] = $user_id;
                    echo "Session set. <a href='../home.php'>Go to Home</a>";
                } else {
                    echo "❌ <strong style='color:red'>Password verification FAILED!</strong><br>";
                    echo "This means the password you entered doesn't match the hashed password in the database.<br>";
                }
            } else {
                echo "❌ No user found with this email<br>";
            }
        }
    }
} else {
    echo "❌ Users table does not exist or query failed: " . mysqli_error($conn) . "<br>";
}
?>
