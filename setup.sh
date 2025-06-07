#!/bin/bash

chmod +x setup.sh
set -e

echo "Checking if Magento is already installed..."

TABLE_COUNT=$(docker compose exec php mysql -u magento -pmagento -h db -D magento -se "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'magento' AND table_name = 'store_website';")

if [ "$TABLE_COUNT" -eq 0 ]; then
  echo "Magento not installed, running setup:install..."
  docker compose exec php composer install
  docker compose exec php bin/magento setup:install \
    --base-url=http://localhost:8081 \
    --db-host=db \
    --db-name=magento \
    --db-user=magento \
    --db-password=magento \
    --admin-firstname=Admin \
    --admin-lastname=User \
    --admin-email=admin@example.com \
    --admin-user=admin \
    --admin-password=Admin123! \
    --language=pl_PL \
    --currency=PLN \
    --timezone=Europe/Warsaw \
    --use-rewrites=1 \
    --search-engine=elasticsearch8 \
    --elasticsearch-host=elasticsearch \
    --elasticsearch-port=9200
else
  echo "Magento is already installed. Skipping setup:install."
fi

echo "Running setup:upgrade, di:compile and static content deploy..."

docker compose exec php bin/magento setup:upgrade
docker compose exec php bin/magento setup:di:compile
docker compose exec php bin/magento setup:static-content:deploy -f

echo "Disabling static file signing..."

docker compose exec php bin/magento config:set dev/static/sign 0

echo "Disabling Magento 2FA modules for dev environment..."

docker compose exec php bin/magento module:disable Magento_TwoFactorAuth Magento_AdminAdobeImsTwoFactorAuth

echo "Flushing cache..."

docker compose exec php bin/magento cache:flush

echo "Setting permissions..."

docker compose exec php find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} +
docker compose exec php find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} +

echo "Done."
