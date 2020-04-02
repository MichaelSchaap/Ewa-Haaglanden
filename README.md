# Ewa-Haaglanden

INSTALLATION + USAGE BEGIN

Use composer install to get the packages

Use yarn install to get the dependencies

Use php bin/console server:run to start the local webserver

Use yarn run encore dev --watch to view the website

INSTALLATION + USAGE END

TEST BEGIN

Use composer csfix and composer cscheck to do quick test of the code.

Use php bin/console doctrine:database:create --env=test to create test database
Use php bin/console doctrine:database:diff --env=test to create migration
Use php bin/console doctrine:database:migrate --env=test to migrate to db

Use php bin/phpunit to test

TEST END