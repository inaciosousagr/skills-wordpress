<?php
/*
Plugin Name: Plugin Configurar GitHub
Plugin URI: https://github.com/inaciosousagr/skills-wordpress
Description: Adiciona uma configuração para salvar a URL do perfil do GitHub e a exibe como uma meta tag no head do site.
Version: 1.0
Author: Inacio Sousa
Author URI: https://github.com/inaciosousagr
Requires PHP: 7.4
*/

// Adiciona uma página de configurações no menu do admin
function plugin_configurar_github_menu() {
    add_options_page('Configuração do GitHub', 'Configurar GitHub', 'manage_options', 'plugin-configurar-github', 'plugin_configurar_github_page');
}
add_action('admin_menu', 'plugin_configurar_github_menu');

// Exibe a página de configuração
function plugin_configurar_github_page() {
    if (!current_user_can('manage_options')) return;

    // Salva a URL se o formulário for enviado
    if (isset($_POST['github_url'])) {
        check_admin_referer('plugin_configurar_github_save', 'plugin_configurar_github_nonce');
        update_option('plugin_configurar_github_url', sanitize_text_field($_POST['github_url']));
        echo '<div class="updated"><p>URL salva!</p></div>';
    }

    // Recupera a URL salva
    $github_url = get_option('plugin_configurar_github_url', '');
    ?>
    <div class="wrap">
        <h1>Configuração do GitHub</h1>
        <form method="post">
            <?php wp_nonce_field('plugin_configurar_github_save', 'plugin_configurar_github_nonce'); ?>
            <label for="github_url">URL do GitHub:</label>
            <input type="url" id="github_url" name="github_url" value="<?php echo esc_attr($github_url); ?>" class="regular-text">
            <p><input type="submit" class="button-primary" value="Salvar"></p>
        </form>
    </div>
    <?php
}

// Adiciona a meta tag ao head do site
function plugin_configurar_github_meta_tag() {
    $github_url = get_option('plugin_configurar_github_url', '');
    if ($github_url) {
        echo '<meta name="verify-skills" content="' . esc_attr($github_url) . '">';
    }
}
add_action('wp_head', 'plugin_configurar_github_meta_tag');
