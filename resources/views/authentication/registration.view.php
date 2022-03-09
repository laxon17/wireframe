<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-5">
        <h1>Register</h1>
    </div>

    <div class="container mb-5">
        <div class="container">
            <div class="container">
                <form action="/register" method="POST" id="registrationForm">
                    <div class="input-field mb-3">
                        <input id="firstName" placeholder="e.g. John" name="first_name" type="text" value="<?= isset($values['firstname']) ? $values['firstname'] : '' ?>" />
                        <label for="firstName">First name</label>
                        <?php if(isset($errors['firstname'])) : ?>
                            <span class="red-text">
                                <?= $errors['firstname'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <input id="lastName" placeholder="e.g. Doe" name="last_name" type="text" value="<?= isset($values['lastname']) ? $values['lastname'] : '' ?>" />
                        <label for="lastName">Last name</label>
                        <?php if(isset($errors['lastname'])) : ?>
                            <span class="red-text">
                                <?= $errors['lastname'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <input id="userName" placeholder="e.g. johndoe" name="user_name" type="text" value="<?= isset($values['username']) ? $values['username'] : '' ?>" />
                        <label for="userName">Username</label>
                        <?php if(isset($errors['username'])) : ?>
                            <span class="red-text">
                                <?= $errors['username'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <input id="userMail" placeholder="e.g. johndoe@example.com" name="user_mail" type="email" value="<?= isset($values['usermail']) ? $values['usermail'] : '' ?>" />
                        <label for="userMail">E-Mail</label>
                        <?php if(isset($errors['usermail'])) : ?>
                            <span class="red-text">
                                <?= $errors['usermail'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <input id="password" placeholder="Min. 8 chars, one capital, one symbol! (max. - 20)" name="password" type="password" />
                        <label for="password">Password</label>
                        <?php if(isset($errors['password'])) : ?>
                            <span class="red-text">
                                <?= $errors['password'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <input id="rePassword" placeholder="Repeat password" name="re_password" type="password" />
                        <label for="rePassword">Re-enter password</label>
                        <?php if(isset($errors['re_password'])) : ?>
                            <span class="red-text">
                                <?= $errors['re_password'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="row mb-3 center">
                        <button class="btn btn-large blue lighten-1 waves-effect waves-light" name="register_user" id="registerButton">REGISTER</button>
                    </div>
                    <div class="row center">
                        Already have an account? <a href="/login" class="link">Log In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>