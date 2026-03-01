FROM httpd:2.4-alpine

# Copier le contenu du site dans Apache
COPY . /usr/local/apache2/htdocs/

# Copier la configuration Apache pour support des permaliens/routes
RUN mkdir -p /usr/local/apache2/conf.d && \
    echo '<Directory /usr/local/apache2/htdocs>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n\
<IfModule mod_rewrite.c>\n\
    RewriteEngine On\n\
    RewriteBase /\n\
    RewriteRule ^index\.html$ - [L]\n\
    RewriteCond %{REQUEST_FILENAME} !-f\n\
    RewriteCond %{REQUEST_FILENAME} !-d\n\
    RewriteRule . /index.html [L]\n\
</IfModule>' > /usr/local/apache2/conf.d/custom.conf

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
