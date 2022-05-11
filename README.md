# forseti-code-challenge
Teste para Forseti Developer


FORSETI-CODE-CHALLENGE
--------------------------------------------
O projeto foi desenvolvido seguindo os padrões MVC, utilizando PHP, Mysql e cURL.

Instruções:

Banco de Dados:
    1 - Criar um database (nome de sua escolha) e configura-lo no arquivo config.php 
    2 - Rodar o arquivo noticias.sql que contém o DDL CREATE TABLE com toda a estrutura necessária.

Aplicação:
    1 - Configurar o .htaccess e colocar o projeto no seu servidor padrão (Xampp, Wamp, ou no próprio Apache)
    2 - O projeto roda na própria index, então não é necessario acessar nenhum subdiretório ou arquivo específico na URL

    Por exemplo:
        Se o projeto estiver numa pasta chamada forseti-code-challenge, a url para rodar deverá ficar assim: localhost/forseti-code-challenge

Após rodar o projeto o banco de dados será preenchido com as informações do site Comprasnet.

Não foi utilizado interação FrontEnd devido à vaga ser para BackEnd, porém o projeto poderia ser incrementado utilizando template e view do MVC para exibição dos dados.


Para os testes utilizei XAMPP para Windows 7.4.29, 8.0.18 & 8.1.5 e DBeaver para acesso ao Banco.


Aqui segue a estrutura do .htacces que utilizei levando em consideração que o projeto roda dentro da pasta forseti-code-challenge:

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /forseti-code-challenge/index.php?url=$1 [QSA,L]

Sem mais,

Jorge Almeida
