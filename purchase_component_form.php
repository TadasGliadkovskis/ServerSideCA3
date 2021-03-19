<?php
require('database.php');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
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
       <h1>Details</h1>
       <form action="purchase_component.php" method="post" enctype="multipart/form-data" class="add_component_form">
              <input type="hidden" name="component_id" value="<?php echo $components['componentID']; ?>">
              <input type="hidden" name="componentName" value="<?php echo $components['name']; ?>">


              <?php if ($components['image'] != "") { ?>
                     <p><img id="purchase-picture" src="image_uploads/<?php echo $components['image']; ?>" height="300" /></p>
              <?php } ?>

              <label>Component Name:</label>
              <p class="product_info"><?php echo $components['name']; ?> </p>

              <div>
                     <label id="label_checkMark" for="fullName">Full Name: </label>
                     <input type="input" id="fullName" name="fullName" required onkeyup="validate_name()">
                     <p></p>
              </div>
              <br>

              <div>
                     <label id="label_checkMark2" for="phoneNo">Phone No: </label>
                     <input type="input" id="phoneNo" name="phoneNo" required onkeyup="validate_phone()">
                     <br>
              </div>

              <div>
                     <label id="label_checkMark3" for="address">Address: </label>
                     <input type="input" id="address" name="address" required size="50%" />
                     <br><br>
              </div>

              <div>
                     <label id="label_checkMark4" for="postCode">Post Code: </label>
                     <input type="input" id="postCode" name="postCode" required onkeyup="validate_postcode()">
                     <br>
              </div>

              <div>
                     <label>Price:</label>
                     <p class="product_info"><?php echo ('€' . $components['price']); ?></p>
              </div>

              <label>Shipping Method:</label>
              <input type="radio" id="priority" name="shipping" value="Priority" onclick="findTotal(10,<?php echo $components['price'] ?>)" required>
              <label for="priority">Priority Shipping: €10 </label>
              <br>

              <label></label>
              <input type="radio" id="free" name="shipping" value="Free" onclick="findTotal(0,<?php echo $components['price'] ?>)">
              <label for="free">Free Shipping</label>
              <br>

              <label>Total: </label>
              <p id="totalPrice" class="product_info" name="total"><?php echo ('€' . $components['price']); ?></p>

              <label>&nbsp;</label>
              <input type="submit" value="Purchase" class="green-button" id="submit">
              <br>

              <input type="hidden" id="passedValuePrice" name="passedValuePrice" value="findTotal(<?php echo $components['price']; ?>)">
       </form>

       <!-- <script src="validation.js"></script> -->


       <p><a href=".?category_id=<?php echo $category_id ?>">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>