
# Plugin Shortcode Links

## Descrição

Este plugin oferece um shortcode que exibe uma lista de links para posts que pertencem à mesma categoria que o post atual. 
A lista é precedida por um cabeçalho "Mais Artigos" e exibe até 5 posts relacionados.

## Como Instalar e Ativar

1. Copie a pasta `plugin_shortcode_links` para o diretório `wp-content/plugins/` do seu WordPress.
2. No painel de administração do WordPress, vá até a seção "Plugins".
3. Localize "Plugin Shortcode Links" na lista e clique em "Ativar".

## Como Usar

1. Adicione o shortcode `[links_relacionados]` no conteúdo de qualquer post ou página.
2. O plugin irá exibir uma lista de links para posts relacionados, com base na categoria do post atual, limitando a 5 resultados.

## Funções PHP Utilizadas

- `add_shortcode()`: Registra o shortcode `[links_relacionados]` para ser usado em posts e páginas.
- `WP_Query`: Realiza a busca de posts na mesma categoria.
- `get_the_category()`: Recupera as categorias associadas ao post atual.
- `get_permalink()`, `get_the_title()`: Gera os links e títulos dos posts para exibição.

## Requisitos

- WordPress 5.0 ou superior.
- PHP 7.4 ou superior.

## Lógica e Aplicação

### Lógica

O plugin usa `WP_Query` para buscar posts que compartilham a mesma categoria do post em que o shortcode é inserido. Ele ignora o post atual na lista para evitar repetição. O shortcode `[links_relacionados]` possibilita que usuários insiram a lista de links em qualquer parte do conteúdo de forma simples e prática.

A utilização de `WP_Query` e `get_the_category()` oferece flexibilidade e permite exibir conteúdos relevantes de maneira automática e eficiente, melhorando a experiência dos visitantes ao mostrar mais conteúdo relacionado sem a necessidade de configuração manual.

### Aplicação Prática

O plugin é especialmente útil para blogs, sites de notícias ou qualquer outro tipo de site que deseja aumentar o engajamento dos leitores, fornecendo links para posts relacionados. Isso pode prolongar o tempo de permanência dos visitantes no site e melhorar a navegação ao oferecer conteúdos adicionais de interesse.
