<?php 
    $all_comments = $database->selectComments($_GET['id']);
    $parent_comments = [];
    foreach($all_comments as $comment) 
    {
        if($comment->ParentId == null) array_push($parent_comments, $comment);
    }
?>

<?php foreach($parent_comments as $parent_comment) : ?>
    <div class="row parent-comment mb-3">
        <?php if($_SESSION['role'] === 1) : ?>
            <a class="delete-comment" href="/delete-comment?comment_id=<?= $parent_comment->CommentId?>">
                <i class="material-icons red-text">close</i>
            </a>
        <?php endif ?>
        <div class="row">
            <div class="col">
                <img class="prof-pic" src="public/img/users/<?= $parent_comment->ProfilePicture ?>" alt="Profile picture" />
            </div>
            <div class="col l6">
                <a href="/profile?username=<?= $parent_comment->UserName ?>">
                    <?= $parent_comment->FullName ?>
                </a> 
                <br>
                <small>
                    <?= $parent_comment->CreatedAt ?>
                </small>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col l11 offset-l1">
                <p>
                    <?= $parent_comment->CommentBody ?>
                </p>
            </div>
        </div>
        
        <?php if(isset($_SESSION['user_id'])) : ?>
            <div class="row">
                <div class="col l11 offset-l1">
                    <div class="col">
                        <p class="reply-button">Reply</p>
                    </div>
                    <?php if($_SESSION['user_id'] == $parent_comment->UserId ) : ?>
                        <div class="col">
                            <a href="/delete-comment?comment_id=<?= $parent_comment->CommentId ?>">Delete</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="row scale-transition hide">
                <div class="col l8 offset-l4">
                    <form action="/comment" method="POST">
                        <div class="input-field">
                            <input type="text" name="comment_body" id="replyComment" />
                            <label for="replyComment">Reply to <?= $parent_comment->FullName ?></label>
                        </div>
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
                        <input type="hidden" name="post_id" value="<?= $parent_comment->PostId ?>" />
                        <input type="hidden" name="parent_id" value="<?= $parent_comment->CommentId ?>" />
                        <button type="submit" class="btn btn-small blue lighten-1 waves-effect waves-light">Reply</button>
                    </form>
                </div>
            </div>
        <?php endif ?>

        <?php 
            $reply_comments = $database->selectReplies($parent_comment->PostId, $parent_comment->CommentId);
            foreach($reply_comments as $reply_comment) :
        ?>
            <div class="row">     
                <div class="col s10 offset-s2 m10 offset-m2 l10 offset-l2 reply-comment">
                    <div class="row">
                        <div class="col l2">
                            <img class="prof-pic" src="public/img/users/<?= $reply_comment->ProfilePicture ?>" alt="Profile picture" />
                        </div>
                        <div class="col l6">
                            <a href="/profile?username=<?= $reply_comment->UserName ?>">
                                <?= $reply_comment->FullName ?>
                            </a>
                            <br>
                            <small>
                                <?= $reply_comment->CreatedAt ?>
                            </small>
                        </div>
                        <?php if($_SESSION['role'] === 1) : ?>
                            <a class="delete-reply" href="/delete-comment?comment_id=<?= $reply_comment->CommentId?>">
                                <i class="material-icons red-text">close</i>
                            </a>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col m10 offset-m2 l10 offset-l2">
                            <p>
                                <?= $reply_comment->CommentBody ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l8 offset-l2">
                            <?php if($_SESSION['user_id'] == $parent_comment->UserId || $_SESSION['user_id'] == $reply_comment->UserId) : ?>
                                <div class="col">
                                    <a href="/delete-comment?comment_id=<?= $reply_comment->CommentId ?>">Delete</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>

<div class="comment-section center">
    <?php if(empty($comments)) : ?>  
        <h5 class="mb-3">No comments found! <?= isset($_SESSION['user_id']) ? 'Be the first to comment.' : '' ?> </h5>
    <?php endif ?>
    <?php if(isset($_SESSION['user_id'])) : ?>
        <div class="row center">
            <form action="/comment" method="POST">
                <div class="input-field">
                    <textarea class="materialize-textarea" name="comment_body" id="commentBody" ></textarea>
                    <label for="commentBody">What do you think?</label>
                </div>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
                <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>" />
                <button type="submit" class="btn btn-small blue lighten-1 waves-effect waves-light">Comment</button>
            </form>
        </div>
    <?php else : ?>
        <h6 class="mb-3">Only <a href="/register">registered</a> users can comment!</h6>
    <?php endif ?>
</div>