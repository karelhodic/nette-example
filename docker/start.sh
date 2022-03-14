#!/bin/sh

cd /var/www/html
npm install
composer install
./node_modules/.bin/webpack

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf