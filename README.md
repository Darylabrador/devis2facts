# devis2facts

La conception et le développement de ce projet s'est effectué en groupe dans le cadre de la formation de Simplon.

Ce projet utilise les technologies suivantes :

- backend : Laravel 8 (API)
- frontend : VueJS

## Initialisation du projet

Après avoir fait un git clone de ce projet, vous devez effectué les actions suivantes : 

- composer install
- npm install
- php artisan migrate:fresh --seed
- php artisan passport:install --force

Ensuite, vous devez créer et modifier le fichier .env pour les lignes suivantes : 

- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=
- QUEUE_CONNECTION=database

## Lancement du projet 

En mode développment vous devez utiliser les commandes suivantes : 

- php artisan serve
- php artisan queue:work
- npm run watch