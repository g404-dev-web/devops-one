# One

The only App you need© - *RealCompany*
(school project)

## Dépendances

- PHP >= 7.2
- Composer à jour
- NPM / Node

## Installation

```
$ cd back/admin; composer install
```

## Démarrage des services Docker

```bash
$ docker-compose up
```

Cette commande lance tous les services docker et envoie les logs sur la sortie du terminal. Pour tout arrêter : CTRL + C.

Pour démarrer docker en background, utiliser l'option -d

## Utilisation 

#### Symfony 4

L'administration de Symfony est accessible sur le  port 20000. 

La partie front de Symfony a été désactivée en redirigeant les routes ```/admin``` vers ```/```

L'outil CLI de Symfony doit être appellé en passant par Docker. Il s'utilise de deux façons :
- ```docker exec one-php-fpm php bin/console doctrine```
- En ouvrant une session bash dans le conteneur php-fpm ( décrit plus bas )

#### MariaDB et Adminer

Adminer est accessible sur le port 20001.

Identifiants du serveur MySQL : 
- Serveur : one-mariadb
- Utilisateur / Mot de passe : root / root
- Utilisateur / Mot de passe : one / one

####React

Le serveur de développement react est accessible sur le port 3000.

## Développement

Le projet est prêt à être développé comme à votre habitude. 

#### Ouvrir une session bash dans le coteneur Docker
```docker exec -it one-php-fpm /bin/bash``` 
