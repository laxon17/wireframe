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
                </div>
            </div>
        </nav>
        <?php require 'admin/views/partials/content/' . $uri . '.view.php' ?>
    </div>
<?php require 'admin/views/partials/main/footer.php' ?>