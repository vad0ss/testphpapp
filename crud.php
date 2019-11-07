<?php
/**
 * Created by PhpStorm.
 * User: Vadims Prilepisevs
 * Date: 11/6/2019
 * Time: 6:08 PM
 */
session_start();
require_once("database.php");

// processing CRUD requests Class

class Crud {

    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function createCategory($data) {

        $cat_parent_id = $this->db->connect->real_escape_string($data['parent_id']);
        $cat_name = $this->db->connect->real_escape_string($data['cat_name']);
        $cat_desc = $this->db->connect->real_escape_string($data['cat_desc']);

        $query = "INSERT INTO `categories` (parent_id, cat_name, cat_desc) 
              VALUES('$cat_parent_id', '$cat_name', '$cat_desc')";

        $this->db->dbQuery($query);

    }

    public function readCategory($catId) {

        $catId = $this->db->connect->real_escape_string($catId);

        $query = "SELECT * from `categories` WHERE `node_id` = '$catId'";

        return $this->db->dbQuery($query);

    }

    public function updateCategory($data) {

        $catId = $this->db->connect->real_escape_string($data['cat_id']);
        $cat_name = $this->db->connect->real_escape_string($data['cat_name']);
        $cat_desc = $this->db->connect->real_escape_string($data['cat_desc']);

        $query = "UPDATE `categories` 
              SET `cat_name` = '$cat_name',
              `cat_desc` = '$cat_desc'
              WHERE `node_id` = '$catId'";

        $this->db->dbQuery($query);

    }

    public function deleteCategory($catId){

        $catId = $this->db->connect->real_escape_string($catId);
        $query = "DELETE FROM `categories` WHERE `node_id`='$catId'";

        $this->db->dbQuery($query);
    }

    public function getAllCategories(){
        $query = "SELECT * from `categories`";
        $selectAll = $this->db->dbQuery($query);

        $categories = array();
        foreach ($selectAll as $value) {
            $categories[$value['parent_id']][] = $value;
        }

        return $categories;
    }

    public function getUser($username){

        $username = $this->db->connect->real_escape_string($username);
        $query = "SELECT * from `users` WHERE `user_name` = '$username'";

        return $this->db->dbQuery($query);

    }

}