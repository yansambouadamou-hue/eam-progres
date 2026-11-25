<?php
if (!defined('ABSPATH')) exit;

function eam_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', ['style', 'script']);
    add_theme_support('custom-logo');
    register_nav_menus([
        'primary' => 'Menu principal',
        'footer'  => 'Menu pied de page',
    ]);
}
add_action('after_setup_theme', 'eam_setup');

function eam_assets() {
    wp_enqueue_style(
        'eam-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,600&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap',
        [], null
    );
    wp_enqueue_style('eam-style', get_stylesheet_uri(), [], '1.0.0');
    wp_enqueue_script(
        'eam-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [], '1.0.0', true
    );
}
add_action('wp_enqueue_scripts', 'eam_assets');

// Custom Post Type : Projet
function eam_register_projet() {
    register_post_type('projet', [
        'labels' => [
            'name'          => 'Projets',
            'singular_name' => 'Projet',
            'add_new_item'  => 'Ajouter un projet',
            'edit_item'     => 'Modifier le projet',
            'all_items'     => 'Tous les projets',
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'show_in_rest' => true,
        'rewrite'      => ['slug' => 'projets'],
    ]);
}
add_action('init', 'eam_register_projet');

// Taxonomies
function eam_register_taxonomies() {
    register_taxonomy('region', 'projet', [
        'label'        => 'Régions',
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);
    register_taxonomy('partenaire', 'projet', [
        'label'        => 'Partenaires',
        'hierarchical' => false,
        'show_in_rest' => true,
    ]);
    register_taxonomy('domaine', 'projet', [
        'label'        => 'Domaines',
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'eam_register_taxonomies');

// Champs personnalisés pour les projets
function eam_projet_metabox() {
    add_meta_box('projet_details', 'Détails du projet', 'eam_projet_metabox_html', 'projet', 'normal', 'high');
}
add_action('add_meta_boxes', 'eam_projet_metabox');

function eam_projet_metabox_html($post) {
    wp_nonce_field('eam_projet_save', 'eam_projet_nonce');
    $periode      = get_post_meta($post->ID, '_periode', true);
    $localisation = get_post_meta($post->ID, '_localisation', true);
    $partenaire   = get_post_meta($post->ID, '_partenaire_texte', true);
    ?>
    <p><label>Période (ex: Mars 2026 — Déc. 2027)</label><br>
    <input type="text" name="periode" value="<?php echo esc_attr($periode); ?>" style="width:100%;"></p>
    <p><label>Localisation</label><br>
    <input type="text" name="localisation" value="<?php echo esc_attr($localisation); ?>" style="width:100%;"></p>
    <p><label>Partenaire (texte libre)</label><br>
    <input type="text" name="partenaire_texte" value="<?php echo esc_attr($partenaire); ?>" style="width:100%;"></p>
    <?php
}

function eam_projet_save_meta($post_id) {
    if (!isset($_POST['eam_projet_nonce']) || !wp_verify_nonce($_POST['eam_projet_nonce'], 'eam_projet_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    foreach (['periode', 'localisation', 'partenaire_texte'] as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_projet', 'eam_projet_save_meta');