<?php
require_once 'books_table.php';
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