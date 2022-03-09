<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
<div class="container ms">
    <h3 class="mb-3">Take our surveys</h3>
    <table class="highlight striped" >
        <thead>
            <tr>
                <td class="center">PollId</td>
                <td class="center">Question</td>
                <td class="center">Your answer</td>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($polls)) : ?>
                <?php foreach($polls as $poll) : ?>
                    <tr>
                        <td class="center"><?= $poll->PollId ?></td>
                        <td class="center"><?= $poll->Question ?></td>
                        <td>
                            <form action="/surveys" method="post">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
                                <input type="hidden" name="poll_id" value="<?= $poll->PollId ?>" />
                                <p>
                                    <label>
                                        <input name="poll_answer" type="radio" value="Never" />
                                        <span class="black-text">Never</span>
                                    </label>
                                </p
                                ><p>
                                    <label>
                                        <input name="poll_answer" type="radio" value="Sometimes" />
                                        <span class="black-text">Sometimes</span>
                                    </label>
                                </p>
                                <p class="mb-1">
                                    <label>
                                        <input name="poll_answer" type="radio" value="Always" />
                                        <span class="black-text">Always</span>
                                    </label>
                                </p>
                                <button type="submit" class="btn btn-small blue lighten-1">SEND</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td class="center" colspan="3">No polls active!</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php require 'resources/views/partials/footer.php' ?>