#!/bin/bash
docker run -v "$PWD":/app -w /app node:14 npm run prod
git add .
git commit -m "assets"
git push
ssh -i "/home/fog/.ssh/id_rsa" u0356931@server162.hosting.reg.ru <<'ENDSSH'
cd www/metipravo.ru
git pull
/opt/php/8.0/bin/php artisan migrate --force
/opt/php/8.0/bin/php composer.phar install --no-dev
/opt/php/8.0/bin/php artisan optimize:clear
/opt/php/8.0/bin/php artisan optimize
echo 'Успешно';
ENDSSH

#git pull && /opt/php/8.3/bin/php artisan migrate --force && /opt/php/8.3/bin/php composer.phar install --no-dev && /opt/php/8.3/bin/php artisan optimize:clear && /opt/php/8.3/bin/php artisan optimize
