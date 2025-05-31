<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <title>Gömbi's Barbershop admin</title>
</head>
<body>
    <div class="container">
        <a href="index.php?todo=logOut" class='btn btn-primary'>Kijelentkezés</a>    
    </div>
    <?php
        
        $todo = $_POST['todo'] ?? "";
        // switch($todo){
        //     case 'logOut':
        //         session_start();
        //         session_unset();
        //         session_destroy();
        //         header("Location: index.php");
        //         break;
        // }
    ?>
</body>
</html>