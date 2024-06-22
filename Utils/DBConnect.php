<?php
class DBConnect
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        require_once 'DBpassword.php';
        // 连接数据库
        $this->connection = mysqli_connect($host, $username, $password, $database, $port);

        // 检查连接是否成功
        if (mysqli_connect_errno()) {
            die('Database connection failed: ' . mysqli_connect_error());
        }else{
            mysqli_query($this->connection, "SET NAMES utf8");
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
        $this->connection = null;
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    private function __clone(){}
}

?>