To have this project running you have to install [docker](https://docs.docker.com/get-docker).

To have all environment setup correctly before proceed just copy example environment files to correct places.
````shell script
cp variables.env.example variables.env
cp src/.env.example src/.env
````
If you are going to use xdebug remote debugging depends on your platform you may need to change **XDEBUG_CONFIG** variable content about *remote_host=docker.for.mac.host.internal* to *docker.for.win.host.internal* or in case of linux just *ip address* of your computer.

After having docker installed correctly you can run to whole environment running:
```shell script
docker-compose up -d --build
```

After everything is build correctly you can go inside php container by typing:
```shell script
docker-compose exec php bash
``` 

To install projects dependencies:
```shell script
composer install
```

After installation two more steps:
```shell script
php artisan key:generate
php artisan migrate --seed
```

App is up and running (if you are running linux probably you have to still fix permissions on ```./src/storage directory```), you can go to your browser to [localhost](http://localhost)
Changing permissions:
```shell script
chmod 777 ./src/storage
for dir in ./src/storage; do chmod 777 "$dir"; done;
for dir in ./src/storage/framework; do chmod 777 "$dir"; done;
```

Few things to know:
- API documentation is based on [swagger-ui](https://swagger.io/tools/swagger-ui/) and [OpenApi](https://swagger.io/docs/specification/about/).
- To generate docs run ```php artisan l5-swagger:generate``` from php container.
- Swagger docs are generated from OA\ annotations stored in ```./src/docs``` and in comments in ```./src/app/Http/Controllers``` by library [zircote/swagger-php](http://zircote.github.io/swagger-php/).
- To check if your code is nice and shiny and [PSR-12](https://www.php-fig.org/psr/psr-12/) run [```./ecs```](https://packagist.org/packages/symplify/easy-coding-standard) from php container (if there are any issues try running command with **--fix** option).
- Also there is [mailhog](https://github.com/mailhog/MailHog) setup for handling mail notification, you can access it [here](http://localhost:8025)