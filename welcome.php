<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les informations de l'utilisateur connecté
$login = $_SESSION['login'];
$sql = "SELECT * FROM user WHERE login='$login'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Aucun utilisateur trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .dashboard-header h1 {
            margin: 0;
        }
        .profile-img {
            max-width: 150px;
            border: 5px solid #fff;
        }
        .user-info-table th, .user-info-table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="dashboard-header text-center">
        <div class="container">
            <h1>Bienvenue sur votre tableau de bord, <?php echo htmlspecialchars($user['login']); ?>!</h1>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if (!empty($user['photo'])): ?>
                    <img src="<?php echo htmlspecialchars($user['photo']); ?>" alt="Photo de profil" class="img-fluid rounded-circle profile-img mb-3">
                <?php endif; ?>
                <h2><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?></h2>
                <p class="lead"><?php echo htmlspecialchars($user['typeUser']); ?></p>
                <a href="logout.php" class="btn btn-danger">Déconnexion</a>
            </div>
            <div class="col-md-8">
                <h2>Vos informations</h2>
                <table class="table table-striped user-info-table">
                    <tbody>
                        <tr>
                            <th>Nom</th>
                            <td><?php echo htmlspecialchars($user['nom']); ?></td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                        </tr>
                        <tr>
                            <th>Civilité</th>
                            <td><?php echo htmlspecialchars($user['civilité']); ?></td>
                        </tr>
                        <tr>
                            <th>Date de naissance</th>
                            <td><?php echo htmlspecialchars($user['dateN']); ?></td>
                        </tr>
                        <tr>
                            <th>Adresse</th>
                            <td><?php echo htmlspecialchars($user['adresse']); ?></td>
                        </tr>
                        <tr>
                            <th>Type d'utilisateur</th>
                            <td><?php echo htmlspecialchars($user['typeUser']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
