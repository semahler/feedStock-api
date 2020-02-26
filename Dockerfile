FROM php:7.2-fpm

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Expose port 9000
EXPOSE 9000

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl

# Installing PDO-MySQL-Driver
RUN docker-php-ext-install pdo_mysql

# Start php-fpm server
CMD ["php-fpm"]
