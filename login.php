<?php
require_once "db.php";
require_once "user.php";
session_start();
$errors = [];
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$users = $dbModel->GetUsers();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST["email_lg"]) ?? "";
    $pw = htmlspecialchars($_POST["password_lg"]) ?? "";
    $isCorrect = false;

    //TODO: inputcheck


    foreach ($users as $u) {
        if ($u->email == $email && $u->password == $pw) {
            echo "oge";
            $_SESSION['email'] = $email;
            $_SESSION['isAdmin'] = $u->isAdmin;

            if ($u->isAdmin == 1) {
                header("Location: admin.php");
                exit;
            } else $_POST['todo'] = 'list';
            header("Location:  index.php");
            $isCorrect = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Bejelentkezés</h1>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="Email" class="form-label">Email cím:</label>
                <input type="email" class="form-control" id="email" name="email_lg">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Jelszó:</label>
                <input type="password" class="form-control" id="password" name="password_lg">
            </div>
            <?= $_SERVER['REQUEST_METHOD'] == 'POST' && !$isCorrect ? "<div class='p-3 mb-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3'> Az email cím vagy a jelszó nem megfelelő! </div>" : "" ?>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Bejelentkezés</button>
            </div>
        </form>
    </div>
</body>