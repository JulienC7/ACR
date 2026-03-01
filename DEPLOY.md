# Déploiement sur Render

Ce guide explique comment déployer le thème WordPress ACR sur Render.

## Prérequis

- Un compte Render (https://render.com)
- Ce repository sur GitHub
- Docker installé localement (optionnel, pour tester en local)

## Option 1: Déploiement avec render.yaml (Recommandé)

1. **Connectez votre repository à Render**
   - Allez sur https://dashboard.render.com
   - Cliquez sur "New +" → "Web Service"
   - Connectez votre repository GitHub

2. **Uploadez le fichier render.yaml**
   - Le fichier `render.yaml` à la racine du projet contient la configuration complète
   - Render lira automatiquement cette configuration et créera:
     - Un service web pour WordPress
     - Une base de données MySQL

3. **Les variables d'environnement seront auto-générées**
   - Les clés de sécurité WordPress seront créées automatiquement
   - La base de données sera provisionnée et liée au service web

## Option 2: Configuration manuelle sur Render

### Étape 1: Créer un service Web

1. Allez sur https://dashboard.render.com
2. Cliquez sur "New +" → "Web Service"
3. Sélectionnez votre repository
4. Configurez comme suit:
   - **Name**: acr-wordpress (ou votre choix)
   - **Region**: Frankfurt (ou votre choix)
   - **Branch**: main
   - **Runtime**: Docker
   - **Build & Deploy Timeout**: 30 minutes

### Étape 2: Créer une base de données MySQL

1. Cliquez sur "New +" → "MySQL"
2. Donnez-lui un nom (ex: wordpress-acr)
3. Notez le nom d'hôte et les credentials

### Étape 3: Configurer les variables d'environnement

1. Dans votre service Web sur Render, allez à "Environment"
2. Ajoutez les variables suivantes:

```
WORDPRESS_DB_HOST={hostname de votre BD MySQL}
WORDPRESS_DB_NAME=wordpress_acr
WORDPRESS_DB_USER=postgres (ou autre selon votre BD)
WORDPRESS_DB_PASSWORD={votre mot de passe}
WORDPRESS_DEBUG=false
```

Générez des clés de sécurité WordPress à https://api.wordpress.org/secret-key/1.1/salt/ et ajoutez-les:
- WORDPRESS_AUTH_KEY
- WORDPRESS_SECURE_AUTH_KEY
- WORDPRESS_LOGGED_IN_KEY
- WORDPRESS_NONCE_KEY
- WORDPRESS_AUTH_SALT
- WORDPRESS_SECURE_AUTH_SALT
- WORDPRESS_LOGGED_IN_SALT
- WORDPRESS_NONCE_SALT

## Test local avec Docker Compose

Pour tester en local avant déploiement:

```bash
# Démarrer les services
docker-compose up -d

# Le site sera accessible à http://localhost:8080
# Base de données: localhost:3306
# User: wordpress / Mot de passe: wordpress
```

Pour arrêter:
```bash
docker-compose down
```

## Post-Installation

1. **Accédez à votre site**
   - URL: https://votre-domaine-render.onrender.com

2. **Installation WordPress**
   - Suivez l'assistant d'installation WordPress
   - Activez le thème ACR dans "Appearance" → "Themes"

3. **Configurez le thème**
   - Allez à "Appearance" → "Customize"
   - Configurez les sections (Hero, À propos, Histoire, Services, etc.)

## Troubleshooting

### Les fichiers ne s'affichent pas
- Vérifiez que les permissions sont correctes (chown -R www-data:www-data /var/www/html)
- Vérifiez les logs Render

### Erreur de base de données
- Vérifiez que WORDPRESS_DB_HOST, WORDPRESS_DB_NAME, WORDPRESS_DB_USER et WORDPRESS_DB_PASSWORD sont corrects
- Assurez-vous que la base de données est créée

### Images manquantes
- Les assets (images, CSS, JS) devraient être servis depuis /assets/
- Vérifiez que les Permission sont correctes

## Structure du Dockerfile

- **Image de base**: php:8.2-apache
- **Extensions PHP**: mysqli, gd, zip, exif pour WordPress
- **Modules Apache**: rewrite pour les permaliens
- **WP-CLI**: Outil de gestion WordPress
- **Port**: 8080 pour Render (port standard pour les services web)

## Fichiers Docker importants

- **Dockerfile**: Configuration complète de l'image Docker
- **docker-compose.yml**: Configuration pour le développement local
- **render.yaml**: Configuration pour déploiement sur Render
- **.dockerignore**: Fichiers à exclure du build Docker
- **.env.example**: Template des variables d'environnement
