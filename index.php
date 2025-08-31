<?php

require_once __DIR__ . '/vendor/autoload.php';

use Admin\Bibliotech\Book;
use Admin\Bibliotech\Library;

$book1 = new Book("1984", "George Orwell", "9780451524935", false, "Ficción Distópica");
$book2 = new Book("Cien años de soledad", "Gabriel García Márquez", "9780307474728", true, "Realismo Mágico");
$book3 = new Book("Clean Code", "Robert C. Martin", "9780132350884", true, "Programación");
$book4 = new Book("El principito", "Antoine de Saint-Exupéry", "9780156013987", true, "Infantil");
$book5 = new Book("Don Quijote de la Mancha", "Miguel de Cervantes", "9788420412146", true, "Clásico");
$book6 = new Book("Sapiens: De animales a dioses", "Yuval Noah Harari", "9788499926223", true, "Historia");
$book7 = new Book("The Pragmatic Programmer", "Andrew Hunt y David Thomas", "9780201616224", true, "Programación");
$book8 = new Book("Harry Potter y la piedra filosofal", "J.K. Rowling", "9788478884452", true, "Infantil");
$book9 = new Book("Matilda", "Roald Dahl", "9780142410370", true, "Infantil");
$book10 = new Book("La Odisea", "Homero", "9780140268867", true, "Clásico");
$book11 = new Book("Moby Dick", "Herman Melville", "9781503280786", true, "Clásico");

$library = new Library();

$books = [$book1, $book2, $book3, $book4, $book5, $book6, $book7, $book8, $book9, $book10, $book11];

foreach ($books as $book) {
    $library->addBook($book);
}

$availableBooks = $library->listAvailableBooks();
$searchByTitle = $library->searchByTitle("Cien años de soledad");
$searchByAuthor = $library->searchByAuthor("George Orwell");
$searchByCategory = $library->listBooksByCategory("Programación");
$lendBook = $library->lendBook("1984");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
</head>

<body>
    <section>
        <h1>Lista de todos los libros disponibles</h1>
        <?php foreach ($availableBooks as $book): ?>
            <li>
                <strong><?= $book->getTitle(); ?></strong>
                - <?= $book->getAuthor(); ?>
                (<?= $book->getCategory(); ?>)
            </li>
        <?php endforeach; ?>
    </section>

    <section>
        <h1>Resultados de búsqueda por autor: "George Orwell"</h1>
        <?php foreach ($searchByAuthor as $book): ?>
            <li>
                <strong><?= $book->getTitle(); ?></strong>
                - <?= $book->getAuthor(); ?>
                (<?= $book->getCategory(); ?>)
            </li>
        <?php endforeach; ?>
    </section>

    <section>
        <h1>Resultados de búsqueda por título: "Cien años de soledad"</h1>
        <?php foreach ($searchByTitle as $book): ?>
            <li>
                <strong><?= $book->getTitle(); ?></strong>
                - <?= $book->getAuthor(); ?>
                (<?= $book->getCategory(); ?>)
            </li>
        <?php endforeach; ?>
    </section>
    <section>
        <h1>Resultado de prestar el libro "1984"</h1>
        <?php if ($lendBook): ?>
            <p>El libro "1984" ha sido prestado con éxito.</p>
        <?php else: ?>
            <p>El libro "1984" no está disponible para préstamo.</p>
        <?php endif; ?>
    </section>
    <section>
        <h1>Resultados de búsqueda por categoría: "Programación"</h1>
        <?php foreach ($searchByCategory as $book): ?>
            <li>
                <strong><?= $book->getTitle(); ?></strong>
                - <?= $book->getAuthor(); ?>
                 (<?= $book->getCategory(); ?>)
            </li>
        <?php endforeach; ?>
    </section>
</body>

</html>