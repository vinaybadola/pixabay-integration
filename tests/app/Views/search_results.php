<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    position: relative;
    top: 3rem;
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.search-form {
    text-align: center;
    margin-bottom: 20px;
}

.search-form input[type="text"] {
    padding: 10px;
    width: 60%;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-form button {
    padding: 10px 20px;
    border: none;
    background-color: #007BFF;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

.search-form button:hover {
    background-color: #0056b3;
}

.results {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.result-item {
    width: 200px;
    text-align: center;
}

.result-item img {
    width: 100%;
    height: auto;
    border-radius: 4px;
}

.result-item p {
    color: #666;
}

</style>

<?php include 'navbar.php'; ?>


<div class="container">
    <h2>API Results</h2>
    
    
    
    <?php 
    if (!empty($results)): ?>
        <div class="results">
            <?php foreach ($results as $result): 
                $previewURL = $result['previewURL'];
                $tags = $result['tags'];
                if (!empty($previewURL)): ?>
                    <div class="result-item">
                        <img src="<?= htmlspecialchars($previewURL, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($tags, ENT_QUOTES, 'UTF-8') ?>">
                        <p><?= htmlspecialchars($tags, ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                <?php else: ?>
                    <div class="result-item">
                        <p>Image not available</p>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>