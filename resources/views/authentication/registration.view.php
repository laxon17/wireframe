<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-5">
        <h1>Register</h1>
    </div>

    <div class="container">
        <div class="container">
            <div class="container">
                <form action="/register" method="POST">
                    <div class="input-field mb-3">
                        <input id="fullName" placeholder="e.g. John Doe" name="full_name" type="text" />
                        <label for="fullName">Full name</label>
                        <span></span>
                    </div>
                    <div class="input-field mb-3">
                        <input id="userName" placeholder="e.g. johndoe" name="user_name" type="text" />
                        <label for="userName">Username</label>
                        <span></span>
                    </div>
                    <div class="input-field mb-3">
                        <input id="userMail" placeholder="e.g. johndoe@example.com" name="user_mail" type="email" />
                        <label for="userMail">E-Mail</label>
                        <span></span>
                    </div>
                    <div class="input-field mb-3">
                        <input id="password" placeholder="Atleast 8 characters, one capital, one special character!" name="password" type="password" />
                        <label for="password">Password</label>
                        <span></span>
                    </div>
                    <div class="input-field mb-3">
                        <input id="rePassword" placeholder="Repeat password" name="re_password" type="text" />
                        <label for="rePassword">Re-enter password</label>
                        <span></span>
                    </div>
                    <div class="input-field mb-3 center">
                        <button class="btn btn-large blue lighten-1" name="register_user" id="registerButton">REGISTER</button>
                    </div>
                    <div class="row center">
                        Already have an account? <a href="/" class="link">Log In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require 'resources/views/partials/footer.php' ?>