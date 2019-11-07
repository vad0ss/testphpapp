<?php
/**
 * Created by PhpStorm.
 * User: Vadims Prilepisevs
 * Date: 11/5/2019
 * Time: 1:02 PM
 */
require_once("config.php");

class DataBase {

    private $config;
    public $connect;

    public function __construct() {
        $this->config = new Config();
        $this->connect = new mysqli($this->config->dbHost,
            $this->config->dbUser,
            $this->config->dbPass,
            $this->config->dbName);
        if ($this->connect->connect_error) {
            die('Failed to connect to MySQL - ' . $this->connect->connect_error);
        }
        $this->connect->set_charset('utf8');
    }

public function dbQuery($query){

    $result = mysqli_query($this->connect, $query);
    if ($result) {
        return $result;
    } else {
        echo "Error query " . mysqli_error($this->connect);
    }

    mysqli_close($this->connect);

}


}