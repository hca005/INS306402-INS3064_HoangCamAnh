<?php
$submitted = false;
$errors = [];
$formData = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validation logic
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }
    
    if (empty($message)) {
        $errors['message'] = 'Message is required';
    }
    
    // If no errors, mark as submitted
    if (empty($errors)) {
        $submitted = true;
        // Here you could save to database or send email
    } else {
        $formData = ['name' => $name, 'email' => $email, 'message' => $message];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        textarea { resize: vertical; min-height: 120px; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: #d32f2f; font-size: 0.9em; }
        .success { background-color: #4caf50; color: white; padding: 20px; border-radius: 4px; text-align: center; }
    </style>
</head>
<body>
    <?php if ($submitted): ?>
        <div class="success">
            <h2>Thank You!</h2>
            <p>Thank you, <?php echo htmlspecialchars($formData['name'] ?? 'Guest'); ?>! We've received your message and will get back to you soon.</p>
        </div>
    <?php else: ?>
        <h1>Contact Us</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($formData['name'] ?? ''); ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="error"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="error"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message"><?php echo htmlspecialchars($formData['message'] ?? ''); ?></textarea>
                <?php if (isset($errors['message'])): ?>
                    <div class="error"><?php echo $errors['message']; ?></div>
                <?php endif; ?>
            </div>
            
            <button type="submit">Send Message</button>
        </form>
    <?php endif; ?>
</body>
</html>