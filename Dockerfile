# Usamos la imagen oficial de PHP con FPM
FROM php:8.3.13-fpm

# Establecemos el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Instala las extensiones necesarias para Laravel
RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev unzip && \
    docker-php-ext-install pdo pdo_mysql zip && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia todos los archivos del proyecto al contenedor
COPY . .

# Configuración de permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto para FPM
EXPOSE 9000

# Comando para iniciar el servicio PHP-FPM
CMD ["php-fpm"]
