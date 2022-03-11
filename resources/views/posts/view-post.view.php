<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-3">
        <h2>
            <?= $post->PostTitle ?>
        </h2>
        <p class="mb-1">
            <?= 'Written by: ' . '<u>' . $writer->FirstName . ' ' . $writer->LastName . '</u>' . ' at: ' . $post->CreatedAt ?>
        </p>
        <div class="row">
            <?php if($_SESSION['user_id'] == $post->UserId || $_SESSION['role'] == 1)  : ?>
                <a class="btn btn-small red waves-effect" href="/delete-post?id=<?= $post->PostId ?>">DELETE POST</a>
                <?php if($_SESSION['role'] != 1 || $_SESSION['user_id'] == $post->UserId) : ?>
                    <a class="btn btn-small yellow darken-2 waves-effect" href="/edit-post?id=<?= $post->PostId ?>">EDIT POST</a>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>

    <div class="container mb-3">
        <div class="container">
            <img class="responsive-img mb-3" src="public/img/covers/<?= $cover->CoverPath ?>" alt="Cover image" />
            <p class="mb-3">
                <?= $post->PostBody ?>
            </p>
            <blockquote class="mb-3">
                Tags: 
                <p class="grey-text text-darken-1">
                    <?php foreach($categories as $category) : ?>
                        #<?= $category->CategoryName ?>
                    <?php endforeach ?>
                </p>
            </blockquote>
        </div>
    </div>
    <div class="divider"></div>
    <div class="container">
        <div class="container">
            <h3 class="mb-3">Comments</h3>
            <?php require 'resources/views/partials/post-comment.php' ?>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>