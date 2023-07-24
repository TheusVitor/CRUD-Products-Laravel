Título do Projeto: Sistema de Cadastro de Produtos com Laravel

Descrição do Projeto:
Este projeto é um sistema de cadastro de produtos desenvolvido utilizando PHP com o framework Laravel. O sistema permite o cadastro, edição e exclusão de produtos, que são salvos em um banco de dados MySQL. Além disso, é possível visualizar a lista de todos os produtos cadastrados.

Instruções para Execução:

Pré-requisitos:

Docker instalado e configurado no sistema.

Passo 1: Clonar o repositório:
git clone git@github.com:TheusVitor/DomPixelShop.git

Passo 2: Configurar o ambiente com Docker
docker-compose up -d

Passo 3: Instalar as dependências do Laravel
composer install

Passo 4: Configurar o banco de dados
Dentro da pasta DOMPIXELSHOP, abra o arquivo .env e atualize as informações do banco de dados

Passo 5: Executar as migrations
php artisan migrate

Passo 6: Iniciar o servidor de desenvolvimento
php artisan serve

Agora, a aplicação estará disponível em http://localhost:8000/products ou http://127.0.0.1:8000/products.

Você pode acessar a página "Catálogo de Produtos" para visualizar a lista de produtos cadastrados, cadastrar novos produtos clicando no link "Cadastrar novo produto", editar os dados de um produto clicando no link "Editar" na lista e excluir um produto clicando no botão "Excluir" na lista.

Observações:

Certifique-se de que as portas 8000 e 3306 não estejam sendo utilizadas por outros serviços em sua máquina.
Se desejar parar os serviços do Docker, utilize o comando docker-compose down
