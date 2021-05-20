<?php
require __DIR__ . '/../pages/partials/header.php';

try {
    $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');

    $sql = 'SELECT *
               FROM articles';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$allrows=$q->fetchAll();
?>
<h1>Bienvenue</h1>
<?php
    foreach($allrows as $row)
    {
        echo '<a class="navbar-brand" href="./index.php?page=article&id='.$row['title'].'">'.$row['title'].'</a> </br>';
    }
?>
<?php
require __DIR__ . '/../pages/partials/footer.php';
?>