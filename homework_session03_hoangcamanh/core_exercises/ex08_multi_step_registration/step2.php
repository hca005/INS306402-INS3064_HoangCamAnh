<?php
session_start();

// Initialize session data if not exists
if (!isset($_SESSION['registration'])) {
    $_SESSION['registration'] = [];
}

// Handle form submission from step 1
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'step1') {
    $_SESSION['registration']['name'] = htmlspecialchars($_POST['name'] ?? '');
    $_SESSION['registration']['email'] = htmlspecialchars($_POST['email'] ?? '');
}

// Handle form submission from step 2
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'step2') {
    $_SESSION['registration']['bio'] = htmlspecialchars($_POST['bio'] ?? '');
    $_SESSION['registration']['location'] = htmlspecialchars($_POST['location'] ?? '');
    $_SESSION['registration']['completed'] = true;
}

// Display final submission
$showFinal = isset($_SESSION['registration']['completed']) && $_SESSION['registration']['completed'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Registration - Step 2</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #0056b3; }
        .success { color: green; margin: 10px 0; }
        .review { background-color: #f0f0f0; padding: 15px; border-radius: 4px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Multi-Step Registration</h1>

    <?php if (!$showFinal): ?>
        <form method="POST">
            <h2>Step 2: Profile Information</h2>
            
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" rows="4" required><?php echo $_SESSION['registration']['bio'] ?? ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required value="<?php echo $_SESSION['registration']['location'] ?? ''; ?>">
            </div>

            <input type="hidden" name="action" value="step2">
            <button type="submit">Complete Registration</button>
        </form>
    <?php else: ?>
        <h2>Registration Complete!</h2>
        <p class="success">✓ Your registration has been submitted successfully.</p>
        
        <div class="review">
            <h3>Submitted Data:</h3>
            <p><strong>Name:</strong> <?php echo $_SESSION['registration']['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['registration']['email']; ?></p>
            <p><strong>Bio:</strong> <?php echo $_SESSION['registration']['bio']; ?></p>
            <p><strong>Location:</strong> <?php echo $_SESSION['registration']['location']; ?></p>
        </div>

        <form method="POST">
            <input type="hidden" name="action" value="reset">
            <button type="submit" style="background-color: #6c757d; margin-top: 10px;">Start Over</button>
        </form>
    <?php endif; ?>
</body>
</html>