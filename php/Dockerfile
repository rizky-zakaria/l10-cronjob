FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www
# WORKDIR /coba

# Install dependencies for the operating system software
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions for php
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.lock and composer.json into the working directory
# COPY src/composer.lock src/composer.json /var/www/

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents to the working directory
COPY . /var/www
# COPY . /coba

# Assign permissions of the working directory to the www-data user
COPY --chown=www:www . /var/www
# COPY --chown=www:www . /coba

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000

CMD ["php-fpm"]