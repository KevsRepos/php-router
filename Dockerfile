FROM php:8.1-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite

COPY ./src/ /var/www/html/