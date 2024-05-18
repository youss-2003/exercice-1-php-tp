<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $PW = password_hash($_POST['PW'], PASSWORD_BCRYPT);
    $civilité = $_POST['civilité'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    $adresse = $_POST['adresse'];
    $typeUser = $_POST['typeUser'];
    $photo = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoFolder = 'uploads/' . $photo;

    // Check if the uploads directory exists, if not, create it
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($photoTmpName, $photoFolder)) {
        $conn = new mysqli('localhost', 'root', '', 'my_database');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO User (login, PW, civilité, nom, prenom, dateN, adresse, typeUser, photo) 
                VALUES ('$login', '$PW', '$civilité', '$nom', '$prenom', '$dateN', '$adresse', '$typeUser', '$photo')";

        if ($conn->query($sql) === TRUE) {
            header("Location: connexion.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Failed to upload photo.";
    }
}
?>
