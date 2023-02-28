# Projeto Desafio Canais
O intuito deste projeto foi aplicar boas práticas usando laravel 9 + PHP 8 em ambiente docker. O desafio é realizar um sistema para uma empresa de discos realizar as 3 operações básicas:
1 - Cadastrar estoque
2 - Cadastrar cliente
3 - Realizar venda.

# Programas necessários para utilização
	- Docker
	- Docker compose
    obs: Testado e validado no sistema operacional Ubuntu 22.04.1

# Passo a passo para rodar
	1 - Na raiz do projeto acessar o terminal e rodar o comando "docker-compose build"
	2 - Na raiz do projeto acessar o terminal e rodar o comando "docker-compose up -d"
    3 - Na raiz do projeto criar uma cópia do arquivo ".env.example" com o nome ".env"
    4 - Executar o comando no terminal "docker exec -it desafio_canais_web php artisan key:generate"
    5 - Acessar no navegador e validar se a url exibe uma tela do laravel "http://localhost:8989/"
    6 - Executar o comando no terminal "docker exec -it desafio_canais_web php artisan migrate:install"
    7 - Executar o comando no terminal "docker exec -it desafio_canais_web php artisan migrate"
	
# Como utilizar
Ao final dos passos acima o projeto estará funcional e pronto para ser usado, segue a documentação das rotas: https://documenter.getpostman.com/view/13417395/2s93CSnVnY 