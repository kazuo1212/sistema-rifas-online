FROM php:8.2-apache

# Instalar extensões PHP essenciais
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instalar dependências básicas
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar arquivos do projeto
COPY extrair/ /var/www/html/

# Copiar configuração do Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Definir permissões
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Expor porta
EXPOSE 80

# Comando de inicialização
CMD ["apache2-foreground"] 