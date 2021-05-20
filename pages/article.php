<?php
require __DIR__ . '/partials/header.php';
$row = Table\Article::insertOne($_GET['id']);
?>
<h1><?php echo htmlspecialchars($row['title'])?></h1>
<p>
<?php echo htmlspecialchars($row['description'])?>
</p>
<p>
<?php echo htmlspecialchars($row['content'])?>
</p>

<?
require __DIR__ . '/partials/footer.php';
?>