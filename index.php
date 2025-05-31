<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Gömbi's Barbershop</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "user.php";
        include_once "db.php";
        // session_start();
        $dbModel = new dataBase("localhost", "root", "", "idopont_php");
        
        // foreach($users as $u){
        //     if($u->email == $user && $u->isAdmin == 1){
        //         include_once "admin.php";
        //     }
        // }
        // admin user
        // $dbModel->CreateNewUser('admnin@a.a', 'blanky', 1);
        $todo = $_GET['todo']?? 'list';
        echo $todo;
        switch($todo){
            case 'signin':
                include_once "signin.php";
                break;
            case 'list':
                include_once "listAppointments.php";
                break;
            case 'newAp':
                include_once "addAppointment.php";
                break;
            case 'logOut':
                session_start();
                session_unset();
                session_destroy();
                include_once "listAppointments.php";
                break;
            case 'logIn':
                include_once "login.php";
                break;

        }

        ?>
    </div>
</body>
</html>