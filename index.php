<?php
include 'db.php';
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>CRUD Utilisateurs</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Mon CRUD PHP</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des utilisateurs</h2>
        <a href="create.php" class="btn btn-success">Ajouter</a>
    </div>
    
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">Supprimer</button>

                    <!-- Modal suppression -->
                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?= $row['id'] ?>">Confirmer la suppression</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                          </div>
                          <div class="modal-body">
                            Voulez-vous vraiment supprimer l'utilisateur <strong><?= htmlspecialchars($row['name']) ?></strong> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Supprimer</a>
                          </div>
                        </div>
                      </div>
                    </div>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
