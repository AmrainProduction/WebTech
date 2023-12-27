<?php
require_once 'db.php';

class BooksTable
{
    public static function create_book(
        string $preview,
        string $name_book,
        int $id_author,
        string $description,
        int $price,
    ): void {

        $query = DB::prepare(
            "INSERT INTO books (preview, name_book, id_author, description, price) VALUES (:preview, :name_book, :id_author, :description, :price)"
        );

        $query->bindValue(':preview', $preview);
        $query->bindValue(':name_book', $name_book);
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

    public static function get_book_by_id(int $id): array|bool {
        $query = DB::prepare('SELECT * FROM books WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function update_book(
        int $id,
        string $preview,
        string $name_book,
        int $id_author,
        string $description,
        int $price,
    ): void {
        $query = DB::prepare(
            'UPDATE books SET preview=:preview, name_book=:name_book, id_author=:id_author, description=:description, price=:price WHERE id=:id'
        );
        $query->bindValue(':id', $id);
        $query->bindValue(':preview', $preview);
        $query->bindValue(':name_book', $name_book);
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

    public static function delete_book(int $id): void {
        $query = DB::prepare('DELETE FROM books WHERE id = :id');
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function get_authors(): array {
        $query = DB::prepare('SELECT * FROM id_author order by id_author.id');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}