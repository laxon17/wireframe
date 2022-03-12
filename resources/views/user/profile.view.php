<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container center pt-5 mb-3">
        <h4 class="responsive-text">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user->UserId) : ?>
                <?= 'Hello, ' . $user->FirstName . '!' ?>
            <?php else : ?>
                <?= $user->FirstName . ' ' . $user->LastName ?>
            <?php endif ?>
        </h4>
    </div>

    <div class="container">
        <div class="row" id="userInfo">
            <div class="col s10 m10 l2 offset-s1 offset-m1 offset-l1 pt-2" id="profilePictureContainer">
                <div id="profileImage">
                    <img class="materialboxed" src="public/img/users/<?= $user->ProfilePicture ?>" alt="Profile picture" />
                </div>
            </div>
            <div class="col s12 m10 l6 offset-m1 offset-l2 mb-3" id="userBio">
                <b>Username:</b> <?= $user->Username ?> <br><br>
                <b>Mail:</b> <?= $user->UserMail ?> <br><br>
                <b>Joined:</b> <?= $user->CreatedAt ?> <br><br>
                <b>Role: </b> <?= $role_name->RoleName ?> <br><br>
                <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user->UserId) : ?>
                    <b>Change profile picture:</b>
                    <form action="/update-image" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col l8">
                                <div class="file-field input-field">
                                    <div class="btn btn-small blue lighten-1">
                                        <span>UPLOAD</span>
                                        <input type="file" name="image_path" id="profileImage" accept="image/png, image/jpg, image/jpeg" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col l2 pt-1">
                                <button class="btn btn-medium blue lighten-1 waves-effect" type="submit" >UPDATE</button>
                            </div>
                        </div>
                    </form>
                    <a href="/survey?user_id=<?= $_SESSION['user_id'] ?>" class="btn blue lighten-1">Take poll</a>
                <?php endif ?>
            </div>
        </div>
        
        <div class="row mb-3">
            <?php if($_SESSION['user_id'] == $user->UserId) : ?>
                <div class="col center mb-1 push-l1">
                    <a class="btn btn-large waves-effect waves-light blue lighten-1 <?= empty($posts) ? 'pulse' : '' ?>" href="/create-post">
                        <i class="material-icons">add</i>
                    </a>
                </div>
            <?php endif ?>
            <div class="col s12 <?= $_SESSION['user_id'] == $user->UserId ? 'l9 offset-l1' : 'l8 offset-l2' ?>">
                <h5 class="responsive-text"><?= $_SESSION['user_id'] == $user->UserId ? 'My' : $user->FirstName . '\'s' ?> posts</h5>
                <div class="divider mb-3"></div>
                <?php if(empty($posts)) : ?>
                    <?php if($_SESSION['user_id'] == $user->UserId) : ?>
                        <p class="pl-1">You haven't posted anything yet!</p>
                    <?php else : ?>
                        <p class="pl-1"><?= $user->FirstName ?> hasn't posted anything yet!</p>
                    <?php endif ?>
                <?php else : ?>
                    <table class="striped highlight centered">
                        <thead>
                            <tr>
                                <td class="center">PostId</td>
                                <td class="center">Post title</td>
                                <?php if($_SESSION['user_id'] == $user->UserId) : ?>
                                    <td class="center">Edit</td>
                                    <td class="center">Remove</td>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $index => $post) : ?>
                            <tr>
                                <td><?= ++$index ?></td>
                                <td>
                                    <?php if($post->Approved) : ?>
                                        <a href="/view-post?id=<?= $post->PostId ?>"><?= $post->PostTitle ?></a>
                                    <?php else : ?>
                                        <p class="grey-text text-lighten-1"><?= $post->PostTitle ?> - waiting for approval</p>
                                    <?php endif ?>
                                </td>
                                <?php if($_SESSION['user_id'] == $user->UserId) : ?>
                                    <td>
                                        <a href="/edit-post?id=<?= $post->PostId ?>">
                                            <i class="material-icons yellow-text">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/delete-post?id=<?= $post->PostId ?>">
                                            <i class="material-icons red-text">cancel</i>
                                        </a>
                                    </td>    
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php require 'resources/views/partials/footer.php' ?>