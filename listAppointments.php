<?php

require_once "db.php";
require_once "user.php";
session_start();
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$user = $_SESSION["email"] ?? "";
$appointments = [];
echo "<h1>Gömbi's barbershop</h1>";
if ($user == "") {
    $appointments = $dbModel->GetApprovedAppointments();
    echo "<a href='?todo=signin' class='btn btn-primary m-1'>Regisztráció</a>";
    echo "<a href='?todo=logIn' class='btn btn-primary m-1'>Bejelentkezés</a>";
}
else{
    $appointments = $dbModel->GetUsersAppointments($user);
    echo "<a href='?todo=newAp' class='btn btn-primary m-1'>Időpont foglalása</a>";
    echo "<a href='?todo=logOut' class='btn btn-primary m-1'>Kijelentkezés</a>";
    echo "<a href='?todo=deleteUser&email=$user' class='btn btn-danger'>Fiók törlése</a>";

}
echo "<h3>Lefoglalt időpontok</h3>";
if(count($appointments) == 0) echo "<h4>Még nincs lefoglalt időpont!</h4>";
else{
echo "<table class='table table-striped'>";
echo "<thead><tr><th>Dátum</th><th>Időpont</th><th>Ügyfél email címe</th><th>Szolgáltatás típusa</th><th>Visszaigazolva</th></tr></thead>";
echo "<tbody>";
foreach ($appointments as $ap) {
    echo "<tr>";
    echo "<td>".explode(" ", $ap->date)[0]."</td>";
    echo "<td>$ap->time</td>";
    echo "<td>$ap->email</td>";
    echo "<td>$ap->type</td>";
    echo "<td>" . ($ap->isApproved ? "Igen" : "Nem") . "</td>";
    echo "<tr>";
}
echo "</tbody>";
echo "</table>";
}