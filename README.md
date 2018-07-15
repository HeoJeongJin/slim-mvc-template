# slim-mvc-template
MVC template created with php-based slim framework.
I used the code while learning slim in [Codecourse][code] and the contents of [Slim-Skeleton][skel] which is formally supplied by Slim, are combined.

  - Managing dependencies using composer
  - Modern php
  - Twig template engine
  - Using PDO objects
  - Folder name and file name, and the js file is also read according to this rule

# New Features!
  - Eloquent ORM (Optional in Model)
  - Bootstrap 4+

### Tutorial



I want to try out a tutorial on my personal blog with the following content that I have understood and learned:

* step 01 - install Slim & web server settings
* step 02 - ready for development URL host by 8888 & composer.json's autoload
* step 03 - other packages install
* step 04 - Basic Controllers and Models
* step 05 - sign up
* step 06 - validation, Slim CSRF, Flash package
* step 07 - View Middleware
* step 08 - sign in
* step 09 - sign out
* step 10 - change password 
* step 11 - Authenticated middleware, Guest Middleware

### Installation

Slim requires PHP v5.5+ or newer

Install the dependencies and devDependencies and start Develop.

```sh
$ composer require slim/slim "^3.0"
$ composer require monolog/monolog
$ composer require respect/validation
$ composer require slim/twig-view
$ composer require slim/flash
$ composer require illuminate/database "~5.6"
$ composer require slim/csrf
```

For production environments...

[apache] ./public/.htaccess
```sh
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

[localhost:8888] php internal server use http://localhost:8888
```sh
php -S localhost:8888 -t public public/index.php
```

### Plugins


Plug-ins used for Slim

| Plugin | README |
| ------ | ------ |
| Monolog | [https://github.com/Seldaek/monolog][mono] |
| validate | [https://github.com/Respect/Validation][vali] |
| twig view | [https://github.com/slimphp/Twig-View][twig] |
| flash | [https://github.com/slimphp/Slim-Flash][flash] |
| Eloquent ORM | [https://github.com/illuminate/database][elo] |
| Slim csrf | [https://github.com/slimphp/Slim-Csrf][csrf] |


### Development

composer.json:
```sh
"autoload": {
    "psr-4": {
        "App\\": "app"
    }
}
```

```sh
$ composer dump-autoload -o
```


### in SQL
The sql folder contains user table information:
```sh
user.sql
```
Generating pre-built zip archives for distribution:
```sh
$ gulp build dist --prod
```

### Todos

 - board and pagenation
 - vuejs connect public folder's frontend assets

## Credits
- [serpiko ( Heo Jeong Jin )][serpiko]

License
----

MIT


[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [code]: <https://codecourse.com/watch/slim-3-authentication>
   [skel]: <https://github.com/slimphp/Slim-Skeleton>
   [mono]: <https://github.com/Seldaek/monolog>
   [vali]: <https://github.com/Respect/Validation>
   [twig]: <https://github.com/slimphp/Twig-View>
   [flash]: <https://github.com/slimphp/Slim-Flash>
   [elo]: <https://github.com/illuminate/database>
   [csrf]: <https://github.com/slimphp/Slim-Csrf>
   [serpiko]: <http://serpiko.tistory.com>

