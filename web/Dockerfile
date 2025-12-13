FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean

COPY nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www/html

EXPOSE 80

CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
