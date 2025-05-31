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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Felhasználó email címe</th>
                    <th>Dátum</th>
                    <th>Idő</th>
                    <th>Szolgáltatás</th>
                    <th>Visszaigazolás</th>
                    <th>Lemondás</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "db.php";
                $dbModel = new dataBase("localhost", "root", "", "idopont_php");
                $todo = $_GET['todo'] ?? "list";
                switch ($todo) {
                    case "list":
                        include_once "adminProcess.php";
                        break;
                    case "approve":
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $dbModel->ApproveAppointment($id);
                        }
                        header("Location: admin.php");
                        break;
                    case "cancel":
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $dbModel->DeleteAppointment($id);
                        }
                        header("Location: admin.php");
                        break;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>