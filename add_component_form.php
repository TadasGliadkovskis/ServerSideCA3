<?php
require('database.php');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

$query = 'SELECT *
          FROM categories
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
    <h1>Add Component</h1>
    <form action="add_component.php" method="post" enctype="multipart/form-data" class="add_component_form">

        <label>Category:</label>
        <select name="category_ID">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Name:</label>
        <input type="input" name="name" required placeholder="Computer part name">
        <br>

        <label>List Price:</label>
        <input type="input" name="price" required placeholder="Price with decimals">
        <br>

        <label>Stock:</label>
        <input type="input" name="stock" required placeholder="Item stock">
        <br>

        <label for="file-upload">Image:</label>
        <input type="file" id="file-upload" name="image" accept="image/*" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Component" class="green-button">
        <br>
    </form>
    <p><a href=".?category_id=<?php echo $category_id ?>">View Homepage</a></p>
    <?php
    include('includes/footer.php');
    ?>