FROM php:7.2-fpm

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Expose port 9000
EXPOSE 9000

# Installing PDO-MySQL-Driver
RUN docker-php-ext-install pdo_mysql

# Start php-fpm server
CMD ["php-fpm"]
