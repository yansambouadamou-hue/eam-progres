<?php
/**
 * Template principal (fallback).
 * WordPress exige ce fichier dans tout thème.
 */
get_header();
?>

<div class="page-header">
    <div class="wrap">
        <h1><?php bloginfo('name'); ?></h1>
        <?php if (get_bloginfo('description')) : ?>
            <p><?php bloginfo('description'); ?></p>
        <?php endif; ?>
    </div>
</div>

<section>
    <div class="wrap">
        <?php if (have_posts()) : ?>
            <div class="feature-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="feature-card">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="center-cta">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>Aucun contenu pour le moment.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>