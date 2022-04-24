<?php

namespace app\database\connections;

use mysqli;

// connection class connect database with code 
class connection
{
    protected $dbHost = 'localhost';
    protected $dbUsername = 'root';
    protected $dbPassword = '';
    protected $databaseName = 'e-commerce';
    protected $dbPort = 3306;
    public mysqli $con;   // make it bublic because i wil use it in valadation and models 
    public function __construct()
    {
        // echo "hi";
        //built in class open connection 
        $this->con = new mysqli(
            $this->dbHost,
            $this->dbUsername,
            $this->dbPassword,
            $this->databaseName,
            $this->dbPort
        );

        // Check connection
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
        echo "Connected successfully";
    }
    public function __destruct()
    {
        $this->con->close();
    }
}
new connection;
