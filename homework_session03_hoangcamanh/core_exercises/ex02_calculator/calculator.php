<?php
$result = null;
$equation = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'] ?? null;
    $num2 = $_POST['num2'] ?? null;
    $operation = $_POST['operation'] ?? null;

    // Validate inputs are numeric
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Both inputs must be numeric values.";
    } elseif (empty($operation)) {
        $error = "Please select an operation.";
    } elseif ($operation === '/' && $num2 == 0) {
        // Prevent division by zero
        $error = "Cannot divide by zero.";
    } else {
        // Perform calculation
        $num1 = (float)$num1;
        $num2 = (float)$num2;

        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                $result = $num1 / $num2;
                break;
        }

        $equation = "$num1 $operation $num2 = $result";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
    <style>
        body { font-family: Arial; max-width: 400px; margin: 50px auto; }
        input, select { padding: 8px; margin: 5px 0; width: 100%; }
        button { padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin: 10px 0; }
        .result { color: green; font-weight: bold; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Arithmetic Calculator</h1>
    <form method="POST">
        <label>First Number:</label>
        <input type="text" name="num1" required>

        <label>Operation:</label>
        <select name="operation" required>
            <option value="">Select operation</option>
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select>

        <label>Second Number:</label>
        <input type="text" name="num2" required>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($equation): ?>
        <div class="result"><?php echo htmlspecialchars($equation); ?></div>
    <?php endif; ?>
</body>
</html>