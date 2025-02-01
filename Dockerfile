FROM php:8.2-apache-buster

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

#RUN chown -R www-data:www-data /var/www/html

RUN chmod -R 755 /var/www/html

WORKDIR /var/www/html

EXPOSE 80
