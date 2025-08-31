<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bibliotech</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <h1>Bienvenido a Bibliotech</h1>

    <!-- Mensajes -->
    <?php if (!empty($message)): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>

    <!-- Buscar libros -->
    <section>
        <h2>Buscar libros</h2>
        <form method="get">
            <input type="text" name="title" placeholder="Buscar por título">
            <button type="submit">Buscar</button>
        </form>
        <form method="get">
            <input type="text" name="author" placeholder="Buscar por autor">
            <button type="submit">Buscar</button>
        </form>
        <form method="get">
            <input type="text" name="category" placeholder="Buscar por categoría">
            <button type="submit">Buscar</button>
        </form>
    </section>

    <!-- Resultados de búsqueda -->
    <?php if (!empty($searchResults)): ?>
        <section>
            <h2>Resultados de búsqueda</h2>
            <ul>
                <?php foreach ($searchResults as $book): ?>
                    <li>
                        <strong><?= $book->getTitle(); ?></strong> - 
                        <?= $book->getAuthor(); ?> (<?= $book->getCategory(); ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <!-- Libros disponibles -->
    <section>
        <h2>Libros disponibles</h2>
        <ul>
            <?php foreach ($availableBooks as $book): ?>
                <li>
                    <strong><?= $book->getTitle(); ?></strong> - 
                    <?= $book->getAuthor(); ?> (<?= $book->getCategory(); ?>)
                    <form method="post" style="display:inline;">
                        <button type="submit" name="lend" value="<?= $book->getTitle(); ?>">
                            Prestar
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>
