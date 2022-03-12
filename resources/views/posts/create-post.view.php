<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-3">
        <h2>
            <?= 'Create post' ?>
        </h2>
    </div>

    <div class="container">
        <div class="container">
            <div class="container">
                <form action="/create-post" method="POST" enctype="multipart/form-data">
                    <div class="input-field mb-3">
                        <input type="text" placeholder="CSS Grid system..." id="postTitle" value="<?= $values['title'] ?>" name="post_title" required />
                        <label for="postTitle">Title</label>
                        <?php if(isset($errors['title'])) : ?>
                            <span class="red-text"><?= $errors['title'] ?></span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field mb-3">
                        <select id="categorySelect" name="category_select[]" multiple>
                            <option value="0" disabled selected>Categories:</option>
                            <?php foreach($categories as $category) : ?>
                                <option class="blue-text"  value="<?= $category->CategoryId ?>"><?= $category->CategoryName ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="categorySelect">Category</label>
                        <?php if(isset($errors['category'])) : ?>
                            <span class="red-text"><?= $errors['category'] ?></span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="input-field">
                        <textarea id="textarea1" name="post_body" placeholder="Write something..." class="materialize-textarea" required><?= $values['body'] ?></textarea>
                        <label for="textarea1">Post body</label>
                        <?php if(isset($errors['body'])) : ?>
                            <span class="red-text"><?= $errors['body'] ?></span>
                        <?php else : ?>
                            <span></span>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn blue lighten-1 mr-1">
                                <span>Image</span>
                                <input type="file" name="image_path" id="coverImage" accept="image/png, image/jpg, image/jpeg" />
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" type="text">
                            </div>
                            <p class="pt-1">Upload cover image &#40;important&#41;</p>
                            <?php if(isset($errors['image'])) : ?>
                                <span class="red-text">
                                    <?= $errors['image'] ?>
                                </span>
                            <?php else : ?>
                                <span></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row center">
                        <button type="submit" class="btn btn-large blue lighten-1">CREATE POST</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('textarea1')
    </script>
<?php require 'resources/views/partials/footer.php' ?>