<?php
namespace Table;
class Article
{
    public static function fetchAll()
    {
        try {
            $pdo = new \PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');
        
            $sql = 'SELECT *
                       FROM articles';
        
            $q = $pdo->query($sql);
            $q->setFetchMode(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Could not connect to the database:" . $e->getMessage());
        }
        $allrows=$q->fetchAll();
        return $allrows;
    }
    public static function insertOne($id)
    {
        try {
            $pdo = new \PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');
        
            $sql = 'SELECT *
                       FROM articles
                       WHERE title IN ("'.$id.'")';
        
            $q = $pdo->query($sql);
            $q->setFetchMode(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Could not connect to the database :" . $e->getMessage());
        }
        $row=$q->fetch();
        return $row;
    }

}
?>