# Documentation du Thème : acr-theme

## Vue d'ensemble
Le thème **acr-theme** est un thème WordPress personnalisé basé sur [_s (Underscores)](http://underscores.me/). Il est conçu pour être léger, modulaire et optimisé pour les besoins spécifiques des "Ateliers de la Cour Roland".

### Informations Techniques
- **Version** : 1.0.0
- **Auteur** : Underscores.me (Base), Personnalisé
- **Compatibilité PHP** : 5.6+
- **Licence** : GPL v2 or later

---

## Structure du Thème

Les fichiers sont organisés de manière standard pour un thème WordPress, avec une séparation claire entre les modèles (PHP), les styles (CSS) et les scripts (JS).

### Répertoires Principaux
- `assets/` : Contient les ressources statiques (fonts, images, icons).
- `inc/` : Fonctions additionnelles PHP (customizer, template-tags, jetpack).
- `js/` : Fichiers JavaScript pour l'interactivité.
- `languages/` : Fichiers de traduction (.pot, .po, .mo).
- `style/` : Feuilles de styles CSS spécifiques à certaines pages ou sections.
- `template-parts/` : Fragments de modèles réutilisables (header, footer, content).

### Fichiers Clés
- `style.css` : Feuille de style principale. Contient les métadonnées du thème et les styles de base (reset, typography, grids).
- `functions.php` : Cœur logique du thème. Gère les supports de thème, l'enqueuing des scripts/styles et les fonctionnalités personnalisées.
- `header.php` : En-tête du site (DOCTYPE, meta tags, ouverture du body, menu de navigation).
- `footer.php` : Pied de page (fermeture du body, scripts, liens sociaux, copyright).
- `front-page.php` : Modèle spécifique pour la page d'accueil personnalisée.
- `page-ateliers.php`, `inscription.php`, `presentation.php` : Modèles de pages spécifiques.

---

## Fonctionnalités

### 1. Styles et Scripts (`functions.php`)
Le thème charge conditionnellement les ressources pour optimiser les performances :
- **Global** : `style.css`, Google Fonts (Roboto), `navigation.js`.
- **Accueil** : `style/homepage.css`, `js/homepage.js`.
- **Pages Spécifiques** : Styles/scripts dédiés pour Inscription, Ateliers, Présentation.

### 2. Personnalisation (Customizer)
Le thème intègre des options modifiables via l'outil de personnalisation de WordPress (`Apparence > Personnaliser`).
Les champs détectés dans `front-page.php` incluent :
- **Hero Section** : Titre, sous-titre, description, texte et URL du bouton.
- **Section À Propos** : Titre, contenu, image.
- **Section Histoire** : Titre, contenu, image.
- **Services** : Image.

### 3. Menus et Widgets
- **Menu** : Un emplacement de menu principal (`Primary`).
- **Widgets** : Une zone de widget latérale (`Sidebar`).

---

## Développement

### Polices d'écriture
Le thème utilise **Roboto** (via Google Fonts) et des polices locales situées dans `assets/fonts/`.

### Icônes
Les icônes sociales (Instagram, Facebook, YouTube) sont gérées via des images dans `assets/icons/` et intégrées directement dans le `footer.php`.

### Bonnes Pratiques
- **Modifications HTML** : Privilégier la modification des fichiers dans `template-parts/` ou la création de modèles enfants.
- **Modifications CSS** : Ajouter les styles dans `style.css` ou les fichiers CSS spécifiques dans `style/`.
- **Accessibilité** : Le thème inclut un lien "Skip to content" pour les lecteurs d'écran.
