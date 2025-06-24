FROM php:8.2-apache

# Instalar apenas extensões essenciais
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar arquivos
COPY extrair/ /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80 