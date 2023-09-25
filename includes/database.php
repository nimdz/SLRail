<?php
class Database
{
    private $host = 'localhost'; // Replace with your MySQL host
    private $username = 'root'; // Replace with your MySQL username
    private $password = ''; // Replace with your MySQL password
    private $database = 'SlRail'; // Replace with your MySQL database name

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
