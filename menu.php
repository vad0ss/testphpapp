<?php
/**
 * Created by PhpStorm.
 * User: Vadims Prilepisevs
 * Date: 11/5/2019
 * Time: 2:57 PM
 */

require_once("crud.php");

class Menu {

    private $crud;

 public function __construct() {
        $this->crud = new Crud();
    }

 public function viewMenu(){

    $categories = $this->crud->getAllCategories();
    $this->buildTreeMenu($categories, 0, 0);

}

//recursive menu build function
  private function buildTreeMenu($categories, $parent_id, $childLevel) {
    if (isset($categories[$parent_id])) {
        echo "<ul>";
        foreach ($categories[$parent_id] as $value) {
            echo "<li><a href=" .
                    htmlspecialchars("/catpage.php?catedit&id=" .
                    urlencode($value['node_id'])) . '>' .
                    $value['cat_name'] . "</a>";
            $childLevel++;
            $this->buildTreeMenu($categories, $value['node_id'], $childLevel);
        }
        echo "</ul>";
    }
}

}