# richblog

iThis is a stab at a blog in Laravel.

It may contain some non best practice due to lack of experience with laravel, but where possible Laravel documentation has been followed.

## Get started

To run the blog you need docker and docker compose:

a) cd to the working project directory and run

    docker run --rm -v $(pwd):/app composer/composer install

b) when composer has finished doing its thing

    docker-compose up
  
The app should be available then at http://localhost:8080

NB: you may need to fix permissions for the web user that docker is running as - this depends on your docker setup and OS, but under mine (ubuntu 16.04) it is www-data. I used setfacl to achieve this as per symfony docs:

    https://symfony.com/doc/2.7/setup/file_permissions.html

Fix as follows:

    sudo setfacl -R -m u:"www-data":rwX -m u:richard:rwX bootstrap
    sudo setfacl -dR -m u:"www-data":rwX -m u:richard:rwX bootstrap
    sudo setfacl -R -m u:"www-data":rwX -m u:richard:rwX storage
    sudo setfacl -dR -m u:"www-data":rwX -m u:richard:rwX storage

## Running laravel commands

Because we are running under an image called app we have to use docker-compose exec. For example:

    docker-compose exec app php artisan key:generate
    
## Running tests

As above, we need to run tests using exec, E.g.

    docker-compose exec app ./vendor/bin/phpunit