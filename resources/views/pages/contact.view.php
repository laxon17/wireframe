<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    
    <?php 
        $user = $database->selectFilteredRecord('Users', 'UserId', $_SESSION['user_id']);
    ?>

    <div class="container mb-5">
        <h2>
            <?= 'Hello, write us a message!' ?>
        </h2>
        <?php if(isset($_GET['success'])) : ?>
            <span class="green lighten-5 p-1 green-text text-darken-4 center">
                <?= $_GET['success'] ?>
            </span>
        <?php endif ?>
    </div>

    <div class="container">
        <div class="container">
            <div class="container center">
                <form action="/contact" method="POST" id="contactForm">
                    <div class="row">
                        <div class="col l6 pl-0">
                            <div class="input-field mb-2">
                                <input id="contactMail" name="contact_mail" type="email" value="<?= isset($user) ? $user->UserMail : '' ?>" required />
                                <label for="contactMail">E-Mail</label>
                                <?php if(isset($errors['credentials'])) : ?>
                                    <span class="red-text">
                                        <?= $errors['credentials'] ?>
                                    </span>
                                <?php else : ?>
                                    <span></span>
                                <?php endif ?>
                            </div>  
                        </div>
                        <div class="col l6 pr-0">
                            <div class="input-field mb-2">
                                <input id="messageTitle" name="message_title" type="text" />
                                <label for="messageTitle">Message Title (optional)</label>
                            </div>  
                        </div>
                    </div>
                    <div class="input-field mb-1">
                        <textarea name="message_body" class="materialize-textarea" id="messageBody" required></textarea>
                        <label for="messageBody">Write us something...</label>
                        <?php if(isset($errors['message'])) : ?>
                            <span class="red-text">
                                <?= $errors['message'] ?>
                            </span>
                        <?php else : ?>
                            <span class="red-text"></span>
                        <?php endif ?>
                    </div>
                    <div class="row mb-3 center">
                        <button class="btn btn-large blue lighten-1 waves-effect waves-light" name="send_message" id="sendButton">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>