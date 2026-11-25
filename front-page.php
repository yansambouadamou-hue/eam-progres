<?php get_header(); ?>

<section class="hero">
    <div class="wrap">
        <div class="hero-grid">
            <div>
                <p class="eyebrow">ONG humanitaire & développement</p>
                <h1>EAM Progrès, engagée au <em>Niger</em> aux côtés des communautés.</h1>
                <p class="hero-sub">EAM Progrès accompagne les populations nigériennes à travers des interventions en eau, hygiène et assainissement, santé et nutrition, sécurité alimentaire, réponse d'urgence et gouvernance locale.</p>
                <div class="hero-cta">
                    <a href="<?php echo esc_url(get_post_type_archive_link('projet')); ?>" class="btn btn-primary">Découvrir nos interventions</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-ghost">Nous contacter</a>
                </div>
            </div>
            <div class="hero-image"><span>Photo terrain — Niger</span></div>
        </div>
        <div class="stats reveal">
            <div class="stat"><b>46</b><span>Collaborateurs</span></div>
            <div class="stat"><b>18</b><span>Projets référencés</span></div>
            <div class="stat"><b>7</b><span>Régions d'intervention</span></div>
            <div class="stat"><b>6</b><span>Domaines d'action</span></div>
        </div>
    </div>
</section>

<section>
    <div class="wrap">
        <div class="section-head">
            <h2>Qui sommes-nous</h2>
            <p>Une organisation de la société civile nigérienne, structurée autour d'une vision de long terme.</p>
        </div>
        <div class="triptych reveal">
            <div><h3>Notre vision</h3><p>Devenir une organisation de référence, crédible et pérenne, reconnue pour la qualité de ses services auprès des populations et de ses partenaires.</p></div>
            <div><h3>Notre mission</h3><p>Concrétiser les engagements de l'État aux côtés des communautés, pour poser les bases d'une société juste, équitable et tournée vers un développement durable.</p></div>
            <div><h3>Nos valeurs</h3><p>Équité, dignité, responsabilité, redevabilité et transparence — envers les partenaires comme envers les bénéficiaires.</p></div>
        </div>
        <div class="center-cta"><a href="<?php echo esc_url(home_url('/qui-sommes-nous/')); ?>" class="btn btn-ghost">En savoir plus</a></div>
    </div>
</section>

<section style="background: var(--bg-light);">
    <div class="wrap">
        <div class="section-head">
            <h2>Domaines d'intervention</h2>
            <p>Six domaines structurent les interventions d'EAM Progrès au Niger.</p>
        </div>
        <div class="domains reveal">
            <div class="domain-card"><span class="num">01</span><h3>Eau, hygiène et assainissement</h3><p>Accès à l'eau potable, promotion de l'hygiène et assainissement durable.</p></div>
            <div class="domain-card"><span class="num">02</span><h3>Santé et nutrition communautaire</h3><p>Prévention et prise en charge communautaire (PCIMA, ANJE...).</p></div>
            <div class="domain-card"><span class="num">03</span><h3>Sécurité alimentaire & moyens d'existence</h3><p>Appui aux ménages via les activités génératrices de revenus et l'autonomisation économique.</p></div>
        </div>
        <div class="center-cta"><a href="<?php echo esc_url(home_url('/domaines/')); ?>" class="btn btn-ghost">Découvrir tous nos domaines</a></div>
    </div>
</section>

<section>
    <div class="wrap">
        <div class="section-head">
            <h2>Nos projets phares</h2>
            <p>Quelques interventions mises en avant parmi les 18 projets référencés.</p>
        </div>
        <div class="feature-grid reveal">
            <?php
            $projets = new WP_Query([
                'post_type'      => 'projet',
                'posts_per_page' => 4,
            ]);
            if ($projets->have_posts()) :
                while ($projets->have_posts()) : $projets->the_post();
                    $partenaire = get_post_meta(get_the_ID(), '_partenaire_texte', true);
                    ?>
                    <article class="feature-card">
                        <span class="eyebrow"><?php echo esc_html($partenaire); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Aucun projet pour le moment. Ajoutez-en depuis <strong>Projets → Ajouter</strong>.</p>
            <?php endif; ?>
        </div>
        <div class="center-cta"><a href="<?php echo esc_url(get_post_type_archive_link('projet')); ?>" class="btn btn-primary">Voir les 18 interventions</a></div>
    </div>
</section>

<?php get_footer(); ?>