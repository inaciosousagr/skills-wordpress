<?php
/*
Plugin Name: Plugin Classe CSS
Plugin URI: https://github.com/inaciosousagr/skills-wordpress
Description: Este plugin adiciona a classe CSS 'custom-class' a cada tag <p> presente no conteúdo dos posts.
Version: 1.0
Author: Inacio Sousa
Author URI: https://github.com/inaciosousagr
Requires PHP: 7.4
*/

// Função para modificar o conteúdo dos posts adicionando a classe CSS 'custom-class' nas tags <p>
function adicionar_classe_css_paragrafos($content) {
    // Substitui todas as ocorrências de <p> por <p class="custom-class"> no conteúdo
    $content = str_replace('<p>', '<p class="custom-class">', $content);
    // Retorna o conteúdo atualizado
    return $content;
}

// Conecta a função ao filtro 'the_content' do WordPress
// Isso faz com que a modificação seja aplicada ao conteúdo dos posts exibidos
add_filter('the_content', 'adicionar_classe_css_paragrafos');
