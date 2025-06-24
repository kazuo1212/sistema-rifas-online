FROM php:8.2-apache

# Instalar extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instalar outras dependências
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Copiar arquivos do projeto
COPY extrair/ /var/www/html/

# Definir permissões
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configurar Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Expor porta
EXPOSE 80

# Comando de inicialização
CMD ["apache2-foreground"] 