FROM php:8.1-apache

# Atualizar pacotes e instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Ativar módulos do PHP necessários
RUN docker-php-ext-install pdo pdo_mysql zip

# Ativar o módulo de reescrita do Apache
RUN a2enmod rewrite

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . /var/www/html/

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html