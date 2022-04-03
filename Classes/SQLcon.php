<?php
require_once("./Classes/Currentuser.php");
class SQLcon
{
    private $conn = NULL;
    private $Currentuser = NULL;

    /*Construct the class SQLcon :
     * Connect to the database
     * try to catch any error
     */
    public function __construct(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'WE4A';
        $this->conn = new mysqli($servername,
            $username, $password, $db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->Currentuser = new Currentuser($this);
    }

    /**
     * @return mysqli
     */
    public function getConn() : mysqli
    {
        return $this->conn;
    }

    /**
     * @return Currentuser|null
     */
    public function getCurrentuser(): ?Currentuser
    {
        return $this->Currentuser;
    }

    /**
     * @param Currentuser|null $Currentuser
     */
    public function setCurrentuser(?Currentuser $Currentuser): void
    {
        $this->Currentuser = $Currentuser;
    }
}