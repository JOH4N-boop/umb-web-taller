# Usar una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias (como mysqli para MySQL)
RUN docker-php-ext-install mysqli

# Copiar los archivos del backend al servidor web
COPY . /var/www/html/

# Habilitar mod_rewrite para URLs amigables (opcional)
RUN a2enmod rewrite
