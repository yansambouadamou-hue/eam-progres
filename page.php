<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="page-header">
        <div class="wrap">
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <section>
        <div class="wrap">
            <div class="page-content"><?php the_content(); ?></div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>