<?php
require_once "../config/dbconnection.php";

class UserController extends Dbconnection
{
    private $conn;
    public function __construct()
    {
        $this->conn = parent::__construct();
    }

    public function addUser($fields, $values)
    {
        $query = "INSERT INTO users ($fields) VALUES ($values)";
        $result = $this->conn->query($query);

        return $result;
    }


    public function checkemail($email)
    {
        $verify = "SELECT email FROM users WHERE email= '$email'";
        $result = $this->conn->query($verify);
        return $result->num_rows;
    }

    public function getLenght($value){

    $checkLenght= strlen(trim($value)) ;
            return $checkLenght;
        
    }


    public function loginUser($email, $password)
    {


        $query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";

        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function addnewcandidate($fields, $values)
    {

        $query = "INSERT INTO candidate ($fields) VALUES ($values)";
        $result = $this->conn->query($query);
        return $result;
    }




    public function vote($fields, $values)
    {

        $query = "INSERT INTO votes ($fields) VALUES ($values)";
        $result = $this->conn->query($query);
        return $result;
    }

    public function fetchcandidate($type, $position)
    {
        $query = "SELECT firstname, id as can_id FROM users WHERE type ='$type' AND position= '$position'";
        $result = $this->conn->query($query);

        $candidates = [];
        while ($row = $result->fetch_assoc()) {
            $candidates[] = $row;
        }
        return $candidates;
    }

    public function checkvoter($userid)
    {

        $query = "SELECT * FROM votes WHERE user_id = '$userid' ";
        $result = $this->conn->query($query);

        return $result->num_rows;
    }
    public function fetchresult($can_id)
    {

        $query = "SELECT COUNT(*) AS result FROM votes WHERE can_id = '$can_id'";
        $result = $this->conn->query($query);
        return $result->fetch_assoc()["result"];
    }
}
