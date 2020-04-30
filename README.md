# Ewa-Haaglanden

INSTALLATION + USAGE BEGIN

Use composer install to get the packages

Use yarn install to get the dependencies

Use php bin/console server:run to start the local webserver

Use yarn run encore dev --watch to view the website

INSTALLATION + USAGE END

DATABASE BEGIN

php bin/console doctrine:database:create

php bin/console doctrine:migrations:diff

php bin/console doctrine:migrations:migrate