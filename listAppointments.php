<!-- <a href="?todo=signin" class="btn btn-rpimary">Regisztráció</a> -->
<?php

require_once "db.php";
require_once "user.php";
session_start();
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$user = $_SESSION["email"] ?? "";
$appointments = [];
if ($user == "") {
    $appointments = $dbModel->GetApprovedAppointments();
    echo "<a href='?todo=signin' class='btn btn-primary'>Regisztráció</a>";
    echo "<a href='?todo=logIn' class='btn btn-primary'>Bejelentkezés</a>";
}
else{
    $appointments = $dbModel->GetUsersAppointments($user);
    echo "<a href='?todo=newAp' class='btn btn-primary'>Időpont foglalása</a>";
    echo "<a href='?todo=logOut' class='btn btn-primary'>Kijelentkezés</a>";

}
echo "<table class='table table-striped'>";
echo "<thead><tr><th>Dátum</th><th>Időpont</th><th>Ügyfél email címe</th><th>Szolgáltatás típusa</th><th>Visszaigazolva</th></tr></thead>";
echo "<tbody>";
foreach ($appointments as $ap) {
    echo "<tr>";
    echo "<td>$ap->date</td>";
    echo "<td>$ap->time</td>";
    echo "<td>$ap->email</td>";
    echo "<td>$ap->type</td>";
    echo "<td>" . ($ap->isApproved ? "Igen" : "Nem") . "</td>";
    echo "<tr>";
}
echo "</table>";
