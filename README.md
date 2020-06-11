# Laravel

## Tabla de contenidos

- [Instalación](#instalación)
- [Tests](#tests)

## Instalación

**1. Instalar dependencias**
```sh
    $ composer install
```

**2. Copiar archivo de configuración**
```sh
    $ "cp ./.env.example ./.env"
```

**3. Generar la key de la app**
```sh
    $ php artisan key:generate
```

**4. Editar el archivo ```.env``` con las variables necesarias**

**5. Generar la migración de la base con datos ficticios**
```sh
    $ php artisan migrate:fresh --seed
``` 

## Tests

- **Correr los tests**
```sh
    $ ./vendor/bin/phpunit
```