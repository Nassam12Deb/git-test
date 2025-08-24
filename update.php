<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header('Location: index.php?success=update');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier utilisateur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Modifier utilisateur</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
