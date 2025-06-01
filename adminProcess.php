<?php

require_once "db.php";
$dbModel = new dataBase("localhost", "root", "", "idopont_php");
$appointments = $dbModel->GetAppointments();

foreach ($appointments as $a) {
    echo "
        <tr>
            <td>$a->id</td>
            <td>$a->email</td>
            <td>$a->date</td>
            <td>".explode(" ",$a->time)[0]."</td>
            <td>$a->type</a>
            <td>" . ($a->isApproved == 0 ? "<a href='?todo=approve&id=$a->id' class='btn btn-success'>Visszaigazolás</a>" : "Visszaigazolva") . "</td>
            <td><a href='?todo=cancel&id=$a->id' class='btn btn-danger'>Lemondás</a></td>
        </tr>
        ";
}
