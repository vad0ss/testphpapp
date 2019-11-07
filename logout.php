<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 11/7/2019
 * Time: 4:24 PM
 */
session_start();
unset($_SESSION['logged_user']);
header('Location: /');