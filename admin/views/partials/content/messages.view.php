<table class="highlight centered mb-3 responsive-table">
        <thead>
            <tr>
                <td class="center">MessageId</td>
                <td class="center">Subject</td>
                <td class="center">From</td>
                <td class="center">Received At</td>
                <td class="center">Delete</td>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($messages)) : ?>
                <?php foreach($messages as $message) : ?>
                    <tr class="<?= $message->HasRead ? 'grey lighten-2' : 'green lighten-5' ?>">
                        <td>
                            <?= $message->MessageId ?>
                        </td>
                        <td>
                            <a href="/dashboard/messages?view_message=<?= $message->MessageId ?>">
                                <?= $message->MessageTitle ?>
                            </a>
                        </td>
                        <td>
                            <?= $message->SenderMail ?>
                        </td>
                        <td>
                            <?= $message->CreatedAt ?>
                        </td>
                        <td>
                            <a href="/dashboard/messages?delete_message=<?= $message->MessageId ?>">
                                <i class="material-icons red-text">close</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No messages found!</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <?php if(!empty($messages)) : ?>
        <a href="/dashboard/messages?delete_all=1" class="btn red">
            EMPTY INBOX
        </a>
    <?php endif ?>
