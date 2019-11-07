<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 11/7/2019
 * Time: 4:51 PM
 */

class Auth {

    private $postData;
    private $dbData;

    public function __construct($postData, $dbData) {
        $this->postData = $postData;
        $this->dbData = $dbData;
    }

    public function getAuth(){

        if($this->userCheck() && $this->passwordCheck()) {
            $this->message = $this->dbData['user_name'];
            // set authorized user session
            $_SESSION['logged_user'] = $this->dbData['user_id'];
            return true;
        } else {
            return false;
        }
    }

    private function userCheck(){

        if($this->dbData['user_name'] == $this->postData['user_name']) {
            return true;
        } else return false;

    }

    private function passwordCheck() {

        //the password in the database is stored as a bcrypt hash
        if (password_verify($this->postData['user_password'], $this->dbData['user_password'])) {
            return true;
        } else return false;

    }

}