# Metawesome
## Http

[![pipeline status](http://gitlab.meta.com.br/meta-awesome/http-auth/badges/master/pipeline.svg)](http://gitlab.meta.com.br/meta-awesome/http-auth/commits/master) [![coverage report](http://gitlab.meta.com.br/meta-awesome/http-auth/badges/master/coverage.svg)](http://gitlab.meta.com.br/meta-awesome/http-auth/commits/master)

### Instalação

Via [composer](http://getcomposer.org):

```bash
$ composer require metawesome/http:dev-master
```

A seguir, adicionar o `AuthServiceProvider` ao array de `providers` em `config/app.php`:

```php
// config/app.php
'providers' => [
    ...
    Metawesome\Http\AuthServiceProvider::class,
];
```

E em seguida atualize os arquivos de autoload:

```bash
$ composer dump-autoload
```

Adicione as variáveis de configuração ao `.env`:

* login.url
* login.seed