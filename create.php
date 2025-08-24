<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (name,email) VALUES ('$name','$email')");
    header('Location: index.php?success=add');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter utilisateur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Ajouter un utilisateur</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
