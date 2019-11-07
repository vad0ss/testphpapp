<?php
/**
 * Created by PhpStorm.
 * User: Vadims Prilepisevs
 * Date: 11/5/2019
 * Time: 1:01 PM
 */

require_once("menu.php");

if(isset($_SESSION['logged_user'])) {
    $menu = new menu();
}
else {
    header('Location: login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/style.css" rel="stylesheet" />
</head>

<body>

<div class="logoff">
    <a href = "logout.php">Logoff</a>
</div>

<div class="container">
    <div class="treemenu_block">
        <ul class="treemenu"><?php $menu->viewMenu(); ?></ul>
    </div>
</div>

<div class="container">

  <div id="addForm">
    <form action="/actions.php?type=add" method="post">

        <div class="field">
            <label><strong>Add Root Category</strong></label>
        </div>

        <div class="field">
            <label>Category name:</label>
            <div class="input">
                <input type = "text" name="cat_name" value = "">
            </div>
        </div>

        <div class="field">
            <label>Category description:</label>
            <div class="input">
                <textarea name="cat_desc" rows = "5" colls="20"></textarea>
            </div>
        </div>

        <input type = "hidden" name="parent_id" value = "0">

        <div class="submit">
             <button type="submit">Add Category</button>
        </div>
    </form>
  </div>
</div>

</body>
