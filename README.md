# Projet Laravel - Étapes d'initialisation

Ce projet utilise Laravel comme framework PHP. Voici les étapes pour initialiser et configurer correctement le projet après avoir cloné ou récupéré les dernières modifications.

## Prérequis

Avant de commencer, assure-toi d'avoir installé les outils suivants :

- **PHP** (version 8.x ou supérieure)
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** et **NPM** 
- **MySQL** (ou tout autre système de gestion de base de données compatible)

## Étapes d'initialisation

### 1. Cloner le projet

Si ce n'est pas déjà fait, clone le projet depuis le dépôt Git :

```bash
git clone https://github.com/sloth4roues/students-services.git
cd students-services 
cd Students-Services
```

### 2. Installer les dépendances PHP

Installe les dépendances PHP spécifiées dans le fichier `composer.json` :

```bash
composer install
```

Cela installera toutes les dépendances nécessaires pour le bon fonctionnement de l'application Laravel.

### 3. Installer les dépendances JavaScript

Installer les dépendances front-end avec NPM :

- Pour NPM :
  ```bash
  npm install
  ```

### 4. Configuration de l'environnement

Le fichier `.env` contient les variables d'environnement pour le projet, comme les informations de base de données, les clés API, etc.

- Si tu n'as pas de fichier `.env`, copie le fichier `.env.example` vers `.env` :

  ```bash
  cp .env.example .env
  ```

- Ouvre le fichier `.env` et configure les paramètres suivants :

  - **Base de données** : Configure les informations de connexion à la base de données (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

### 5. Configurer la base de données

Si la base de données est encore vide ou qu'il y a des migrations à appliquer, exécute les commandes suivantes :

- **Migrations** : Applique les migrations pour créer les tables de la base de données :

  ```bash
  php artisan migrate
  ```

- Si tu veux aussi peupler la base de données avec des données d'exemple, exécute :

  ```bash
  php artisan db:seed
  ```

### 6. Démarrer le serveur de développement

Tu peux démarrer le serveur de développement intégré de Laravel pour voir si tout fonctionne correctement :

```bash
php artisan serve
```

Cela lancera le serveur à l'adresse [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Commandes utiles

- **Lancer les migrations** : `php artisan migrate`
- **Lancer les seeds** : `php artisan db:seed`
- **Vider le cache** : `php artisan cache:clear`
- **Démarrer le serveur local** : `php artisan serve`
- **Générer la clé d'application** : `php artisan key:generate`

## Dépendances

Le projet utilise les dépendances suivantes :

- **Laravel** : Framework PHP
- **Composer** : Gestionnaire de dépendances PHP
- **NPM** : Gestionnaire de dépendances JavaScript

---

Si tu rencontres des problèmes, vérifie que tous les services (base de données, serveur de cache, etc.) sont bien en cours d'exécution et que la configuration dans le fichier `.env` est correcte.

---

Bonne chance et bon développement !
```

### Explication des sections :

1. **Cloner le projet** : Première étape pour récupérer le code source.
2. **Installer les dépendances PHP et JavaScript** : Installations via Composer pour PHP et NPM/Yarn pour les dépendances front-end.
3. **Configurer l'environnement** : Explication pour configurer le fichier `.env` avec les paramètres nécessaires.
4. **Configurer la base de données** : Appliquer les migrations et éventuellement remplir la base de données avec des données d'exemple.
5. **Vider le cache et les vues** : Commandes pour assurer que Laravel utilise la dernière configuration et vue.
6. **Démarrer le serveur de développement** : Exécution du serveur intégré de Laravel pour tester l'application.
