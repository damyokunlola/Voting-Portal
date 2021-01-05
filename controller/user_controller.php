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


    public function vote($fields, $values){

        $query= "INSERT INTO votes ($fields) VALUES ($values)";
        $result = $this->conn->query($query);
        return $result;
    }

    public function voteresult(){

        
    }
}
