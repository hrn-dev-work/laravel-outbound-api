ARG COMPOSER_FLAGS="--no-dev"

FROM php:8.3-cli-bookworm

ARG COMPOSER_FLAGS

RUN apt-get update \
  && apt-get install -y --no-install-recommends git unzip libpq-dev libsqlite3-dev curl \
  && docker-php-ext-install pdo_pgsql pdo_sqlite \
  && rm -rf /var/lib/apt/lists/* \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install ${COMPOSER_FLAGS} --no-scripts --no-interaction --prefer-dist

COPY . .
RUN composer dump-autoload --optimize \
  && mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
  && chmod -R ug+rwx storage bootstrap/cache \
  && rm -f .env database/database.sqlite

ENV PORT=8000
EXPOSE 8000

CMD ["bash", "scripts/render-start.sh"]
