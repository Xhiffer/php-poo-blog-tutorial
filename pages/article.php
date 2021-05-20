<?php
require __DIR__ . '/partials/header.php';
try {
    $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');

    $sql = 'SELECT *
               FROM articles
               WHERE title IN ("'.$_GET['id'].'")';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$row=$q->fetch();
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