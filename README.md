<img src="./public/images/l1nc-logo.png">

# L1nc

L1nc is a link shortener build with Laravel and Livewire.

**Demo:**
[l1nc.com](https://l1nc.com)

the name **L1nc** is choosed beacuse it seems a simillar to world "**link**" in mind (my opinion) but you are free to pronounce that
anyway you want. 🔥🔥

## Installation

Installation is similar to any common Laravel project:

### installing dependencies:

1- install composer packages:

```bash
composer install
```

2- build Javascript (NPM) packages:

```bash
npm install && npm run build
```

### database:

in order to store links, users and details of each link redirection, you need a database. you can use any database which
Laravel supports by default.

**if you prefer MySql:**

add your database details in `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

**if you prefer sqlite:**

first create a sqlite file:

```bash
touch db.sqlite
```

use `pwd` command to find location you created the sqlite file. for example:
`/home/mahdi/Projects/l1nc/db.sqlite`

add path instead of `DB_DATABASE` value:

```
DB_CONNECTION=sqlite
DB_DATABASE=/home/mahdi/Projects/l1nc
```

### run migrations:

in order to create databse tables run migrations:

```php 
php artisan migrate
```

### run the project:

```php 
php artisan serve
```

now project should be run on port 8000 by default:
`127.0.0.1:8000` or `localhost:8000`

## features

- custom domain
- custom short links
- view count
- chart of views in past 30 days
- multi-tenant (you can create multiple teams or organizations)
- user invitations

## Custom Domain

L1nc built with ability to add any custom-domain that you want. so each link can be related to a Domain in database or it would be under main domain. the main domain uses Laravel `APP_URL` in `.env`. so make sure you set the `APP_URL` to your site URL.

also there is a simple verification method for each domain. it generates a random token when you click on verification and if domain works currect and it went back to Laravel router and the token is matched then the domain is verified.
but if you want to automate this process you should have ability to create SSL certificates automaticaly. for example using cerbot or other tools. this process is up to you .

## Customization

L1nc is a simple designed link shortner and if you are familiar with Laravel and Livewire you can simply customize
project for yourself.

### TODO

- add expire time feature to links
- edit link details
- using website og and details in previews
- ability to add custom og
- payment with stripe

### Changelog

...

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mahdi Taleghani](https://github.com/MMTE)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
