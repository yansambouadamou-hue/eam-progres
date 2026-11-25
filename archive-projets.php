<?php get_header(); ?>

<div class="page-header">
    <div class="wrap">
        <h1>Projets & Références</h1>
        <p>Découvrez l'ensemble des interventions d'EAM Progrès au Niger.</p>
    </div>
</div>

<section>
    <div class="wrap">
        <?php if (have_posts()) : ?>
            <div class="ledger">
                <?php while (have_posts()) : the_post();
                    $periode      = get_post_meta(get_the_ID(), '_periode', true);
                    $localisation = get_post_meta(get_the_ID(), '_localisation', true);
                    $partenaire   = get_post_meta(get_the_ID(), '_partenaire_texte', true);
                ?>
                    <div class="entry">
                        <span class="num">N°<?php echo esc_html(get_the_ID()); ?></span>
                        <span class="period"><?php echo esc_html($periode); ?></span>
                        <div class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <span class="loc"><?php echo esc_html($localisation); ?></span>
                        </div>
                        <div class="highlights"><?php echo esc_html(get_the_excerpt()); ?></div>
                        <div class="meta"><?php echo esc_html($partenaire); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="center-cta"><?php the_posts_pagination(); ?></div>
        <?php else : ?>
            <p>Aucun projet pour le moment.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>