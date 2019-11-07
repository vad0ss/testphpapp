<?php
/**
 * Created by PhpStorm.
 * User: grwes
 * Date: 11/5/2019
 * Time: 5:11 PM
 */

require_once("crud.php");
require_once("menu.php");

if(isset($_SESSION['logged_user'])) {
    $crud = new Crud();
    $menu = new Menu();
    $catId = $_GET['id'];
    $category = $crud->readCategory($catId);
    $data = mysqli_fetch_array($category, MYSQLI_ASSOC);
}
else {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit <?php echo $data['cat_name']; ?></title>
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
        <form action="/actions.php?type=update" method="post">

            <div class="field">
                <label><strong>Add Child Category</strong></label>
            </div>

            <div class="field">
                <label>Category name:</label>
                <div class="input">
                    <input type = "text" name="cat_name" value = "<?php echo $data['cat_name']; ?>">
                </div>
            </div>

            <div class="field">
                <label>Category description:</label>
                <div class="input">
                    <textarea name="cat_desc" rows = "5" colls="20"><?php echo $data['cat_desc']; ?></textarea>
                </div>
            </div>

            <input type = "hidden" name="cat_id" value = "<?php echo $data['node_id']; ?>">

            <div class="submit">
                <button type="submit">Update Category</button>
            </div>
        </form>
    </div>
</div>

<div id="addchildForm">
    <form action="/addchildpage.php" method="post">
       <input type = "hidden" name="cat_id" value = "<?php echo $data['node_id']; ?>">
        <div class="submit">
          <button type="submit">Add Child Category</button>
        </div>
    </form>
</div>

<div id="removeForm">
<form action="/actions.php?type=delete" method="post">
    <input type = "hidden" name="cat_id" value = "<?php echo $data['node_id']; ?>">

    <div class="submit">
        <button type="submit">Remove this Category</button>
    </div>
</form>
</div>

</body>



