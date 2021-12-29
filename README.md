# Desafio Promobit - por Gerson Vinicius 
 
## Tecnologias utilizadas: 
  - Laravel - 8.77
  - Mysql - 10.3.31-MariaDB
  - PHP - 7.4
  - Git
  - Linux
  - Composer 2.1.6

## Requisitos
Para o funcionamento do projeto é necessário ter instalados PHP e suas extensões na versão 7.4, Mysql 5.7+ ou MariaDB 10+, composer para instalação de dependências do Laravel e Git.

## Setup

#### Clone do projeto
git clone https://github.com/gersonvinicius/desafio-promobit.git  

Após isso entre na pasta do projeto: cd pasta_projeto  
Dê o comando: cp .env_example .env  
Assim será criado um novo arquivo .env onde iremos alterar para as nossas informações, como a seguir.

#### Banco de dados
Essas são as informações do banco de dados, bastando alterar para as de seu ambiente.  

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=nome_do_banco  
DB_USERNAME=usuario  
DB_PASSWORD=senha  

#### Email (Opcional)
Caso queira fazer testes utilizando email para recuperação de senha, basta alterar estes campos, como abaixo.  
Obs:. o email precisa ser gmail e precisa permitir nas suas configurações para liberar apps desconhecidos e remover qualquer outro tipo de verificação a não ser a senha.  

MAIL_MAILER=smtp  
MAIL_HOST=smtp.gmail.com  
MAIL_PORT=587  
MAIL_USERNAME=email@gmail.com  
MAIL_PASSWORD=senha  
MAIL_ENCRYPTION=tls  
MAIL_FROM_ADDRESS=email@gmail.com  
MAIL_FROM_NAME="${APP_NAME}"  

#### Dependências do projeto
composer install  

#### Criação de tabelas e popular banco
Para criar as tabelas no banco de dados: php artisan migrate  
Caso o banco de dados tenha alguma tabela basta executar: php artisan migrate:fresh  
Foram feitas factories para o banco ser populado automaticamente, basta executar: php artisan db:seed ou php artisan migrate:fresh --seed  

#### Iniciando a aplicação
php artisan serve  
Este comando irá executar o servidor e irá nos devolver um link para acessar a aplicação que geralmente é: http://127.0.0.1:8000/

#### Registrando novo usuário para utilização do sistema com autenticação
Após entrar na url da aplicação, será redirecionado para a página inicial do laravel, logo acima no canto superior direito existem dois botoês que irão redirecionar para as telas de login e registro.  
Primeiramente acessamos o de registro ou 'register' e criamos um novo usuário, logo após criar já seremos redirecionados para a dashboard do projeto.  

#### Utilização do sistema de cadastro de produtos e tags
Basta agora entrarmos nas telas de tags e produtos para verificarmos os produtos ou tags que ja foram pré-cadastrados, podendo também inserir novas, alterar, remover e exibir detalhes.  
Ao editar ou cadastrar um novo produto, podemos escolher as tags desejadas para associar a aquele produto.  

#### Observações
- caso queira selecionar mais de uma tag, basta segurar a tecla CTRL e selecionar as tags na lista.   
- a aplicação sempre irá salvar as tags que foram enviadas pela requisição ao gravar ou atualizar um produto, então as tags que estão selecionadas serão as que irão ser salvas.  
- se uma tag que está associada a um ou mais produtos for excluída, ela também não estará mais associada a aquele produto.


## SQL de extração de relevância
Este SQL foi executado no phpmyadmin

```SQL
SELECT t.name as Nome, COUNT(pt.tag_id) as 'Quantidade de produtos associados' 
FROM tags t 
LEFT JOIN product_tag pt ON pt.tag_id = t.id GROUP BY t.name;
