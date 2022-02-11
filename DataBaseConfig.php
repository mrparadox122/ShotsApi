<?php

class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public function __construct()
    {

        $this->servername = 'localhost:3306';
        $this->username = 'root';
        $this->password = 'Soosle@123#';
        $this->databasename = 'login';

    }
}

?>
