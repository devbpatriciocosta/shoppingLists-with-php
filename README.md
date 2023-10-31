<div align='center'>

## **Teste para vaga de desenvolvedor Júnior na LXTEC** 

</div>

> Esse repositório tem como objetivo provar os conhecimentos em PHP, MYSQL, JS, bem como a qualidade do código, afim de ser contratado para a vaga de desenvolvedor Junior na empresa LXTEC
> >> Status: Pronto para usar ✅

---------------------------------------------------------------------------------------------------------------------------------
## Como configurar e rodar o teste? 
---------------------------------------------------------------------------------------------------------------------------------
1) Baixe/Copie o projeto do [GitHub] ou use o [Git Clone] em seu [terminal];

2) Copie a pasta do projeto em seu servidor local [XAMPP], mais precisamente na pasta [HTDOCS] ou [www];

3) É necessário startar os modulos [Apache] e [MySQL] no [XAMPP Control Panel];

4) Acesse o [PHPmyAdmin] através do [Dashboard] do [localhost]; 

5) Na barra de opções superior, acesse [importar] e escolha o [arquivo] (db_schema.sql) presente na pasta [DB] desse projeto;

6) Acesse http://localhost:8080/main-magazord-backend-test-main/ para acessar o projeto. 

7) Para iniciar sessão basta inserir os dados de [login] e [senha]: Murilo / Murilo (Meu filho, hahaha :)) , respectivamente.

---------------------------------------------------------------------------------------------------------------------------------
## Como usar:
---------------------------------------------------------------------------------------------------------------------------------
1. Inicilamente você acessa o http://localhost:9090/shopping-lists-php;
2. Você será direcionado para o index.php que é responsável por fazer login e cadastro de usuário;
3. O login é simples, pois possui apenas 3 fields (Nome Completo, Usuário e senha), porém, essa senha utiliza HASH;
4. Ao fazer o cadastro de usuário é necessário fazer o login.
   (Caso não deseje fazer o cadastro, é possível utilizar os dados de acesso abaixo que já conta om listas e itens já criados por mim.
   
 - Dados de acesso

     >> Dados de Usuário teste: Login - Murilo // Senha - Murilo

5. Ao fazer login, você se depara com o dashboard chamado Minha Lista de Compras.
6. Nessa dashboard você pode:
   - Criar uma lista;
   - Buscar listas, se existentes;
   - Buscar itens e verificar em quais listas eles estão, bem como suas quantidades, se existentes, claro.
7. Ao adicionar uma lista, ele abre um pop up padrão, requerendo assim, o nome da lista;
8. Ao adicionar o nome, é necessário clicar no nome da lista para assim abrir a sua "página" e começar a manipular os itens;
9. Aqui é possível também deletar a lista;
10. Aqui, ele abre uma espécie de tabela com as opções Nome e Quantidade;
11. Ao adicionar o item você pode edita-lo ou deleta-lo;
12. Quando existem mais de um item na lista, é possível remanejar os itens de acordo com a sua "prioridade";
13. Ao lado esquerdo, ao clicarmos por buscar a listas, podemos ver:
    - Input e botão para buscar a lista pelo nome;
    - Essa busca consegue trazer o nome da lista e o que existe dentro daquela lista;
    - Podemos então voltar para a dashboard inicial;
14. Ao lado esquerdo, podemos buscar por ITENS, e assim ver:
    - Em quais listas o item pesquisado está inserido;
    - A quantidade desse item em cada lista;
    - Total de itens somando as duas ou mais listas.
15. Detalhes finais: 
    - É possível verificar quando foi feito o último login do usuário;
    - É possível verificar quando a lista foi criada;
    - É possível fazer o logout, encerrando assim a sessão;
      
---------------------------------------------------------------------------------------------------------------------------------
## Tecnologias / Sobre o projeto: 
---------------------------------------------------------------------------------------------------------------------------------
- Esse projeto foi desenvolvido utilizando PHP sem framework, JavaScript, HTML e CSS;

- Foi utilizado o Banco de dados MySQL através da dashboard admin do PHP.

- O Composer foi instalado. No arquivo composer.json é possível ver informações a respeito do author.
