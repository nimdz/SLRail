<?php
class Database
{
    private $host = 'localhost'; //  MySQL host
    private $username = 'root'; // MySQL username
    private $password = ''; // MySQL password
    private $database = 'SlRail'; //  MySQL database name

    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>
