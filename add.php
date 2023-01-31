<?php

require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $pdostatement = $pdo->prepare("INSERT INTO todo(title, description) VALUES (:title,:description)");
    $result = $pdostatement->execute(
        array(
            ':title' => $title,
            ':description' => $desc,
        )
    );
    if ($result) {
        echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" cols="80" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" type="button" class="btn btn-secondary">BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>