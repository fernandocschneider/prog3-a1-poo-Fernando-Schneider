# Sistema de Autenticação PHP com POO 💻

## Acadêmico 👨‍🎓
### Fernando Camilo Schneider
### Turma: 5ª Fase - São Miguel do Oeste
### Curso: Ciência da Computação - UNOESC
### Professor: Leandro Otávio Cordova Vieira

## Descrição do Projeto ✍️

Este projeto implementa um sistema de autenticação de usuários utilizando PHP puro com Programação Orientada a Objetos (POO). A aplicação oferece funcionalidades de cadastro, login, persistência de sessão e uso de cookies, seguindo boas práticas de programação e organização de código.

### Funcionalidades ✔️

#### Cadastro de usuários: Nome, e-mail e senha com validação e sanitização de dados;
#### Login: Verificação de credenciais e persistência de sessão;
#### Dashboard restrito: Área acessível apenas para usuários autenticados;
#### Cookies: Opção para armazenar e-mail do usuário para futuros logins;
#### Logout: Destruição da sessão e redirecionamento;

## Como Executar Localmente
Clone ou faça download do repositório

- Construa a imagem Docker
`docker build -t php-auth-app .`

- Execute o container
`docker run -d -p 8080:80 --name php-auth-container php-auth-app`

- Acesse a aplicação
Abra seu navegador e acesse: `http://localhost:8080`

### Parando a Aplicação

- Para encerrar a execução da aplicação: `docker stop php-auth-container`, `docker rm php-auth-container`
