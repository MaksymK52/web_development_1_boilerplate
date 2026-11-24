<?php

namespace App\Controllers;

class GuestbookController
{
    public function getAll($vars = [])
    {
        echo "Welcome to the guestbook!<br>";

        try {
            $connectionString = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
            $pdo = new \PDO(
                $connectionString,
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']
            );
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query('SELECT * FROM posts ORDER BY posted_at DESC');
            $posts = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            var_dump($posts);
        } catch (\PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }

    public function getPosts($vars = [])
    {
        $this->getAll($vars);
    }
}