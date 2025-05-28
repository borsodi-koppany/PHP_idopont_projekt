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
        <a href="?todo=signin" class="btn btn-rpimary">Regisztráció</a>
        <?php
        include_once "db.php";
        $dbModel = new dataBase("localhost", "root", "", "idopont_php");
        $todo = $_GET['todo']?? 'list';
        switch($todo){
            case 'signin':
                include_once "signin.php";
                break;
            case 'list':
                // header("Location: index.php");
                break;
        }

        ?>
    </div>
</body>
</html>