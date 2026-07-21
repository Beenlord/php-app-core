FROM composer:2 AS builder

WORKDIR /tmp

COPY composer.* ./

RUN ls -lh

RUN composer install \
    --no-scripts \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader \
    --ignore-platform-reqs

FROM gitlab.art3d.ru:5005/backend/docker/php:8.2-alpine-slim

COPY scripts/entrypoint.sh /entrypoint.sh

RUN dos2unix /entrypoint.sh && \
    chmod +x /entrypoint.sh

WORKDIR /var/www/html

COPY . .

COPY --from=builder /tmp/vendor /var/www/html/vendor

ENTRYPOINT ["/entrypoint.sh"]
