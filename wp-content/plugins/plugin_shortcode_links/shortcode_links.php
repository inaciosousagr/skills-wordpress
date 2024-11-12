<?php
/*
Plugin Name: Plugin Shortcode Links
Plugin URI: https://github.com/inaciosousagr/skills-wordpress
Description: Este plugin cria um shortcode que exibe uma lista de links para posts da mesma categoria com o título "Mais Artigos".
Version: 1.0
Author: Inacio Sousa
Author URI: https://github.com/inaciosousagr
Requires PHP: 7.4
*/

// Função que cria o shortcode para exibir posts relacionados na mesma categoria
function shortcode_links_relacionados() {
    // Obtém as categorias associadas ao post atual
    $categorias = get_the_category();
    if (empty($categorias)) {
        return ''; // Se não houver categorias, não exibe nada
    }

    // Seleciona a primeira categoria para buscar posts relacionados
    $categoria_id = $categorias[0]->term_id;

    // Configura os parâmetros para a query de posts relacionados
    $query_args = array(
        'category__in' => array($categoria_id), // Busca posts na mesma categoria
        'post__not_in' => array(get_the_ID()), // Exclui o post atual dos resultados
        'posts_per_page' => 5, // Limita o número de resultados a 5 posts
        'ignore_sticky_posts' => 1 // Ignora posts fixos (sticky posts)
    );

    // Executa a query para buscar os posts
    $relacionados = new WP_Query($query_args);

    // Se não houver resultados, retorna uma string vazia
    if (!$relacionados->have_posts()) {
        return '';
    }

    // Inicia a construção do HTML com um título e uma lista não ordenada
    $output = '<h3>Mais Artigos</h3><ul>';

    // Itera sobre os posts encontrados
    while ($relacionados->have_posts()) {
        $relacionados->the_post();
        // Cria um item da lista para cada post, com um link para o mesmo
        $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }

    // Finaliza a lista
    $output .= '</ul>';

    // Restaura a consulta global após a query personalizada
    wp_reset_postdata();

    return $output;
}

// Registra o shortcode [links_relacionados] para uso em posts ou páginas
add_shortcode('links_relacionados', 'shortcode_links_relacionados');
