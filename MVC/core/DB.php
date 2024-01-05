<?php
class DB
{
    public $con;
    protected $servername = "127.0.0.1:3307";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "duan1";

    function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}
