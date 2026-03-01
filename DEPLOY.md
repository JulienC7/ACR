# Déploiement sur Render

Ce guide explique comment déployer le thème ACR (site statique HTML/CSS/JS) sur Render.

⚠️ **Important**: Cette version est un thème statique sans base de données. Le contenu est servi comme des fichiers HTML.

## Prérequis

- Un compte Render (https://render.com)
- Ce repository sur GitHub
- Docker installé localement (optionnel, pour tester en local)

## Déploiement sur Render

### Étape 1: Connecter votre repository à Render

1. Allez sur https://dashboard.render.com
2. Cliquez sur "New +" → "Web Service"
3. Connectez votre repository GitHub `JulienC7/ACR`

### Étape 2: Configurer le service web

1. Remplissez les informations:
   - **Name**: acr-theme
   - **Region**: Frankfurt (ou votre région)
   - **Branch**: main
   - **Runtime**: Docker
   - **Build Command**: (laissez vide)
   - **Start Command**: (laissez vide, utilisera le Dockerfile)

2. Cliquez sur "Create Web Service"

### Étape 3: C'est tout!

Le service sera automatiquement déployé. Aucune variable d'environnement n'est nécessaire.

Votre site sera accessible à: `https://acr-theme.onrender.com` (ou le nom que vous avez choisi)

## Test local avec Docker Compose

Pour tester le site en local avant déploiement:

```bash
# Démarrer le service
docker-compose up -d

# Le site sera accessible à http://localhost:8080
```

Pour arrêter:
```bash
docker-compose down
```

## Structure des fichiers

- **Dockerfile**: Configuration Docker pour servir les fichiers statiques avec Apache
- **docker-compose.yml**: Configuration pour le développement local
- **render.yaml**: Configuration optimisée pour Render
- **.dockerignore**: Fichiers à exclure du build Docker
- **index.html**: Page d'accueil (à créer ou modifier selon les besoins)
- **assets/**: Images, CSS, fontes, icônes
- **js/**: Fichiers JavaScript

## Ajouter du contenu

Le thème utilise des fichiers HTML statiques. Pour ajouter du contenu:

1. Créez ou modifiez les fichiers `.php` (ils seront servis comme du texte)
2. Ou convertissez-les en `.html`
3. Les styles CSS sont dans `style/` et `style.css`
4. Les scripts JavaScript sont dans `js/`

## Redéploiement

Chaque fois que vous poussez des changements vers `main`:
1. Render détecte automatiquement les changements
2. Rebuild et redéploie le site automatiquement
3. Aucune intervention manuelle n'est nécessaire

## Troubleshooting

### Le site affiche une page blanche
- Vérifiez que `index.html` ou `index.php` existe à la racine
- Consultez les logs Render (onglet "Logs")

### Les assets ne s'affichent pas
- Vérifiez que les chemins sont corrects (relatifs ou absolus depuis `/`)
- Assurez-vous que les fichiers existent dans le répertoire `assets/`

### Erreur 404
- Vérifiez que le serveur Apache a les bonnes permissions
- Consultez les logs du serveur

## Notes importants

- **Pas de PHP dynamique**: Les fichiers `.php` sont servis comme du texte. Utilisez du HTML pur ou des frameworks JavaScript côté client.
- **Pas de base de données**: Aucune intégration de base de données.
- **Site statique**: Le contenu est figé à chaque déploiement.

Si vous avez besoin d'une vraie intégration WordPress avec base de données, retournez à la version WordPress du thème.

