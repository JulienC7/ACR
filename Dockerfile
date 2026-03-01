FROM php:8.2-apache

# Installer les extensions PHP nécessaires pour WordPress
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zlib1g-dev \
    libmcrypt-dev \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    mysqli \
    zip \
    exif \
    && rm -rf /var/lib/apt/lists/*

# Installer WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Copier la configuration Apache
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/wordpress.conf && \
    a2enconf wordpress

# Définir le répertoire de travail
WORKDIR /var/www/html

# Si WordPress n'existe pas, le télécharger
RUN if [ ! -f wp-load.php ]; then \
    curl -O https://wordpress.org/latest.tar.gz && \
    tar -xzf latest.tar.gz && \
    mv wordpress/* . && \
    rmdir wordpress && \
    rm latest.tar.gz; \
fi

# Copier le thème dans le répertoire wp-content/themes
COPY . /var/www/html/wp-content/themes/acr-theme/

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Exposer le port 8080 pour Render
EXPOSE 8080

# Ajouter wp-config.php par défaut si absent
RUN if [ ! -f wp-config.php ]; then \
    curl -O https://raw.githubusercontent.com/wordpress/wordpress-develop/trunk/wp-config-sample.php && \
    mv wp-config-sample.php wp-config.php; \
fi

CMD ["apache2-foreground"]
