<!DOCTYPE html>
<html>

<!-- the body section -->

<body>
    <div class="container">
        <?php
        include('includes/header.php');
        ?>

        <main>
            <h2 class="top">Error</h2>
            <p><?php echo $error; ?></p>
        </main>
        <?php
        include('includes/footer.php');
        ?>
    </div>
</body>

</html>