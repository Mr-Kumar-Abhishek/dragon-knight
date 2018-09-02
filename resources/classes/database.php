<?php

class Database
{
    private $username = 'root'; // Database username
    private $password = 'DesireeDB12!'; // Database password
    private $database = 'dk'; // Database name
    private $server = 'localhost'; // Server for the database, default is localhost
    protected $instance; // Instance of the database to get passed around
    public $prefix = ''; // Prefix for table names. If blank, no prefix will be used.

    public function __construct()
    {
        $dsn = 'mysql:host='.$this->server.';dbname='.$this->database;
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
        ];
        
        $this->instance = new PDO($dsn, $this->username, $this->password, $opt);
    }

    public function pre($name)
    {
        return empty($this->prefix) ? $name : $this->prefix.'_'.$name;
    }

    public function ins()
    {
        return $this->instance;
    }
}