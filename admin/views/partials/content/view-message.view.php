<?php
    $uri = substr(Request::getUri(), strpos(Request::getUri(), '/') + 1, strlen(Request::getUri()));
?>
<?php require 'admin/views/partials/main/head.php' ?>
    <?php require 'admin/views/partials/main/sidenav.php' ?>
    <div class="container">
        <nav class="mb-3">
            <div class="nav-wrapper blue lighten-1 pl-1">
                <div class="col s12">
                    <a href="/dashboard/index" class="breadcrumb">Dashboard</a>
                    <a href="/dashboard/<?= $uri ?>" class="breadcrumb page-name">
                        <?= $uri ?>
                    </a>
                    <span class="breadcrumb page-name">
                        <?= $message->MessageTitle ?>
                    </span>
                </div>
            </div>
        </nav>
        <a href="/dashboard/messages" class="btn blue">BACK</a>
        <a href="/dashboard/messages?delete_message=<?= $_GET['view_message'] ?>" class="btn red">DELETE</a>
        <h4>
            Title: <?= $message->MessageTitle ?>
        </h4>
        <p class="mb-3 pl-1">
            <?= $message->MessageBody ?>
        </p>
        <small>
            SentAt: <?= $message->CreatedAt ?>, by <?= $message->SenderMail ?>
        </small>
    </div>
<?php require 'admin/views/partials/main/footer.php' ?>