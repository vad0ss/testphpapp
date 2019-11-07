<?php
/**
 * Created by PhpStorm.
 * User: Vadims Prilepisevs
 * Date: 11/6/2019
 * Time: 6:21 PM
 */

require_once('crud.php');
require_once('auth.php');

$crud = new Crud();
$type = $_GET['type'];

// processing post requests

if($type == 'add') {

    $data = array(
        "parent_id" => $_POST['parent_id'],
        "cat_name" => $_POST['cat_name'],
        "cat_desc" => $_POST['cat_desc']
    );

    $crud->createCategory($data);
}
else if($type == 'delete'){

    $catId = $_POST['cat_id'];

    $crud->deleteCategory($catId);
}
else if($type == 'update') {

    $data = array(
        "cat_id" => $_POST['cat_id'],
        "cat_name" => $_POST['cat_name'],
        "cat_desc" => $_POST['cat_desc']
    );

    $crud->updateCategory($data);
}
else if($type == 'login') {

    $data = array(
        "user_name" => $_POST['user_name'],
        "user_password" => $_POST['user_password']
    );

    $user = $crud->getUser($data['user_name']);
    $user = mysqli_fetch_array($user, MYSQLI_ASSOC);

    $auth = new Auth($data, $user);

     if($auth->getAuth()){
         header('Location: index.php');
     } else {
         echo 'Login or password is incorrect';
     }
}


header('Location: ' . 'index.php');

