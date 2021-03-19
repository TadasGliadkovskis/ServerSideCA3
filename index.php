<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
  $category_id = filter_input(
    INPUT_GET,
    'category_id',
    FILTER_VALIDATE_INT
  );
  if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
  }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get components for selected category
$querycomponents = "SELECT * FROM components
WHERE categoryID = :category_id
ORDER BY componentID";
$statement3 = $db->prepare($querycomponents);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$components = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
  <?php
  include('includes/header.php');
  ?>
  <h1>Components</h1>

  <?php
  include('includes/sidebar.php');
  ?>
  <section>
    <!-- display a table of components -->
    <h2><?php echo $category_name; ?></h2>
    <table>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Delete</th>
        <th>Edit</th>
        <th>Buy</th>
      </tr>
      <?php foreach ($components as $component) : ?>
        <tr>
          <td><img src="image_uploads/<?php echo $component['image']; ?>" width="100px" height="100px" /></td>
          <td><?php echo $component['name']; ?></td>
          <td><?php echo $component['price']; ?></td>
          <td><?php echo $component['stock']; ?></td>
          <td>
            <form action="delete_component.php" method="post">
              <input type="hidden" name="component_id" value="<?php echo $component['componentID']; ?>">
              <input type="hidden" name="category_id" value="<?php echo $component['categoryID']; ?>">
              <input type="submit" value="Delete" class="red-button">
            </form>
          </td>
          <td>
            <form action="edit_component_form.php" method="post">
              <input type="hidden" name="component_id" value="<?php echo $component['componentID']; ?>">
              <input type="hidden" name="category_id" value="<?php echo $component['categoryID']; ?>">
              <input type="submit" value="Edit" class="blue-button">
            </form>
          </td>
          <td>
            <form action="purchase_component_form.php" method="post">
              <input type="hidden" name="component_id" value="<?php echo $component['componentID']; ?>">
              <input type="hidden" name="category_id" value="<?php echo $component['categoryID']; ?>">
              <input type="submit" value="Buy" class="green-button">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <p><a href="add_component_form.php" class="green-button">Add Component</a></p>

    <p><a href="category_list.php" class="purple-button">Manage Categories</a></p>
  </section>
  <?php
  include('includes/footer.php');
  ?>