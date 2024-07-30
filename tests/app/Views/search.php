
<!DOCTYPE html>
<?php include 'navbar.php'; ?>
<head>
    <link rel="stylesheet" href="<?= base_url('styles/search.css') ?>">
</head>

<div class="search-form">
<h2>Search Using pixabay</h2>
    <form action="/search/results" method="post">
        <input type="text" name="query" placeholder="Search for images/videos" required>
        <button type="submit">Search</button>
    </form>
</div>
</html> 