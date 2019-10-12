# sf4bref
Esse projeto é parte do meu TCC para o Bacharelado em Sistemas de Informação pela Instituição Toledo de Ensino (Bauru).

Tema: ANÁLISE DA ARQUITETURA SERVERLESS E COMO ELA PODE TRAZER BENEFÍCIOS À APLICAÇÕES MODERNAS USANDO AWS LAMBDA

# Ferramentas Utilizadas

- PHP 7.3
- Symfony Framework 4.3
- PHP Bref 0.5.5
- Serverless Framework 1.53.0

# Execução

Para testes em ambiente local, utilizar o Docker:

`docker-compose up -d`

O container já possui o npm e serverless instalado, então é possível realizar deploy a partir dele se as chaves de acesso da Amazon estiverem configuradas.

# Testes

Para rodar os testes:

`php bin/phpunit`
