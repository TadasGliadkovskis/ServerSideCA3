<?php
require_once('database.php');

// Get IDs
$component_id = filter_input(INPUT_POST, 'component_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($component_id != false && $category_id != false) {
    $query = "DELETE FROM components
              WHERE componentID = :component_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':component_id', $component_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
