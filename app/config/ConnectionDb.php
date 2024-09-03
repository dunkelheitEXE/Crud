<?php
class ConnectionDb
{
    private $host = "localhost";
    private $dbname = "CrudDb";
    private $dbuser = "root";
    private $dbpassword = "123456789";
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->dbuser, $this->dbpassword, $this->dbname);
    }

    public function testConnection() {
        try 
        {
            if($this->connection) {
                return "CONNECTION DONE SUCCESSFULLY";
            } else {
                return "ERROR TO DO CONNECTION";
            }
        }
        catch(\Throwable $th) {
            return "ERROR: " . $th->getMessage();
        }
    }
}


?>