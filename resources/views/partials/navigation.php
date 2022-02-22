<?php 
  $links = $database->selectRecords('Navigation');

  $position = '/' . Request::getUri();

?>

<div class="navbar-fixed">
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="<?= $links[0]->LinkPath ?>" class="brand-logo center">WireFrame</a>
    <a data-target="hiddenNavigation" class="sidenav-trigger">
        <i class="material-icons white-text">menu</i>
    </a>
    <ul id="visibleNavigation" class="left hide-on-med-and-down">
        <?php for($i = 1; $i < 3; $i++) : ?>
          <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
            <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
          </li>
        <?php endfor ?>

      <?php if($_SESSION['role'] === 1) : ?>
        <li>
          <a href="<?= $links[4]->LinkPath ?>"><?= $links[4]->LinkName ?></a>
        </li>
      <?php endif ?>  
    </ul>
    <ul class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['userId'])) : ?>
          <?php for($i = 5; $i < 7; $i++) : ?>
            <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
              <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
            </li>
          <?php endfor ?>
        <?php endif ?>

      <?php if(empty($_SESSION['userId'])) : ?>
          <?php for($i = 7; $i < 9; $i++) : ?>
            <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
              <a href="<?= $links[$i]->LinkPath ?>">
                <?= $links[$i]->LinkName ?>
              </a>
            </li>
          <?php endfor ?>
        <?php endif ?>

    </ul>
  </div>
</nav>
</div>

<ul class="sidenav" id="hiddenNavigation">
<?php for($i = 1; $i < 3; $i++) : ?>
  <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
    <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
  </li>
<?php endfor ?>

<?php if($_SESSION['role'] === 1) : ?>
  <li>
    <a href="<?= $links[4]->LinkPath ?>"><?= $links[4]->LinkName ?></a>
  </li>
<?php endif ?> 

<?php if(isset($_SESSION['userId'])) : ?>
  <?php for($i = 5; $i < 7; $i++) : ?>
    <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
      <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
    </li>
  <?php endfor ?>
<?php endif ?>

<?php if(empty($_SESSION['userId'])) : ?>
  <?php for($i = 7; $i < 9; $i++) : ?>
    <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
      <a href="<?= $links[$i]->LinkPath ?>">
        <?= $links[$i]->LinkName ?>
      </a>
    </li>
  <?php endfor ?>
<?php endif ?>
</ul>