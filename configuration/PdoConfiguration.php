<?php
namespace configuration;

class PdoConfiguration
{

    private $user, $password, $database, $host, $pdo;
    protected  static $instance;



    private function __construct()
    {
        $db = parse_ini_file("files/mysql.ini") or die ("Configuration file doesnt exists");
        $this->user = $db['user'];
        $this->password = $db['password'];
        $this->database = $db['database'];
        $this->host = $db['host'];

        try {
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            die('unable to connect to database ' . $e->getMessage());
        }
        
    }


    public static function getPdoInstance()
    {
        if(static::$instance == null){
            static::$instance = new PdoConfiguration();
        }

        return static::$instance->pdo;
    }
}
