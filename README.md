# COVID Tracker

COVID Tracker est une application web Laravel qui fournit des statistiques en temps réel sur la pandémie de COVID-19 à travers le monde. Elle utilise des données provenant d'API fiables pour offrir une vue d'ensemble et des détails par pays sur les cas, les décès, les guérisons et d'autres métriques importantes.

## Fonctionnalités

- Tableau de bord global avec les statistiques COVID-19 pour tous les pays
- Pages de détails par pays avec des statistiques approfondies
- Mise à jour automatique des données via une API externe
- Interface utilisateur responsive utilisant Bootstrap
- Pagination pour une navigation facile à travers les données

## Prérequis

- PHP >= 8.2
- Composer
- MySQL ou tout autre système de gestion de base de données supporté par Laravel

## Installation

1. Clonez le dépôt :
   ```
   git clone https://github.com/mickaelnambs/covid-tracker.git
   ```

2. Naviguez dans le répertoire du projet :
   ```
   cd covid-tracker
   ```

3. Installez les dépendances PHP :
   ```
   composer install
   ```

4. Copiez le fichier d'environnement et configurez-le :
   ```
   cp .env.example .env
   ```
   Éditez le fichier `.env` avec vos configurations de base de données et autres paramètres nécessaires.

5. Générez la clé d'application :
   ```
   php artisan key:generate
   ```

6. Exécutez les migrations :
   ```
   php artisan migrate
   ```

## Utilisation

1. Démarrez le serveur de développement :
   ```
   php artisan serve
   ```

2. Récupérez les données COVID initiales :
   ```
   php artisan covid:fetch
   ```

3. Accédez à l'application dans votre navigateur à l'adresse `http://localhost:8000`

Pour maintenir les données à jour, vous pouvez configurer une tâche cron pour exécuter `php artisan covid:fetch` régulièrement.

## Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez votre branche de fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## Crédits

- Données COVID-19 fournies par [Disease.sh](https://disease.sh/)
- Construit avec [Laravel](https://laravel.com/)
- Interface utilisateur propulsée par [Bootstrap](https://getbootstrap.com/)

## Contact

Lien du projet : [https://github.com/mickaelnambs/covid-tracker](https://github.com/mickaelnambs/covid-tracker)
# covid-tracker
