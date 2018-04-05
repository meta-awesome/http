# Metawesome
## Http

[![pipeline status](http://gitlab.meta.com.br/meta-awesome/http-auth/badges/master/pipeline.svg)](http://gitlab.meta.com.br/meta-awesome/http-auth/commits/master) [![coverage report](http://gitlab.meta.com.br/meta-awesome/http-auth/badges/master/coverage.svg)](http://gitlab.meta.com.br/meta-awesome/http-auth/commits/master)

### Instalação

Via [composer](http://getcomposer.org):

```bash
$ composer require metawesome/http:dev-master
```

A seguir, adicionar o `HttpServiceProvider` ao array de `providers` em `config/app.php`:

```php
// config/app.php
'providers' => [
    ...
    Metawesome\Http\HttpServiceProvider::class,
];
```

E em seguida atualize os arquivos de autoload:

```bash
$ composer dump-autoload
```

Adicione as variáveis de configuração ao `.env`:

* login.url
* login.seed

### Uso

Adicionar em `routes/api.php`:

```php
// routes/api.php
Route::get('/authenticate', '\Metawesome\Http\AuthController@authenticate');
Route::get('/logout', '\Metawesome\Http\AuthController@logout');
```