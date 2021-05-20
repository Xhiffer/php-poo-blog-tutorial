<?php
namespace Table;
class Article
{
    private object $PDO;
    public function __construct($PDO) 
    {
        $this ->PDO = $PDO;
    }
    public function fetchAll()
    {
        try {
        
            $sql = 'SELECT *
                       FROM articles';
        
            $q = $this->PDO->query($sql);
            $q->setFetchMode(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Could not connect to the database:" . $e->getMessage());
        }
        $allrows=$q->fetchAll();
        return $allrows;
    }
    public function insertOne($id)
    {
        try {
        
            $sql = 'SELECT *
                       FROM articles
                       WHERE title IN ("'.$id.'")';
        
            $q = $this->PDO->query($sql);
            $q->setFetchMode(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Could not connect to the database :" . $e->getMessage());
        }
        $row=$q->fetch();
        return $row;
    }

}
?>