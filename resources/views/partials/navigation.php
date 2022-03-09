<?php 

  $links = $database->selectRecords('Navigation');

  $position = '/' . Request::getUri();

  if(isset($_SESSION['user_id'])) $user_info = $database->selectUser($_SESSION['user_id']);
  
?>

<div class="navbar-fixed">
  <nav class="blue lighten-1">
    <div class="nav-wrapper container">
      <a href="<?= $links[0]->LinkPath ?>" class="brand-logo center">WireFrame</a>
      <a data-target="hiddenNavigation" class="sidenav-trigger">
        <i class="material-icons white-text">menu</i>
      </a>
      <ul id="visibleNavigation" class="left hide-on-med-and-down">
        <?php for($i = 1; $i < 4; $i++) : ?>
          <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
            <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
          </li>
        <?php endfor ?>  
      </ul>
      <ul class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] === 1) : ?>
          <li>
            <a href="<?= $links[4]->LinkPath ?>"><?= $links[4]->LinkName ?></a>
          </li>
        <?php endif ?>
        <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="<?= $position === $links[5]->LinkPath && $_SESSION['username'] === $_GET['username'] ? 'active' : '' ?>">
            <a href="<?= $links[5]->LinkPath . '?username=' . $_SESSION['username'] ?>"><?= $links[5]->LinkName ?></a>
          </li>
          <li class="<?= $position === $links[6]->LinkPath ? 'active' : '' ?>">
            <a href="<?= $links[6]->LinkPath ?>"><?= $links[6]->LinkName ?></a>
          </li>
        <?php endif ?>

        <?php if(empty($_SESSION['user_id'])) : ?>
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

<ul id="hiddenNavigation" class="sidenav">
  <?php if(isset($_SESSION['user_id'])) : ?>
    <li>
      <div class="user-view">
        <div class="background">
          <img src="public/img/cover.jpg" />
        </div>
        <a href="#user"><img class="circle" src="public/img/users/<?= $user_info->ProfilePicture ?>"></a>
        <a href="#name"><span class="white-text name"><?= $user_info->FirstName . ' ' . $user_info->LastName ?></span></a>
        <a href="#email"><span class="white-text email"><?= $user_info->UserMail ?></span></a>
      </div>
    </li>
  <?php endif ?>
  <?php for($i = 1; $i < 4; $i++) : ?>
    <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
      <a href="<?= $links[$i]->LinkPath ?>"><?= $links[$i]->LinkName ?></a>
    </li>
  <?php endfor ?>

  <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] === 1) : ?>
    <li>
      <a href="<?= $links[4]->LinkPath ?>"><?= $links[4]->LinkName ?></a>
    </li>
  <?php endif ?> 

  <?php if(isset($_SESSION['user_id'])) : ?>
    <li class="<?= $position === $links[5]->LinkPath && $_SESSION['username'] === $_GET['username'] ? 'active' : '' ?>">
      <a href="<?= $links[5]->LinkPath . '?username=' . $_SESSION['username'] ?>"><?= $links[5]->LinkName ?></a>
    </li>
    <li class="<?= $position === $links[6]->LinkPath ? 'active' : '' ?>">
      <a href="<?= $links[6]->LinkPath ?>"><?= $links[6]->LinkName ?></a>
    </li>
  <?php endif ?>
  
  <?php if(empty($_SESSION['user_id'])) : ?>
    <?php for($i = 7; $i < 9; $i++) : ?>
      <li class="<?= $position === $links[$i]->LinkPath ? 'active' : '' ?>">
        <a href="<?= $links[$i]->LinkPath ?>">
          <?= $links[$i]->LinkName ?>
        </a>
      </li>
    <?php endfor ?>
  <?php endif ?>
  </ul>