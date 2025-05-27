<?php

require_once 'db.php';
$dbModel = new dataBase("localhost", "root", "", "idopont.php");
$users[] = $dbModel->GetUsers();
$emails = [];
foreach($users as $u){
    $email.array_push($u->email);
}
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars($_POST['email']) ?? "";
    $pw = htmlspecialchars($_POST['password']) ?? "";
    $pw_a = htmlspecialchars($_POST['password_again'])?? "";
    
    if((empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))){
        $errors[] = "Érvényes email címet adjon meg!";
    }
    if(in_array($email, $emails)){
        $errors[] = "Ezzel az email címmel már létezik felhasználó!";
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