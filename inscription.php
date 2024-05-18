<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #1877f2;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
        }
        .btn-primary:hover {
            background-color: #165cbb;
            border-color: #165cbb;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Inscription</h2>
        <form action="inscription_process.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="PW" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="PW" name="PW" required>
            </div>
            <div class="mb-3">
                <label for="civilité" class="form-label">Civilité</label>
                <input type="text" class="form-control" id="civilité" name="civilité" required>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="dateN" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="dateN" name="dateN" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <textarea class="form-control" id="adresse" name="adresse" required></textarea>
            </div>
            <div class="mb-3">
                <label for="typeUser" class="form-label">Type d'utilisateur</label>
                <input type="text" class="form-control" id="typeUser" name="typeUser" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
