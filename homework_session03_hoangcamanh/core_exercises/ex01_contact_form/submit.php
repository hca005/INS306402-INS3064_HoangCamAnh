<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Check if all fields are filled
    if (empty($fullName) || empty($email) || empty($phoneNumber) || empty($message)) {
        $error = "Missing Data";
    } else {
        $error = null;
    }
} else {
    $error = null;
    $fullName = $email = $phoneNumber = $message = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .error {
            color: #d32f2f;
            background-color: #ffebee;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .success {
            color: #388e3c;
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            background-color: #f9f9f9;
            margin: 5px 0;
            border-left: 4px solid #1976d2;
            padding-left: 15px;
        }
        strong {
            color: #1976d2;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1976d2;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }
        a:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Form Submission</h1>
        
        <?php if ($error): ?>
            <div class="error"><strong>Error:</strong> <?php echo htmlspecialchars($error); ?></div>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="success">Form submitted successfully!</div>
            <h2>Submitted Data:</h2>
            <ul>
                <li><strong>Full Name:</strong> <?php echo htmlspecialchars($fullName); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($phoneNumber); ?></li>
                <li><strong>Message:</strong> <?php echo htmlspecialchars($message); ?></li>
            </ul>
        <?php else: ?>
            <p>Waiting for form submission...</p>
        <?php endif; ?>
        
        <a href="index.html">Back to Contact Form</a>
    </div>
</body>
</html>
