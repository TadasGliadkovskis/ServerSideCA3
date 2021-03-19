<?php
require('database.php');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$query2 = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement2 = $db->prepare($query2);
$statement2->execute();
$categories = $statement2->fetchAll();

$component_id = filter_input(INPUT_POST, 'component_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM components
          WHERE componentID = :component_id';
$statement = $db->prepare($query);
$statement->bindValue(':component_id', $component_id);
$statement->execute();
$components = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>
<!-- the head section -->
<div class="container">
       <?php
       include('includes/header.php');

       ?>
       <h1>Edit Product</h1>
       <form action="edit_component.php" method="post" enctype="multipart/form-data" class="add_component_form">
              <input type="hidden" name="original_image" value="<?php echo $components['image']; ?>" />
              <input type="hidden" name="component_id" value="<?php echo $components['componentID']; ?>">

              <label>Category:</label>
              <select name="category_id">
                     <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>">
                                   <?php echo $category['categoryName']; ?>
                            </option>
                     <?php endforeach; ?>
              </select>
              <br>

              <label>Name:</label>
              <input type="input" name="name" value="<?php echo $components['name']; ?>" required placeholder="Computer part name">
              <br>

              <label>List Price:</label>
              <input type="input" name="price" value="<?php echo $components['price']; ?>" required placeholder="Price with decimals">
              <br>

              <label>Stock:</label>
              <input type="input" name="stock" value="<?php echo $components['stock']; ?>" required placeholder="Item stock">
              <br>

              <label>Image:</label>
              <input type="file" name="image" accept="image/*" />
              <br>
              <?php if ($components['image'] != "") { ?>
                     <p><img src="image_uploads/<?php echo $components['image']; ?>" height="150" /></p>
              <?php } ?>

              <label>&nbsp;</label>
              <input type="submit" value="Save Changes" class="green-button">
              <br>
       </form>
       <p><a href=".?category_id=<?php echo $category_id ?>">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>