<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    
    <div class="parallax-container">
        <div class="parallax">
            <img src="public/img/index-cover.jpg" />
        </div>
        <div class="container center">
            <h1 class="white-text">
                <?= empty($user_info->FirstName) ? 'Welcome!' : 'Hello ' . $user_info->FirstName . '! How are you today?'?>
            </h1>
        </div>
    </div>
    <div class="section white p-5">
      <div class="row container center">
        <h2 class="header">Welcome to WireFrame</h2>
        <p class="grey-text text-darken-3 lighten-3">
            The Developer's Blog to Keep You at the Top of Your Game.
        </p>
      </div>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="public/img/languages.jpeg" />
        </div>
    </div>
    <div class="section white p-5">
      <div class="row container">
        <h2 class="header">Stay informed!</h2>
        <p class="grey-text text-darken-3 lighten-3">
            The field of software engineering is constantly developing. (ba dum tss) With tech, frameworks, and programming best practices changing every day—even the best developers risk falling behind. 
            <br />
            <br />
            Nobody really wants to dedicate large chunks of their time to continued education. We get that. Fortunately, the internet is littered with developer blogs. And, while we here at WireFrame are anti-littering, we are definitely pro-innovation, pro-growth and pro-learning from the trials and errors of others so we don't have to waste time ourselves.
        </p>
      </div>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="public/img/dev-blog.png" />
        </div>
    </div>
    <div class="section white p-5">
      <div class="row container">
        <h2 class="header">Interested in writing?</h2>
        <p class="grey-text text-darken-3 lighten-3">
            Simply create a profile and start writing programming topics, to help future generations!
            <br />
            <br />
            Join us, and we will change and create the web together! 
            <br />
            <br />
            <a href="/register" class="btn btn-medium blue lighten-1 waves-effect waves-light">Register</a>
        </p>
      </div>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="public/img/developer.jpg" />
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>