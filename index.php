<?php
require_once __DIR__ . '/vendor/autoload.php';

use Admin\Bibliotech\Book;
use Admin\Bibliotech\Library;

$library = new Library();

// ---- Crear libros ----
$books = [
    new Book("1984", "George Orwell", "9780451524935", false, "Ficción Distópica"),
    new Book("Cien años de soledad", "Gabriel García Márquez", "9780307474728", true, "Realismo Mágico"),
    new Book("Clean Code", "Robert C. Martin", "9780132350884", true, "Programación"),
    new Book("El principito", "Antoine de Saint-Exupéry", "9780156013987", true, "Infantil"),
    new Book("Don Quijote de la Mancha", "Miguel de Cervantes", "9788420412146", true, "Clásico"),
    new Book("Sapiens: De animales a dioses", "Yuval Noah Harari", "9788499926223", true, "Historia"),
    new Book("The Pragmatic Programmer", "Andrew Hunt y David Thomas", "9780201616224", true, "Programación"),
    new Book("Harry Potter y la piedra filosofal", "J.K. Rowling", "9788478884452", true, "Infantil"),
    new Book("Matilda", "Roald Dahl", "9780142410370", true, "Infantil"),
    new Book("La Odisea", "Homero", "9780140268867", true, "Clásico"),
    new Book("Moby Dick", "Herman Melville", "9781503280786", true, "Clásico"),
];

// Agregar libros a la librería
foreach ($books as $book) {
    $library->addBook($book);
}

// ---- Procesar acciones dinámicas desde el HTML ----
$searchResults = [];
$message = "";

// Buscar por título
if (isset($_GET['title'])) {
    $searchResults = $library->searchByTitle($_GET['title']);
}

// Buscar por autor
if (isset($_GET['author'])) {
    $searchResults = $library->searchByAuthor($_GET['author']);
}

// Buscar por categoría
if (isset($_GET['category'])) {
    $searchResults = $library->listBooksByCategory($_GET['category']);
}

// Prestar libro
if (isset($_POST['lend'])) {
    $title = $_POST['lend'];
    $success = $library->lendBook($title);
    $message = $success 
        ? "✅ El libro '{$title}' ha sido prestado con éxito." 
        : "❌ El libro '{$title}' no está disponible.";
}

// Pasar datos a la vista
$availableBooks = $library->listAvailableBooks();
include __DIR__ . "/views/bibliotech.php";
