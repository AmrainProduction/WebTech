<?php
require_once 'db.php';

class BooksTable
{
    public static function create_book(
        string $preview,
        string $name,
        int $id_author,
        string $description,
        int $price,
        string $id = null,
    ): void {
        if (!$id) {
            $id = uniqid();
        }

        $query = DB::prepare(
            'INSERT INTO games (id, preview, name, id_author, description, price) ' .
            'VALUES (:id, :preview, :name, :id_author, :description, :price)'
        );

        $query->bindValue(':id', $id);
        $query->bindValue(':img', $preview);
        $query->bindValue(':name', $name);
        $query->bindValue(':id_author', $id_author);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);

        try {
            $query->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function get_books(array $filters = [], array $params = []): array {
        $query = "SELECT books.id, books.preview, books.name_book, id_author.surname, id_author.name, books.description, books.price FROM books INNER JOIN id_author ON books.id_author=id_author.id";

        if (count($filters) > 0) {
            $query = $query . ' WHERE ' . implode(' AND ', $filters);
            $query .= ' order by books.id;';
        }
        else {
            $query = $query . ' order by books.id;';
        }
        $query = DB::prepare($query);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}