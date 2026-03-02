<?php
// Get the search query from URL parameter, default to empty string
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Query Echo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .search-container {
            max-width: 500px;
            margin: 50px auto;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h1>Search Query Echo</h1>
        <form method="GET">
            <input 
                type="text" 
                name="q" 
                placeholder="Enter search term..." 
                value="<?php echo htmlspecialchars($searchQuery); ?>"
            >
            <button type="submit">Search</button>
        </form>
        
        <?php if (!empty($searchQuery)): ?>
            <div class="result">
                <strong>You searched for:</strong> <?php echo htmlspecialchars($searchQuery); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>