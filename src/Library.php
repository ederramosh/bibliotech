<?php

namespace Admin\Bibliotech;

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBook($isbn) {
        foreach ($this->books as $index => $book) {
            if ($book->getIsbn() === $isbn) {
                unset($this->books[$index]);
                return true;
            }
        }
        return false;
    }

    public function searchByTitle($title) {
        $results = [];
        foreach ($this->books as $book) {
            if (stripos($book->getTitle(), $title) !== false) {
                $results[] = $book;
            }
        }
        return $results;
    }

    public function listAvailableBooks() {
        return array_filter($this->books, function($book) {
            return $book->isAvailable();
        });
    }

    public function listBooksByCategory($category) {
        return array_filter($this->books, function($book) use ($category) {
            return strcasecmp($book->getCategory(), $category) === 0;
        });
    }
}