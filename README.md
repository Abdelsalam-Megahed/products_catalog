# products_catalog

Light Restful API that lets you manage a catalog of products and their categories by listing, creating, updating or
deleting any of them under certain rules.

**Built With**
- PHP
- Laravel

## Deployment
Once you've created your website, an easy way to deploy your Laravel application is to use [Heroku](https://www.heroku.com/). 
Just follow these few simple steps once you have successfully [signed up](https://signup.heroku.com/www-header) and installed the [Heroku toolbelt](https://devcenter.heroku.com/articles/heroku-cli):

Create a new Heroku application

> $ heroku create

Initialize a new Git repository:

> $ git init
>
> $ heroku git:remote -a https://github.com/Abdelsalam-Megahed/products_catalog

Commit your code to the Git repository if you haven't already:

> $ git add .
>
> $ git commit -am "deployment_commit"

Set a Laravel encryption key:

> $ heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)

Push to Heroku:

> $ git push heroku master

You can now browse your application online:

> $ heroku open

You can read more about launching your project with Heroku here in their [Laravel & Heroku guide](https://devcenter.heroku.com/articles/getting-started-with-laravel).

You can learn more about deploying your Laravel project from the [documentation](https://laravel.com/docs/7.x/deployment#introduction).

