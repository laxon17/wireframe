<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-5">
        <h1>Log In</h1>
    </div>

    <div class="container">
        <div class="container">
            <div class="container">
                <form action="/login" method="POST" id="loginForm">
                    <div class="input-field mb-3">
                        <input id="userId" placeholder="Type here ..." name="user_id" type="text" value="<?= !empty($errors['password']) ? $values['credentials'] : '' ?>" />
                        <label for="userId">Username or E-mail</label>
                        <?php if(isset($errors['credentials'])) : ?>
                            <span class="red-text">
                                <?= $errors['credentials'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>  
                    <div class="input-field mb-1">
                        <input id="userPassword" placeholder="Enter your password ..." name="user_password" type="password" />
                        <label for="userPassword">Password</label>
                        <?php if(isset($errors['password'])) : ?>
                            <span class="red-text">
                                <?= $errors['password'] ?>
                            </span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="row left-align mb-3 grey-text text-lighten-1">
                        Forgot your password? <a href="/register" class="link">Reset</a>
                    </div>
                    <div class="row mb-3 center">
                        <button class="btn btn-large blue lighten-1 waves-effect waves-light" name="login_user" id="loginButton">Log In</button>
                    </div>
                    <div class="row center">
                        Don't have an account? <a href="/register" class="link">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>