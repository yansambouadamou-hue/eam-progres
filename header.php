<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="nav-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <span class="logo-mark">
                <svg viewBox="0 0 24 24"><path d="M12 3v18M8 8c2 3 4 3 8 0M8 14c2 3 4 3 8 0" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-width="1.8"/></svg>
            </span>
            <span class="logo-text">
                <strong>EAM PROGRÈS</strong>
                <small>NIAMEY — NIGER</small>
            </span>
        </a>
        <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-links',
                'menu_id'        => 'navLinks',
                'fallback_cb'    => false,
            ]);
        } else {
            echo '<ul class="nav-links" id="navLinks">';
            echo '<li><a href="' . esc_url(home_url('/')) . '">Accueil</a></li>';
            echo '</ul>';
        }
        ?>
    </div>
</header>

<main>