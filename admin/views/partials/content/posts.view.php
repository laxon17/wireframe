<table class="highlight striped centered">
    <thead>
        <tr>
            <td class="center">PostId</td>
            <td class="center">PostTitle</td>
            <td class="center">PostAutor</td>
            <td class="center">CreatedAt</td>
            <td class="center">Approve</td>
        </tr>
    </thead>
    <tbody>
        <?php if(empty($posts)) : ?>
            <tr>
                <td colspan="5">No pending requests found!</td>
            </tr>
        <?php else : ?>
            <?php foreach($posts as $post) : ?>
                <?php 
                    $writer = $database->selectFilteredRecord('Users', 'UserId', $post->UserId);    
                ?>
                <tr>
                    <td><?= $post->PostId ?></td>
                    <td><?= $post->PostTitle ?></td>
                    <td><?= $writer->Username ?></td>
                    <td><?= $post->CreatedAt ?></td>
                    <td>
                        <i class="white approve-post material-icons green-text">check</i>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>