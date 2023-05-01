# Menggunakan image PHP 8.1 dan apache webserver
FROM php:8.1-apache

# Copy index.php ke folder docker
COPY ./index.php /var/www/html

# Update Repository yang terbaru
RUN apt update -y

#Install extension mysqli
RUN docker-php-ext-install mysqli

# Setting akses control list untuk kepemilikan 'u' dan 'g' di set ke www-data
RUN chown -R www-data:www-data /var/www/html
# Setting untuk menghilangkan permission 'w' dan 'x' untuk others
RUN chmod -R o-wx /var/www/html