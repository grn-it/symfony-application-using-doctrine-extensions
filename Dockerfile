FROM composer:latest AS symfony-web-application

RUN apk add bash acl yq postgresql-dev && \
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && \
    apk add symfony-cli && \
    docker-php-ext-install pdo pdo_pgsql intl

CMD ["symfony", "server:start", "--no-tls"]
