# fakertest

## Environnement de développement

* PHP 8.0.1
* Composer
* Symfony CLI

## Vérifier les pré-requis

* symfony check:requirements

## Lancer l'environnement de dévelopement

* composer install
* npm install
* npm run dev-server
* symfony serve -d

## Ajout Fixtures tests

* symfony console doctrine:fixtures:load

## Lancer des tests

* php bin/phpunit --testdox