<!-- the head section -->
<?php $name = filter_input(INPUT_POST, 'fullName');
$component = filter_input(INPUT_POST, 'componentName');
$phoneNo = filter_input(INPUT_POST, 'phoneNo');
$address = filter_input(INPUT_POST, 'address');
$postCode = filter_input(INPUT_POST, 'postCode');
$totalPrice = filter_input(INPUT_POST, 'passedValuePrice');
$deliveryMethod = filter_input(INPUT_POST, 'shipping');
?>

<div class="container">
      <?php
      include('includes/header.php');

      ?>
      <h1>Purchase Complete ! </h1>
      <div class="add_component_form">

            <label>Component: </label>
            <span><?php echo strtoupper($component) ?>

            </span><br>
            <label>Full Name: </label><span><?php echo strtoupper($name) ?></span> <br>
            <label>Address:</label> <span><?php echo strtoupper($address) ?> </span><br>
            <label>Price Total: </label><span><?php echo ($totalPrice) ?></span><br>
            <label>Shipping:</label><span> <?php echo ($deliveryMethod) ?> </span><br>

      </div>

      <p><a href="index.php">Homepage</a></p>
      <?php
      include('includes/footer.php');
      ?>