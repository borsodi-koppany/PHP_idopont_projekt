<?php
    session_start();
    require_once "db.php";
    require_once "user.php";
    $dbmodel = new dataBase("localhost", "root", "", "idopont_php");
    $user = $_SESSION["email"];
    var_dump($user);
    $errors =[];
    $types = ['vagas', 'borotvalas', 'festes', 'egyeb'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars($_POST['email_ap']) ?? '';
        $date = htmlspecialchars($_POST['date_ap'])?? '';
        $time = htmlspecialchars($_POST['time_ap'])?? '';
        $type = htmlspecialchars($_POST['type_ap'])?? '';

        //TODO: inputcheck
        if(count($errors) == 0){
            $dbmodel->AddAppointment($email, $date, $time, $type);
            header("Location: index.php");
        }
    }
?>
<form action="addAppointment.php" method="POST">
    <div class="mb-3">
        <label for="Email"  class="form-label">Email cím:</label>
        <input type="email" value="<?= $user?>" class="form-control" id="email" name="email_ap">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Dátum:</label>
        <input type="date" class="form-control" id="date" name="date_ap">
    </div>
    <div class="mb-3">
        <label for="time" class="form-label">Időpont:</label>
        <input type="text" class="form-control" id="time" name="time_ap">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Szolgáltatás típusa:</label>
        <select name="type_ap" id="type" class="form-select">
            <option selected>Kérem válasszon...</option>
            <?php
                foreach($types as $t){
                    echo "<option value='$t'>$t</option>";
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Időpont lefoglalása</button>
    </div>
</form>