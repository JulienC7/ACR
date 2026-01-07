<?php

/**
 * Navigation template part for acr-theme
 */
?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
        )
    );
    ?>
</nav>