<?php
    $links = $database->selectRecords('Navigation');
?>
    <ul id="slide-out" class="sidenav show-on-small-only grey lighten-3">
        <?php for($i = 9; $i < count($links); $i++) : ?>
            <li>
                <a href="<?= $links[$i]->LinkPath ?>">
                    <?= $links[$i]->LinkName ?>
                </a>
            </li>
        <?php endfor ?>
        <li>
            <a href="/index">Return to WireFrame</a>
        </li>
    </ul>
    <div class="row blue lighten-1 p-1 center">
        <a data-target="slide-out" class="sidenav-trigger left">
            <i class="material-icons white-text small">menu</i>
        </a>
        <b class="white-text">ADMIN PANEL v1.0.0</b>
    </div>