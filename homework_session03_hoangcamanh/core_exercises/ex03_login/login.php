<?php
session_start();

// Initialize attempt counter
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

// Hardcoded credentials
$valid_user = 'admin';
$valid_pass = '123456';

$message = '';
$login_success = false;

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === $valid_user && $password === $valid_pass) {
        $message = 'Login Successful';
        $login_success = true;
        $_SESSION['failed_attempts'] = 0; // Reset counter on success
    } else {
        $_SESSION['failed_attempts']++;
        $message = 'Invalid Credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Login Form</h1>
    
    <?php if (!empty($message)): ?>
        <p class="<?php echo $login_success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>
    
    <?php if ($_SESSION['failed_attempts'] > 0 && !$login_success): ?>
        <p class="error">Failed Attempts: <?php echo $_SESSION['failed_attempts']; ?></p>
    <?php endif; ?>
    
    <?php if (!$login_success): ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p><small>Demo: username: <strong>admin</strong>, password: <strong>123456</strong></small></p>
    <?php endif; ?>
</body>
</html>