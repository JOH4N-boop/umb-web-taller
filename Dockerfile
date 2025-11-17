# Imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilitar extensiones necesarias
RUN docker-php-ext-install mysqli

# Copiar tu API (carpeta api o archivos sueltos)
COPY . /var/www/html/

# Dar permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Habilitar mod_rewrite (opcional)
RUN a2enmod rewrite
