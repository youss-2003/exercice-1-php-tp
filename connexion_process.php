<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $PW = $_POST['PW'];

    try {
        $conn = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM User WHERE login = :login";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($PW, $row['PW'])) {
                $_SESSION['login'] = $login;
                $_SESSION['photo'] = $row['photo'];
                header("Location: welcome.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun utilisateur trouvé avec ce login.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
