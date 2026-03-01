FROM httpd:2.4-alpine

# Copier le contenu du site dans Apache
COPY . /usr/local/apache2/htdocs/

# Copier la configuration Apache pour support des permaliens/routes
RUN mkdir -p /usr/local/apache2/conf.d && \
    printf '%s\n' '<Directory /usr/local/apache2/htdocs>' \
    '    Options Indexes FollowSymLinks' \
    '    AllowOverride All' \
    '    Require all granted' \
    '</Directory>' \
    '<IfModule mod_rewrite.c>' \
    '    RewriteEngine On' \
    '    RewriteBase /' \
    '    RewriteRule ^index\.html$ - [L]' \
    '    RewriteCond %{REQUEST_FILENAME} !-f' \
    '    RewriteCond %{REQUEST_FILENAME} !-d' \
    '    RewriteRule . /index.html [L]' \
    '</IfModule>' > /usr/local/apache2/conf.d/custom.conf

# Activer mod_rewrite et inclure conf.d
RUN sed -i 's/#LoadModule rewrite_module/LoadModule rewrite_module/' /usr/local/apache2/conf/httpd.conf && \
    sed -i 's/Listen 80/Listen 8080/' /usr/local/apache2/conf/httpd.conf && \
    echo 'Include conf.d/*.conf' >> /usr/local/apache2/conf/httpd.conf

# Définir les permissions
RUN chown -R daemon:daemon /usr/local/apache2/htdocs && \
    chmod -R 755 /usr/local/apache2/htdocs

# Exposer le port 8080 pour Render
EXPOSE 8080

CMD ["httpd-foreground"]
