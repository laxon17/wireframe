<?php if(isset($_GET['exception'])) : ?>
    <span class="p-3 right  red-text red lighten-3 text-darken-3">
        <?= $_GET['exception'] ?>
    </span>
<?php endif ?>
<h4 class="mb-3">Add or remove categories</h4>
<div class="row">
    <button id="addCategoryBtn" class="btn blue lighten-1">
        <i class="material-icons">add</i> 
    </button>
    <form action="/dashboard/modify" method="POST">
        <div id="addCategoryField" class="input-field col l6 right <?= empty($_GET['error']) ? 'hide' : '' ?>">
            <input id="addCategory" name="add_category" type="text" />
            <label for="addCategory">Add category</label>
            <button type="submit" class="btn blue lighten-1"><i class="material-icons">add</i></button>
            <?php if(isset($_GET['error'])) : ?>
                <span class="red-text">
                    <?= $_GET['error'] ?>
                </span>
            <?php endif ?>
        </div>
    </form>
</div>

<table class="highlight striped centered mb-3">
    <thead>
        <tr">
            <td class="center">CategoryId</td>
            <td class="center">Category name</td>
            <td class="center">Remove</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category) : ?>
            <tr>
                <td>
                    <?= $category->CategoryId ?>
                </td>
                <td>
                    <?= $category->CategoryName ?>
                </td>
                <td>
                    <a class="delete-category" href="/dashboard/modify?delete_category=<?= $category->CategoryId ?>">
                        <i class="material-icons red-text">close</i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>