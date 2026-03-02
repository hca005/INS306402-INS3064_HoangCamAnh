<?php
$errors = [];
$formData = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation
    if (empty($formData['name'])) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }
    
    if (strlen($formData['password']) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }
    
    // If no errors, process form
    if (empty($errors)) {
        echo '<div style="color: green;">Form submitted successfully!</div>';
        $formData = ['name' => '', 'email' => '', 'password' => ''];
    }
}
?>

<form method="POST">
    <div>
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($formData['name']); ?>">
        <?php if (isset($errors['name'])): ?>
            <span style="color: red;"><?php echo $errors['name']; ?></span>
        <?php endif; ?>
    </div>
    
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>">
        <?php if (isset($errors['email'])): ?>
            <span style="color: red;"><?php echo $errors['email']; ?></span>
        <?php endif; ?>
    </div>
    
    <div>
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($formData['password']); ?>">
        <?php if (isset($errors['password'])): ?>
            <span style="color: red;"><?php echo $errors['password']; ?></span>
        <?php endif; ?>
    </div>
    
    <button type="submit">Submit</button>
</form>