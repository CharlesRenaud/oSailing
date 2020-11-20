</main>

<aside class="sidebar">
  <div class="logo">oSailing</div>
  <!-- <nav class="navigation">
    <ul>
      <li class="navigation__item">
        <a href="#intro">Intro</a>
      </li>
      <li class="navigation__item">
        <a href="#articles">Articles</a>
      </li>
      <li class="navigation__item">
        <a href="#values">Les valeurs</a>
      </li>
    </ul>
  </nav> -->

<?php

$menu = wp_nav_menu([
    'theme_location' => 'home', // identifiant de l'emplacement de menu (déclaré dans functions.php)
    'container' => 'nav', // on souhaite une <nav> comme container (par défaut -> <div>)
    'container_class' => 'navigation', // on souhaite que notre container ai la classe 'navigation'
    'echo' => false // on ne souhaite pas afficher le menu (son code HTML), mais seulement le retourner
]);

// On souhaite remplacer toutes les classes "menu-item" par "navigation__item menu-item"
// https://www.php.net/manual/fr/function.str-replace.php
$menu = str_replace('menu-item', 'navigation__item', $menu);

// On affiche le menu
echo $menu;

?>
</aside>