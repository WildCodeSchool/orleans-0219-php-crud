<?php
require '../connec.php';

$pdo = new PDO(DSN, USER, PASS);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
// "nettoyage du $_POST" (trim)

// verification des erreurs (not empty, longueurs, type...)

    if (empty($errors)) {
        $query = "INSERT INTO article (title, author, content) VALUES (:title, :author, :content)";
        $statement = $pdo->prepare($query);

        $statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $statement->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
        $statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
        $statement->execute();

        header('Location: index.php');
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>My Blog</title>
</head>
<body>

<main class="container-fluid">
    <h1>Add an article</h1>

    <form action="add.php" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control" type="text" name="author" id="author">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        <button class="btn btn-success">Add</button>

    </form>

</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
