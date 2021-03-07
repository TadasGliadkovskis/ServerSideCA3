<?php
error_reporting(0);
require_once('database.php');
$index = 0;

// Get count of components for each category
$query2 = 'SELECT c.categoryName, COUNT(co.componentID)
              FROM components co, categories c
              WHERE co.categoryID = c.categoryID
              GROUP BY c.categoryID';
$statement2 = $db->prepare($query2);
$statement2->execute();
$counts = $statement2->fetchAll();

// Get all categories
$query = 'SELECT * FROM categories
              ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Category List</h1>
    <table>

        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
                <td><?php echo $category['categoryName']; ?></td>
                <td>
                    <form action="delete_category.php" method="post" id="delete_product_form">
                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                        <input type="submit" value="Delete" class="red-button">
                    </form>
                </td>
                <td>
                    <form action="clear_category.php" method="post" id="delete_product_form">
                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                        <input type="submit" value="Clear Category" class="red-button">
                    </form>
                </td>
                <td><?php
                    $total = implode(" ", (array)$counts[$index++])[-1];
                    if ($total != null) {
                        echo $total;
                    } else {
                        echo 0;
                    }
                    ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post" id="add_category_form">

        <label>Name:</label>
        <input type="input" name="name" required placeholder="Category Name">
        <input id="add_category_button" type="submit" value="Add" class="green-button">
    </form>
    <br>
    <p><a href="index.php">View Homepage</a></p>

    <?php
    include('includes/footer.php');
    ?>