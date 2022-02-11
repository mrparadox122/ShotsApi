<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;
	
	//////
	private $host = "localhost:3306";
    private $database_name = "login";
	public $conn;
	//////
	
	
	public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where username = '" . $username . "' or email = '" . $username . "' or PhoneNumber = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['username'];
            $dbemail = $row['email'];
            $dbphonenumber = $row['PhoneNumber'];
            $dbpassword = $row['password'];
            if ($dbusername == $username || $dbemail == $username || $dbphonenumber == $username && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $fullname, $email, $username, $password, $PhoneNumber , $Dob , $Gender)
    {
        $fullname = $this->prepareData($fullname);
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
		$PhoneNumber = $this->prepareData($PhoneNumber);
        $Dob = $this->prepareData($Dob);
		$Gender = $this->prepareData($Gender);
        $this->sql =
            "INSERT INTO " . $table . " (fullname, username, password, email, PhoneNumber, Dob, Gender) VALUES ('" . $fullname . "','" . $username . "','" . $password . "','" . $email . "','" . $PhoneNumber . "','" . $Dob . "','" . $Gender . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

}

?>
