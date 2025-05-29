<?php

require_once 'db.php';
require_once 'user.php';
session_start();
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$users = $dbModel->GetUsers();
$emails = [];
if(count($users) != 0){
    foreach($users as $u){
        // $email.array_push($u->email);
    }
}
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars($_POST['email']) ?? "";
    $pw = htmlspecialchars($_POST['password']) ?? "";
    $pw_a = htmlspecialchars($_POST['password_again'])?? "";
    
    if((empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))){
        $errors["email"] = "Érvényes email címet adjon meg!";
    }
    if(in_array($email, $emails)){
        $errors["email_exists"] = "Ezzel az email címmel már létezik felhasználó!";
    }
    if($pw != $pw_a){
        $errors["password"] = "A megadott jelszavak nem egyeznek!";
    }
    
    if(count($errors) == 0){
        $dbModel->CreateNewUser($email, $pw, 0);
        $_SESSION["email"] = $email;
        
        header("Location: index.php");
    }
}

?>
<h1>Fiók létrehozása!</h1>

<form method="POST" action="signin.php">
    <div class="mb-3">
        <label for="Email" class="form-label">Email cím:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password-again" class="form-label">Jelszó megismétlése:</label>
        <input type="password" class="form-control" id="password_again" name="password_again">
    </div>
    <div class="mb-3">
        <h6>Már van fiókod? <a href="">Bejelentkezés</a></h4>
        <button type="submit" class="btn btn-primary">Fiók létrehozása</button>
    </div>
</form>