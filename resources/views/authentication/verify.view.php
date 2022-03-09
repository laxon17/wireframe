<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container">
        <div class="container verify-container center">
            <?php if(isset($token)) : ?>
                <img class="reponsive-img" src="public/img/check.png" alt="Check sign" />
                <h3>Thank you for your registration!</h3>
                <h4>Your account has been validated!</h4>
            <?php else : ?>
                <img class="reponsive-img" src="public/img/waiting.gif" alt="Loader sign" />
                <h3>Thank you for your registration!</h3>
                <h4>Please, check your email for the verification token!</h4>
            <?php endif ?>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>