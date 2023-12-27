<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR7/books_table.php';
require_once 'helpers.php';

class BooksActions
{
    public static function get_books(): ?array {
        if (isset($_GET['apply'])) {
            $fetch = self::fetch_filters();
            $filters = $fetch[0];
            $params = $fetch[1];
            return BooksTable::get_books($filters, $params);
        }
        elseif (isset($_GET['clear'])) {
            return null;
        }
        else {
            return BooksTable::get_books();
        }
    }

    public static function update_book(
        int $id,
        string $preview = null,
        string $name_book = null,
        int $id_author = null,
        string $description = null,
        int $price = null,
    ): void {
        $book = BooksTable::get_book_by_id($id);
        if ($book) {
            BooksTable::update_book(
                $id,
                $preview ?? $book['preview'],
                $name_book ?? $book['name_book'],
                $id_author ?? $book['id_author'],
                $description ?? $book['description'],
                $price ?? $book['price'],
            );

            if ($preview) unlink('../../assets/img/Books/' . $book['preview']);
        }
    }

    public static function delete_book(int $id): void {
        $book = BooksTable::get_book_by_id($id);
        if ($book) {
            BooksTable::delete_book($id);
            unlink('../../assets/img/Books/' . $book['preview']);
        }
    }

    private static function fetch_filters(): array {
        $filters = [];
        $params = [];

        if ($_GET['price_from'] != '') {
            $filters[] = 'cost >= ' . (int) $_GET['price_from'];
        }

        if ($_GET['price_to'] != '') {
            $filters[] = 'cost <= ' . (int) $_GET['price_to'];
        }

        if (!empty($_GET['author'])) {
            $filters[] = 'id_author = ' . (int) $_GET['author'];
        }

        if (!empty($_GET['description'])) {
            $filters[] = 'description like :description';
            $description = $_GET['description'];
            $params[':description'] = "%$description%";
        }

        if (!empty($_GET['name_book'])) {
            $filters[] = 'books.name_book like :name_book';
            $name = $_GET['name_book'];
            $params[':name_book'] = "%$name%";
        }
        return [$filters, $params];
    }

    public static function get_authors(): array {
        return BooksTable::get_authors();
    }
}