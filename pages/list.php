<?php
require __DIR__ . '/../pages/partials/header.php';


$allrows = $pdo->fetchAll();
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