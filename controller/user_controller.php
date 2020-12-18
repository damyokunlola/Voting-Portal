<?php
require_once "../config/dbconnection.php";

class UserController extends Dbconnection{
    private $conn;
    public function __construct()
    {
        $this->conn = parent::__construct();
    }

public function addUser($fields,$values)
{
    $query="INSERT INTO user ($fields) VALUES ($values)";
     $result= $this->conn->query($query);

     return $result;
}





        public function loginUser(){



          }

}

?>  