Nette Example
=================

- V adresáři config zkopírovat local.example.neon do local.neon a nastavit mysql:host na host/ip dockeru
- V adresáři spustit příkaz bash up.sh
- Z adresáře sql naimportovat do mysql databáze dockeru strukturu ze souboru database.sql a dummy data z dummy.sql

## Login do aplikace
login: admin@example.org nebo admin2@example.org, heslo: 12345678

## Vývoj css a js
- V adresáři docker spustit bash bash.sh
- v adresáři /var/www/html spustit ./node_modules/.bin/webpack --watch
