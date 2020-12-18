<?php   

class Dbconnection{
 private $server = "localhost";
 private $user ="root";
 private $pwd ="";
 private $dbname= "voting";

public function __construct(){
 
    return new mysqli($this->server, $this->user, $this->pwd, $this->dbname);

}

}

?>