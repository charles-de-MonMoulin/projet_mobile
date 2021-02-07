# projet_mobile
backend of mobile project

dev:
installer docker et docker-compose
dans le dossier api-platform-261:
    lancer  -> docker-compose build
            -> docker-compose up
si la base de données ne se crée pas automatiquement:
    docker-compose exec php sh //pour ouvrir un terminal dans php
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
la documentation se trouve à l'adresse localhost/docs

deploy prod:
https://api-platform.com/docs/deployment/docker-compose/
