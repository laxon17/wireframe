<?php 
  $links = $database->selectRecords('Navigation');

  $position = Request::getUri();
?>


<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="/" class="brand-logo center">WireFrame</a>
    <a data-target="hiddenNavigation" class="sidenav-trigger">
        <i class="material-icons white-text">menu</i>
    </a>
    <ul id="visibleNavigation" class="left hide-on-med-and-down">
      <li><a href="/">Home</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/author">Author</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">
      <li><a href="/login">Log In</a></li>
      <li><a href="/register">Register</a></li>
    </ul>
  </div>
</nav>

<ul class="sidenav" id="hiddenNavigation">
  <li><a href="sass.html">Sass</a></li>
  <li><a href="badges.html">Components</a></li>
  <li><a href="collapsible.html">Javascript</a></li>
  <li><a href="mobile.html">Mobile</a></li>
  <li><a href="/">Log In</a></li>
  <li><a href="/">Register</a></li>
</ul> 