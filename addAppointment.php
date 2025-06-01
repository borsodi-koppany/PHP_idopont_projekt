<?php
session_start();
require_once "db.php";
require_once "user.php";
$dbmodel = new dataBase("localhost", "root", "", "idopont_php");
$user = $_SESSION["email"];
var_dump($user);
$errors = [];
$types = ['vágás', 'borotválás', 'festés', 'egyéb'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email_ap']) ?? '';
    $date = htmlspecialchars($_POST['date_ap']) ?? '';
    $time = htmlspecialchars($_POST['time_ap']) ?? '';
    $type = htmlspecialchars($_POST['type_ap']) ?? '';

    if (empty($email) || $user != $email) $errors[] = "Az email cím nem egyezik meg a fiók email címével!";
    if (empty($date)) $errors[] = "Válasszon dátumot!";
    if (empty($time)) $errors[] = "Adjon meg egy időpontot!";
    if (empty($type) || $type == "Kérem válasszon...") $errors[] = "Válassza ki a szolgáltatás típusát!";
    //TODO: something isnt right
    if (count($errors) == 0) {
        $dbmodel->AddAppointment($email, $date, $time, $type);
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Fiók létrehozása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <form action="addAppointment.php" method="POST">
            <div class="mb-3">
                <label for="Email" class="form-label">Email cím:</label>
                <input type="email" value="<?= $user ?>" class="form-control" id="email" name="email_ap">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Dátum:</label>
                <input type="date" class="form-control" id="date" name="date_ap" value="<?=$date?>">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Időpont:</label>
                <input type="text" class="form-control" id="time" name="time_ap" value="<?=$time?>">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Szolgáltatás típusa:</label>
                <select name="type_ap" id="type" class="form-select">
                    <option selected>Kérem válasszon...</option>
                    <?php
                    foreach ($types as $t) {
                        echo "<option value='$t'>$t</option>";
                    }
                    ?>
                </select>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($errors) != 0) {
                foreach ($errors as $e) {
                    echo "<div class='p-3 mb-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3'> $e </div>";
                }
            }
            ?>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Időpont lefoglalása</button>
            </div>
        </form>
    </div>
</body>

</html>