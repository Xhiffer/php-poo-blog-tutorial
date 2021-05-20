<?php
spl_autoload_register(function ($className) {
    $path = str_replace('\\', '/', $className);
    require_once __DIR__ . '/../src/' . $path . '.php';
});
/**
 * La class App est le point d'entré de notre application. C'est
 * l'objet principal !
 */
class App
{
    /**
     * Cette méthode demarre notre application. C'est ici
     * que l'on trouve le code initiale.
     */
    static public function start(): void
    {
        // $_GET permet d'accèder au query string
        // ex: $_GET['page'] retourne la query string "page"
        // la fonction isset(...) permet de tester si un
        // élement est présent dans un tableaux.

        $page = 'list';
        $bdd = new \PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');
        $pdo = new Table\Article($bdd);
        

        // Ici on test si on a envoyé la query "page"
        if (isset($_GET['page'])) {
            // Si la query page existe dans ce cas nous l'assignons
            // à notre variable page
            $page = $_GET['page'];
        }

        $pagePath = __DIR__ . '/../pages/' . $page . '.php';
        // ici afficher la page avec "require" !
        if(file_exists($pagePath))
        {
            require __DIR__ . '/../pages/' . $page . '.php';
        }
        else
        {
            require __DIR__ . '/../pages/notFound.php';
        }
        
    }
}
