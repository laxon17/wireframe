<?php require 'resources/views/partials/head.php' ?>
    <?php require 'resources/views/partials/navigation.php' ?>
    <div class="container mb-5">
        <h1>Posts</h1>
    </div>
    <div class="container center">
        <div class="container center">
            <div class="row center">
                <div class="input-field col s12 m11 offset-m1 l11 offset-l1">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="searchPosts" name="search_posts" />
                    <label for="searchPosts">Search for post</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m2 offset-m1 l2 offset-l1 mb-3">
            <p class="flow-text mb-1">Categories</p>
            <form>
                <ul class="mb-3">
                    <?php foreach($categories as $category) : ?>
                        <li>
                            <label>
                                <input type="checkbox" class="categories" value="<?= $category->CategoryId ?>" />
                                <span><?= $category->CategoryName ?></span>
                            </label>
                        </li>
                        
                    <?php endforeach ?>
                </ul>
            </form>
        </div>
        <div class="col s12 m2 push-m7 l2 push-l7 mb-3">
            <p class="flow-text mb-1">Latest</p>
            <ul>
                <?php if(!empty($posts)) : ?>
                    <?php foreach($recent_posts as $recent_post) : ?>
                        <li class="recent-post">
                            <a href="/view-post?id=<?= $recent_post->PostId ?>">
                                <?= $recent_post->PostTitle ?>
                            </a>
                            <br/>
                            <p>
                                <?= $recent_post->CreatedAt ?>
                            </p>
                        </li>
                    <?php endforeach ?>
                <?php else : ?>
                    <p class="grey-text">No posts added...</p>
                <?php endif ?>
            </ul>
        </div>
        <div class="col s12 m7 pull-m2 l7 pull-l2">
            <table class="striped highlight mb-3">
                <tbody id="postContainer">
                    <!-- Content injected through JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <div class="row">
                <ul class="pagination" id="paginationContainer">
                    <!-- Injected through JavaScript -->
                </ul>
            </div>
        </div>
    </div>
    
    
<?php require 'resources/views/partials/footer.php' ?>