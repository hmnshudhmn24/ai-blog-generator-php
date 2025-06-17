<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>AI Blog Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">AI-Powered Blog Generator</h1>
    <form method="POST" action="generate.php">
        <div class="mb-3">
            <label class="form-label">Blog Topic</label>
            <input type="text" class="form-control" name="topic" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate Blog</button>
    </form>
    <hr>
    <h2>Recent Blogs</h2>
    <ul class="list-group">
        <?php
        $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<li class="list-group-item">'
                . '<strong>' . htmlspecialchars($row['topic']) . ':</strong> '
                . substr(htmlspecialchars($row['content']), 0, 100) . '...'
                . '</li>';
        }
        ?>
    </ul>
</div>
</body>
</html>