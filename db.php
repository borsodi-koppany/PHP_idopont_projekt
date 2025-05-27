<?php 

class dataBase{
    private $conn;
    
    function __construct($server, $user, $password, $database){
        $this->conn = new mysqli($server, $user, $password, $database);
        if($this->conn->connect_error){
            die("connection failed" .$this->conn->connect_error);
        };
    }

    function GetAppointments(){
        $sql = "SELECT * FROM appointments";
        $result = $this->conn->query($sql);
        $appointments = [];
        while($row = $result->fetch_object()){
            $appointments[] = new appointment($row->id, $row->email, $row->date, $row->time, $row->type, $row->isApproved);
        }
        return $appointments;
    }

    function GetApprovedAppointments(){
        $sql = "SELECT * FROM appointments WHERE isApproved = 1";
        $result = $this->conn->query($sql);
        $approved = [];
        while($row = $result->fetch_object()){
            $approved[] = new appointment($row->id, $row->email, $row->date, $row->time, $row->type, $row->isApproved);
        }
        return $approved;
    }

    function ApproveAppointment($id){
        $sql = "UPDATE appointments SET isApproved = 1 WHERE id = $id";
        $this->conn->query($sql);
    }

    function AddAppointment($email, $date, $time, $type){
        $sql = "INSERT INTO appointments (email, date, time, type, isApproved) VALUES ('$email', '$date', '$time', '$type', 0)";
        $this->conn->query($sql);
    }

    function DeleteAppointment($id){
        $sql = "DELETE FROM appointments WHERE id = $id";
        $this->conn->query($sql);
    }
}