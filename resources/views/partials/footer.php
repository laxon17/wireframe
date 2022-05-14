<?php
    $links = $database->selectRecords('Navigation');
?>

            <!-- <div class="preloader white">
                <div class="preloader-wrapper active big">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php if(Request::getUri() !== 'dashboard') : ?>
                <footer class="page-footer grey darken-3">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m3 l3 left-on-med-and-up center-on-small-only">
                                <h2 class="white-text flow-text">USEFUL LINKS</h2>
                                <ul class="blog-info">
                                    <?php foreach($links as $index => $link) : ?>
                                        <?php if($index < 4 || ($index > 6 && $index < 9)) : ?>
                                            <li>
                                                <a href="<?= $link->LinkPath ?>"><?= $link->LinkName ?></a>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="col s12 m6 l6 center-align">
                                <div class="row">
                                    <h2 class="flow-text">CONNECT WITH US</h2>
                                    <a target="_blank" href="resources/assets/feed.rss"><img src="https://img.icons8.com/color/48/000000/rss.png"/></a>
                                    <a target="_blank" href="https://www.facebook.com"><img src="https://img.icons8.com/color/48/000000/facebook.png"/></a>
                                    <a target="_blank" href="https://www.twitter.com"><img src="https://img.icons8.com/color/48/000000/twitter.png"/></a>
                                    <a target="_blank" href="https://www.linkedin.com"><img src="https://img.icons8.com/color/48/000000/linkedin.png"/></a>
                                    <a target="_blank" href="https://www.github.com/laxon17"><img src="https://img.icons8.com/color/48/000000/github--v1.png"/></a>
                                </div>
                                <div class="row">
                                    <div class="col s6 m6 l6 offset-s3 offset-m3 offset-l3">
                                        <h3 class="grey-text">WireFrame</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m3 l3 left-on-med-and-up center-on-small-only">
                                <h2 class="white-text flow-text">SITE ASSETS</h2>
                                <ul class="blog-info">
                                    <li>
                                        <a class="grey-text text-lighten-4" target="_blank" href="resources/assets/documentation.pdf">Documentation</a>
                                    </li>
                                    <li><a class="grey-text text-lighten-4" target="_blank" href="resources/assets/sitemap.xml">Sitemap</a></li>
                                    <li><a class="grey-text text-lighten-4" target="_blank" href="public/js/main.js">Script.js</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright grey darken-4">
                        <div class="container center">
                            Copyright &copy; WireFrame 2022. All Rights Reserved.
                        </div>
                    </div>
                </footer>
            <?php endif ?>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
        </body>
    </html>