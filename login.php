<?php
require_once "db.php";
require_once "user.php";
session_start();
$errors = [];
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$users = $dbModel->GetUsers();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = htmlspecialchars($_POST["email_lg"]) ?? "";
    $pw = htmlspecialchars($_POST["password_lg"]) ?? "";


    //TODO: inputcheck
    if(count($errors) == 0){

            foreach($users as $u){
                if($u->email == $email && $u->password == $pw){
                    echo "oge";
                    $_SESSION['email'] = $email;
                    $_SESSION['isAdmin'] = $u->isAdmin;

                    if($u->isAdmin == 1) {
                        header("Location: admin.php");
                        exit;
                    }
                    else $_POST['todo'] = 'list';
                    header("Location:  index.php");                    
                }
                
            }
        
    }
}

?>

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
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </div>
</form>