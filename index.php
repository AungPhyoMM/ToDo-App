<?php

require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
  <?php
  $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
  $pdostatement->execute();
  $result = $pdostatement->fetchAll();
  ?>
  <div class="card">
    <div class="card-body">
      <h2>Todo Home Page</h2>
      <a href="add.php" type="button" class="btn btn-success my-3">Create New</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          if ($result) {
            foreach ($result as $value) {
          ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= date('d-m-Y', strtotime($value['created_at'])) ?></td>
                <td>
                  <a type="button" class="btn btn-warning" href="edit.php?id=<?= $value['id'] ?>">Edit</a>
                  <a type="button" class="btn btn-danger" href="delete.php?id=<?= $value['id'] ?>">Delete</a>
                </td>
              </tr>
          <?php
              $i++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>