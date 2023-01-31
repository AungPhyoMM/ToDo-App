<?php
require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' WHERE id='$id'");
    $result = $pdostatement->execute();
    if ($result) {
        echo "<script>alert('New ToDo is updated');window.location.href='index.php';</script>";
    }
} else {
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=" . $_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit New ToDo</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $result[0]['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" cols="80" rows="8" class="form-control">
                    <?= $result[0]['description'] ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="UPDATE">
                    <a href="index.php" type="button" class="btn btn-secondary">BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>