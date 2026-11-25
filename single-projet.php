<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $periode      = get_post_meta(get_the_ID(), '_periode', true);
    $localisation = get_post_meta(get_the_ID(), '_localisation', true);
    $partenaire   = get_post_meta(get_the_ID(), '_partenaire_texte', true);
?>
    <div class="page-header">
        <div class="wrap">
            <p class="eyebrow" style="justify-content:center;"><?php echo esc_html($partenaire); ?></p>
            <h1><?php the_title(); ?></h1>
            <p><?php echo esc_html($localisation); ?></p>
        </div>
    </div>
    <section>
        <div class="wrap">
            <?php if (has_post_thumbnail()) : ?>
                <div style="margin-bottom:30px; border-radius:8px; overflow:hidden;">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            <div class="page-content"><?php the_content(); ?></div>
            <p style="margin-top:30px;"><strong>Période :</strong> <?php echo esc_html($periode); ?></p>
            <p style="margin-top:20px;"><a href="<?php echo esc_url(get_post_type_archive_link('projet')); ?>" class="btn btn-ghost">← Retour aux projets</a></p>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>