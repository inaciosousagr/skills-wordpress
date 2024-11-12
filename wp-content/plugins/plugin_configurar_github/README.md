
# Plugin Configurar GitHub

## Descrição

Este plugin adiciona uma página no painel de administração do WordPress que permite salvar a URL do perfil do GitHub de um usuário. 
A URL salva será inserida como uma meta tag no `<head>` de todas as páginas do site.

## Instruções de Instalação e Ativação

1. Copie a pasta `plugin_configurar_github` para o diretório `wp-content/plugins/` do seu WordPress.
2. No painel de administração, navegue até "Plugins".
3. Localize "Plugin Configurar GitHub" na lista de plugins e clique em "Ativar".

## Como Utilizar

1. No painel de administração do WordPress, acesse "Configurações" > "Configurar GitHub".
2. Digite a URL do perfil do GitHub no campo fornecido e clique em "Salvar".
3. A URL será adicionada como uma meta tag no `<head>` das páginas do site com o seguinte formato:
   ```html
   <meta name="verify-skills" content="https://sua-url-do-github.com">
   ```

## Funções PHP Utilizadas

- `add_options_page()`: Cria uma página de configurações no menu de "Configurações" do admin.
- `update_option()`, `get_option()`: Gerencia a armazenagem e recuperação da URL do GitHub.
- `wp_nonce_field()`, `check_admin_referer()`: Fornece segurança ao salvar as configurações.
- `wp_head()`: Insere a meta tag no `<head>` do site.

## Requisitos

- WordPress versão 5.0 ou superior.
- PHP versão 7.4 ou superior.

## Lógica e Aplicação

### Lógica

O plugin adiciona uma página de configurações ao menu "Configurações" do WordPress, permitindo que os usuários armazenem uma URL de perfil do GitHub. A URL é salva usando a API de opções do WordPress. Quando uma página é carregada, a URL é recuperada e incluída como uma meta tag no `<head>` do HTML usando o hook `wp_head`.

Essa abordagem foi escolhida para ser simples e eficiente, garantindo que a URL possa ser gerenciada e exibida de maneira centralizada, com integração fácil à interface do WordPress.

### Aplicação Prática

Este plugin é útil para sites que desejam incluir informações do perfil de GitHub em meta tags, o que pode ser usado para verificações, integração com outras ferramentas ou para mostrar informações de desenvolvedores. É especialmente útil para sites de portfólio, blogs de tecnologia e projetos que desejam destacar a presença no GitHub.
