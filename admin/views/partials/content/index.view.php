<div class="row info-cards">
    <div class="col s12 m5 l2 offset-l1 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">account_box</i>
        <p>
            <?= $users_count->Rows ?>
        </p>
        <p>Users</p>
    </div>
    <div class="col s12 m5 offset-m2 l2 offset-l2 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">speaker_notes</i>
        <p>
            <?= $posts_count->Rows ?>
        </p>
        <p>Topics</p>
    </div>
    <div class="col s12 m5 l2 offset-l2 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">comment</i>
        <p>
            <?= $comment_count->Rows ?>
        </p>
        <p>Comments</p>
    </div>  
    <div class="col s12 m5 offset-m2 l2 offset-l1 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">assessment</i>
        <p>
            <?= $categories_count->Rows ?>
        </p>
        <p>Categories</p>
    </div>
    <div class="col s12 m5 l2 offset-l2 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">get_app</i>
        <p>
            +300
        </p>
        <p>Materials</p>
    </div>
    <div class="col s12 m5 offset-m2 l2 offset-l2 stats-card">
        <i class="material-icons blue-text text-lighten-1 medium">mood</i>
        <p>
            <?= $visitor_count ?>
        </p>
        <p>Visitors</p>
    </div>

</div>
<div class="row log-visitor">
    <h4>Recently:</h4>
    <table class="highlight striped centered mb-3 responsive-table">
        <thead>
            <tr>
                <td class="center">Ip Address</td>
                <td class="center">Destination</td>
                <td class="center">Request method</td>
                <td class="center">Time</td>
            </tr>
            <tbody>
                <?php for($i = 0; $i < 10; $i++) : ?>
                    <tr>
                        <td class="center"><?= $visitors[$i][0] ?></td>
                        <td class="center"><?= $visitors[$i][1] ?></td>
                        <td class="center"><?= $visitors[$i][2] ?></td>
                        <td class="center"><?= date('d-m-Y H:i:s', $visitors[$i][3]) ?></td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </thead>
    </table>
    <a href="/log" class="btn red white-text">Full Log</a>
</div>