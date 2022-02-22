<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container center">
        <h1>Welcome<?= empty($_SESSION['userFirstName']) ? '!' : ', ' . $_SESSION['userFirstName'] . '!'?></h1>
    </div>
<?php require 'resources/views/partials/footer.php' ?>