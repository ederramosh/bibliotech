<?php

namespace Admin\Bibliotech;

class Book {
    private $title;
    private $author;
    private $isbn;
    private $isAvailable;
    private $category;

    public function __construct($title, $author, $isbn, $isAvailable, $category) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isAvailable = $isAvailable;
        $this->category = $category;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function isAvailable() {
        return $this->isAvailable;
    }
    public function getCategory() {
        return $this->category;
    }

    public function setAvailability($isAvailable) {
        $this->isAvailable = $isAvailable;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
}