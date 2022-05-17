PROJETO PARA REQUISIÇÃO DE DADOS EM UM SITE:

Desenvolvido por: Denis Juvino Bento
Data: 25/07/2021, Suzano/SP

Ferramentas usadas:

    •Laravel 8
    •PHP 7
    •Html
    •Bootstrap
    •Regex
    •MySql
    •Editor VScode

Para rodar este projeto após fazer o clone, executar o composer update para criar a pasta "vendor". Criar uma cópia do arquivo ".env.example" e renomear para apenas".env" após renomear, em "DB_DATABASE=" na linha 13, colocar o nome do banco de dados e criar o banco em phpmyadmin com o mesmo nome, pode ser qualquer nome que você queira. Após isso, executar as migrations e pronto, o projeto deve rodar.

Na tela inicial de Login, utilizar o 
usuario: admin@admin.com
e senha: adminadmin

Para ir á tela de cadastro, adicionar na barra de pesquisa do navegador a palavra cadastro. 
Exemplo: localhost:8000/cadastro

Ao efetuar a busca no campo de pesquisa, será retornado ao usuario os veiculos, os mesmos serão salvos no Banco de dados.
O usuario pode deletar algum veiculo no botão Excluir.




