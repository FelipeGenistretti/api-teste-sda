# 1️⃣ Imagem base PHP com Apache
FROM php:8.2-apache

# 2️⃣ Instala extensões necessárias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# 3️⃣ Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# 4️⃣ Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5️⃣ Copia os arquivos do projeto para dentro do container
COPY . /var/www/html

# 6️⃣ Define o diretório de trabalho
WORKDIR /var/www/html

# 7️⃣ Dá permissão para storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8️⃣ Expõe a porta HTTP
EXPOSE 80
