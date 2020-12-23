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
        $query = "INSERT INTO user ($fields) VALUES ($values)";
        $result = $this->conn->query($query);

        return $result;
    }


    public function checkemail($email)
    {
        $verify = "SELECT email FROM user WHERE email= '$email'";
        $result = $this->conn->query($verify);
        return $result->num_rows;
    }


    public function loginUser($email, $password)
    {


        $query = "SELECT * FROM user WHERE email= '$email' LIMIT 1";

        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function addCandidate($fields, $values)
    {

        $query = "INSERT INTO candidate ($fields) VALUES ($values)";
        $result = $this->conn->query($query);
        return $result;
    }
}
