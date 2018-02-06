# richblog

This is a stab at a blog in Laravel.

It may contain some non best practice due to lack of experience with laravel, but where possible Laravel documentation has been followed.

To run the blog you need docker and docker compose:

a) cd to the working project directory and run

```docker run --rm -v $(pwd):/app composer/composer install```

b) when composer has finished doing its thing

```docker-compose up```
  
The app should be available then at http://localhost:8080
 
 