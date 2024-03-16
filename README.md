

# Install

```
composer install
bin/console doctrine:database:create
bin/console doctrine:schema:update --force --complete
mysql -u [username] -p [database_name] < fixtures/depaato.sql
symfony serve
```
